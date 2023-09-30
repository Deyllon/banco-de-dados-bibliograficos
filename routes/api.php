<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->middleware('jwt.auth')->group(function(){
    Route::apiResource('Livro', 'App\Http\Controllers\LivroController' )->except(['destroy']);
    Route::apiResource('Autor', 'App\Http\Controllers\AutorController' )->except(['destroy']);
    Route::delete('Livro/{Livro}', 'App\Http\Controllers\LivroController@destroy')->middleware('admin');
    Route::delete('Autor/{Autor}', 'App\Http\Controllers\AutorController@destroy')->middleware('admin');
    Route::match(['put', 'patch'],'User/{User}','App\Http\Controllers\UserController@update');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
});

Route::prefix('v1')->group(function () {

    Route::post('Login', 'App\Http\Controllers\AuthController@login');
    Route::post('User', 'App\Http\Controllers\UserController@store');
});
