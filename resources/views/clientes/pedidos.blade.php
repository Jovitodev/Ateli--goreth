<!DOCTYPE html>
<html>
<head>
    <title>Pedidos de {{ $cliente->nome }}</title>
</head>
<body>
    <h1>Pedidos do Cliente: {{ $cliente->nome }}</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @foreach ($cliente->pedidos as $pedido)
        <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 15px;">
            @csrf
            @method('PUT')

            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

            <p><strong>ID do Pedido:</strong> {{ $pedido->id }}</p>

            <label for="tipo_pedido">Tipo do Pedido:</label>
            <input type="text" name="tipo_pedido" value="{{ old('tipo_pedido', $pedido->tipo_pedido) }}"><br><br>

            <label for="status_pagamento">Pagamento Realizado:</label>
            <select name="status_pagamento">
                <option value="não" {{ old('status_pagamento', $pedido->status_pagamento) == 'não' ? 'selected' : '' }}>Não</option>
                <option value="sim" {{ old('status_pagamento', $pedido->status_pagamento) == 'sim' ? 'selected' : '' }}>Sim</option>
            </select><br><br>

            <label for="status_execucao">Status de Execução:</label>
            <select name="status_execucao">
                @foreach (['não concluído', 'pendente', 'em andamento', 'aprovação', 'concluído'] as $status)
                    <option value="{{ $status }}" {{ old('status_execucao', $pedido->status_execucao) == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select><br><br>

            <button type="submit">Salvar Alterações</button>
        </form>
    @endforeach

    <br>
    <a href="{{ route('clientes.index') }}">← Voltar para a lista de clientes</a>
</body>
</html>
