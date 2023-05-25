<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

//Rutas de autenticación
Auth::routes();
//Ruta raiz (si el usuario no está autenticado se envia al login de lo contrario se envia al dashboard)
Route::view('/', 'auth.login')->name('/')->middleware('guest');
//El siguente grupo de rutas requieren autenticación para ser mostradas de lo contrario se envia al login
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
