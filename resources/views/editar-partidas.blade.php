@extends('navbar')
@stack('css')
<link rel="stylesheet" href="/css/telas/editar-partidas.css">

@section('content')
@foreach ($results as $result)
    <div class='partida'>
        <h1 id='nome'>{{ $result->time1_nome }} x {{ $result->time2_nome }}</h1> <br>
        <h2>Partida 1</h2>
        <div class='info'>
            <form method='POST' action="{{ route('salvarPartida') }}">
                @csrf

                <input type='hidden' name='partida_id' value='{{ $result->id }}'>


                {{ $result->time1_nome }} {{ $result->time1_gols1 }}
                <input type='number' name='time1_gols1' value='{{ $result->time1_gols1 }}'>
                X
                <input type='number' name='time2_gols1' value='{{ $result->time2_gols1 }}'>
                {{ $result->time2_gols1 }} {{ $result->time2_nome }}

        </div>


        <h2>Partida 2</h2>
        <div class='info'>
            <input type='hidden' name='partida_id' value='{{ $result->id }}'>
            {{ $result->time1_nome }} {{ $result->time1_gols2 }}
            <input type='number' name='time1_gols2' value='{{ $result->time1_gols2 }}'>
            X
            <input type='number' name='time2_gols2' value='{{ $result->time2_gols2 }}'>
            {{ $result->time2_gols2 }} {{ $result->time2_nome }}

            <input type='submit' id="salvar" name='Salvar' value='Salvar'>

            </form>
        </div>

    </div>
@endforeach    
@endsection
