@extends('layouts.app')

@section('title', 'Prévia do Pedido')

@section('content')
<div class="container">
    <h2 class="mb-4">🔍 Confirmação do Pedido</h2>

    <div class="card shadow-sm p-4 mb-4">
        <p><strong>👤 Cliente:</strong> {{ $cliente->nome }}</p>
        <p><strong>🧵 Tipo do Pedido:</strong> {{ $validated['tipo_pedido'] }}</p>
        <p><strong>💰 Valor:</strong> R$ {{ number_format($validated['valor'], 2, ',', '.') }}</p>
        <p><strong>💳 Pagamento:</strong> {{ ucfirst($validated['status_pagamento']) }}</p>
        <p><strong>🚧 Execução:</strong> {{ ucfirst($validated['status_execucao']) }}</p>
    </div>

    <form action="{{ route('pedidos.confirm') }}" method="POST" class="mb-4">
        @csrf
        @foreach ($validated as $name => $value)
            <input type="hidden" name="{{ $name }}" value="{{ old($name, $value) }}">
        @endforeach

        <button type="submit" class="btn btn-success">
            ✅ Confirmar e Salvar Pedido
        </button>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary ms-2">
            ← Voltar e Editar
        </a>
    </form>
</div>
@endsection
