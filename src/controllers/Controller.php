<?php

namespace App\src\controllers;

class Controller
{
    public function __construct(&$request, &$response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function callAction($method){
        try{
            $response = $this->$method();

            $this->response->success($response);

        }catch (\Exception $e){
            $this->response->error($e->getMessage());
        }
    }
}