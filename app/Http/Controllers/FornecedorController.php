<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Fornecedor;

class FornecedorController extends Controller
{
    //exibe a minha pagina principal
    public function index() {
        
        return view('app.fornecedor.index');
    }

    //mostra a lista de fornecedores cadastrados no meu banco
    public function listar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(25);
        return view('app.fornecedor.listar',['fornecedores' => $fornecedores , 'request' => $request->all()]);
    }

    //adicionar um fornecedor na minha lista
    public function adicionar(Request $request) {
        $mensagem = '';
        $atualizou = 0;
        $id = $request->input('id');
        //realizando a inserção de dados
        if($request->input('_token') != '' && $id == '') {
            
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
            $mensagem = 'Cadastro realizado com sucesso!';

        } 
        //realizando a atualização dos dados
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $mensagem = 'Atualização realizado com sucesso!!';
            } else {
                $mensagem = 'Erro ao tentar atualizar o registro!!';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'mensagem' => $mensagem]);
        }

        //pode ter um redirect
        //passar dados para a view
        return view('app.fornecedor.adicionar',['mensagem' => $mensagem,'atualizou' => $atualizou]);
    }

    //função para editar os dados de um fornecedor
    public function editar($id,$mensagem = '') {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar',['fornecedor' => $fornecedor,'mensagem' => $mensagem]);
    }

    //funcção para excluir um fornecedor
    public function excluir($id) {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor.listar');
    }

}
