<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

   public function store(Request $request)
{
    $validatedData = $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:14|unique:clientes',
        'idade' => 'required|integer',
        'local' => 'nullable|string|max:255',
    ]);

    $cliente = Cliente::create($validatedData);

    // Redireciona para a página de criação de pedidos, passando o ID do cliente
    return redirect()->route('pedidos.create', ['cliente_id' => $cliente->id])
        ->with('success', 'Cliente cadastrado com sucesso! Agora cadastre um pedido.');
}

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.create', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }

    public function pedidos()
    {
        return $this->hasMany(\App\Models\Pedido::class);
    }   

    public function verPedidos($id)
    {
    $cliente = Cliente::with('pedidos')->findOrFail($id);
    return view('clientes.pedidos', compact('cliente'));
    }
    
    public function show($id)
    {
    $cliente = Cliente::with('pedidos')->findOrFail($id);
    return view('clientes.show', compact('cliente'));
    }

}

