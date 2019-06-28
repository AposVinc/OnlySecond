<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderhistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderhistories', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->date('date');
            $table->boolean('gift');
            $table->float('totalprice');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('courier_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('billingaddress_id');
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
        Schema::dropIfExists('orderhistories');
    }
}
