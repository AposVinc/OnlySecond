<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billingaddresses', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('via');
            $table->string('numerocivico');
            $table->string('citta');
            $table->string('provincia');
            $table->string('cap');
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
        Schema::dropIfExists('billingaddresses');
    }
}
