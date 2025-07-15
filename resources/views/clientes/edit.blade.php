@extends('layouts.app')

@section('title', 'Editar Cliente - ' . $cliente->nome)

@section('content')
<div class="container">
    <h2 class="mb-4">📝 Editando: {{ $cliente->nome }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Erros encontrados:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="card p-4 shadow-sm bg-white">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $cliente->cpf) }}" required>
        </div>

        <div class="mb-3">
            <label for="idade" class="form-label">Idade:</label>
            <input type="number" name="idade" id="idade" class="form-control" value="{{ old('idade', $cliente->idade) }}">
        </div>

        <div class="mb-3">
            <label for="local" class="form-label">Local:</label>
            <input type="text" name="local" id="local" class="form-control" value="{{ old('local', $cliente->local) }}">
        </div>

        <button type="submit" class="btn btn-success">💾 Salvar alterações de {{ $cliente->nome }}</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
</div>
@endsection
