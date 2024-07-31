<?php

use Illuminate\Support\Facades\Route;
use App\App\Api\Controllers\AuthController;
use App\App\Api\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return response()->json(['message' => 'Hello, World!', 'file' => __FILE__]);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'my'], function () {
    Route::get('/info', [UserController::class, 'getInfo']);
});
