<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function app(){
        return view('songoku');
    }

    public function crear(Request $request){
        //echo "Hello world!<br>";
        return $request->all();
    }

}
