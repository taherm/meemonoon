<?php

use Illuminate\Database\Seeder;

class CompanyMetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Company\CompanyMeta',1)->create();
    }
}
