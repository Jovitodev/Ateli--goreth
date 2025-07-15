@extends('layouts.app')

@section('title', 'Lista de Pedidos')

@section('content')
<div class="container">
    <h2 class="mb-4">📄 Lista de Pedidos</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Pago?</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nome ?? 'Cliente não encontrado' }}</td>
                    <td>{{ $pedido->tipo_pedido }}</td>
                    <td>R$ {{ number_format($pedido->valor, 2, ',', '.') }}</td>
                    <td>{{ ucfirst($pedido->status_pagamento) }}</td>
                    <td>{{ ucfirst($pedido->status_execucao) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Nenhum pedido encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex gap-3 mt-4">
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">← Voltar para Clientes</a>

        <a href="{{ route('pedidos.create', ['cliente_id' => $cliente_id]) }}" class="btn btn-primary">
            ➕ Adicionar Pedido
        </a>

        <a href="{{ route('home') }}" class="btn btn-dark">🏠 Página Inicial</a>
    </div>
</div>
@endsection
