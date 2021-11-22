<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$metodo_autenticacao)
    {   //return $next($request);
        //verificando se um usuario possui acesso a rota;
        echo $metodo_autenticacao. '<br>';
        if($metodo_autenticacao == 'padrao') {
            echo 'Verificar usuario e senha no DB'.'<br>';
        } else if($metodo_autenticacao == 'ldap') {
            echo 'Verificar usuario e senha no AD'.'<br>';
        } else {
            echo 'nenhum metodo de autenticacao foi reconhecido!'.'<br>';
        }
        if(true) {
            return $next($request);
        } else {
            return Response('Autenticação necessária, acesso negado!!');
        }
    }
}
