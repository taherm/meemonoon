<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->boolean('active')->default(1);
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('mobile');
            $table->string('phone');
            $table->string('avatar');
            $table->string('password');
            $table->text('api_token');
            $table->integer('country_id')->unsigned()->nullable(false);
            $table->foreign('country_id')->references('id')->on('countries');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
