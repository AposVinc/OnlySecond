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
            $table->increments('id');
            $table->string('cod',6);
            $table->string('name',20);
            $table->integer('collection_id');
            $table->decimal('price', 4, 2);
            $table->integer('stock_availability');//disponibilita magazzino
            $table->enum('genere',['M','F','U']);
            $table->longtext('long_desc')->nullable(); //forse non serve se c'è la tab specification?
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->string('color',6);    //da mettere nelle specifiche o si lascia?
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
        Schema::dropIfExists('products');
    }
}
