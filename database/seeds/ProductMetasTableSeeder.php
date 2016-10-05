<?php

use Illuminate\Database\Seeder;

class ProductMetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Product\ProductMeta',100)->create();
    }
}
