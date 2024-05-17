@extends('layout')

@section('title', 'Editar Usuário')

@section('content')
    <h1>Editar Usuário</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
        </div>
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control" value="{{ old('cpf', $user->cpf) }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" class="form-control" value="{{ old('telefone', $user->telefone) }}" required>
        </div>
        <div class="form-group">
            <label for="dob">Data de Nascimento:</label>
            <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', $user->dob) }}" required>
        </div>
        <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" class="form-control" value="{{ old('cep', $user->cep) }}" required>
        </div>
        <div class="form-group">
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" class="form-control" value="{{ old('logradouro', $user->logradouro) }}">
        </div>
        <div class="form-group">
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" class="form-control" value="{{ old('complemento', $user->complemento) }}">
        </div>
        <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" class="form-control" value="{{ old('bairro', $user->bairro) }}">
        </div>
        <div class="form-group">
            <label for="localidade">Localidade:</label>
            <input type="text" id="localidade" name="localidade" class="form-control" value="{{ old('localidade', $user->localidade) }}">
        </div>
        <div class="form-group">
            <label for="uf">UF:</label>
            <input type="text" id="uf" name="uf" class="form-control" value="{{ old('uf', $user->uf) }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Usuário</button>
    </form>

    <p><a href="{{ route('users.index') }}">Voltar à lista de usuários</a></p>

    <script>
        $(document).ready(function() {
            $('#cep').on('blur', function() {
                var cep = $(this).val().replace(/\D/g, '');
                if (cep !== '') {
                    $.getJSON('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
                        if (!("erro" in data)) {
                            $('#logradouro').val(data.logradouro);
                            $('#bairro').val(data.bairro);
                            $('#localidade').val(data.localidade);
                            $('#uf').val(data.uf);
                        } else {
                            alert('CEP não encontrado.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
