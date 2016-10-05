<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactus', function(Blueprint $table) {
            $table->increments('id');
            $table->string('company_ar');
            $table->string('company_en');
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('mobile');
            $table->string('phone');
            $table->string('country_ar');
            $table->string('country_en');
            $table->integer('zipcode');
            $table->string('email');
            $table->string('youtube');
            $table->string('instagram');
            $table->string('twitter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contactus');
    }
}
