<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setor_id')->unsigned();
            $table->foreign('setor_id')->references('id')->on('setors');
            $table->integer('marca_id')->unsigned();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->string('nome');
            $table->string('imagem');
            $table->decimal('preco',6,2);
            $table->string('medida');
            $table->integer('quantidade');
            $table->string('descricao');
            $table->bigInteger('visulizacoes')->default(0);
            $table->enum('publicar', ['sim', 'nao'])->default('nao');
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
        Schema::dropIfExists('produtos');
    }
    
}
