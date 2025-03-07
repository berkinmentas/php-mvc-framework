<?php

namespace App\src\controllers;
use App\lib\View;
use App\lib\Response;

class WelcomeController extends Controller
{
    private $view;
    public function __construct(&$request, &$response)
    {
        parent::__construct($request, $response);
    }
    public function Test(){
        $data = [
            'title' => 'Test Sayfası',
            'content' => 'Test'
        ];

        $viewContent = View::render('test', $data);

        return Response::success($viewContent);
    }
}