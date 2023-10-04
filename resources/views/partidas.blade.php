<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Partidas</title>
    <link rel="stylesheet" href="/css/telas/tela_partidas.css">
</head>

<body>
    @include('navbar')


        <div class='partida'>
        <h1 id='nome'>{{$result->time1_nome}} x {{$result->time2_nome}}</h1> <br>
       <h2>Partida 1</h2>
        <div class='info'>
        <!-- Fazendo a busca do numero de gols por time da partida 1 -->
        <p>{{$result->time1_nome}} {{$result->time1_gols1}} X {{$result->time2_gols1}} {{$result->time2_nome}}</p>
        <!-- Botão de editar numero de gols -->
        <a href='/partidas/editarpartidas'>Editar</a>
        </div>

        <h2>Partida 2</h2>
        <div class='info'>
        <!-- Fazendo a busca do numero de gols por time da partida 2 -->
        <p>{{$result->time1_nome}} {{$result->time1_gols2}} X {{$result->time2_gols2}} {{$result->time2_nome}}</p>
      <!-- Botão de editar numero de gols -->
        <a href='/partidas/editarpartidas'>Editar</a>
        </div>

        <h2>Resultado Final</h2>
        <div class='info'>
        <!-- Fazendo a busca do numero de gols por time da partida 2 -->

        <p>{{$result->time1_nome}} {{$result->ResultadoFinaltime1}} X {{$result->ResultadoFinaltime2}} {{$result->time2_nome}}</p>
        </div>
        </div>
    
    </div>
</body>

</html>