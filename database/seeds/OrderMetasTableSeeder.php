<?php

use Illuminate\Database\Seeder;

class OrderMetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Src\Order\OrderMeta',50)->create();
    }
}
