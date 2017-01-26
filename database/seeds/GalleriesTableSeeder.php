<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Gallery\Gallery',100)->create();
        factory('App\Src\Gallery\Image',200)->create();
    }
}
