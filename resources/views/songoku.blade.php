@extends('template')

@section('title', 'SongOkU')

@section('sidebar')
    @parent

    <p>Lo que va al final de la barrita :)</p>
@endsection

@section('content')
      <h1>SongOkU</h1>
      <h2>Tu cancionero saijajin</h2>
      <p>¡Acá te presentamos los éxitos más excitados!</p>
      <p>De {{ $artista }}</p>
@endsection
