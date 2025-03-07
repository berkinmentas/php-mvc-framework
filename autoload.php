<?php

spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . '/';

    $namespace = 'App\\';
    $length = strlen($namespace);

    if (strncmp($namespace, $class, $length) !== 0) {
        return;
    }

    $relativeClass = substr($class, $length);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require_once($file);
    }
});

require_once "lib/Lifecycle.php";