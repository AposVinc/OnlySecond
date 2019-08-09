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
            $table->string('address'); //via
            $table->string('civic_number'); //numerocivico
            $table->string('city'); //citta
            $table->string('region');   //provincia
            $table->string('zip');  //cap
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
        Schema::dropIfExists('billingaddresses');
    }
}
