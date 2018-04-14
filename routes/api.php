<?php

use App\Src\Country\Country;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::group(['namespace' => 'Frontend'], function () {
    Route::post("products/price", 'CategoryController@filterProductsByRange');
    Route::get('product/{productId}/{sizeId}', 'ProductController@getDataFromSize');
    Route::post('coupon/{code}', 'CouponController@getCoupon');
//        ->middleware('auth:api');
});

Route::get('countries', function () {
    return Country::all();
});

Route::get('country/{country_code}', function ($countryCode) {
    $destinationCountry = Country::where('country_code', $countryCode)->first();
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
    $area = [
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

        'Transaction' => ['Reference1' => '001'],
        'CountryCode' => $destinationCountry->iso_3166_2,
    ];
    try {
        $countriesSoapClient = new \SoapClient(env('ARAMEX_COUNTRY_URL'), array('trace' => 1));
        $country = $countriesSoapClient->FetchCountry($country);
        if (!is_null($country->Country) && !is_null($country->Country->Name)) {
            $aresSoapClient = new \SoapClient(env('ARAMEX_COUNTRY_URL'), array('trace' => 1));
            $areas = $aresSoapClient->FetchCities($area);
            return response()->json($areas->Cities, 200);
        } else {
            throw new \Exception("Error with Aramex .. please try again later.");
        }
    } catch (SoapFault $fault) {
        throw new \Exception("Shipping to {$destinationCountry->name} is not available");
    }
});