<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Clientes
    Route::resource('clientes', ClienteController::class);
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes');

    // Dirección
    Route::resource('addresses', AddressController::class);
    Route::get('addresses', [AddressController::class, 'index'])->name('addresses');

    // Compañias
    Route::resource('companies', CompanyController::class);
    Route::get('companies', [CompanyController::class, 'index'])->name('companies');
});


require __DIR__.'/auth.php';
