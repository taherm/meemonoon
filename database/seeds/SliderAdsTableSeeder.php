<?php

use Illuminate\Database\Seeder;

class SliderAdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Ad\SliderAd',3)->create();
    }
}
