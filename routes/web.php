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

Route::get('/','PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos','SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato','ContatoController@contato')->name('site.contato');
Route::post('/contato','ContatoController@contato')->name('site.contato');
Route::get('/login',function(){
    return 'login';
})->name('site.login');

//rotas agrupadas em app
Route::prefix('/app')->group(function() {
    Route::get('/clientes',function() {
        return 'clientes';
    })->name('app.clientes');
    Route::get('/fornecedores','FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos',function() {
        return 'produtos';
    })->name('app.produtos');
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




