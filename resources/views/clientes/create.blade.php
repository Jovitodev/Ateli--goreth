<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Cliente</title>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form {
            max-width: 400px;
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input {
            width: 100%;
            padding: 8px;
        }
        button {
            margin-top: 15px;
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <h1>Novo Cliente</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required placeholder="000.000.000-00">

        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" required>

        <label for="local">Local:</label>
        <input type="text" name="local" id="local" required>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
