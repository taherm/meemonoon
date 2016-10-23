<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('iso_3166_3');
            $table->integer('country_id')->unsigned()->nullable(false);
            $table->string('symbol_left', 12);
            $table->string('symbol_right', 12);
            $table->string('code', 3);
            $table->integer('decimal_place');
            $table->double('value', 15, 8);
            $table->string('decimal_point', 3);
            $table->string('thousand_point', 3);
            $table->integer('status');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->softDeletes();
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
        Schema::drop('coins');
    }
}
