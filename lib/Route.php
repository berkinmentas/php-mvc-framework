<?php

namespace App\lib;

class Route
{
    public $url;
    public $method;
    public $controller;
    public $middleware;
    private $initialized = false;
    public function __construct($url, $method)
    {
        $this->url = $url;
        $this->method = $method;
        return $this;
    }

    public static function post($url){
        return new self($url, 'POST');
    }
    public static function get($url){
        return new self($url, 'GET');

    }
    public static function put($url){
        return new self($url, 'PUT');

    }
    public static function delete($url){
        return new self($url, 'DELETE');
    }
    public function middleware($middleware){
        $this->middleware = $middleware;

        return $this;
    }

    public function controller($controller){
        $this->controller = $controller;

        return $this;
    }
    public function action($action){
        $this->action = $action;

        return $this;
    }
    public function init(){
        if(!isset($this->controller) || !isset($this->action)){
            //
        }
        $this->initialized = true;
        return $this;
    }
    public function isInitialized(){
        return $this->initialized;
    }
}