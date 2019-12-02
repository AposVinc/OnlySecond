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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('credit_card_id')->nullable();
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('mailing_address_id');
            $table->unsignedBigInteger('billing_address_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('credit_card_id')->references('id')->on('credit_cards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('courier_id')->references('id')->on('couriers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mailing_address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('billing_address_id')->references('id')->on('addresses')->onDelete('cascade')->onUpdate('cascade');
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
