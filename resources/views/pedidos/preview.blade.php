<h1>- Atelier Goreth's -</h1>
<br>
<h2>Confirme os dados do Pedido</h2>

<p><strong>Cliente:</strong> {{ $cliente->nome }}</p>
<p><strong>Tipo do Pedido:</strong> {{ $validated['tipo_pedido'] }}</p>
<p><strong>Valor:</strong> R$ {{ number_format($validated['valor'], 2, ',', '.') }}</p>
<p><strong>Status de Pagamento:</strong> {{ ucfirst($validated['status_pagamento']) }}</p>
<p><strong>Status de Execução:</strong> {{ ucfirst($validated['status_execucao']) }}</p>

<form action="{{ route('pedidos.confirm') }}" method="POST">
    @csrf
    @foreach ($validated as $name => $value)
        <input type="hidden" name="{{ $name }}" value="{{ old($name, $value) }}">
    @endforeach
    <button type="submit">Confirmar e Salvar</button>
</form>

<br>
<a href="{{ url()->previous() }}">← Voltar e Editar</a>
