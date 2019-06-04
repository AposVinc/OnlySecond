<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('rate');//percentuale
            $table->string('codice_sconto')->nullable(); //non so se aggiungerlo
            $table->timestamps();

            $table->softDeletes();
database/migrations/2019_05_18_171323_create_offers_table.php


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
