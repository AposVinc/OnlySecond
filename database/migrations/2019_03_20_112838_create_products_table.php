<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('cod',6)->unique();
            $table->unsignedBigInteger('collection_id');
            $table->decimal('price', 6, 2);
            $table->integer('stock_availability');//disponibilita magazzino
            $table->enum('genre',['M','F','U']);
            $table->longtext('long_desc')->nullable(); //forse non serve se c'è la tab specification?
            $table->unsignedBigInteger('supplier_id');
            $table->string('color');    //da mettere nelle specifiche o si lascia?
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
