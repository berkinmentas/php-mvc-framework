<?php
namespace App\lib;
class Response
{
    public static function success($data = null){

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if (is_a($data, View::class)) {
            http_response_code(200);
            header('Content-type: text/html');

            echo $data->__toString();
            return;
        }

        http_response_code(200);
        if(is_array($data) || is_object($data)){
            $data = json_decode(json_encode($data),true);
            header("Content-type: application/json; charset=UTF-8");
            echo json_encode($data);
            return;
        }
        return $data;

    }

    public static function error($data = []){
        http_response_code(500);
        if(is_array($data) || is_object($data)){
            $data = json_decode(json_encode($data),true);
            header("Content-type: application/json; charset=UTF-8");
            echo json_encode($data);
            return;
        }
        echo $data;
        return;
    }
}

