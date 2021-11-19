<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\SiteContato;
use \App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();
        return view('site.contato',['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizando a validação das informação passadas para a minha tabela
        //regras
        $regras = [
            'nome' => 'required|min:3|max:20',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1000'
        ];
        //mensgens
        $mensagens = [
            'nome.min' => 'O campo nome precisa ter pelo menos 3 caracteres',
            'nome.max' => 'O campo nome não pode ultrapassar a quantidade de 20 caracteres',
            'email.email' => 'O campo email precisa ser do tipo: exemplo@exemplo.com',
            'mensagem.max' => 'A mensagem não pode ultrapassar a quantidade de 1000 caracteres',
            'required' => 'O campo :attribute precisa ser preenchido'
        ];
        $request->validate($regras,$mensagens);

        //salvando informação no banco
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
