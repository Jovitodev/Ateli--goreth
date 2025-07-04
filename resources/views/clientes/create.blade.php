<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Cliente</title>
</head>
<body>
    <h1>Novo Cliente</h1>
    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf
        <label>Nome:</label><br>
        <input type="text" name="nome"><br>

        <label>CPF:</label><br>
        <input type="text" name="cpf"><br>

        <label>Idade:</label><br>
        <input type="number" name="idade"><br>

        <label>Local:</label><br>
        <input type="text" name="local"><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
