@extends('layouts.app')

@section('title', 'SongOkU')

@section('sidebar')
    @parent
    <br>
    <p>La aplicación</p>
@endsection

@section('content')
    <h3>La aplicación</h3>
    <p>¿Quieres saber como le va a tu artista regalón? ¿Graficar sus éxitos y disfrutar de una planilla? ¡Dale! </p>
    <form method="POST" action="{{ route('crear') }}">
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
