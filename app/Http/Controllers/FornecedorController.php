<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => ['nome' => 'fornecedor 1', 
            'status' => 'N',
            'cnpj' => '38.554.130/0001-49',
            'ddd' => '11',
            'telefone' => '00000-0000'], 
            1 => ['nome' => 'fornecedor 2', 
            'status' => 'S',
            'cnpj' => '40.176.110/0001-23',
            'ddd' => '32',
            'telefone' => '91546-3597'],
            2 => ['nome' => 'fornecedor 3', 
            'status' => 'N',
            'cnpj' => '41.716.011/0001-32',
            'ddd' => '92',
            'telefone' => '98426-9710']
        ];
        echo isset($fornecedores[1]['cnpj']) ? 'CNPJ informado': 'CNPJ não informado';

        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
