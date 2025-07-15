<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Clientes Cadastrados - Atelier Goreth's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">← Voltar | Clientes Cadastrados</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4">👥 Lista de Clientes Cadastrados</h2>

        @if ($clientes->isEmpty())
            <div class="alert alert-info">Nenhum cliente cadastrado até o momento.</div>
        @else
            <table class="table table-striped table-bordered shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Detalhes</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-outline-info">
                                    Ver detalhes
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-outline-warning">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="mt-3">
            <a href="{{ route('clientes.create') }}" class="btn btn-success">➕ Cadastrar Novo Cliente</a>
        </div>
    </div>

    <footer class="text-center text-muted mt-5 mb-3">
        <small>Desenvolvido por João Victor | UFMA © {{ date('Y') }}</small>
    </footer>

</body>
</html>
