<?php

namespace App\Http\Controllers;;

use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller
{
    public function index() {
        return view('site.login',['titulo' => 'login']);
    }

    public function autenticar(Request $request) {
        
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [ 
            'usuario.email' => 'O campo usuário(e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);
        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email',$email)->where('password',$password)->get();
        if(isset($usuario->name)) {
            echo '<pre>';
            echo $usuario;
            echo '</pre>';
        } else {
            
        }
        
        
    }
}
