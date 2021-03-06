<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('path_image');
            $table->unsignedBigInteger('collection_id');
            $table->enum('type',['Main', 'Sub', 'Mini']);
            $table->integer('counter'); //numero progressivo per creare path_image
            $table->boolean('visible'); //indica se il banner viene visualizzato o meno nella home page
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banners');
    }
}
