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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/signup', [
    'uses' => 'AuthUserController@postSignUp',
    'as'   => 'signup'
]);

Route::post('/signin', [
    'uses' => 'AuthUserController@postSignIn',
    'as'   => 'signin'
]);

Route::get('/logout', [
    'uses' => 'AuthUserController@getLogout',
    'as'   => 'logout'
]);
