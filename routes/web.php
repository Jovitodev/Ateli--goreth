<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;

// Página inicial
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pedidos/todos', [HomeController::class, 'todosPedidos'])->name('home.pedidos');


// Clientes
Route::resource('clientes', ClienteController::class);
Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');

// Rotas alternativas (não são mais necessárias se usar resource)
Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');

// Pedidos
Route::resource('pedidos', PedidoController::class);
Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');

Route::post('/pedidos/preview', [PedidoController::class, 'preview'])->name('pedidos.preview');
Route::post('/pedidos/confirmar', [PedidoController::class, 'confirm'])->name('pedidos.confirm');
Route::get('/pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
Route::put('/pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
