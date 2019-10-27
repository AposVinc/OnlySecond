<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->boolean('about')->unique()->default(0);
            $table->string('ab_path_img_storia')->nullable();
            $table->longText('ab_desc_storia')->nullable();
            $table->string('ab_why_tit_1')->nullable();
            $table->longText('ab_why_txt_1')->nullable();
            $table->string('ab_why_tit_2')->nullable();
            $table->longText('ab_why_txt_2')->nullable();
            $table->string('ab_why_tit_3')->nullable();
            $table->longText('ab_why_txt_3')->nullable();
            $table->string('ab_why_tit_4')->nullable();
            $table->longText('ab_why_txt_4')->nullable();
            $table->string('ab_why_tit_5')->nullable();
            $table->longText('ab_why_txt_5')->nullable();
            $table->string('ab_why_tit_6')->nullable();
            $table->longText('ab_why_txt_6')->nullable();
            $table->string('ab_team_path_1')->nullable();
            $table->string('ab_team_name_1')->nullable();
            $table->longText('ab_team_desc_1')->nullable();
            $table->string('ab_team_path_2')->nullable();
            $table->string('ab_team_name_2')->nullable();
            $table->longText('ab_team_desc_2')->nullable();
            $table->string('ab_team_path_3')->nullable();
            $table->string('ab_team_name_3')->nullable();
            $table->longText('ab_team_desc_3')->nullable();

            $table->boolean('contactus')->unique()->default(0);
            $table->string('cus_tel_1')->nullable();
            $table->string('cus_tel_2')->nullable();
            $table->string('cus_email_contatti')->nullable();
            $table->string('cus_email_aiuto')->nullable();
            $table->string('cus_indirizzo')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
