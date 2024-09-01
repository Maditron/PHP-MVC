<?php

namespace system\bootstrap;


class Autoload{

    public function autoloader(){
        
        
        // It must be a callback function in spl autoload reg
        spl_autoload_register(function($classname){
            global $base_dir;
            $classname = str_replace("\\", DIRECTORY_SEPARATOR, $classname);
            include_once $_SERVER['DOCUMENT_ROOT'] . $base_dir . $classname . ".php";

        });


    }
}