<?php

namespace App\Controllers;



//lo extendemos del controlador Controller 
//para que trauga sus funciones 

class InicioController extends Controller {

    public function index(){


        $uri = $_SERVER['REQUEST_URI'];

        if ($uri === '/inicioSesion/inicio') {
            return Controller::view('inicio');
        
        } else {
            // mensaje de error
            echo "Ruta no encontrada";
        }
    }
    public function logout(){
        session_destroy();
        header("location:/inicioSesion");
    }

    //
}