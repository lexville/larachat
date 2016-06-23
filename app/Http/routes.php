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

Route::get('/', [
    'uses' => 'HomeController@getHome',
    'as'   => 'home'
]);

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

// Creating post route
Route::post('/create-post', [
    'uses'       => 'PostController@postCreatePost',
    'as'         => 'post.create',
    'middleware' => 'auth'
]);

Route::get('/delete-post/{postId}', [
    'uses'       => 'PostController@getDeletePost',
    'as'         => 'post.delete',
    'middleware' => 'auth'
]);

Route::post('/edit-post', [
    'uses'       => 'PostController@postEditPost',
    'as'         => 'post.edit',
    'middleware' => 'auth'
]);
