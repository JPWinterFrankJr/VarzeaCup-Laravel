@extends('navbar')
@push('css')
<link rel="stylesheet" href="/css/telas/cadastrar-times.css">
@endpush
@section('content')
@if( session('success'))
    <p>{{ session('success')}}</p>
@elseif( session('erro'))
    <p>{{ session('erro')}}</p>
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
