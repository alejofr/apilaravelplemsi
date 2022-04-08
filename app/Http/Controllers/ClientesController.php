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

    public function cliente_id(){
        extract(request()->only(['id','ruta', 'filter']));
        //$ruta = $ruta.'/'.$id;

        $response = $this->response->requestApiGet($ruta); 
            
        return response()->json($response);
    }

    public function cliente_filtro(Request $request){
        $data = $request->all();
        $ruta = $data['ruta'];
        unset($data['ruta']);
        //$ruta = $ruta.'/'.$id;

        $response = $this->response->requestApiGetJSON($ruta,json_encode($data)); 
            
        return response()->json($response);
    }

    public function store(Request $request){
        $data = $request->all();
        $ruta = $data['ruta'];
        unset($data['ruta']);

        $response = $this->response->requestApiPost($ruta, json_encode($data)); 
    
        return response()->json($response);
      
    }

    public function actualizar(Request $request){
        $data = $request->all();
        $ruta = $data['ruta'];
        unset($data['ruta']);

        $response = $this->response->requestApiPutJSON($ruta, json_encode($data)); 
    
        return response()->json($response);
    }
}
