<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Recuperação de Senha</title>
</head>

<body>
    <h1>Olá, {{ $user->name }}</h1>
    <p>Seu código para recuperar a senha é: <strong>{{ $code }}</strong></p>
    <p>Validade: {{ $formattedDate }} às {{ $formattedTime }}</p>
</body>

</html>
