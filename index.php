<?php
ini_set('display_errors', 1);
require_once 'autoload.php';

use App\lib\Lifecycle;
use App\lib\Request;
use App\lib\Response;

new Lifecycle(new Request(), new Response());

