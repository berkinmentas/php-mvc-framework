<?php

namespace App\lib;
class Request
{
    public $server;
    public $method;
    public $uri;
    public $query;
    public $body;
    public $headers;
    public $cookies;
    public $files;
    public $content;
    public $path;
    public $route;
    public $params = [];
    public function __construct(){
        $this->server = $_SERVER;
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->query = $_SERVER['QUERY_STRING'];
        $this->body = file_get_contents('php://input');
        $this->headers = getallheaders();
        $this->cookies = $_COOKIE;
        $this->files = $_FILES;
        $this->content = isset($this->headers['Content-Type']) && $this->headers['Content-Type'] == "application/json" ? json_decode($this->body, true) : null;
        $this->path = str_replace($this->query, '', $this->uri);
    }

    public function getParam($name, $default = null)
    {
        return $this->params[$name] ?? $default;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getBody()
    {
        return $this->content ?? $_POST;
    }

}