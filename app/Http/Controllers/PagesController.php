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

    public function jsonapi(){
        $client = new Client();

        $response = $client->request('GET', 'https://api.deezer.com/artist/647/top?limit=10');
    //	$statusCode = $response->getStatusCode();
        $contents = (string) $response->getBody();
        $json_response=json_decode($contents, true);
    //  return $json_response;
        return view('info',compact('json_response'));

    }
}
