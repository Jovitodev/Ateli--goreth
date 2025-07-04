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
    $validated = $request->validate([
        'nome' => 'required|string|max:100',
        'cpf' => 'required|string|unique:clientes,cpf',
        'idade' => 'required|integer',
        'local' => 'required|string|max:100',
    ]);

    Cliente::create($validated);

    return redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
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
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}

