@extends('layouts.app')

@section('title', 'SongOkU')

@section('siderbar')
    @parent
        <br>
        <p>Ver la Base de Datos</p>
@endsection

@section('content')
    <h3>Ver la Base de Datos</h3>
    <p>Estas son las búsquedas que se han hecho hasta el momento: </p>

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
