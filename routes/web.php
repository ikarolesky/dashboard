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
*/ Route::resource('users', 'UserController');//Rotas para usuarios
    Route::resource('roles', 'RoleController');//Rotas para roles
    Route::resource('posts', 'PostController');//Rotas para posts
    Route::get('tenant/add', 'CreateUserForTenantController@index')->name('create');//Rotas para criação de usuário /Get
    Route::post('tenant/add', 'CreateUserForTenantController@create')->name('user.add');//Rota para criação de usuário /Post

    Auth::routes();
Route::get('test', 'TesteController@index');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

