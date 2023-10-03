<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varzeacup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        #mensagem {
            color: white;
        }
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Responsividade */
        @media screen and (max-width: 600px) {
            .navbar a {
                float: none;
                display: block;
                text-align: left;
            }
        }


        @media screen and (max-width: 600px) {
            .navbar.responsive {
                position: relative;
            }

            .navbar.responsive a {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                padding: 14px 20px;
                border-top: 1px solid #ddd;
            }
        }
    </style>
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

    <!-- Resto do conteúdo da página -->
</body>

</html>