@extends('admin.layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')

    <h1>Detalhes do usuário</h1>

    <x-alert/>


    <ul>
        <li><strong>ID:</strong> {{ $user->id }}</li>
        <li><strong>Nome:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Criado em:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</li>
        <li><strong>Atualizado em:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</li>
    </ul>

    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>

@endsection