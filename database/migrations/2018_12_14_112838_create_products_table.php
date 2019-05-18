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
            //$table->string('cod',6);
            $table->string('name',20);
            $table->integer('collection_id');
            //$table->decimal('price', 4, 2);
            //$table->integer('quantity');
            //$table->enum('genere',['M','F','U']);
            //$table->longtext('long_desc')->nullable();
            //$table->integer('category_id');
            //$table->string('color',6);
            //$table->integer('image_id');
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
