@extends('navbar')
@push('css')
<link rel="stylesheet" href="/css/telas/logar.css">
@endpush
@section('content')
@if( session('msg-logout'))
    <p>{{ session('msg-logout')}}</p>
@endif
    <div class="container">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif

        <form action="{{ route('entrar') }}" method="post" class="formulario">
            @csrf
            <h1>Logar</h1>
            <div>
                <label for="">E-mail</label><br>
                <input type="email" name="email" id="email" placeholder="digite seu e-mail" require_once>
                <br><br>

                <label for="">Senha</label><br>
                <input type="password" name="password" id="password" placeholder="Digite sua senha" require_once>
                <br><br>

                <input type="submit" id="entrar" value="Entrar">
            </div>
        </form>
    </div>
@endsection
