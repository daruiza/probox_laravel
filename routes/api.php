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

Route::group(['prefix' => 'generallist'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\GeneralListController@index');
        Route::get('showbyid/{id}', 'Api\GeneralListController@showById');
        Route::get('showbyname', 'Api\GeneralListController@showByName');
        Route::get('showbynamelist', 'Api\GeneralListController@showByNameList');
        Route::post('store', 'Api\GeneralListController@store');
        Route::delete('destroy/{id}', 'Api\GeneralListController@destroy');
        Route::put('update/{id}', 'Api\GeneralListController@update');
    });
});

Route::group(['prefix' => 'module'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ModuleController@index');
        Route::post('store', 'Api\ModuleController@store');
        Route::get('showbymoduleid/{id}', 'Api\ModuleController@showByModuleId');
        Route::put('update/{id}', 'Api\ModuleController@update');
        Route::delete('destroy/{id}', 'Api\ModuleController@destroy');
    });
});

Route::group(['prefix' => 'rol'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\RolController@index');
        Route::post('store', 'Api\RolController@store');
        Route::get('showbyrolid/{id}', 'Api\RolController@showByRolId');
        Route::put('update/{id}', 'Api\RolController@update');
        Route::delete('destroy/{id}', 'Api\RolController@destroy');
    });
});

Route::group(['prefix' => 'option'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\OptionController@index');
        Route::post('store', 'Api\OptionController@store');
        Route::get('showbyoptionid/{id}', 'Api\OptionController@showByOptionId');
        Route::put('update/{id}', 'Api\OptionController@update');
        Route::delete('destroy/{id}', 'Api\OptionController@destroy');
        Route::get('showoptionbymoduleid/{id_module}', 'Api\OptionController@showOptionByModuleId');
    });
});

Route::group(['prefix' => 'optionrol'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\OptionRolController@index');
        Route::post('store', 'Api\OptionRolController@store');
        Route::get('showbyoptionrolid/{id}', 'Api\OptionRolController@showByOptionRolId');
        Route::put('update/{id}', 'Api\OptionRolController@update');
        Route::delete('destroy/{id}', 'Api\OptionRolController@destroy');
        Route::get('showoptionrolbyrolid/{id_rol}', 'Api\OptionRolController@showOptionRolByRolId');
        Route::get('showoptionrolbyoptionid/{id_option}', 'Api\OptionRolController@showOptionRolByOptionId');
    });
});