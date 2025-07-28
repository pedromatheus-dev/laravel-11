@extends('admin.layouts.app')

@section('title', 'Novo usuário')

@section('content')

<h1>Novo usuário</h1>

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <input type="text" name="name" id="name" placeholder="Nome">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="password" name="password" id="password" placeholder="Senha">
    <button type="submit">Enviar</button>
</form>

@endsection