<?php

namespace application\Controllers;

class Panel extends Controller{

    public function index(){
        return $this->view('panel.index');
    }



}