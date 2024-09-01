<?php

namespace system\traits;


trait View{


    protected function view($dir, $context = null){

        $dir = str_replace('.', '/', $dir);
        if ($context) extract($context);
        $path = realpath(dirname(__FILE__) . "/../../application/View/" . $dir . ".php");
        if (file_exists($path)){
            return require_once($path);
        }
        else{
            echo 'view was not found';
        }

    }


    protected function asset($dir){
        global $base_url;
        $path = $base_url . "public/" . $dir;
        echo $path;
    }


    protected function include($dir, $context = null){

        $dir = str_replace('.', '/', $dir);
        if ($context) extract($context);
        $path = realpath(dirname(__FILE__) . "/../../application/View/" . $dir . ".php");
        if (file_exists($path)){
            return require_once($path);
        }
        else{
            echo 'view was not found';
        }

    }


    protected function url($url){
        if ($url[0] == '/'){
            $url = substr($url, 1, strlen($url) - 1);
        }
        global $base_url;
        echo $base_url.$url;
    }

}