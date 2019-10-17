<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specifications', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('product_id');
            $table->string('case_size')->nullable();//dimensione cassa
            $table->string('material');
            $table->string('case_thickness');//spessore cassa
            $table->string('glass')->nullable();//Vetro minerale
            $table->unsignedBigInteger('dial_color');//colore quadrante
            $table->string('strap_material');//materiale cinturino
            $table->unsignedBigInteger('strap_color')->nullable();
            $table->string('closing');
            $table->string('movement');
            $table->string('warranty');//garanzia
            $table->boolean('battery_replacement')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('dial_color')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('strap_color')->references('id')->on('colors')->onDelete('cascade')->onUpdate('cascade');
        });
            //https://www.bluespirit.com/orologio-maserati-traguardo-r8871612003-P21308.html
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specifications');
    }
}
