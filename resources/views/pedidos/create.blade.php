<!DOCTYPE html>
<html>
<head>
    <title>Criar Pedido</title>
</head>
<body>
    <h1>Novo Pedido</h1>

    <form action="{{ route('pedidos.preview') }}" method="POST">

        @csrf

        <p><strong>Cliente:</strong> {{ \App\Models\Cliente::find($cliente_id)->nome ?? 'Desconhecido' }}</p>
        <input type="hidden" name="cliente_id" value="{{ $cliente_id }}">
        <br><br>
        <input type="hidden" name="cliente_id" value="{{ $cliente_id }}">

        <label for="tipo_pedido">Tipo do Pedido:</label>
        <input type="text" name="tipo_pedido" value="{{ old('tipo_pedido') }}" required ><br><br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" name="valor" required><br><br>

        <label for="status_pagamento">Pagamento Realizado:</label>
        <select name="status_pagamento" required>
            <option value="">Selecione</option>
            <option value="sim">Sim</option>
            <option value="nao">Não</option>
        </select><br><br>

        <label for="status_execucao">Status de Execução:</label>
        <select name="status_execucao" required>
            <option value="">Selecione</option>
            <option value="nao_concluido">Não concluído</option>
            <option value="pendente">Pendente</option>
            <option value="em_andamento">Em andamento</option>
            <option value="aprovacao">Aprovação</option>
            <option value="concluido">Concluído</option>
        </select><br><br>

        <button type="submit">Salvar Pedido</button>
    </form>

    <br>
    <a href="{{ route('clientes.index') }}">← Voltar para clientes</a>
</body>
</html>
