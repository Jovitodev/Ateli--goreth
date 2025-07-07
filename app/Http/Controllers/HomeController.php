<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

class HomeController extends Controller
{
    public function index()
    {
        // Carrega os pedidos com nome do cliente (evita N+1)
        $pedidos = Pedido::with('cliente')->get();

        return view('home', compact('pedidos'));
    }
    
    public function todosPedidos()
    {
    $pedidos = Pedido::with('cliente')->get();

    return view('home_pedidos', compact('pedidos'));
    }

}

