<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('currency:manage', [
            'action' => 'add',
            'currency' => 'kwd,aed,sar,qat,bhd',
        ]);
        Artisan::call('currency:update');//
    }
}
