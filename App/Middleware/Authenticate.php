<?php

namespace App\Middleware;
// El middleware se utiliza para gestionar la autenticación y la autorización de 
//rutas en una aplicación web. 
class Authenticate{

    public static function validate($middleware){
        //Este bloque de código verifica si la URI de la solicitud actual es igual a "/inicioSesion".
        // Si es así, procede a verificar o iniciar una sesión.
        if($_SERVER["REQUEST_URI"] == "/inicioSesion"){
           
            //Este código verifica el estado de la sesión actual utilizando la función session_status(). 
            //Si la sesión no está activa o no existe, se inicia una nueva sesión con session_start().
             $estadoSesion = session_status();
            if($estadoSesion != PHP_SESSION_ACTIVE || $estadoSesion == PHP_SESSION_NONE ){
            session_start();
            }
            
        }else{ 
            //Si la URI de la solicitud no es "/inicioSesion", este bloque de código se ejecutará solo si 
            //el método de solicitud es "GET". 
            //Al igual que en el bloque anterior, verifica el estado de la sesión y la inicia si es necesario.
            if($_SERVER["REQUEST_METHOD"] == "GET"){
 
            $estadoSesion = session_status();
            if($estadoSesion != PHP_SESSION_ACTIVE || $estadoSesion == PHP_SESSION_NONE ){
            session_start();
            }

            }
        }

        $salida = "";
        //se utiliza una expresión ternaria para determinar si el middleware es de tipo "Guest" o "auth". Dependiendo del tipo de middleware,
        // se llama a la función guest o auth con el prefijo proporcionado en el arreglo $middleware
        $middleware["middleware"] == "Guest"?($salida = self::guest($middleware["prefix"])):($salida = self::auth($middleware["prefix"]));
        return $salida;

    }

    //Ambos métodos guest y auth se utilizan para determinar si un usuario puede 
    //acceder a una ruta específica en función de su autenticación 
    private static function guest($prefix){
         //Este método se encarga de manejar la autenticación para usuarios invitados, es decir, aquellos que no han iniciado sesión.
        if(isset($_SESSION["id"]) && strpos($_SERVER["REQUEST_URI"], $prefix)== false){
            if($_SERVER["REQUEST_URI"] == $prefix){
                header("location:/inicioSesion/inicio");
            }
            return true;
        }
        return false;
    }
    private static function auth($prefix){
        // verifica si la variable de sesión $_SESSION["id"] está definida 
        //(es decir, si el usuario ha iniciado sesión) y si la URI de la solicitud actual 

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