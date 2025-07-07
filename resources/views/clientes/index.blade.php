<!DOCTYPE html>
<html>
<head>
    <title>Clientes Cadastrados</title>
</head>
<body>
    <h1>- Atelier Goreth's -</h1>
    <br>
    <h2>Clientes Cadastrados</h2>
    <ul>
        @foreach($clientes as $cliente)
            <li>
                <a href="{{ route('clientes.show', $cliente->id) }}">
                    {{ $cliente->nome }} <br>
                </a>
            
                <a href="{{ route('clientes.edit', $cliente->id) }}">Editar <br></a>
                <br>
            </li>
        @endforeach
    </ul>

    <a href="{{ url('/') }}">Voltar à Página Inicial</a>
</body>
</html>
