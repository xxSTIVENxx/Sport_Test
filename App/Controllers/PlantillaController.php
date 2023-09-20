<?php

namespace App\Controllers;

use App\Config\Conexion;

//lo extendemos del controlador Controller 
//para que traiga sus funciones 

class PlantillaController extends Controller {

    //trae la vista 
    public function index(){


        return Controller::view('plantilla');
    }

    //
}