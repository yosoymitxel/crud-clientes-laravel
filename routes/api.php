<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
\Lomkit\Rest\Facades\Rest::resource('users', \App\Rest\Controllers\UsersController::class);

Route::middleware('api')->group(function () {
    Route::apiResource('clientes', ClienteController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    /*Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');*/
    //Route::patch('/clientes', [ClienteController::class, 'update'])->name('cliente.update');
   /* Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Clientes
    Route::resource('clientes', ClienteController::class);

    // Dirección
    Route::resource('addresses', AddressController::class);

    // Compañias
    Route::resource('companies', CompanyController::class);*/

});
