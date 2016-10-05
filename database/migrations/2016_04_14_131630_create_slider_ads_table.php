<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo');
            $table->string('image_path');
            $table->string('url');
            $table->string('caption_en');
            $table->string('caption_ar');
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
        Schema::drop('slider_ads');
    }
}
