<?php

namespace App\Src\Cart;

use App\Src\Country\Country;
use Exception;

class ShippingManager
{
    public function calculateCost($cartWeight, $country)
    {
        $destinationCountry = Country::where('name_' . app()->getLocale(), $country)->first();
        $deliveryCost = $this->calcRateAramex($destinationCountry, $cartWeight);
        return $deliveryCost;
    }

    private function roundUp($weight)
    {
        return round(($weight + .5 / 2) / .5) * .5;
    }

    public function calcRateAramex($destinationCountry, $cartWeight)
    {
        $params = array(
            'ClientInfo' => array(
                "AccountCountryCode" => "JO",
                "AccountEntity" => "AMM",
                "AccountNumber" => "20016",
                "AccountPin" => "331421",
                "UserName" => "testingapi@aramex.com",
                "Password" => 'R123456789$r',
                "Version" => "v2.0",
            ),
            'Transaction' => array(
                'Reference1' => '001'
            ),
            'Code' => $destinationCountry->iso_3166_2,
            'State' => NULL,
            'OriginAddress' => array(
                "City" => "Amman",
                "CountryCode" => "JO"
            ),
            'DestinationAddress' => array(
                "City" => $destinationCountry->capital,
                "CountryCode" => $destinationCountry->iso_3166_2
            ),
            'ShipmentDetails' => array(
                'PaymentType' => 'P',
                'ProductGroup' => 'EXP',
                'ProductType' => 'PPX',
                'ActualWeight' => array('Value' => $cartWeight, 'Unit' => 'KG'),
                'ChargeableWeight' => array('Value' => $cartWeight, 'Unit' => 'KG'),
                'NumberOfPieces' => 1
            )
        );
        $countriesSoapClient = new \SoapClient(env('ARAMEX_COUNTRY_URL'), array('trace' => 1));
        try {
            $country = $countriesSoapClient->FetchCountry($params);
            if (!is_null($country->Country->Name)) {
                $calcSoapClient = new \SoapClient(env('ARAMEX_CALC_URL'), array('trace' => 1));
                $results = $calcSoapClient->CalculateRate($params);
                return $results->TotalAmount->Value;
            }
        } catch (SoapFault $fault) {
            throw new \Exception("Shipping to {$destinationCountry->name} is not available");
        }
//        dd($results->Transaction->Reference1);
//        dd($results->TotalAmount->Value);
    }


//    private function calculateShippingCost($country, $weight)
//    {
//        $country = strtolower(str_replace(" ", "-", $country));
//        switch ($country) {
//            case 'kuwait':
//                return 0;
//                break;
//            case 'bahrain' :
//                return ($weight / 0.5 - 1) * 0.8 + 2.7;
//            case 'oman' :
//                return ($weight / 0.5 - 1) * 0.9 + 2.5;
//            case 'qatar' :
//                return ($weight / 0.5 - 1) * 0.9 + 2.6;
//            case 'saudi-arabia' :
//                return ($weight / 0.5 - 1) * 1 + 3;
//            case 'uae' :
//                return ($weight / 0.5 - 1) * 1 + 2.3;
//            default :
//                throw new \Exception("Shipping to {$country} is not available");
//        }
//
//    }
//
//    private function calculateDeliveryCost($shippingCost)
//    {
//        return $shippingCost + $shippingCost * 16 / 100;
//    }

}

