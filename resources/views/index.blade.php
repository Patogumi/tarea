@extends('template')

@section('title', 'SongOkU')

@section('sidebar')
    @parent

    <p>Lo que va al final de la barrita :)</p>
@endsection

@section('content')
      <h1>SongOkU</h1>
      <h2>Tu cancionero Saijajin</h2>
      <p><a href="{{ route('app') }}">Ingresa aquí</a></p>
      <p><a href="{{ route('dbcheck') }}">Revisar la Base de Datos de Patito</a></p>
      <p><a href="{{ route('search') }}">Revisar la Base de Datos de Patito</a></p>
@endsection


