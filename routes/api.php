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
    Route::apiResource('medios', 'MediosController');
    Route::apiResource('objetivos', 'ObjetivoController');
    Route::apiResource('estrategias', 'EstrategiaController');
    Route::apiResource('files', 'FileController');
    Route::get('/objetivos/{objetivo}/estrategias', 'ObjetivoController@estrategias');
    Route::get('empresario/{empresario}/objetivos', 'EmpresarioController@objetivos');
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
    Route::group(['prefix' => 'admin'], function () {
        Route::get('marketing', 'MarketingController@mostrarTodo');
        Route::get('marketing/{marketing}/estrategias', 'MarketingController@mostrarEstrategias');
        Route::get('files', 'FileController@allFile');
        
    });
    

    Route::group(['prefix' => 'auth'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('me', 'AuthController@me');
    });
});
