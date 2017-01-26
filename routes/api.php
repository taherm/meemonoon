<?php

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
    Route::post('coupon/{code}', 'CouponController@getCoupon')->middleware('auth:api');
});