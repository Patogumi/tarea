@extends('template')

@section('title', 'SongOkU')

@section('special')
<!-- amCharts javascript code -->
    <script type="text/javascript">
        AmCharts.makeChart("chartdiv",
            @php echo $vari @endphp
        );
    </script>
@endsection



@section('sidebar')
    @parent

    <p>Acá está el buscador</p>
@endsection

@section('content')
    <h1>SongOkU</h1>
    <h2>Para los fanáticos de la Música</h2>
    <p>¿Quieres saber como le va a tus artistas favoritos?</p>

    <form method="POST" action="{{ route('searcho') }}">
        @csrf
        <input
            type="text"
            name="valor"
            placeholder="Escribe acá poh mierda"
            class="form-control mb-2"
        />
        <button class="btn btn-primary btn-block" type="submit">Enviar</button>
    </form>

    <table class="table table-dark">
        <thead>
            <tr>
            @foreach($json_response['data'] as $result)
                <th scope="col"><p>{!! $result['title'] !!}</p></th>
            @endforeach    
            </tr>
        </thead>
        <tbody>
            <tr>
            @foreach($json_response['data'] as $result)
                <td> <img src= "<?php echo $result['album']['cover_small']; ?>" alt=""></td>
            @endforeach
            </tr>
            <tr>
            @foreach($json_response['data'] as $result)
                <td><p>{!! $result['album']['title'] !!}</p></td>
            @endforeach
            </tr>
            <tr>
            @foreach($json_response['data'] as $result)
                <td><p>{!! $result['artist']['name'] !!}</p></td>
            @endforeach
            </tr>
            <tr>
            @foreach($json_response['data'] as $result)
                <td><p><a href="{!! $result['preview'] !!}">Fragmento</a>  </p></td>
            @endforeach
            </tr>
        </tbody>
        </table>

        <div id="chartdiv" style="width: 100%; height: 400px; background-color: #282828;" ></div>


@endsection
