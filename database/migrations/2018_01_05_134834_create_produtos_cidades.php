<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosCidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_cidade', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

             $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');

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
        Schema::dropIfExists('produto_cidade');
    }
}
