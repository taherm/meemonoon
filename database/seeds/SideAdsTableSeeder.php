<?php

use Illuminate\Database\Seeder;

class SideAdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Ad\Ad',10)->create();
    }
}
