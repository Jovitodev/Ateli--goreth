@extends('layouts.app') {{-- Ou o seu layout principal --}}

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
        </div>

        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" required>
        </div>

        <div class="form-group">
            <label for="idade">Idade:</label>
            <input type="number" name="idade" class="form-control" value="{{ $cliente->idade }}">
        </div>

        <div class="form-group">
            <label for="local">Local:</label>
            <input type="text" name="local" class="form-control" value="{{ $cliente->local }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
