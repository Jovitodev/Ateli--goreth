@extends('layouts.app')

@section('title', 'Detalhes do Pedido')

@section('content')
<div class="container">
    <h2 class="mb-4">📄 Detalhes do Pedido #{{ $pedido->id }}</h2>

    <p><strong>Cliente:</strong> {{ $pedido->cliente->nome ?? '-' }}</p>
    <p><strong>Tipo:</strong> {{ $pedido->tipo_pedido }}</p>
    <p><strong>Valor:</strong> R$ {{ number_format($pedido->valor, 2, ',', '.') }}</p>
    <p><strong>Pagamento:</strong> {{ ucfirst($pedido->status_pagamento) }}</p>
    <p><strong>Execução:</strong> {{ ucfirst($pedido->status_execucao) }}</p>

    <a href="{{ route('pedidos.kanban') }}" class="btn btn-secondary mt-3">← Voltar</a>
</div>
@endsection
