<?php

use Illuminate\Database\Seeder;

class BranchProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('BranchProductTableSeeder',50)->create();
    }
}
