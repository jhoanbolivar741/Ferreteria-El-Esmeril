<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users/{user}/edit-password', [UserController::class, 'editPassword'])->name('users.editPassword');
    Route::patch('/users/{user}/update-password', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::get('/reporte/inventario', "App\Http\Controllers\ReporteController@Inventario")->name('reporte.inventario');
    Route::get('/reporte/ventaPorDia', "App\Http\Controllers\ReporteController@VentaPorDia")->name('reporte.ventaPorDia');
    Route::get('/reporte/notaDeVenta/{id}', "App\Http\Controllers\ReporteController@NotaDeVenta")->name('reporte.notaDeVenta');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/unidades', UnidadController::class);
    Route::resource('/clientes', ClienteController::class);
    Route::resource('/articulos', ArticuloController::class);
    Route::resource('/ventas', VentaController::class);
    Route::resource('/users', UserController::class);
    Route::prefix('ventas/{venta}')->group(function () {
        Route::resource('detalles', DetalleController::class)->except(['show']);
    });
    Route::resource('/roles', RoleController::class);
});



require __DIR__ . '/auth.php';
