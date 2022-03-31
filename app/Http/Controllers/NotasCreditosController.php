<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotasCreditosController extends Controller
{
    //
    public $response;
    public function __construct() {
        $this->response = new RequestApiController;
    }

    public function index(){
        extract(request()->only(['parent','filterByCustomer','filterByInvoiceNumber','page', 'perPage', 'ruta']));

        $response = $this->response->requestApiGet($ruta, [
            "page" => $page,
            "perPage" => $perPage,
            "parent" => $parent,
            "filterByCustomer" => $filterByCustomer,
            "filterByInvoiceNumber" => $filterByInvoiceNumber
        ]); 
            
        return response()->json($response);
    }
}
