<!DOCTYPE html>
<html>
<head>
    <title>Editar Pedido</title>
</head>
<body>
    <h1>Editar Pedido</h1>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" required>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}"
                    {{ old('cliente_id', $pedido->cliente_id) == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
            @endforeach
        </select><br><br>

        <label for="tipo_pedido">Tipo do Pedido:</label>
        <input type="text" name="tipo_pedido" value="{{ old('tipo_pedido', $pedido->tipo_pedido) }}" required><br><br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" name="valor" value="{{ old('valor', $pedido->valor) }}" required><br><br>

        <label for="status_pagamento">Status do Pagamento:</label>
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

        <button type="submit">Atualizar Pedido</button>
    </form>

    <br>
    <a href="{{ route('clientes.index') }}">← Voltar para clientes</a>
</body>
</html>
