<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovaColunaDeletAt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //incluindo a tabela de soft delete
        schema::table('fornecedores', function(Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //removendo a coluna de soft delete
        schema::table('fornecedores', function(Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
