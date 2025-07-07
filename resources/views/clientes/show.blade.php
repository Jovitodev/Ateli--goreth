<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Cliente</title>
</head>
<body>
    <h1>Detalhes do Cliente</h1>

    <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
    <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
    <p><strong>Idade:</strong> {{ $cliente->idade }}</p>
    <p><strong>Local:</strong> {{ $cliente->local }}</p>

    <h2>Pedidos</h2>
    @if ($cliente->pedidos->isEmpty())
        <p>Este cliente ainda não fez pedidos.</p>
    @else
        <ul>
            @foreach ($cliente->pedidos as $pedido)
                <li>
                    <strong>Tipo:</strong> {{ $pedido->tipo_pedido }} |
                    <strong>Valor:</strong> R$ {{ $pedido->valor }} |
                    <strong>Pagamento:</strong> {{ $pedido->status_pagamento }} |
                    <strong>Execução:</strong> {{ $pedido->status_execucao }}
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('pedidos.create', ['cliente_id' => $cliente->id]) }}">Adicionar Pedido</a>
    <br><br>
    <a href="{{ route('clientes.index') }}">Voltar</a>
</body>
</html>
