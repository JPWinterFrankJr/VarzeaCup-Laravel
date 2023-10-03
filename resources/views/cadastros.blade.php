<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varzeacup</title>
</head>
<style>
    .container {
        text-align: center;
        font-size: 30px;
        margin-top: 250px;
    }

    .container a {
        display: inline-block;
        position: block;
        width: 350px;
        height: 40px;
        margin: 5px;
        background-color: #333;
        text-decoration: none;
        color: white;
        border-radius: 5px;

    }

    .container a:hover {
        color: #333;
        background: #ddd;
    }

    /* Responsividade */
    @media screen and (max-width: 600px) {
        .container {
            margin-top: 50px;
        }
    }
</style>

<body>
@include('navbar')
    <div class="container">
        <div id="times">
            <a href="cadastros/cadastrar_times"> Cadastrar Times </a>
        </div>

        <div id="partidas">
            <a href="cadastros/cadastrar_partidas"> Cadastrar Partidas </a>
        </div>

        <div id="usuarios">
            <a href="cadastros/cadastrar_usuarios"> Cadastrar Usuarios </a>
        </div>
    </div>



</body>

</html>