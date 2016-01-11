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

Route::get('home', function() {
    return redirect()->route('admin', Auth::user()->id);
});

Route::get('/{id}/', ['as' => 'admin', 'uses' => 'CustomersController@index']);
Route::post('/{id}/', ['as' => 'admin', 'uses' => 'CustomersController@store']);
Route::get('{id}/create', 'CustomersController@create');

Route::group(['prefix' => '{id}'], function() {

    Route::resource('titles', "TitlesController");
    Route::post('titles/upvote/{voteId}', "TitlesController@upVote");
    Route::post('titles/downvote/{voteId}', "TitlesController@downVote");

});


// Authentication routes...
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', ['as' => 'post.login', 'uses' => 'Auth\AuthController@postLogin']);

Route::get('/{id}/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes....
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
