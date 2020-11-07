<?php

namespace App\Http\Controllers;
use App;
Use App\Exports\Log_tastesExport;
use GuzzleHttp\Client;
use Excel;
use Illuminate\Http\Request;

class ExcelController extends Controller
{

    public function exportar(){
        $usuarios = App\User::all();

        foreach ($usuarios as $usuario) {
            $nom_artista=$usuario->nombre_artista;
            $id_artista=$usuario->id_artista;
        }
      
        $client = new Client();
        $enlace_consulta = str_replace("id_artista", $id_artista, "https://api.deezer.com/artist/id_artista/top?limit=10");

        $response = $client->request('GET', $enlace_consulta);
        //  Lo comentado sirve para detectar cuando la consulta viene mala, si vuelve el valor "200" no hay drama
        //	$statusCode = $response->getStatusCode();
        $contents = (string) $response->getBody();
        $json_response=json_decode($contents, true);
        //  Lo comentado sirve para mirar el contenido de response antes de mandarlo a la vista, se debería ver bonito en JSON
        //  return $json_response;

        //Lo que sigue es el armado de la información del Excel que se exportará, usando LaravelExcel en su modo de exportar Array
        $a=0;
        foreach ($json_response["data"] as $avanti)
        {
            $titulo=$avanti['title'];
            $album=$avanti['album']['title'];
            $datos[$a]=array(
                "#"=> $a+1,
                "Título"=> $titulo,
                "Album"=> $album);
            $a=$a+1;
        };

        $export=new Log_tastesExport([
            ['Artista', $nom_artista],
            ['ID', $id_artista],
            ['Fecha', date("Y-m-d h:i:sa")],
            [ ],
            ['#', 'Título', 'Album'],
            $datos
        ]);
        return Excel::download($export, 'log_tastes.xlsx');
    }



}
