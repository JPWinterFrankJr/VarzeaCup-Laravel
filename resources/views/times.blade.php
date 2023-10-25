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
                <th>Excluir</th>
                <th>Editar</th>
            </tr>

            @if (session('success'))
                <p>{{ session('success') }}</p>
            @elseif(session('msg'))
                <p>{{ session('msg') }}</p>
            @endif

            @if ($results->count() > 0)
                @foreach ($results as $result)
                    <tr>
                        <td> {{ $result->id }} </td>
                        <td> {{ $result->name }} </td>
                        <td>
                            <form action="{{ route('deletarTime')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $result->id }}">
                                <input type="submit" id="excluir" value="Excluir">
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('viewEditarTimes') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $result->id }}">
                                <input type="submit" id="editar" value="Editar">
                            </form>
                        </td>
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
