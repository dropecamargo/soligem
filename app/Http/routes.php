<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ServitecaController@index');

/*
|--------------------------------------------------------------------------
| API Application Routes
|--------------------------------------------------------------------------
| Prefix api
*/
Route::group(array('prefix' => 'api'), function()
{
	Route::resource('serviteca', 'ApiServitecaController', ['only' => ['index']]);
});

Route::group(array('prefix' => 'serviteca'), function()
{
	Route::post('file', array('as' => 'serviteca.file', 'uses' => 'ServitecaController@file'));
});
Route::resource('serviteca', 'ServitecaController');
