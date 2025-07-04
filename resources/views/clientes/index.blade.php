<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <a href="{{ route('clientes.create') }}">Cadastrar novo cliente</a>
    <ul>
        @foreach($clientes as $cliente)
            <li>
                {{ $cliente->nome }} - {{ $cliente->cpf }}
                <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
