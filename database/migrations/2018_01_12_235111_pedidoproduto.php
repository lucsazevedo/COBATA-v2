<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedidoproduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido_produtos', function (Blueprint $table) {
            $table->dropColumn('staus');
            $table->enum('status',['RE', 'PA','CA'])->nullable(); //Reservado, Pago, Cancelado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_produtos', function (Blueprint $table) {
            //
        });
    }
}
