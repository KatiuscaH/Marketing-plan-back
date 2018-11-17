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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('empresario', 'EmpresarioController');
    Route::apiResource('user', 'UserController');
    Route::apiResource('estudiante', 'EstudianteController');
    Route::apiResource('marketing', 'MarketingController');
    Route::put('marketing/{marketing}/presentacion', 'MarketingController@presentacion');

    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

});
