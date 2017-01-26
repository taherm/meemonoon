<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Countries\Countries;

class CoinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
//            [
//                'title' => Countries::where('iso_3166_3', '=', 'USA')->first()->currency,
//                'title_en' => Countries::where('iso_3166_3', '=', 'USA')->first()->currency,
//                'title_ar' => 'دولار أمريكي',
//                'name_ar' => Countries::where('iso_3166_3', '=', 'USA')->first()->name_ar,
//                'name_en' => Countries::where('iso_3166_3', '=', 'USA')->first()->name_en,
//                'iso_3166_3' => Countries::where('iso_3166_3', '=', 'USA')->first()->iso_3166_3,
//                'country_id' => Countries::where('iso_3166_3', '=', 'USA')->first()->id,
//                'symbol_left' => '$',
//                'symbol_right' => Countries::where('iso_3166_3', '=', 'USA')->first()->currency_code,
//                'code' => Countries::where('iso_3166_3', '=', 'USA')->first()->currency_code,
//                'decimal_place' => 2,
//                'value' => 1.00000000,
//                'decimal_point' => '.',
//                'thousand_point' => ',',
//                'status' => 1,
//                'created_at' => '2013-11-29 19:51:38',
//                'updated_at' => '2013-11-29 19:51:38',
//            ],
            [
                // KWT
                'title' => Countries::where('iso_3166_3', '=', 'KWT')->first()->currency,
                'title_en' => Countries::where('iso_3166_3', '=', 'KWT')->first()->currency,
                'title_ar' => 'دينار كويتي',
                'name_ar' => Countries::where('iso_3166_3', '=', 'KWT')->first()->name_ar,
                'name_en' => Countries::where('iso_3166_3', '=', 'KWT')->first()->name_en,
                'iso_3166_3' => Countries::where('iso_3166_3', '=', 'KWT')->first()->iso_3166_3,
                'country_id' => Countries::where('iso_3166_3', '=', 'KWT')->first()->id,
                'symbol_left' => 'د.ك',
                'symbol_right' => Countries::where('iso_3166_3', '=', 'KWT')->first()->currency_code,
                'code' => Countries::where('iso_3166_3', '=', 'KWT')->first()->currency_code,
                'decimal_place' => 3,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],
            [
                // KSA
                'title' => Countries::where('iso_3166_3', '=', 'SAU')->first()->currency,
                'title_en' => Countries::where('iso_3166_3', '=', 'SAU')->first()->currency,
                'title_ar' => 'ريال سعودي',
                'name_ar' => Countries::where('iso_3166_3', '=', 'SAU')->first()->name_ar,
                'name_en' => Countries::where('iso_3166_3', '=', 'SAU')->first()->name_en,
                'iso_3166_3' => Countries::where('iso_3166_3', '=', 'SAU')->first()->iso_3166_3,
                'country_id' => Countries::where('iso_3166_3', 'SAU')->first()->id,
                'symbol_left' => 'ر.س',
                'symbol_right' => Countries::where('iso_3166_3', '=', 'SAU')->first()->currency_code,
                'code' => Countries::where('iso_3166_3', '=', 'SAU')->first()->currency_code,
                'decimal_place' => 3,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],
            [
                // UAE
                'title' => Countries::where('iso_3166_3', '=', 'ARE')->first()->currency,
                'title_en' => Countries::where('iso_3166_3', '=', 'ARE')->first()->currency,
                'title_ar' => 'درهم إماراتي',
                'name_ar' => Countries::where('iso_3166_3', '=', 'ARE')->first()->name_ar,
                'name_en' => Countries::where('iso_3166_3', '=', 'ARE')->first()->name_en,
                'iso_3166_3' => Countries::where('iso_3166_3', '=', 'ARE')->first()->iso_3166_3,
                'country_id' => Countries::where('iso_3166_3', 'ARE')->first()->id,
                'symbol_left' => 'د.إ ',
                'symbol_right' => Countries::where('iso_3166_3', '=', 'ARE')->first()->currency_code,
                'code' => Countries::where('iso_3166_3', '=', 'ARE')->first()->currency_code,
                'decimal_place' => 3,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],
            [
                // َQatar
                'title' => Countries::where('iso_3166_3', '=', 'QAT')->first()->currency,
                'title_en' => Countries::where('iso_3166_3', '=', 'QAT')->first()->currency,
                'title_ar' => 'ريال قطري',
                'name_ar' => Countries::where('iso_3166_3', '=', 'QAT')->first()->name_ar,
                'name_en' => Countries::where('iso_3166_3', '=', 'QAT')->first()->name_en,
                'iso_3166_3' => Countries::where('iso_3166_3', '=', 'QAT')->first()->iso_3166_3,
                'country_id' => Countries::where('iso_3166_3', 'QAT')->first()->id,
                'symbol_left' => ' ر.ق ',
                'symbol_right' => Countries::where('iso_3166_3', '=', 'QAT')->first()->currency_code,
                'code' => Countries::where('iso_3166_3', '=', 'QAT')->first()->currency_code,
                'decimal_place' => 3,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],
            [
                // Bahrin
                'title' => Countries::where('iso_3166_3', '=', 'BHR')->first()->currency,
                'title_en' => Countries::where('iso_3166_3', '=', 'BHR')->first()->currency,
                'title_ar' => 'دينار',
                'name_ar' => Countries::where('iso_3166_3', '=', 'BHR')->first()->name_ar,
                'name_en' => Countries::where('iso_3166_3', '=', 'BHR')->first()->name_en,
                'iso_3166_3' => Countries::where('iso_3166_3', '=', 'BHR')->first()->iso_3166_3,
                'country_id' => Countries::where('iso_3166_3', 'BHR')->first()->id,
                'symbol_left' => ' د.ب ',
                'symbol_right' => Countries::where('iso_3166_3', '=', 'BHR')->first()->currency_code,
                'code' => Countries::where('iso_3166_3', '=', 'BHR')->first()->currency_code,
                'decimal_place' => 3,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38',
            ],
            [
                // OMAN
                'title' => Countries::where('iso_3166_3', '=', 'OMN')->first()->currency,
                'title_en' => Countries::where('iso_3166_3', '=', 'OMN')->first()->currency,
                'title_ar' => 'ريال عماني',
                'name_ar' => Countries::where('iso_3166_3', '=', 'OMN')->first()->name_ar,
                'name_en' => Countries::where('iso_3166_3', '=', 'OMN')->first()->name_en,
                'iso_3166_3' => Countries::where('iso_3166_3', '=', 'OMN')->first()->iso_3166_3,
                'country_id' => Countries::where('iso_3166_3', 'OMN')->first()->id,
                'symbol_left' => ' ر.ع ',
                'symbol_right' => Countries::where('iso_3166_3', '=', 'OMN')->first()->currency_code,
                'code' => Countries::where('iso_3166_3', '=', 'OMN')->first()->currency_code,
                'decimal_place' => 3,
                'value' => 1.00000000,
                'decimal_point' => '.',
                'thousand_point' => ',',
                'status' => 1,
                'created_at' => '2013-11-29 19:51:38',
                'updated_at' => '2013-11-29 19:51:38'
            ]
        ];

        DB::table('coins')->insert($currencies);
    }
}
