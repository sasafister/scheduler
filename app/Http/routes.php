<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/{id}/', ['as' => 'admin', 'uses' => 'CustomersController@index']);
Route::post('/{id}/', ['as' => 'admin', 'uses' => 'CustomersController@store']);
//Route::post('/{id}', ['as' => 'admin', function () {
//    return "success";
//}]);

//Route::get('/{id}/titles',['as' => 'customerRoute', 'uses' => 'CustomersController@index']);

Route::group(['prefix' => '{id}'], function() {

    Route::resource('titles', "TitlesController");

});


// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('/{id}/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');