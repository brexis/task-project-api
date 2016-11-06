<?php

use Illuminate\Http\Request;

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
Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('projects', 'ProjectController', [
        'only' => ['index', 'store', 'update', 'destroy']
    ]);

    Route::resource('tasks', 'TaskController', [
        'only' => ['index', 'store', 'update', 'destroy']
    ]);

    Route::post('tasks/assign', 'TaskController@assign');
    Route::put('users/update', 'UserController@update');
});
