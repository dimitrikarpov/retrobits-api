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

Route::prefix('app')->namespace('App')->group(function() {
    Route::apiResource('bits', 'BitController');
});

Route::prefix('admin')->namespace('Admin')->group(function() {
    Route::apiResource('games', 'GameController');
    Route::apiResource('platforms', 'PlatformController');
});

Route::post('register', 'Register');
Route::post('login', 'Login');
Route::post('logout', 'Logout')->middleware('auth:api');