<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuário</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Adicionar Usuário</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required>
        </div>
        <div>
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>
        <div>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" value="{{ old('cpf') }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}" required>
        </div>
        <div>
            <label for="dob">Data de Nascimento:</label>
            <input type="date" id="dob" name="dob" value="{{ old('dob') }}" required>
        </div>
        <div>
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" value="{{ old('cep') }}" required>
        </div>
        <div>
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" name="logradouro" value="{{ old('logradouro') }}">
        </div>
        <div>
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" value="{{ old('complemento') }}">
        </div>
        <div>
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" value="{{ old('bairro') }}">
        </div>
        <div>
            <label for="localidade">Localidade:</label>
            <input type="text" id="localidade" name="localidade" value="{{ old('localidade') }}">
        </div>
        <div>
            <label for="uf">UF:</label>
            <input type="text" id="uf" name="uf" value="{{ old('uf') }}">
        </div>
        <div>
            <button type="submit">Adicionar Usuário</button>
        </div>
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
</body>
</html>
