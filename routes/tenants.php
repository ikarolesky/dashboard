<?php

use Illuminate\Support\Facades\Route;



//Rotas criadas para aplicação
Route::middleware(['tenancy.enforce','web'])
->namespace('App\Http\Controllers')->group(function(){ //Isso libera as rotas à funcionarem com os controllers
    Route::get('/home', 'HomeController@index')->name('home');//Rota /home
    Route::get('/', function () {
    return view('welcome'); //Rota pagina inicial
});
    Route::put('users.status/{user}' , 'UserController@status')->name('users.status');
    Route::put('users.status2/{user}' , 'UserController@status2')->name('users.status2');
    Auth::routes(['register' => false]);//Rotas de login e logout sem /register
    Route::resource('users', 'UserController');//Rotas para usuarios
    Route::resource('posts', 'PostController');//Rotas para posts
    Route::get('tenant/add', 'CreateUserForTenantController@index')->name('create');//Rotas para criação de usuário /Get
    Route::post('tenant/add', 'CreateUserForTenantController@create')->name('user.add');//Rota para criação de usuário /Post

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