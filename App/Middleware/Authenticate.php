<?php

namespace App\Middleware;

class Authenticate{

    public static function validate($middleware){

        if($_SERVER["REQUEST_URI"] == "/inicioSesion"){
           

             $estadoSesion = session_status();
            if($estadoSesion != PHP_SESSION_ACTIVE || $estadoSesion == PHP_SESSION_NONE ){
            session_start();
            }
            
        }else{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
 
            $estadoSesion = session_status();
            if($estadoSesion != PHP_SESSION_ACTIVE || $estadoSesion == PHP_SESSION_NONE ){
            session_start();
            }

            }
        }

        $salida = "";
        $middleware["middleware"] == "Guest"?($salida = self::guest($middleware["prefix"])):($salida = self::auth($middleware["prefix"]));
        return $salida;

    }

    private static function guest($prefix){
        if(isset($_SESSION["id"]) && strpos($_SERVER["REQUEST_URI"], $prefix)== false){
            if($_SERVER["REQUEST_URI"] == $prefix){
                header("location:/inicioSesion/inicio");
            }
            return true;
        }
        return false;
    }
    private static function auth($prefix){

        if(!isset($_SESSION["id"]) && strpos($_SERVER["REQUEST_URI"], $prefix)!== false){
            if($_SERVER["REQUEST_URI"] != $prefix){
                header("location:/inicioSesion");
            }
            return true;
        }
        if(isset($_SESSION["id"])){
            if($_SERVER["REQUEST_URI"] == $prefix){
                header("location:/inicioSesion/inicio");
                return true;
            }else{
                return true;
            }
        }
        return false;
    }
}






?>