@extends('template')

@section('title', 'SongOkU')

@section('sidebar')
    @parent

    <p>Lo que va al final de la barrita :)</p>
@endsection

@section('content')
    <h1>SongOkU</h1>
    <h2>Para los fanáticos de la Música</h2>
    <p>¿Quieres saber como le va a tu artista regalón?</p>
    <form method="POST" action="{{ route('notas.crear') }}">
        @csrf
        <input
            type="text"
            name="nombre"
            placeholder="Nombre"
            class="form-control mb-2"
        />
        <input
            type="text"
            name="descripcion"
            placeholder="Descripcion"
            class="form-control mb-2"
        />
        <button class="btn btn-primary btn-block" type="submit">Enviar</button>
    </form>


@endsection
