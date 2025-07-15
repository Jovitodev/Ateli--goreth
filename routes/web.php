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
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::get('/clientes/{cliente}/pedidos', [ClienteController::class, 'verPedidos'])->name('clientes.pedidos');

// Pedidos
// ✅ Coloque o kanban ANTES do resource para evitar conflito
Route::get('/pedidos/kanban', [PedidoController::class, 'kanban'])->name('pedidos.kanban');

// ✅ Resource só uma vez, e DEPOIS do /kanban
Route::resource('pedidos', PedidoController::class);

// ✅ Outras rotas personalizadas
Route::post('/pedidos/preview', [PedidoController::class, 'preview'])->name('pedidos.preview');
Route::post('/pedidos/confirmar', [PedidoController::class, 'confirm'])->name('pedidos.confirm');

// (opcional, pois o resource já cobre essas)
// Route::get('/pedidos/{pedido}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
// Route::put('/pedidos/{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');
// Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
