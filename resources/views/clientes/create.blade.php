<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Cadastrar Cliente - Atelier Goreth's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('clientes.index') }}">← Voltar | Cadastro de Cliente</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4">📝 Cadastrar Novo Cliente</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erros encontrados:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('clientes.store') }}" class="card p-4 shadow-sm bg-white">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control" placeholder="000.000.000-00" required>
            </div>

            <div class="mb-3">
                <label for="idade" class="form-label">Idade:</label>
                <input type="number" name="idade" id="idade" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="local" class="form-label">Local:</label>
                <input type="text" name="local" id="local" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Salvar Cliente</button>
        </form>
    </div>

    <footer class="text-center text-muted mt-5 mb-3">
        <small>Desenvolvido por João Victor | UFMA © {{ date('Y') }}</small>
    </footer>

</body>
</html>
