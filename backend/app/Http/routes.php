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

Route::get('/api', function () {
    $user = new App\User;
    return $user->signup();
});

Route::group(['prefix' => 'user'], function () {
    Route::get('signup',"UserController@signup");
    Route::get('login',"UserController@login");
    Route::get('logout',"UserController@logout");
    Route::get('test',"BaseController@isLogin");
});

Route::group(['prefix' => 'activity'], function () {
    Route::get('add',"ActivityController@add");

});