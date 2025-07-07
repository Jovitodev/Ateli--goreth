<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
</head>
<body>
    <h1>- Atelier Goreth's -</h1>
    <h2>MENU PRINCIPAL</h2>

    <div style="margin-bottom: 20px;">
        <a href="{{ route('home.pedidos') }}" style="margin-right: 10px;">📄 Ver todos os pedidos</a>
        <a href="{{ route('clientes.create') }}" style="margin-right: 10px;">➕ Cadastrar cliente</a>
        <a href="{{ route('clientes.index') }}">👥 Visualizar clientes</a>
    </div>
</body>
</html>
