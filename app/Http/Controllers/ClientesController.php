<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public $response;
    public function __construct() {
        $this->response = new RequestApiController;

    }
    public function index(){
        extract(request()->only(['ruta']));

       
        $response = $this->response->requestApiGet($ruta); 
            
        return response()->json($response);
    }

    public function show(){
        extract(request()->only(['id','ruta', 'filter']));
        $ruta = $ruta.'/'.$id;

        $response = $this->response->requestApiGet($ruta); 
            
        return response()->json($response);
    }
}
