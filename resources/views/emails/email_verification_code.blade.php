<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Código de Verificação</title>
</head>

<body>
    <h1>Olá, {{ $user->name }}</h1>
    <p>Seu código de verificação é: <strong>{{ $code }}</strong></p>
    <p>Validade: {{ $formattedDate }} às {{ $formattedTime }}</p>
    <p>Clique no link para confirmar: <a href="{{ $url }}">Confirmar E-mail</a></p>
</body>

</html>
