<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        
        return view('app.fornecedor.index');
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request) {

        /* $regras = [
            'nome' => 'required|max:100',
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'email'
        ];

        $feedback = [
            'nome.max' => 'O campo nome não pode ter mais de 100 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido',
            'email' => 'O campo e-mail não foi preenchido de forma correta',
            'uf.max' => 'O campo :attribute não pode ter mais de 2(dois) caracteres',
            'uf.min' => 'O campo :attribute não pode ter menos de 2(dois) caracteres'
        ];

        $request->validate($regras,$feedback); */
        if($request->input('_token') != '') {
            //validação das minha entradas
            $regras = [
                'nome' => 'required|max:100',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];
            $feedback = [
                'nome.max' => 'O campo nome não pode ter mais de 100 caracteres',
                'required' => 'O campo :attribute precisa ser preenchido',
                'email' => 'O campo e-mail não foi preenchido de forma correta',
                'uf.max' => 'O campo :attribute não pode ter mais de 2(dois) caracteres',
                'uf.min' => 'O campo :attribute não pode ter menos de 2(dois) caracteres'
            ];
            $request->validate($regras,$feedback);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            echo 'chegamos até aqui!';
        } else {
            echo 'não podemos cadastrar!';
        }
        return view('app.fornecedor.adicionar');
    }
}
