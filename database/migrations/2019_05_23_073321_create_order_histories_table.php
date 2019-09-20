<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            //$table->date('date');     //create_at
            $table->boolean('gift')->default(0);      //non serve?
            $table->decimal('total_price', 6, 2);    //si po calcolare (come fatto in Offer)
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('billing_address_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('billing_address_id')->references('id')->on('billing_addresses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_histories');
    }
}
