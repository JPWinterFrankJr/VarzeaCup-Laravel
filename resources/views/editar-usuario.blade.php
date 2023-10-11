@extends('navbar')
@push('css')
<link rel="stylesheet" href="../css/telas/usuarios.css">
@endpush
@section('content')
<div class="container">
    <h1>Listagem de Usuários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Salvar</th>
        </tr>


        @if ($results->count() > 0)
        @foreach ($results as $result)

        <tr>              
            <form action="{{ route('usuarios.editarUsuario')}}" method="post">
            @csrf 
            <td> {{$result->id}} </td>
            <td> <input type="text" name="name" id="name" value="{{$result->name}}"></td>
            <td> <input type="email" name="email" id="email" value="{{$result->email}}"></td>
            <td>
                <input type="hidden" name="id" id="id" value="{{$result->id}}">
                <input type="submit" id="salvar" name="salvar" value="salvar">
            </td>
        </form> 
        </tr>
        @endforeach

        @else
        <tr>
            <td colspan='3'>Nenhum usuário encontrado</td>
        </tr>

        @endif
    </table>

</div>
@endsection