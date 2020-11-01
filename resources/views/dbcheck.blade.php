@extends('template')

@section('title', 'SongOkU')

@section('sidebar')
    @parent

    <p>Acá se revisar la base de datos.</p>
@endsection

@section('content')
    <h1>SongOkU</h1>
    <h2>Para los fanáticos de la Música</h2>
    <p>¿Quieres revisar la base de datos de patito? :P</p>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Artista</th>
                <th scope="col">Fecha</th>
                <th scope="col">Spare</th>
            </tr>
        </thead>
        <tbody>
        @foreach($log as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{$item->nombre_artista}}</td>
                <td>{{$item->fecha_busqueda}}</td>
                <td> </td>
            </tr>
        @endforeach
        </tbody>
        </table>


@endsection
