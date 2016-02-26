<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get( '/',  [ 'uses' => 'MainController@index' ] );


Route::get('/tree', function() { return view('tree');});

Route::get('auth/logout', [ 'uses' => 'Auth\AuthController@logout' ]);
Route::get('auth/settings', [ 'uses' => 'Auth\AuthController@settings' ]);
Route::get('auth/tree', [ 'uses' => 'Auth\AuthController@tree' ]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
