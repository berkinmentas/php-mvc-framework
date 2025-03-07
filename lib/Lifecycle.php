<?php
namespace App\lib;
class Lifecycle
{
    private  $request;
    private  $response;
    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;

        $this->setMiddlewares();
        $this->callController();
    }
    private function setMiddlewares(){
       $middlewares =  require "config/middleware.php";

       foreach($middlewares as $middleware){
           (new $middleware())->handle($this->request);
       }

    }

    private function callController(){
        $controller = $this->request->route->controller;
        $action = $this->request->route->action;

        return  (new $controller($this->request, $this->response))->callAction($action);
    }
}