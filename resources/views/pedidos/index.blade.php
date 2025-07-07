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
<div style="margin-bottom: 20px;">
    <a href="{{ route('clientes.index') }}" style="margin-right: 10px;">Voltar para lista de clientes</a>

    {{-- Passa o cliente_id na URL --}}
    <a href="{{ route('pedidos.create', ['cliente_id' => $cliente_id]) }}" style="margin-right: 10px;">
        Adicionar outro pedido
    </a>

    <a href="{{ url('/') }}">Página inicial</a>
</div>
