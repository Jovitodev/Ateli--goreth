@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">👤 Detalhes do Cliente</h2>

    <div class="card p-4 mb-4">
        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
        <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
        <p><strong>Idade:</strong> {{ $cliente->idade }}</p>
        <p><strong>Local:</strong> {{ $cliente->local }}</p>
    </div>

    <h4 class="mb-3">📋 Pedidos</h4>

    @if ($cliente->pedidos->isEmpty())
        <div class="alert alert-warning">Este cliente ainda não fez pedidos.</div>
    @else
        @php
            $somaTotal = $cliente->pedidos->sum('valor');
        @endphp

        <div class="row">
            @foreach ($cliente->pedidos as $pedido)
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-4 p-3 shadow-sm h-100">
                        {{-- Visualização --}}
                        <div id="view-{{ $pedido->id }}">
                            <h5>Pedido #{{ $pedido->id }}</h5>
                            <p><strong>Tipo:</strong> {{ $pedido->tipo_pedido }}</p>
                            <p><strong>Valor:</strong> R$ {{ number_format($pedido->valor, 2, ',', '.') }}</p>
                            <p><strong>Pagamento:</strong> {{ ucfirst($pedido->status_pagamento) }}</p>
                            <p><strong>Execução:</strong> {{ ucfirst($pedido->status_execucao) }}</p>

                            <button class="btn btn-sm btn-outline-primary" onclick="toggleEdit({{ $pedido->id }})">✏️ Editar</button>

                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este pedido?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">🗑️</button>
                            </form>
                        </div>

                        {{-- Edição --}}
                        <div id="edit-{{ $pedido->id }}" style="display: none;">
                            <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-2">
                                    <label class="form-label">Tipo do Pedido:</label>
                                    <input type="text" name="tipo_pedido" class="form-control" value="{{ old('tipo_pedido', $pedido->tipo_pedido) }}" required>
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Valor (R$):</label>
                                    <input type="number" step="0.01" name="valor" class="form-control" value="{{ old('valor', $pedido->valor) }}" required>
                                </div>

                                <div class="mb-2">
                                    <label class="form-label">Pagamento:</label>
                                    <select name="status_pagamento" class="form-select" required>
                                        <option value="não" {{ old('status_pagamento', $pedido->status_pagamento) == 'não' ? 'selected' : '' }}>Não</option>
                                        <option value="sim" {{ old('status_pagamento', $pedido->status_pagamento) == 'sim' ? 'selected' : '' }}>Sim</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Execução:</label>
                                    <select name="status_execucao" class="form-select" required>
                                        @foreach (['não concluído', 'pendente', 'em andamento', 'aprovação', 'concluído'] as $status)
                                            <option value="{{ $status }}" {{ old('status_execucao', $pedido->status_execucao) == $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">💾 Salvar</button>
                                <button type="button" class="btn btn-secondary btn-sm" onclick="cancelEdit({{ $pedido->id }})">Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h5 class="mt-4">💰 Total dos Pedidos: <span class="text-success">R$ {{ number_format($somaTotal, 2, ',', '.') }}</span></h5>
    @endif

    <div class="mt-4 d-flex gap-3">
        <a href="{{ route('pedidos.create', ['cliente_id' => $cliente->id]) }}" class="btn btn-outline-primary">➕ Adicionar Pedido</a>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">← Voltar</a>
    </div>

</div>

<script>
    function toggleEdit(id) {
        document.getElementById('view-' + id).style.display = 'none';
        document.getElementById('edit-' + id).style.display = 'block';
    }

    function cancelEdit(id) {
        document.getElementById('edit-' + id).style.display = 'none';
        document.getElementById('view-' + id).style.display = 'block';
    }
</script>
@endsection
