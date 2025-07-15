<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Atelier Goreth's | Página Inicial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">Atelier Goreth's ✂️</span>
        </div>
    </nav>

    <div class="container mt-5">

        <div class="text-center mb-4">
            <h1 class="fw-bold">Bem-vindo(a) ao sistema do Atelier Goreth's!</h1>
            <p class="lead">Escolha uma das opções abaixo para continuar:</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">📄 Painel de pedidos</h5>
                        <a href="{{ route('home.pedidos') }}" class="btn btn-outline-primary mt-2">Acessar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">➕ Cadastrar cliente</h5>
                        <a href="{{ route('clientes.create') }}" class="btn btn-outline-success mt-2">Cadastrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">👥 Visualizar clientes</h5>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary mt-2">Ver Lista</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="text-center text-muted mt-5 mb-3">
        <small>Desenvolvido por João Victor | UFMA © {{ date('Y') }}</small>
    </footer>

</body>
</html>
