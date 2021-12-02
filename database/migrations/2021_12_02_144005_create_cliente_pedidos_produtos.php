<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientePedidosProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando as tabelas de cliente, pedidos e pedidos_produtos
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',50);
            $table->timestamps();
        }); 

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
        }); 

        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('produto_id');  
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('produto_id')->references('id')->on('produtos');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedidos_produtos');
        schema::enableForeignKeyConstraints();
    }
}