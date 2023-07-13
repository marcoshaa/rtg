<?php

namespace App\Libraries;

class ConexaoOmint {

    private $endpoint;
    private $trace_mode;
    private $config_Omint;
    private $ci;

	public function __construct(){
		//$this->endpoint = getenv('omint.host');
	} 

    public static function getSession(){

        // Recuperando os dados da variavel de ambiente
        $url  = getenv('omint.host');
        $user = getenv('omint.user');
        $pass = getenv('omint.pass');

        // preenchendo o http body
        $body = array('screenIdentification'=>'SASFT0039','Parameters'=>[['parametername'=>'Usuario','parametervalue'=>$user],['parametername'=>'Senha','parametervalue'=>$pass]]);

        // set HTTP header
        $headers = array('Content-Type: application/json');

        // Open connection
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body) );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = json_decode(curl_exec($ch));

        if ($result->ResponseCode==0){

            // preenchendo o http body
            $body = array('userToken'=>$result->ResponseJSONData->Token,'screenIdentification'=>'SASFT0045');

            // set HTTP header
            $headers = array('Content-Type: application/json');

            // Open connection
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body) );
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            // Execute request
            $result = json_decode(curl_exec($ch));

            if ($result->ResponseCode==0){
                return $result->ResponseJSONData->SessionID;
            }
            return null;

        }

        return null;

    }

    public static function getDestinos($session){

        // Recuperando os dados da variavel de ambiente
        $url  = getenv('omint.host');

        // preenchendo o http body
        $body = array('SessionID'=>$session,'screenIdentification'=>'SASFT0001');

        // set HTTP header
        $headers = array('Content-Type: application/json');

        // Open connection
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body) );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = json_decode(curl_exec($ch));

        if ($result->ResponseCode==0){
            return $result->ResponseJSONData;
        }
        return null;

    }

    public static function getMotivosViagem($session){

        // Recuperando os dados da variavel de ambiente
        $url  = getenv('omint.host');

        // preenchendo o http body
        $body = array('SessionID'=>$session,'screenIdentification'=>'SASFT0002');

        // set HTTP header
        $headers = array('Content-Type: application/json');

        // Open connection
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body) );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = json_decode(curl_exec($ch));

        if ($result->ResponseCode==0){
            return $result->ResponseJSONData;
        }
        return null;

    }

    public static function getCotacaoViagem($data){

        // Recuperando os dados da variavel de ambiente
        $url  = getenv('omint.host');

        // set HTTP header
        $headers = array('Content-Type: application/json');

        // Open connection
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data) );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = json_decode(curl_exec($ch));

        if ($result->ResponseCode==0){
            return $result->ResponseJSONData;
        }
        return null;

    }

    public static function getFormaPagamento($data){

        // Recuperando os dados da variavel de ambiente
        $url  = getenv('omint.host');

        // set HTTP header
        $headers = array('Content-Type: application/json');

        // Open connection
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data) );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = json_decode(curl_exec($ch));

        if ($result->ResponseCode==0){
            return $result->ResponseJSONData;
        }
        return null;

    }

    public static function emissaoSeguroViagem($data){

        // Recuperando os dados da variavel de ambiente
        $url  = getenv('omint.host');

        // set HTTP header
        $headers = array('Content-Type: application/json');

        // Open connection
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data) );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = json_decode(curl_exec($ch));

        if ($result->ResponseCode==0){
            $dados_array = json_decode(json_encode($result->ResponseJSONData), true);
            return $dados_array;
        } else {
            return array('erro'=>$result->ResponseDescription);
        }

    }

    public static function cancelaSeguroViagem($data){

        // Recuperando os dados da variavel de ambiente
        $url  = getenv('omint.host');

        // set HTTP header
        $headers = array('Content-Type: application/json');

        // Open connection
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data) );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Execute request
        $result = json_decode(curl_exec($ch));

        if ($result->ResponseCode==0){
            $dados_array = json_decode(json_encode($result->ResponseJSONData), true);
            return $dados_array;
        } else {
            return array('erro'=>$result->ResponseDescription);
        }

    }

}

?>