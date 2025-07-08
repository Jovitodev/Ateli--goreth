<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function create(Request $request)
    {
        $cliente_id = $request->get('cliente_id');
        $clientes = \App\Models\Cliente::all(); // isso evita o erro de variável não definida
        return view('pedidos.create', compact('cliente_id', 'clientes'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tipo_pedido' => 'required|string',
            'valor' => 'required|numeric',
            'status_pagamento' => 'required|string',
            'status_execucao' => 'required|string',
        ]);



        Pedido::create($validated);

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso!');
    }

    public function index(Request $request)
    {
        $cliente_id = $request->get('cliente_id');

        if (!$cliente_id) {
            return redirect()->route('clientes.index')->with('error', 'Cliente não especificado.');
    }

        $pedidos = Pedido::with('cliente')->where('cliente_id', $cliente_id)->get();

            return view('pedidos.index', compact('pedidos', 'cliente_id'));
    }

    public function preview(Request $request)
    {
         $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tipo_pedido' => 'required|string',
            'valor' => 'required|numeric',
            'status_pagamento' => 'required|string',
            'status_execucao' => 'required|string',
        ]);

        $cliente = Cliente::find($validated['cliente_id']);

             return view('pedidos.preview', compact('validated', 'cliente'));
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'tipo_pedido' => 'required|string',
            'valor' => 'required|numeric',
            'status_pagamento' => 'required|string',
            'status_execucao' => 'required|string',
        ]);

        Pedido::create($validated);

        return redirect()->route('pedidos.index', ['cliente_id' => $validated['cliente_id']])
            ->with('success', 'Pedido cadastrado com sucesso!');
    }


    public function update(Request $request, Pedido $pedido)
    {
    $request->validate([
        'tipo_pedido' => 'required|string|max:255',
        'status_pagamento' => 'required|in:sim,não',
        'status_execucao' => 'required|in:não concluído,pendente,em andamento,aprovação,concluído',
    ]);

    $pedido->update([
        'tipo_pedido' => $request->tipo_pedido,
        'status_pagamento' => $request->status_pagamento,
        'status_execucao' => $request->status_execucao,
    ]);

    return redirect()->route('clientes.pedidos', $pedido->cliente_id)
                     ->with('success', 'Pedido atualizado com sucesso.');
    }
}
