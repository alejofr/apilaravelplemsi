<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RequestApiController;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class FacturasApiController extends Controller
{
    //
    public $response;
    public function __construct() {
        $this->response = new RequestApiController;
    }

    public function index(){
        extract(request()->only(['page', 'perPage', 'ruta']));

        $response = $this->response->requestApiGet($ruta,[
            "page" => $page,
            "perPage" => $perPage
        ]); 
            
        return response()->json($response);
    }

    public function store(Request $request){
        $data = $request->all();
        $ruta = $data['ruta'];
        unset($data['ruta']);

        $response = $this->response->requestApiPost($ruta, json_encode($data)); 

        return response()->json($response);
    }

    public function obtener_factura(){
        extract(request()->only(['by', 'value', 'ruta']));

        $response = $this->response->requestApiGet($ruta,[
            "by" => $by,
            "value" => $value
        ]); 
            
        return response()->json($response);
    }

    

}
