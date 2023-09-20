<?php

namespace App\Controllers; 

use App\Config\Conexion;

//lo extendemos del controlador Controller 
//para que traiga sus funciones 

class HomeController extends Controller {

    public function index(){

        //trae la vista home 
        return Controller::view('home');


    }

    //
}