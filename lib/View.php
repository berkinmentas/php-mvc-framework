<?php

namespace App\lib;

class View
{
    protected $viewPath;
    private $content;

    public function __construct($viewPath = null) {
        $projectRoot = realpath(__DIR__ . '/../');
        $this->viewPath = isset($viewPath)
            ? $viewPath
            : $projectRoot . '/src/views/';
    }

    public static function render($viewName, $data = []) {
        $instance = new self();
        $fullPath = $instance->viewPath . $viewName . '.php';

        if (!file_exists($fullPath)) {
            throw new \Exception("View not found: {$fullPath}");
        }

        extract($data);

        ob_start();
        include $fullPath;
        $instance->content = ob_get_clean();

        return $instance;
    }

    public function __toString() {
        return $this->content;
    }
}