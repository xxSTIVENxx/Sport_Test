<?php

//Controlador para tarer la vista de tests

namespace App\Controllers;

use App\Config\Conexion;

//lo extendemos del controlador Controller 
//para que trauga sus funciones 

class TestController extends Controller {

    public function index(){

        return Controller::view('test');

    }

    //
}