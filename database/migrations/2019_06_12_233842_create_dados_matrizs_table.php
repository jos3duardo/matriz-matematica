<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosMatrizsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_matrizs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dados');
            $table->unsignedBigInteger('matrizs_id');
            $table->foreign('matrizs_id')->references('id')->on('matrizs');
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
        Schema::dropIfExists('dados_matrizs');
    }
}
