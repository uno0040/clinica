<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>
</head>
<body>
    <h1>Detalhes do Usuário</h1>
    <p><strong>Username:</strong> {{ $user->username }}</p>
    <p><strong>Nome:</strong> {{ $user->name }}</p>
    <p><strong>Senha:</strong> {{ $user->senha }}</p>
    <p><strong>CPF:</strong> {{ $user->cpf }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Telefone:</strong> {{ $user->telefone }}</p>
    <p><strong>Data de Nascimento:</strong> {{ $user->dob }}</p>
    <p><strong>CEP:</strong> {{ $user->cep }}</p>
    <p><strong>Logradouro:</strong> {{ $user->logradouro }}</p>
    <p><strong>Complemento:</strong> {{ $user->complemento }}</p>
    <p><strong>Bairro:</strong> {{ $user->bairro }}</p>
    <p><strong>Localidade:</strong> {{ $user->localidade }}</p>
    <p><strong>UF:</strong> {{ $user->uf }}</p>
    <p><a href="{{ route('users.index') }}">Voltar à lista de usuários</a></p>
</body>
</html>
