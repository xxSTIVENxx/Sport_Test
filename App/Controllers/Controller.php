<?php

//controlador base
//que trae las vistas (archivos), ateves de sus rutas 
namespace App\Controllers;

class Controller{

    public function view($route){

         $route = str_replace('.', '/', $route);
        
        if(file_exists("../resources/views/{$route}.php")){
            
            //lo trae y lo alamcena en una variable
            ob_start();
            include "../resources/views/{$route}.php";
            $content = ob_get_clean();

            //retornar un string 
            return $content;


        }elseif(file_exists("../views/resources/sesion/{$route}.php")){
            ob_start();
            include "../resources/views/sesion/{$route}.php";
            $content = ob_get_clean();

            //retornar un string 
            return $content;
        }elseif(file_exists("../views/resources/tests/{$route}.php")){
            ob_start();
            include "../resources/views/tests/{$route}.php";
            $content = ob_get_clean();

            //retornar un string 
            return $content;
        }
        
        else{
            echo "no se encuentra";
        }

    }
}