@extends('layouts.app')

@section('title', 'Pedidos por Status')

@section('content')
<div class="container">
    <h2 class="mb-4">📌 Painel de Pedidos por Status</h2>

    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach (['não concluído', 'pendente', 'em andamento', 'aprovação', 'concluído'] as $status)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-header bg-dark text-white text-center">
                        <strong>{{ strtoupper($status) }}</strong>
                    </div>
                    <div class="card-body" style="min-height: 300px; overflow-y: auto;">
                        @php
                            $statusPedidos = $pedidos->where('status_execucao', $status);
                        @endphp

                        @forelse ($statusPedidos as $pedido)
                            <div class="border rounded p-2 mb-3">
                                <p class="mb-1"><strong>Cliente:</strong> {{ $pedido->cliente->nome ?? '-' }}</p>
                                <p class="mb-1"><strong>Pedido:</strong> {{ $pedido->tipo_pedido }}</p>
                                <p class="mb-1"><strong>Valor:</strong> R$ {{ number_format($pedido->valor, 2, ',', '.') }}</p>
                                <p class="mb-2"><strong>Pagamento:</strong> {{ ucfirst($pedido->status_pagamento) }}</p>

                                <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="d-flex flex-column gap-2">
                                    @csrf
                                    @method('PUT')

                                    <select name="status_execucao" class="form-select form-select-sm">
                                        @foreach (['não concluído', 'pendente', 'em andamento', 'aprovação', 'concluído'] as $s)
                                            <option value="{{ $s }}" {{ $pedido->status_execucao == $s ? 'selected' : '' }}>
                                                {{ ucfirst($s) }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="btn btn-success btn-sm">💾 Atualizar</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-muted text-center">Sem pedidos</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
