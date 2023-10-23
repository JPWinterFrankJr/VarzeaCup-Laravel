@extends('navbar')
@stack('css')
<link rel="stylesheet" href="/css/telas/cadastrar-times.css">
@section('content')
@if( session('success'))
    <p>{{ session('success')}}</p>
@endif
    <div class="container">
        <form action="{{ route('cadastroTime.cadastrar') }}" method="POST" class="formulario">
            @csrf
            <label>Cadastrar o time</label><br>
            <input type="text" name="name" id="name" placeholder="Digite o nome do time">
            <br><br>
            <input type="submit" name="submit" id="submit" value="Cadastrar">
        </form>
    </div>
@endsection
