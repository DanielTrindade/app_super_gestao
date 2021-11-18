<?php

use Illuminate\Database\Seeder;
use \App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //inserindo um fornecedor usando uma instancia de objeto (se atentar para o fillable)
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Panificadora Pandora';
        $fornecedor->site = 'panpandora.com.br';
        $fornecedor->uf = 'AM';
        $fornecedor->email = 'contato@panpandora.com.br';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Materiais Sérgio',
            'site' => 'matSergio.com.br',
            'uf' => 'SP',
            'email' => 'contato@matSergio.com.br'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Construtora Beduíno',
            'site' => 'beduin.com.br',
            'uf' => 'IS',
            'email' => 'contato@beduin.com.br'
        ]);
    }
}
