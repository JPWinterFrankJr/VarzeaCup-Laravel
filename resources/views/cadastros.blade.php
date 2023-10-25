@extends('navbar')
@push('css')
@endpush
<link rel="stylesheet" href="/css/telas/cadastros.css">
@section('content')
    <div class="container">
        <div id="times">
            <a href="cadastros/cadastrar-times"> Cadastrar Times </a>
        </div>

        <div id="partidas">
            <a href="cadastros/cadastrar-partidas"> Cadastrar Partidas </a>
        </div>

        <div id="usuarios">
            <a href="{{route('cadastroUsuario.view')}}"> Cadastrar Usuarios </a>
        </div>
    </div>
@endsection
