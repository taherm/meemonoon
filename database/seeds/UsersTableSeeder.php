<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() === 'production') {

            factory('App\Src\User\User', 1)->create(['email' => 'admin@test.com', 'username' => 'admin']);

        } else {

            factory('App\Src\User\User', 1)->create(['email' => 'admin@test.com', 'username' => 'admin']);
            factory('App\Src\User\User', 4)->create();

        }
    }
}
