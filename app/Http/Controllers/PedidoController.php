<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'tipo' => 'required|string',
        'valor' => 'required|numeric',
        'pago' => 'required|boolean',
        'status' => 'required|string',
    ]);

    Pedido::create([
        'cliente_id' => $request->cliente_id,
        'tipo' => $request->tipo,
        'valor' => $request->valor,
        'pago' => $request->pago,
        'status' => $request->status,
        
    ]);

    return redirect()->route('pedidos.create')->with('success', 'Pedido salvo com sucesso!');
}
    public function create()
{
    $clientes = Cliente::all();
    return view('pedidos.create', compact('clientes'));
}
    public function index()
{
    $pedidos = Pedido::with('cliente')->get(); // carrega os dados do cliente junto
    return view('pedidos.index', compact('pedidos'));
}
}
