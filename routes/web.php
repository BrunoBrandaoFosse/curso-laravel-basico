<?php
use App\Http\Controllers\Controller;

/**
 * Como eu coloquei os arquivos de controller dentro de uma nova pasta chamada Site, 
 * eu devo passar esse namespace para dentro da minha rota.
 * 
 * Route::get('rota', 'nome_controle@nome_metodo'.
 * Route::get('rota', 'pasta\nome_controle@nome_metodo'. caso arquivo controller mude de pasta.
 */

Route::group(['namespace' => 'Site'], function () {
	Route::get('/login', 'SiteController@login')->middleware('auth');//Outra forma de autenticar.
	Route::get('/', 'SiteController@index');
	Route::get('/contato', 'SiteController@contato');
	Route::get('/categoria/{id}', 'SiteController@categoria'); # Parâmetro
	Route::get('/categoria-opcional/{id?}', 'SiteController@categoriaOpcional'); # Id Opcional
});


Route::get('/painel/produtos/testes', 'Painel\ProdutoController@testes');

/**
 * Utilizando quando eu crio um Controller do tipo Resource.
 * comando, ex: php artisan make:controller Painel\ProdutoController --resource
 */

Route::resource('/painel/produtos', 'Painel\ProdutoController');


# ------------------------------------------------------------------------------------------------


// # Grupo de Rotas
// # ['prefix' => 'prefixo da rota'], 'prefix' é padrão.
// # Ex.1: localhost:8000/painel/entrar
// # Ex.2: localhost:8000/painel/sair
// # 'middleware' é um filtro.
// # ['middleware' => 'auth'], significa que somente pessoas autenticadas podem acessar estas rotas.
// # Route::group(['prefix' => '/painel'], function () {
// # Middleware não é de uso obrigatório, apenas quando quero a autenticação do usuário.

// Route::group(['prefix' => '/painel', 'middleware' => 'auth'], function () {
// 	Route::get('/clientes', function(){
// 		return 'Controle de Clientes';
// 	});
// 	Route::get('/gestao', function(){
// 		return 'Sistema de Gestão';
// 	});
// 	Route::get('/', function() {# Página inicial do painel
// 		return 'Painel de Controle';
// 	});
// });


// # Grupo de rotas sem necessidade de autenticação.

// Route::group(['prefix' => 'categoria'], function () {
// 	Route::get('/livro', function() {
// 		return 'Categoria <strong>Livro</strong>';
// 	});
// 	Route::get('/tecnologia', function() {
// 		return 'Categoria <strong>Tecnologia</strong>';
// 	});
// 	Route::get('/', function() {
// 		return 'Categorias: Livros | Tecnologia';
// 	});
// });

// //-----------------------------------------------------------------


// # '?' torna o parâmetro opcional.
// # Defini como default, 'null', mas pode ser qualquer valor.

// Route::get('/categoria2/{idCat?}/', function($idCat=null){
// 	return "Post da Categoria {$idCat}";
// });


// # Rota com Parâmetros

// Route::get('/categoria1/{idCat}/', function($idCat) {
// 	return "Post da Categoria {$idCat}";
// });


// #Rota nomeada

// Route::get('/dashboard/login', function() {
//     return 'Rota Grande';
// })->name('entrar');


// Route::get('/acessar', function() {
//     return redirect()->route('entrar');
// });


// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/empresa', function() {
//     return view('empresa');//pega o template dentro de 'resources/views/'
// });


// Route::get('/contato', function() {
//     return 'Página de Contato';
// });


// #Rota do tipo 'Match' ele identifica diversos tipos de rota.

// Route::match(['get', 'post'], '/match', function() {
//     return 'Route Match';
// });


// #Rota do tipo 'any', recebe qualquer tipo de rota (post,get,etc).

// Route::any('/any', function() {
//     return 'Rota Any';
// });


