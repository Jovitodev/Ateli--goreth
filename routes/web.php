<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;

Route::resource('/', App\Http\Controllers\ClienteController::class);
Route::resource('pedidos', PedidoController::class);

Route::get('/cliente/create', [Clienteontroller::class, 'create'])->name('cliente.create');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');

Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');


