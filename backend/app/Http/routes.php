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

Route::get('test',"BaseController@isLogin");

Route::group(['prefix' => 'api/user'], function () {
    Route::get('signup',"UserController@signup");
    Route::get('login',"UserController@login");
    Route::get('logout',"UserController@logout");
});

Route::group(['prefix' => 'api/activity'], function () {
    Route::get('add',"ActivityController@add");
    Route::get('update',"ActivityController@update");
    Route::get('read',"ActivityController@read");
    Route::get('remove',"ActivityController@remove");
});