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

Route::group(['prefix' => 'admin'], function() {

	//produtos
	Route::get('produtos', ['as' => 'product.index', 'uses' => 'ProductsController@index']);

	Route::get('produtos/{id}', ['as' => 'product.get', 'uses' => 'ProductsController@get']);

	Route::post('produtos', ['as' => 'product.create', 'uses' => 'ProductsController@create']);

	Route::put('produtos/{id}', ['as' => 'product.update', 'uses' => 'ProductsController@update']);

	Route::delete('produtos/{id}', ['as' => 'product.delete', 'uses' => 'ProductsController@delete']);

	//embalagens
	Route::get('embalagens', ['as' => 'packaging.index', 'uses' => 'PackagingsController@index']);

	Route::get('embalagens/{id}', ['as' => 'packaging.get', 'uses' => 'PackagingsController@get']);

	Route::post('embalagens', ['as' => 'packaging.create', 'uses' => 'PackagingsController@create']);

	Route::put('embalagens/{id}', ['as' => 'packaging.update', 'uses' => 'PackagingsController@update']);

	Route::delete('embalagens/{id}', ['as' => 'packaging.delete', 'uses' => 'PackagingsController@delete']);

	//frete
	Route::get('fretes', ['as' => 'freight.index', 'uses' => 'FreightsController@index']);

	Route::get('fretes/{id}', ['as' => 'freight.get', 'uses' => 'FreightsController@get']);

	Route::post('fretes', ['as' => 'freight.create', 'uses' => 'FreightsController@create']);

	Route::put('fretes/{id}', ['as' => 'freight.update', 'uses' => 'FreightsController@update']);

	Route::delete('fretes/{id}', ['as' => 'freight.delete', 'uses' => 'FreightsController@delete']);

});
