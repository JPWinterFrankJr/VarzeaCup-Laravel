@extends('navbar')
@push('css')
<link rel="stylesheet" href="/css/telas/classificacao.css">
@endpush
@section('content')
    <h1>Tabela de Classificação</h1>

    <table border="1">
        <tr>
            <th>Posição</th>
            <th>Time</th>
            <th>Gols</th>
            <th>jogos</th>
            <th>Vitórias</th>
            <th>Derrotas</th>
            <th>Empates</th>
        </tr>

        @foreach($consulta as $result) 
        <tr>
            <td>  {{$posicao++}}  </td>
            <td> {{$result->name}}</td>
            <td> {{$result->gols}} </td>
            <td> {{$result->jogos}} </td>
            <td> {{$result->vitorias}} </td>
            <td> {{$result->derrotas}} </td>
            <td> {{$result->empates}} </td>
        </tr>

        @endforeach

    </table>
@endsection