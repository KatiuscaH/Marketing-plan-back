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

Route::post('auth/login', 'AuthController@login')->name('login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('empresario', 'EmpresarioController');
    Route::apiResource('user', 'UserController');
    Route::apiResource('estudiante', 'EstudianteController');
    Route::apiResource('marketing', 'MarketingController');

    Route::group(['prefix' => 'marketing'], function () {
        Route::put('{marketing}/presentacion', 'MarketingController@presentacion');
        Route::put('{marketing}/historia', 'MarketingController@historia');
        Route::put('{marketing}/pest', 'MarketingController@pest');
        Route::put('{marketing}/porter', 'MarketingController@porter');
        Route::put('{marketing}/coatrop', 'MarketingController@coatrop');
        Route::put('{marketing}/clientes', 'MarketingController@clientes');
        Route::put('{marketing}/competencia', 'MarketingController@competencia');
        Route::put('{marketing}/proveedores', 'MarketingController@proveedores');
        Route::put('{marketing}/bcg', 'MarketingController@bcg');
        Route::put('{marketing}/dofa', 'MarketingController@dofa');
        Route::put('{marketing}/mefi', 'MarketingController@mefi');
        Route::put('{marketing}/ansoff', 'MarketingController@ansoff');

    });

    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

});
