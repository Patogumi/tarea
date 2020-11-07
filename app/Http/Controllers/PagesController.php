<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App;
use GuzzleHttp\Client;


class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function dbcheck(){
        $log = App\Log_reporte::all();
        return view('dbcheck',compact('log'));
    }

    public function app(){
        return view('songoku');
    }

    public function crear(Request $request){
        return $request->all();
    }

    public function jsonapi(Request $request){
        $art=$request->input('valor');
        $bandera=true;
        if ($art==NULL){
            $art = 647;
            $bandera = false;
        }
          
        $client = new Client();
        $enlace_consulta = str_replace("id_artista", $art, "https://api.deezer.com/artist/id_artista/top?limit=10");

        $response = $client->request('GET', $enlace_consulta);
        //  Lo comentado sirve para detectar cuando la consulta viene mala, si vuelve el valor "200" no hay drama
        //	$statusCode = $response->getStatusCode();
        $contents = (string) $response->getBody();
        $json_response=json_decode($contents, true);
        //  Lo comentado sirve para mirar el contenido de response antes de mandarlo a la vista, se debería ver bonito en JSON
        //  return $json_response;
        if ($bandera){
            $logNuevo = new App\Log_reporte;
            $logNuevo->nombre_artista = $json_response["data"]["0"]['artist']['name'];
            $logNuevo->fecha_busqueda = date("Y-m-d H:i:s");
            $logNuevo->user_id = auth()->id();
            $logNuevo->save();
        }
        $a=0;
        foreach ($json_response["data"] as $avanti)
        {
            $titulo=$avanti['title'];
            $ranking=$avanti['rank'];
            $titulo_breve=substr($titulo,0,10);
            $ranking_breve=substr($ranking,0,12);
            $datos[$a]=array(
                "category"=> $titulo_breve,
                "column-1"=> $ranking_breve);

            $a=$a+1;
        };

        $arr = array(
            "type"=> "serial",
            "categoryField"=> "category",
            "startDuration"=> 1,
            "handDrawn"=> false,
            "theme"=> "chalk",
            "categoryAxis"=>array(
                "gridPosition"=> "start"
            ),
            "trendLines"=> [],
            "graphs"=> [
                array(
                    "balloonText"=> "[[title]] de [[category]]:[[value]]",
                    "bullet"=> "round",
                    "id"=> "AmGraph-1",
                    "title"=> "Reproducciones",
                    "valueField"=> "column-1"
                )
            ],
            "guides"=> [],
            "valueAxes"=> [
                array(
                    "id"=> "ValueAxis-1",
                    "title"=> "Veces escuchada"
                )
            ],
            "allLabels"=> [],
            "balloon"=> array(),
            "legend"=> array(
                "enabled"=> true,
                "tabIndex"=> -2,
                "useGraphSettings"=> true
            ),
            "titles"=> [
                array(
                    "id"=> "Title-1",
                    "size"=> 15,
                    "text"=> "Top 10 del Artista",
                )
            ],
            "dataProvider"=> $datos
        );

        //Lo siguiente es para recordar el último artista buscado por el usuario registrado
        $id = Auth::id();
        $usuario = App\User::find($id);
        $usuario->nombre_artista = $json_response["data"]["0"]['artist']['name'];
        $usuario->id_artista = $art;
        $usuario->save();




        $vari = json_encode($arr);
        //return $vari;
        $json_vari=json_decode($vari, true);
        return view('info',compact('json_response','vari'));
    }

    public function crearo(Request $request){
        //echo "Hello world!<br>";
        return $request->all();
    }

    public function am(){

        $arr = array(
            "type"=> "serial",
            "categoryField"=> "category",
            "startDuration"=> 1,
            "handDrawn"=> false,
            "theme"=> "chalk",
            "categoryAxis"=>array(
                "gridPosition"=> "start"
            ),
            "trendLines"=> [],
            "graphs"=> [
                array(
                    "balloonText"=> "[[title]] of [[category]]:[[value]]",
                    "bullet"=> "round",
                    "id"=> "AmGraph-1",
                    "title"=> "graph 1",
                    "valueField"=> "column-1"
                )
            ],
            "guides"=> [],
            "valueAxes"=> [
                array(
                    "id"=> "ValueAxis-1",
                    "title"=> "Axis title"
                )
            ],
            "allLabels"=> [],
            "balloon"=> array(),
            "legend"=> array(
                "enabled"=> true,
                "tabIndex"=> -2,
                "useGraphSettings"=> true
            ),
            "titles"=> [
                array(
                    "id"=> "Title-1",
                    "size"=> 15,
                    "text"=> "Chart Title",
                )
            ],
            "dataProvider"=> [
                array(
                    "category"=> "category 1",
                    "column-1"=> 8
                ),
            ]
        );

        $vari = json_encode($arr);
        //return $vari;
        $json_vari=json_decode($vari, true);
        return $json_vari;

    }

}
