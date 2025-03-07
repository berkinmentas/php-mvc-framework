<?php

namespace App\src\middlewares;
class RequestMiddleware
{
    public function handle(&$request){
        if(!isset($request->route)){
            throw new \Exception("Route Not Found");
        }

    }
}