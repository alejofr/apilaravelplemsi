<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestApiController extends Controller
{
    //
    public $token = '6233875dc7c3d93aa89c017d';
 
    public function requestConstructor($methodo, $url, $json = ""){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        if( $methodo == 'GET' ){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        }else if( $methodo == 'POST' ){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        }else if( $methodo == "PUT" ){
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        }

        if ( $json != "" ){
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: ".$this->token."",
            "Accept: text/json"
        ));

        $response = curl_exec($curl);
        curl_close($curl);

	    return json_decode($response);
    }

    public function requestApiGet($ruta,$paraments = []){
        $url = $ruta;
        $aux = "";
        $count = count($paraments) - 1;
        $i = 0;

        foreach ($paraments as $key => $value) {
            if( $i == 0 ){
                $aux = $aux . $key.'='.$value;
            }else if( $i != $count ){
                $aux = $aux.'&'.$key.'='.$value;
            }else{
                $aux = $aux.'&'.$key.'='.$value;
            }

            $i++;
        }

        $url = ( count($paraments) != 0 ) ? $url.'?'.$aux : $url;
        return $this->requestConstructor('GET', $url);
    }

    public function requestApiPost($ruta,$data){
        return $this->requestConstructor('POST', $ruta, $data);
    }

    public function requestApiGetJSON($ruta,$data){
        return $this->requestConstructor('GET', $ruta, $data);
    }

    public function requestApiPutJSON($ruta,$data){
        return $this->requestConstructor('PUT', $ruta, $data);
    }
}
