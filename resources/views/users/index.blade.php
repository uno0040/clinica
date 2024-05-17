@extends('layout')

@section('title', 'Lista de Usuários')

@section('content')
    <h1>Lista de Usuários</h1>

    <p><a href="{{ route('users.create') }}" class="btn btn-primary">Adicionar Novo Usuário</a></p>

    <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary btn-sm">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
