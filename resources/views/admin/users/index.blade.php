@extends('admin.layouts.app')

@section('title', 'Usuários')

@section('content')
    <h1>Users</h1>
    <a href="{{ route('users.create') }}">Novo</a>

    @if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
             @forelse ($users as $user)
             <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('users.edit', $user->id) }}">Editar</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="100">Nenhum usuário no banco</td>
            </tr>
             @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
