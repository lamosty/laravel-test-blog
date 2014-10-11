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

Route::model('post', 'Post');

Route::get('/', array(
    'as' => 'home',
    'uses' => 'BlogController@getIndex'
));

Route::get('/posts/{post_slug}', array(
    'as' => 'post',
    'uses' => 'BlogController@getPost'
));

Route::get('/archive', array(
    'as' => 'archive',
    'uses' => 'BlogController@getArchive'
));

Route::get('/user/create', array(
    'as' => 'user.create',
    'uses' => 'UserController@getCreate'
));

Route::post('/user', array(
    'as' => 'user.post_create',
    'uses' => 'UserController@postIndex'
));

Route::get('/user/login', array(
    'as' => 'user.login',
    'uses' => 'UserController@getLogin'
));


