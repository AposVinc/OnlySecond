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
            $table->string('case_size');//dimensione cassa
            $table->string('material');
            $table->string('case_thickness');//spessore cassa
            $table->string('glass');//Vetro minerale
            $table->string('dial_color');//colore quadrante
            $table->string('strap_material');//materiale cinturino
            $table->string('strap_color');
            $table->string('closing');
            $table->string('movement');
            $table->boolean('water_resistant');
            $table->string('warranty');//garanzia
            $table->boolean('battery_replacement');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
