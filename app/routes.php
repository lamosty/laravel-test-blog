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
    'as' => 'blog.home',
    'uses' => 'BlogController@getIndex'
));

Route::get('/posts/{post_slug}', array(
    'as' => 'blog.post',
    'uses' => 'BlogController@getPost'
));

Route::get('/post/create', array(
    'as' => 'blog.new_post',
    'uses' => 'BlogController@getNewPost'
));

Route::post('/post', array(
    'as' => 'blog.post_new_post',
    'uses' => 'BlogController@postNewPost'
));

Route::get('/archive', array(
    'as' => 'blog.archive',
    'uses' => 'BlogController@getArchive'
));

Route::get('/user/create', array(
    'as' => 'user.create',
    'uses' => 'UserController@getCreate'
));

Route::get('/user/login', array(
    'as' => 'user.login',
    'uses' => 'UserController@getLogin'
));

Route::get('/user/logout', array(
    'as' => 'user.logout',
    'uses' => 'UserController@getLogout'
));

Route::post('/user', array(
    'as' => 'user.post_create',
    'uses' => 'UserController@postIndex'
));

Route::post('/user/login', array(
    'as' => 'user.post_login',
    'uses' => 'UserController@postLogin'
));


