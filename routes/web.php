<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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
});
