<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Partidas</title>
    <link rel="stylesheet" href="/css/telas/editar_partidas.css">

</head>

<body>
    @include('navbar')


    <div class='partida'>
        <h1 id='nome'>{{$result->time1_nome}} x {{$result->time2_nome}}</h1> <br>
        <h2>Partida 1</h2>
        <div class='info'>
            <form method='POST' action="{{route('salvar-partida')}}">
            @csrf

            <input type='hidden' name='partida_id' value='{{$result->id}}'>


            {{$result->time1_nome}} {{$result->time1_gols1}}
            <input type='number' name='time1_gols1' value='{{$result->time1_gols1}}'>
            X
            <input type='number' name='time2_gols1' value='{{$result->time2_gols1}}'>
            {{$result->time2_gols1}} {{$result->time2_nome}}

        </div>


        <h2>Partida 2</h2>
        <div class='info'>
            <input type='hidden' name='partida_id' value='{{$result->id}}'>
            {{$result->time1_nome}} {{$result->time1_gols2}}
            <input type='number' name='time1_gols2' value='{{$result->time1_gols2}}'>
            X
            {{$result->time2_gols2}} {{$result->time2_nome}}
            <input type='number' name='time2_gols2' value='{{$result->time2_gols2}}'>
            
            <input type='submit' name='Salvar' value='Salvar'>

            </form>
        </div>

    </div>

</body>

</html>