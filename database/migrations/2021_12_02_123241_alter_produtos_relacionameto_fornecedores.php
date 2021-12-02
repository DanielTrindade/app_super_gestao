<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionametoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //criando a coluna em produtos que vai receber a fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) {

            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão',
                'site' => 'padraofornecedor.com.br',
                'uf' => 'AM',
                'email' => 'contato@fornecedorpadrao.com.br'
            ]);



            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('produtos', function() {
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
        
    }
}
