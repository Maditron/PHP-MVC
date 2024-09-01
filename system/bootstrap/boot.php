<?php

session_start();

require 'system/config.php';

require_once 'system/bootstrap/autoload.php';
use system\bootstrap\Autoload;

$autoload = new Autoload;
$autoload->autoloader();

$route = new \System\router\Routing();
$route->run();