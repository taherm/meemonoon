<?php

namespace App\Src\Cart;

use App\Src\Country\Country;
use Carbon\Carbon;
use Exception;

class ShippingManager
{
    public function calculateCost($cartWeight, $country,$area)
    {
        $destinationCountry = Country::where('name_' . app()->getLocale(), $country)->first();
        $deliveryCost = $this->calcRateAramex($destinationCountry, $cartWeight,$area);
        return $deliveryCost;
    }

    public function calcRateAramex($destinationCountry, $cartWeight,$area)
    {
        $params = array(
            'ClientInfo' => [
                "UserName" => env('ARAMEX_USERNAME'),
                "Password" => env('ARAMEX_PASSWORD'),
                "Version" => "v2.0",
                "AccountNumber" => env('ARAMEX_ACCOUNT_NUMBER'),
                "AccountPin" => env('ARAMEX_ACCOUNT_PIN'),
                "AccountEntity" => env('ARAMEX_ACCOUNT_ENTITY'),
                "AccountCountryCode" => env('ARAMEX_ACCOUNT_COUNTRY_CODE'),
            ],
            'Transaction' => array(
                'Reference1' => '001'
            ),
            'OriginAddress' => array(
                "City" => env('ORIGINAL_CITY'),
                "CountryCode" => env('ORIGINAL_COUNTRY')
            ),
            'DestinationAddress' => array(
                "City" => $area,
                "CountryCode" => $destinationCountry->iso_3166_2
            ),
            'Shipping Date' => Carbon::today(),
            'ShipmentDetails' => array(
                'PaymentType' => 'P',
                'ProductGroup' => ($destinationCountry->iso_3166_2 === 'KW') ? 'DOM' : 'EXP',
                'ProductType' => ($destinationCountry->iso_3166_2 === 'KW') ? 'OND' : 'PPX',
                'ActualWeight' => array('Value' => $cartWeight, 'Unit' => 'KG'),
                'ChargeableWeight' => array('Value' => $cartWeight, 'Unit' => 'KG'),
                'NumberOfPieces' => 1
            )
        );
        $country = [
            'ClientInfo' => [
                "UserName" => env('ARAMEX_USERNAME'),
                "Password" => env('ARAMEX_PASSWORD'),
                "Version" => "v2.0",
                "AccountNumber" => env('ARAMEX_ACCOUNT_NUMBER'),
                "AccountPin" => env('ARAMEX_ACCOUNT_PIN'),
                "AccountEntity" => env('ARAMEX_ACCOUNT_ENTITY'),
                "AccountCountryCode" => env('ARAMEX_ACCOUNT_COUNTRY_CODE'),
                'Source' => NULL
            ],
            'Transaction' => [
                'Reference1' => '001',
            ],
            'Code' => $destinationCountry->iso_3166_2,
        ];

        try {
            $countriesSoapClient = new \SoapClient(env('ARAMEX_COUNTRY_URL'), array('trace' => 1));
            $country = $countriesSoapClient->FetchCountry($country);
            if (!is_null($country->Country->Name)) {
                $calcSoapClient = new \SoapClient(env('ARAMEX_CALC_URL'), array('trace' => 1));
                $results = $calcSoapClient->CalculateRate($params);
                dd($results);
                return $results->TotalAmount->Value;
            }
        } catch (SoapFault $fault) {
            throw new \Exception("Shipping to {$destinationCountry->name} is not available");
        }
    }
}


