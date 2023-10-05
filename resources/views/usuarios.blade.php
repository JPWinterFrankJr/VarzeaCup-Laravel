@extends('navbar')

@push('css')
<link rel="stylesheet" href="css/telas/usuarios.css">
@endpush

@section('content')
<div class="container">
    <h1>Listagem de Usuários</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>


        @if ($results->count() > 0)
        @foreach ($results as $result)

        <tr>
            <td> {{$result->id}} </td>
            <td> {{$result->name}} </td>
            <td> {{$result->email}} </td>
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