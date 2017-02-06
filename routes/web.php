<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');   
});

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin'], function() {


	//produtos
	Route::resource('produtos', 'ProductsController');

	//embalagens
	Route::resource('embalagens', 'PackagingsController');

	//frete
	Route::resource('frete', 'FreightsController');	

	//fornecedores de embalagens
	Route::resource('fornecedor', 'CatererController');

});

