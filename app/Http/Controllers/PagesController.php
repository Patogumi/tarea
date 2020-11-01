<?php

namespace App\Http\Controllers;

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
        //echo "Hello world!<br>";
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
        $enlace_consulta = str_replace("numero_de_artista", $art, "https://api.deezer.com/artist/numero_de_artista/top?limit=10");

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
            $logNuevo->save();
        }
        
        return view('info',compact('json_response'));

    }

    public function crearo(Request $request){
        //echo "Hello world!<br>";
        return $request->all();
    }

}
