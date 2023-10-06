@extends('navbar')
@stack('css')
<link rel="stylesheet" href="/css/telas/tela-partidas.css">

@section('content')
@foreach ($results as $result)
    
    <div class='partida'>
        <h1 id='nome'>{{ $result->time1_nome }} x {{ $result->time2_nome }}</h1> <br>
        <h2>Partida 1</h2>
        <div class='info'>
            <!-- Fazendo a busca do numero de gols por time da partida 1 -->
            <p>{{ $result->time1_nome }} {{ $result->time1_gols1 }} X {{ $result->time2_gols1 }} {{ $result->time2_nome }}
            </p>
            <!-- Botão de editar numero de gols -->
            <a href='partidas/editar-partidas'>Editar</a>
        </div>

        <h2>Partida 2</h2>
        <div class='info'>
            <!-- Fazendo a busca do numero de gols por time da partida 2 -->
            <p>{{ $result->time1_nome }} {{ $result->time1_gols2 }} X {{ $result->time2_gols2 }} {{ $result->time2_nome }}
            </p>
            <!-- Botão de editar numero de gols -->
            <a href='partidas/editar-partidas'>Editar</a>
        </div>

        <h2>Resultado Final</h2>
        <div class='info'>
            <!-- Fazendo a busca do numero de gols por time da partida 2 -->

            <p>{{ $result->time1_nome }} {{ $result->ResultadoFinaltime1 }} X {{ $result->ResultadoFinaltime2 }}
                {{ $result->time2_nome }}</p>
        </div>
    </div>

    </div> 
@endforeach    
@endsection
