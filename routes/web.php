<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
//Rutas de autenticación
Auth::routes();
//Ruta raiz (si el usuario no está autenticado se envia al login de lo contrario se envia al dashboard)
Route::view('/', 'auth.login')->name('/')->middleware('guest');
//El siguente grupo de rutas requieren autenticación para ser mostradas de lo contrario se envia al login
Route::middleware(['auth'])->group(function () {
    //Ticket routes
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('create/ticket', [TicketController::class, 'create'])->name('create/ticket');
    Route::post('store/ticket', [TicketController::class, 'store'])->name('store/ticket');
    Route::get('show/ticket/{folio}', [TicketController::class, 'show'])->name('show/ticket');
    Route::get('edit/ticket/{folio}', [TicketController::class, 'edit'])->name('edit/ticket');
    Route::put('update/ticket/{folio}', [TicketController::class, 'update'])->name('update/ticket');
    //User routes
    Route::get('index/user', [UserController::class, 'index'])->name('index/user');
    Route::get('create/user', [UserController::class, 'create'])->name('create/user');
    Route::post('store/user', [UserController::class, 'store'])->name('store/user');
    Route::get('edit/user/{id}', [UserController::class, 'edit'])->name('edit/user');
    Route::put('update/user/{id}', [UserController::class, 'update'])->name('update/user');
    Route::delete('delete/user', [UserController::class, 'delete'])->name('delete/user');
    //Client routes
    Route::get('index/client', [ClientController::class, 'index'])->name('index/client');
    Route::get('create/client', [ClientController::class, 'create'])->name('create/client');
    Route::post('store/client', [ClientController::class, 'store'])->name('store/client');
    Route::get('edit/client/{id}', [ClientController::class, 'edit'])->name('edit/client');
    Route::put('update/client/{id}', [ClientController::class, 'update'])->name('update/client');
    Route::delete('delete/client', [ClientController::class, 'delete'])->name('delete/client');
    //Client users routes
    Route::get('index/client_users/{id}', [ClientController::class, 'index'])->name('index/client_users');
    Route::get('create/client_users/{id}', [ClientController::class, 'create'])->name('create/client_users');
    Route::post('store/client_users/{id}', [ClientController::class, 'store'])->name('store/client_users');
    Route::get('edit/client_users/{id}', [ClientController::class, 'edit'])->name('edit/client_users');
    Route::put('update/client_users/{id}', [ClientController::class, 'update'])->name('update/client_users');
    Route::delete('delete/client_users', [ClientController::class, 'delete'])->name('delete/client_users');
});
