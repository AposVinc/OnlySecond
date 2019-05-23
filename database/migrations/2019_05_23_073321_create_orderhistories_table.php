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
            $table->bigIncrements('id');
            $table->date('date');
            $table->boolean('gift');
            $table->float('totalprice');
            $table->integer('user_id');
            $table->integer('payment_id');
            $table->integer('courier_id');
            $table->integer('address_id');
            $table->integer('billingaddress_id');
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
