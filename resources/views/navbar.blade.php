<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varzeacup</title>
    <link rel="stylesheet" href="/css/telas/navbar.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
    @stack('css')

</head>
<body>
    
    <div class="navbar" id="myNavbar">
        <a href="/">Home</a>
        <a href="/classificacao">Classificação</a>

        @auth
        <a href="/cadastros">Cadastros</a>
        <a href="/usuarios">Usuarios</a>
        <a href="/times">Times</a>
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
