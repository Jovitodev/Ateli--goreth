<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Cliente</title>
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
        @php
            $somaTotal = $cliente->pedidos->sum('valor');
        @endphp

        <ul>
            @foreach ($cliente->pedidos as $pedido)
                <li style="margin-bottom: 20px; border: 1px solid #ccc; padding: 10px; list-style-type: none;">
                    {{-- Modo Visualização --}}
                    <div id="view-{{ $pedido->id }}">
                        <p><strong>Pedido Nº:</strong> {{ $pedido->id }}</p>
                        <p><strong>Tipo do Pedido:</strong> {{ $pedido->tipo_pedido }}</p>
                        <p><strong>Valor (R$):</strong> R$ {{ number_format($pedido->valor, 2, ',', '.') }}</p>
                        <p><strong>Status do Pagamento:</strong> {{ ucfirst($pedido->status_pagamento) }}</p>
                        <p><strong>Status de Execução:</strong> {{ ucfirst($pedido->status_execucao) }}</p>
                        <button onclick="toggleEdit({{ $pedido->id }})">Editar</button>
                    </div>

                    {{-- Modo Edição --}}
                    <div id="edit-{{ $pedido->id }}" style="display: none;">
                        <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <p><strong>Pedido Nº:</strong> {{ $pedido->id }}</p>

                            <label>Tipo do Pedido:</label><br>
                            <input type="text" name="tipo_pedido" value="{{ old('tipo_pedido', $pedido->tipo_pedido) }}" required><br><br>

                            <label>Valor (R$):</label><br>
                            <input type="number" step="0.01" name="valor" value="{{ old('valor', $pedido->valor) }}" required><br><br>

                            <label>Status do Pagamento:</label><br>
                            <select name="status_pagamento" required>
                                <option value="não" {{ old('status_pagamento', $pedido->status_pagamento) == 'não' ? 'selected' : '' }}>Não</option>
                                <option value="sim" {{ old('status_pagamento', $pedido->status_pagamento) == 'sim' ? 'selected' : '' }}>Sim</option>
                            </select><br><br>

                            <label>Status de Execução:</label><br>
                            <select name="status_execucao" required>
                                @foreach (['não concluído', 'pendente', 'em andamento', 'aprovação', 'concluído'] as $status)
                                    <option value="{{ $status }}" {{ old('status_execucao', $pedido->status_execucao) == $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select><br><br>

                            <button type="submit">Salvar Alterações</button>
                            <button type="button" onclick="cancelEdit({{ $pedido->id }})">Cancelar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        <h4>Total dos Pedidos: <span style="color: green;">R$ {{ number_format($somaTotal, 2, ',', '.') }}</span></h4>
    @endif

    <br>
    <a href="{{ route('pedidos.create', ['cliente_id' => $cliente->id]) }}">Adicionar Pedido</a>
    <br><br>
    <a href="{{ route('clientes.index') }}">Voltar</a>
</body>
</html>
