<?php

use Illuminate\Support\Facades\Route;



//Rotas criadas para aplicação
Route::middleware(['tenancy.enforce','web'])
->namespace('App\Http\Controllers')->group(function(){ //Isso libera as rotas à funcionarem com os controllers
    Route::get('/home', 'HomeController@index')->name('home');//Rota /home
    Route::post('forms/sub', 'FormsController@sub');
    Route::get('/', function () {
    return view('welcome'); //Rota pagina inicial
});
    Auth::routes(['register' => false]);//Rotas de login e logout sem /register


});

Route::middleware(['tenancy.enforce','web', 'auth'])
->namespace('App\Http\Controllers')->group(function(){ //Isso libera as rotas à funcionarem com os controllers
    Route::resource('forms', 'FormsController');

    Route::resource('leads', 'LeadsController');
    Route::resource('lancamentos', 'LancamentosController');
    Route::resource('cards', 'CartoesController');
    Route::resource('recarga', 'RecargaController');
    Route::resource('resgate', 'ResgateController');
    Route::get('/card/update', 'CardStatusController@updateStatus')->name('card.status');
    Route::get('/status/update', 'UserStatusController@updateStatus')->name('user.status');
    Route::get('/products/update', 'ProductsController@updateStatus')->name('products.status');
    Route::get('/products/delete', 'ProductsController@delete')->name('products.delete');
    Route::resource('products', 'ProductsController');
    Route::resource('users', 'UserController');//Rotas para usuarios
    Route::resource('posts', 'PostController');//Rotas para posts
    Route::get('user/add', 'CreateUserForTenantController@index')->name('create');//Rotas para criação de usuário /Get
    Route::post('user/add', 'CreateUserForTenantController@create')->name('user.add');//Rota para criação de usuário /Post


});

Route::middleware('web')
    ->namespace('App\Http\Controllers')
    ->group(function () {


//non-auth, non-api web routes for tenants



    });



Route::middleware(['web', 'auth'])
    ->namespace('App\Http\Controllers')
    ->as('tenant.account.')
    ->prefix('account')
    ->group(function () {


        // access route names as tenant.account.profile.* e.g. tenant.account.profile.edit
        // access route path as account/profile/* e.g. account/profile/edit
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', 'ProfileController@edit')->name('profile.edit'); // show profile edit form
            Route::patch('/', 'ProfileController@update')->name('profile.update');
 // edit profile

        });


    });