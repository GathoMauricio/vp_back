<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('load_users_by_client/{client_id}', [ClientController::class, 'loadUsersByClient'])->name('load_users_by_client');
Route::get('load_user_data/{user_id}', [UserController::class, 'loadUserData'])->name('load_user_data');
