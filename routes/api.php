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

Route::group(['prefix' => 'upload'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('photo', 'Api\UploadController@photo');
        Route::get('downloadfile', 'Api\UploadController@downloadFile');
        Route::get('getfile', 'Api\UploadController@getFile');
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
        Route::get('showrolbyid/{id}', 'Api\UserController@showRolById');
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
        Route::get('showbyid/{id}', 'Api\ModuleController@showById');
        Route::put('update/{id}', 'Api\ModuleController@update');
        Route::delete('destroy/{id}', 'Api\ModuleController@destroy');
        Route::get('showoptionbyid/{id}', 'Api\ModuleController@showOptionById');
    });
});

Route::group(['prefix' => 'rol'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\RolController@index');
        Route::post('store', 'Api\RolController@store');
        Route::get('showbyid/{id}', 'Api\RolController@showById');
        Route::put('update/{id}', 'Api\RolController@update');
        Route::delete('destroy/{id}', 'Api\RolController@destroy');
        Route::get('showoptionbyid/{id}', 'Api\RolController@showOptionById');
    });
});

Route::group(['prefix' => 'option'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\OptionController@index');
        Route::post('store', 'Api\OptionController@store');
        Route::get('showbyid/{id}', 'Api\OptionController@showById');
        Route::put('update/{id}', 'Api\OptionController@update');
        Route::delete('destroy/{id}', 'Api\OptionController@destroy');
        Route::get('showmodulebyid/{id}', 'Api\OptionController@showModuleById');
        Route::get('showrolbyid/{id}', 'Api\OptionController@showRolById');
    });
});

Route::group(['prefix' => 'optionrol'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\OptionRolController@index');
        Route::post('store', 'Api\OptionRolController@store');
        Route::get('showbyoptionrolid/{id}', 'Api\OptionRolController@showByOptionRolId');
        Route::put('update/{id}', 'Api\OptionRolController@update');
        Route::delete('destroy/{id}', 'Api\OptionRolController@destroy');
    });
});

Route::group(['prefix' => 'commerce'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CommerceController@index');
        Route::post('store', 'Api\CommerceController@store');
        Route::get('showbyid/{id}', 'Api\CommerceController@showById');
        Route::put('update/{id}', 'Api\CommerceController@update');
        Route::delete('destroy/{id}', 'Api\CommerceController@destroy');
    });
});

Route::group(['prefix' => 'project'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ProjectController@index');
        Route::post('store', 'Api\ProjectController@store');
        Route::get('showbyid/{id}', 'Api\ProjectController@showById');
        Route::put('update/{id}', 'Api\ProjectController@update');
        Route::delete('destroy/{id}', 'Api\ProjectController@destroy');
        Route::get('showtaskbyid/{id}', 'Api\ProjectController@showTaskById');
    });
});

Route::group(['prefix' => 'tag'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\TagController@index');
        Route::post('store', 'Api\TagController@store');
        Route::get('showbyid/{id}', 'Api\TagController@showById');
        Route::put('update/{id}', 'Api\TagController@update');
        Route::delete('destroy/{id}', 'Api\TagController@destroy');
        Route::get('showprojectbyid/{id}', 'Api\TagController@showByProjectId');
    });
});

Route::group(['prefix' => 'projecttag'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('store', 'Api\ProjectTagController@store');
        Route::get('showtagsbyprojectid/{id}', 'Api\ProjectTagController@showTagsByProjectId');
        Route::delete('destroy/{id}', 'Api\ProjectTagController@destroy');
        Route::get('showprojecttagbyid/{id}', 'Api\ProjectTagController@showProjectTagById');
    });
});

Route::group(['prefix' => 'note'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\NoteController@index');
        Route::post('store', 'Api\NoteController@store');
        Route::get('showbyid/{id}', 'Api\NoteController@showById');
        Route::put('update/{id}', 'Api\NoteController@update');
        Route::delete('destroy/{id}', 'Api\NoteController@destroy');
        Route::get('showbyprojectid/{id}', 'Api\NoteController@showByProjectId');
    });
});

Route::group(['prefix' => 'document'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\DocumentController@index');
        Route::post('store', 'Api\DocumentController@store');
        Route::get('showbyid/{id}', 'Api\DocumentController@showById');
        Route::put('update/{id}', 'Api\DocumentController@update');
        Route::delete('destroy/{id}', 'Api\DocumentController@destroy');
        Route::get('showbyprojectid/{id}', 'Api\DocumentController@showByProjectId');
    });
});

Route::group(['prefix' => 'customer'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\CustomerController@index');
        Route::post('store', 'Api\CustomerController@store');
        Route::get('showbyid/{id}', 'Api\CustomerController@showById');
        Route::put('update/{id}', 'Api\CustomerController@update');
        Route::delete('destroy/{id}', 'Api\CustomerController@destroy');
        Route::get('showbyuserid/{id}', 'Api\CustomerController@showByUserId');
        Route::get('showbyprojectid/{id}', 'Api\CustomerController@showByProjectId');
    });
});

Route::group(['prefix' => 'colaborator'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\ColaboratorController@index');
        Route::post('store', 'Api\ColaboratorController@store');
        Route::get('showbyid/{id}', 'Api\ColaboratorController@showById');
        Route::put('update/{id}', 'Api\ColaboratorController@update');
        Route::delete('destroy/{id}', 'Api\ColaboratorController@destroy');
        Route::get('showbyuserid/{id}', 'Api\ColaboratorController@showByUserId');
        Route::get('showbyprojectid/{id}', 'Api\ColaboratorController@showByProjectId');
    });
});

Route::group(['prefix' => 'evidence'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\EvidenceController@index');
        Route::post('store', 'Api\EvidenceController@store');
        Route::get('showbyid/{id}', 'Api\EvidenceController@showById');
        Route::put('update/{id}', 'Api\EvidenceController@update');
        Route::delete('destroy/{id}', 'Api\EvidenceController@destroy');
        Route::get('showtaskbyid/{id}', 'Api\EvidenceController@showTaskById');
    });
});

Route::group(['prefix' => 'task'], function () {
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('index', 'Api\TaskController@index');
        Route::post('store', 'Api\TaskController@store');
        Route::get('showbyid/{id}', 'Api\TaskController@showById');
        Route::put('update/{id}', 'Api\TaskController@update');
        Route::delete('destroy/{id}', 'Api\TaskController@destroy');
        Route::get('showevidencebyid/{id}', 'Api\TaskController@showEvidenceById');
        Route::get('showprojectbyid/{id}', 'Api\TaskController@showProjectById');
    });
});
