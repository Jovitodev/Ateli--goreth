@extends('layouts.app')

@section('title', 'Novo Pedido')

@section('content')
<div class="container">
    <h2 class="mb-4">🧵 Cadastrar Pedido para <strong>{{ \App\Models\Cliente::find($cliente_id)->nome ?? 'Desconhecido' }}</strong></h2>

    <form action="{{ route('pedidos.preview') }}" method="POST" class="card p-4 shadow-sm bg-white">
        @csrf

        <input type="hidden" name="cliente_id" value="{{ $cliente_id }}">

        <div class="mb-3">
            <label for="tipo_pedido" class="form-label">Tipo do Pedido:</label>
            <input type="text" name="tipo_pedido" id="tipo_pedido" class="form-control" value="{{ old('tipo_pedido') }}" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor (R$):</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status_pagamento" class="form-label">Pagamento Realizado:</label>
            <select name="status_pagamento" id="status_pagamento" class="form-select" required>
                <option value="">Selecione</option>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="status_execucao" class="form-label">Status de Execução:</label>
            <select name="status_execucao" id="status_execucao" class="form-select" required>
                <option value="">Selecione</option>
                <option value="nao_concluido">Não concluído</option>
                <option value="pendente">Pendente</option>
                <option value="em_andamento">Em andamento</option>
                <option value="aprovacao">Aprovação</option>
                <option value="concluido">Concluído</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success w-100">💾 Salvar Pedido</button>
    </form>

    <div class="mt-4">
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">← Voltar para clientes</a>
    </div>
</div>
@endsection
