<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login')->name('login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', 'Api\AuthController@logout');
        Route::get('user', 'Api\AuthController@user');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\UserController@index');
        Route::post('store', 'Api\UserController@store');
        Route::put('update', 'Api\UserController@update');
        Route::put('update/{user_id}', 'Api\UserController@updateById');
        Route::get('showbyuserid/{user_id}', 'Api\UserController@showByUserId');
        Route::get('showbyrolid/{rol_id}', 'Api\UserController@showByRolId');
        Route::delete('destroy/{user_id}', 'Api\UserController@destroy');
    });
});