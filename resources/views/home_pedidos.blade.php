@extends('layouts.app')

@section('title', 'Todos os Pedidos')

@section('content')
<div class="container">
    <h2 class="mb-4">📋 Todos os Pedidos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($pedidos->isEmpty())
        <div class="alert alert-warning">Nenhum pedido encontrado.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Tipo do Pedido</th>
                        <th>Valor</th>
                        <th>Status de Pagamento</th>
                        <th>Status de Execução</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                        <tr>
                            <td>{{ $pedido->cliente->nome ?? 'Cliente não encontrado' }}</td>
                            <td>{{ $pedido->tipo_pedido }}</td>
                            <td>R$ {{ number_format($pedido->valor, 2, ',', '.') }}</td>

                            <td>
                                <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="status_pagamento" class="form-select form-select-sm" style="width: auto;" required>
                                        <option value="sim" {{ $pedido->status_pagamento == 'sim' ? 'selected' : '' }}>Sim</option>
                                        <option value="não" {{ $pedido->status_pagamento == 'não' ? 'selected' : '' }}>Não</option>
                                    </select>
                            </td>

                            <td>
                                    <select name="status_execucao" class="form-select form-select-sm" style="width: auto;" required>
                                        @foreach (['não concluído', 'pendente', 'em andamento', 'aprovação', 'concluído'] as $status)
                                            <option value="{{ $status }}" {{ $pedido->status_execucao == $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                            </td>

                            <td>
                                    <button type="submit" class="btn btn-sm btn-success">💾 Salvar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
