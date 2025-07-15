@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
<div class="container">
    <h2 class="mb-4">✏️ Editar Pedido #{{ $pedido->id }}</h2>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="card p-4 shadow-sm bg-white">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente:</label>
            <select name="cliente_id" id="cliente_id" class="form-select" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                        {{ old('cliente_id', $pedido->cliente_id) == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo_pedido" class="form-label">Tipo do Pedido:</label>
            <input type="text" name="tipo_pedido" id="tipo_pedido" class="form-control" value="{{ old('tipo_pedido', $pedido->tipo_pedido) }}" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$):</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ old('valor', $pedido->valor) }}" required>
        </div>

        <div class="mb-3">
            <label for="status_pagamento" class="form-label">Status do Pagamento:</label>
            <select name="status_pagamento" id="status_pagamento" class="form-select">
                <option value="não" {{ old('status_pagamento', $pedido->status_pagamento) == 'não' ? 'selected' : '' }}>Não</option>
                <option value="sim" {{ old('status_pagamento', $pedido->status_pagamento) == 'sim' ? 'selected' : '' }}>Sim</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status_execucao" class="form-label">Status de Execução:</label>
            <select name="status_execucao" id="status_execucao" class="form-select">
                @foreach (['não concluído', 'pendente', 'em andamento', 'aprovação', 'concluído'] as $status)
                    <option value="{{ $status }}" {{ old('status_execucao', $pedido->status_execucao) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success w-100">💾 Atualizar Pedido</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">← Voltar para clientes</a>
    </div>
</div>
@endsection
