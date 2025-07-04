<h1>Lista de Pedidos</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Pago?</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->cliente->nome ?? 'Cliente não encontrado' }}</td>
                <td>{{ $pedido->tipo }}</td>
                <td>R$ {{ number_format($pedido->valor, 2, ',', '.') }}</td>
                <td>{{ $pedido->pago ? 'Sim' : 'Não' }}</td>
                <td>{{ ucfirst($pedido->status) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<a href="{{ route('pedidos.create') }}">Criar novo pedido</a>
