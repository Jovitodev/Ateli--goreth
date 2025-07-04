<!DOCTYPE html>
<html>
<head>
    <title>Novo Pedido</title>
</head>
<body>
    <h1>Novo Pedido</h1>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('pedidos.store') }}" method="POST">
    @csrf

    <label>Cliente:</label>
    <select name="cliente_id">
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
        @endforeach
    </select><br>

    <label>Tipo do Pedido:</label>
    <input type="text" name="tipo"><br>

    <label>Valor:</label>
    <input type="number" step="0.01" name="valor"><br>

    <label>Pago?</label>
    <select name="pago">
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select><br>

    <label>Status:</label>
    <input type="text" name="status"><br>

    <button type="submit">Salvar</button>
</form>

</body>
</html>
