@extends('navbar')
@stack('css')
<link rel="stylesheet" href="/css/telas/logar.css">

@section('content')
    <div class="container">

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
