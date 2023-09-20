<?php

namespace App\Controllers;

use App\Config\Conexion;

//lo extendemos del controlador Controller 
//para que trauga sus funciones 

class InformacionTestsController extends Controller {

    public function index(){

        return Controller::view('informacionTests');

    }

    //
}