@extends('admin.layouts.app')

@section('title', 'Novo usuário')

@section('content')

    <h1>Novo usuário</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}">
        <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
        <input type="password" name="password" id="password" placeholder="Senha">
        <button type="submit">Enviar</button>
    </form>

@endsection