<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    <p><a href="{{ route('users.create') }}">Adicionar Novo Usuário</a></p>

    <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
