<?php

use Illuminate\Support\Facades\Route;

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
    $user = \App\Infrastructure\Models\User::all();
    return [
        'message' => 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id'),
        'user' => $user
    ];
});
