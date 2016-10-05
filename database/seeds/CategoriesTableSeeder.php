<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Category\Category',3)->create(['parent_id' => 0]);
        factory('App\Src\Category\Category',10)->create();
    }
}
