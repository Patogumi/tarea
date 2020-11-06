@extends('layouts.app')

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

    <p>La aplicación</p>
@endsection

@section('content')
    <h3>La aplicación</h3>
    <p>¿Quieres saber como le va a tu artista regalón? ¿Graficar sus éxitos y disfrutar de una planilla? ¡Dale! </p>

    <form method="POST" action="{{ route('searcho') }}">
        @csrf
        <input
            type="text"
            name="valor"
            placeholder="Black Sabbath"
            class="form-control m3-2 col-3"
        />
        <button class="btn btn-primary btn-block m-3 col-2" type="submit">Revisar</button>
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
