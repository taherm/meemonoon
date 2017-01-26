<?php

use Illuminate\Database\Seeder;

class AboutusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\User\Aboutus')->create();
    }
}
