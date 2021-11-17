<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a tabela de unidades
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade',3); //cm mm dm kg mg
            $table->string('descricao',50);// o nome da unidade
            $table->timestamps();
        });

        //adicionar o relacionamento com a tabela produtos
        schema::table('produtos', function(Blueprint $tabela) {
            $tabela->unsignedBigInteger('unidade_id');
            $tabela->foreign('unidade_id')->references('id')->on('unidades');
        });

        //adicionar o relacionamento com a tabela produtos_detalhes
        schema::table('produto_detalhes', function(Blueprint $tabela) {
            $tabela->unsignedBigInteger('unidade_id');
            $tabela->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //removendo a relação com a tabela de produtos
        schema::table('produtos', function(Blueprint $table) {
            //removendo a foreign key
            $table->dropForeign('produtos_unidade_id_foreign'); //[table]_[coluna]_[foreign]
            //removendo a coluna
            $table->dropColumn('unidade_id');
        });

        //removendo a relação com a tabela de produtos_detalhes
        schema::table('produto_detalhes', function(Blueprint $table) {
            //removendo a foreign key
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //[table]_[coluna]_[foreign]
            //removendo a coluna
            $table->dropColumn('unidade_id');
        });
    
        Schema::dropIfExists('unidades');
    }
}


// criar um migration pra ligar unidade com produtos e produtos_detalhes