<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/    Auth::routes();
    Route::resource('forms', 'FormsController');
    Route::post('forms/sub', 'FormsController@sub');
    Route::resource('leads', 'LeadsController');
    Route::resource('lancamentos', 'LancamentosController');
    Route::resource('recarga', 'RecargaController');
    Route::resource('resgate', 'ResgateController');
	Route::resource('cards', 'CartoesController');
	Route::resource('products', 'ProductsController');
    Route::resource('users', 'UserController');//Rotas para usuarios
    Route::resource('roles', 'RoleController');//Rotas para roles
    Route::resource('posts', 'PostController');//Rotas para posts
    Route::get('tenant/add', 'CreateUserForTenantController@index')->name('create');//Rotas para criação de usuário /Get
    Route::post('tenant/add', 'CreateUserForTenantController@create')->name('user.add');//Rota para criação de usuário /Post


Route::get('test', 'TesteController@index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact dev@kings7.com.br'], 404);
});
