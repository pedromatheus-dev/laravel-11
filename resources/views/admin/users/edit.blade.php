@extends('admin.layouts.app')

@section('title', 'Editar usuário')

@section('content')

    <h1>Editar usuário {{$user->name}}</h1>

    <x-alert/>

    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf()
        @method('PUT')
        <input type="text" name="name" id="name" placeholder="Nome" value="{{ $user->name }}">
        <input type="email" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
        <input type="password" name="password" id="password" placeholder="Senha">
        <button type="submit">Enviar</button>
    </form>

@endsection