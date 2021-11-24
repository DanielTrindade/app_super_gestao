<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PrincipalController@principal')
        ->name('site.index');
        
Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato','ContatoController@contato')
        ->name('site.contato');

Route::post('/contato','ContatoController@salvar')->name('site.contato');
Route::get('/login/{error?}','LoginController@index')->name('site.login');
//para aceitar a requisição em post
Route::post('/login','LoginController@autenticar')->name('site.login');

//rotas agrupadas em app
Route::middleware('autenticacao')->prefix('/app')->group(function() {
    Route::get('/home','HomeController@index')->name('app.home');
    Route::get('/sair','LoginController@sair')->name('app.sair');
    Route::get('/cliente','ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor','FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar','FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar','FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{mensagem?}','FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/produto','ProdutoController@index')->name('app.produto');
});

//enviando parametros nas rotas
/* Route::get('/contato/{nome}/{categoria_id}',
    function( string $nome = 'Desconhecido',
              int $categoria_id = 1 // 1-informação
    ) {
        echo "Estamos aqui $nome - $categoria_id";
}
)->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
 */

//REDIRECIONAMENTO DE ROTAS EXEMPLOS
/* Route::get('/rota1',function() {
    return 'rota 1';
})->name('site.rota1');

Route::get('/rota2',function() {
    return redirect()->route('site.rota1');
})->name('site.rota2'); */


//Rota de fallback
Route::fallback(function() {
    return 'Página acessada não existe <a href="'.route('site.index').'">clique aqui</a> para retornar a página inicial';
});

//passando dados para um controller
//Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');





/*verbos HTTP

post
get
delete
put
patch
options
php 
*/




