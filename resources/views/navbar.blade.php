<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varzeacup</title>
    <link rel="stylesheet" href="/css/telas/navbar.css">
    @stack('css')


</head>
<body>
    
    <div class="navbar" id="myNavbar">
        <a href="/">Home</a>
        <a href="/classificacao">Classificação</a>

        @auth
        <a href="/cadastros">Cadastros</a>
        <a href="/usuarios">Usuarios</a>
        <a href="/partidas">Partidas</a>
        <a href="/sair">Sair</a>
        <p id="mensagem">Bem-vindo, {{ Auth::user()->name }}!</p>
        @else
        <a href="/logar">Logar</a>
        @endauth
    </div>
    @yield('content')
    <!-- Resto do conteúdo da página -->
</body>

</html>
