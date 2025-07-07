<!DOCTYPE html>
<html>
<head>
    <title>Todos os Pedidos</title>
</head>
<body>
    <h1>- Atelier Goreth's -</h1>
    <br>
    <h2>Todos os Pedidos</h2>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Tipo do Pedido</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->cliente->nome ?? 'Cliente não encontrado' }}</td>
                    <td>{{ $pedido->tipo_pedido }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
    <a href="{{ route('home') }}">← Voltar para Página Inicial</a>
    <br>
</body>
</html>
