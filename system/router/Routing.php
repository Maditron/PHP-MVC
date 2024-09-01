<?php

namespace system\router;
require 'system/config.php';

use ReflectionMethod;

class Routing{
    private $current_route;

    public function __construct(){
        global $current_route;
        $this->current_route = explode('/', $current_route); //this makes an array
    }

    public function run(){

        // we want to extract controller -> class -> method -> args from url
        $path = realpath(dirname(__FILE__) . "/../../application/controllers/" . $this->current_route[0] . ".php");

        if (!file_exists($path)){
            echo '404. file does not exist <br>';
            exit;
        }
        require_once($path);
        
        sizeof($this->current_route) == 1 ? $method = "index" : $method = $this->current_route[1];
        if (array_key_exists(1,$this->current_route)) {
            if (!$this->current_route[1]) $method = 'index';
        }
        $class = "application\controllers\\" . $this->current_route[0];
        $object = new $class();
        if (method_exists($object, $method)){
            $reflection = new ReflectionMethod($class, $method);
            $paramCount = $reflection->getNumberOfParameters();
            if ($paramCount <= count(array_slice($this->current_route, 2))){
                call_user_func_array(array($object, $method), array_slice($this->current_route, 2));
            }
            else{
                echo '404 - param error!';
            }
        }
        else{
            echo '404 - method not found!';
        }
    }
    
}