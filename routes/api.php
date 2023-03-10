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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/cases')->group(function () {
    Route::post('/', [
        'before' => 'csrf',
        'as'     => 'store',
        'uses'   => 'App\Http\Controllers\ClientCaseController@store',
    ]);

    Route::post('/queue', [
        'before' => 'csrf',
        'as'     => 'storeAfterQueue',
        'uses'   => 'App\Http\Controllers\ClientCaseController@storeAfterQueue',
    ]);
});
