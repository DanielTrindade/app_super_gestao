<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criando a tabela de filiais
        schema::create('filiais', function(Blueprint $table) {
            $table->id();
            $table->string('nome',30);
        });

        //criando a tabela de produto_filiais
        schema::create('produto_filiais', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');

            //foreign constraints
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');

        });
        //retirando as colunas da tabela produtos
        schema::table('produtos', function(Blueprint $table) {
            $table->dropColumn(['preco_venda','estoque_minimo','estoque_maximo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //fazendo o inverso do up
        //adicionando as colunas de volta em produto
        schema::table('produtos', function(Blueprint $table) {
            $table->float('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        //deletando a tabela filial
        schema::dropIfExists('produto_filiais');
        schema::dropIfExists('filiais');

    }
}
