<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            // pending = submitted // failed // success but not delivered // compleated = success + delievered
            $table->enum('status',['pending','failed','success','completed']);
            $table->integer('coupon_id')->unsigned()->default(0);
            $table->integer('country_id')->unsigned()->index();
            $table->float('coupon_value')->unsigned();
            $table->decimal('shipping_cost',6,2)->unsigned();
            $table->decimal('amount',6,2)->unsigned();
            $table->decimal('sale_amount',6,2)->unsigned(); //
            $table->decimal('net_amount',6,2)->unsigned(); // used if coupon code exists
            $table->string('email');
            $table->string('address');
            $table->enum('payment_method',['cash','my_fatoorah']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::drop('orders');
    }
}
