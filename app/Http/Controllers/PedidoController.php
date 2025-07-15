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

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->back()->with('success', 'Pedido excluído com sucesso!');
    }

    public function update(Request $request, Pedido $pedido)
    {
        $validated = $request->validate([
            'status_pagamento' => 'nullable|in:sim,não',
            'status_execucao' => 'required|in:não concluído,pendente,em andamento,aprovação,concluído',
            'tipo_pedido' => 'nullable|string|max:255', // se vier de formulário de edição
        ]);

        // Atualiza os campos que estiverem presentes
        if ($request->has('tipo_pedido')) {
            $pedido->tipo_pedido = $validated['tipo_pedido'];
        }

        if ($request->has('status_pagamento')) {
            $pedido->status_pagamento = $validated['status_pagamento'];
        }

        if ($request->has('status_execucao')) {
            $pedido->status_execucao = $validated['status_execucao'];
        }

        $pedido->save();

        // Decide onde redirecionar com base na origem
        if (url()->previous() === route('pedidos.kanban')) {
            return redirect()->route('pedidos.kanban')->with('success', 'Status atualizado com sucesso!');
        }

        return redirect()->route('clientes.pedidos', $pedido->cliente_id)
            ->with('success', 'Pedido atualizado com sucesso.');
    }

    public function kanban()
    {
        $pedidos = Pedido::with('cliente')->get();
        return view('pedidos.index-kanban', compact('pedidos'));
    }

    public function show($id)
    {
        $pedido = Pedido::with('cliente')->findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }
}
