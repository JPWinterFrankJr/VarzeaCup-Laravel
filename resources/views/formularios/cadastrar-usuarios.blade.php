@extends('navbar')
@push('css')
<link rel="stylesheet" href="/css/telas/cadastrar-usuario.css">
@endpush
@section('content')
    @if( session('success'))
        <p>{{ session('success')}}</p>
    @elseif( session('erro'))
        <p>{{ session('erro')}}</p>
    @endif
    <div class="container">
        <form action="{{ route('cadastroUsuario.cadastrar') }}" method="post" class="formulario">
            @csrf
            <h1>Cadastrar Usuário</h1>
            <label>Nome</label><br>
            <input type="text" name="name" id="name" placeholder="Digite o seu nome">
            <br><br>
            <label>E-mail</label><br>
            <input type="email" name="email" id="email" placeholder="Digite o seu melhor e-mail">
            <br><br>
            <label>Senha</label><br>
            <input type="password" name="password" id="password" placeholder="Digite sua senha">
            <br><br>
            <input type="submit" name="submit" id="cadastrar" value="Cadastrar">
        </form>
    </div>
@endsection
