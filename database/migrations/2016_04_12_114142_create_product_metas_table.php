<?php

use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_metas', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
            $table->boolean('home_delivery_availability')->default(0);
            $table->boolean('shipment_availability')->default(0);
            $table->boolean('on_sale')->default(0);
            $table->boolean('on_sale_on_homepage')->unsigned()->default(0);
            $table->boolean('on_homepage')->unsigned()->default(0);
            $table->enum('type',['product','service'])->default('product');
            $table->integer('price')->unsigned();
            $table->float('weight',3,2)->unsigned();
            $table->integer('sale_price')->unsigned()->default(0);
            $table->integer('home_delivery_fees')->unsigned()->default(0);
            $table->string('image');
            $table->string('size_chart_image');
            $table->text('description_en');
            $table->text('description_ar');
            $table->text('notes_ar');
            $table->text('notes_en');

            // it means this is the parent reference ..
            // whenever you delete one row from here .. all other rows that relying on will be deleted

            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('start_sale')->default(Carbon::today());
            $table->timestamp('end_sale')->default(Carbon::today());
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
        Schema::drop('product_metas');
    }
}
