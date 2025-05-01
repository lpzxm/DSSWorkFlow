<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;

Route::get('/', function () {
    $ventas = \App\Models\Venta::all();
    return view('welcome', ['ventas' => $ventas]);
});

Route::get('/venta', [VentasController::class, 'index'])->name('venta.index');
Route::get('/venta/create', [VentasController::class, 'create'])->name('venta.create');
Route::post('/venta/create', [VentasController::class, 'store'])->name('venta.store');
Route::get('/venta/{id}/edit', [VentasController::class, 'edit'])->name('venta.edit');
Route::put('/venta/{id}', [VentasController::class, 'update'])->name('venta.update');
Route::delete('/venta/{id}', [VentasController::class, 'destroy'])->name('venta.destroy');

