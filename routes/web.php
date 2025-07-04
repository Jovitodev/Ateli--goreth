<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;

Route::resource('clientes', ClienteController::class);
Route::resource('pedidos', PedidoController::class);

Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');


Route::get('/', function () {
    return view('welcome');
});
