<?php

//CLASE ENCARAGDA DEL ENRUTAMIENTO

namespace Lib;
use App\Middleware\Authenticate;

class Route{
    private static $routes =[];


    public static function get($uri, $callback){
        $uri = trim($uri, '/');
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            self::$routes['GET'][$uri] = $callback; 
        }
    }

    public static function post($uri, $callback){
        $uri = trim($uri, '/');
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            self::$routes['POST'][$uri] = $callback;
        }
    }

    //recuperar la URI 
    public static function group($middleware,$callback){
        if(Authenticate::validate($middleware)){
            call_user_func($callback,$middleware["prefix"]);
        }else{
            if($middleware["middleware"] == "Guest"){
                call_user_func($callback,$middleware["prefix"]);
            }
        }
    }

    public static function dispatch(){
        $uri = $_SERVER['REQUEST_URI'];
        $ultimo_caracter = substr($_SERVER['REQUEST_URI'], -1);

        if($ultimo_caracter == "/"){
            $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], 0, -1);
            header("location:".$_SERVER['REQUEST_URI']);
        }
        
        $uri = trim($uri, '/');

        $method = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes [$method] as $route => $callback){


            if(strpos($route, ':') !== false){
                //si existe esos dos puntos 
                $route = preg_replace('#:[a-zA-Z]+#', '([a-zA-Z]+)', $route);

            }

            $uriE = explode("?",$uri)[0];
            if(preg_match("#^$route$#",$uriE , $matches)){

               

                $params = array_slice($matches,1);
                //desdoblar el array en variables (...)
                // $response = $callback(...$params);


                if(is_callable($callback)){
                    $response = $callback(...$params);
                }else{
                    if(is_array($callback)){
                        //instalacia del controlador
                        $controller = new $callback[0];
                        $response = $controller->{$callback[1]}(...$params);
    
                    }
                }



                
                // if(is_array($response) || is_object($response)){
                //     header('Content-Type: application/json');
                //     echo json_encode($response);
                // }else{
                //     echo $response;
                // }




                echo $response;
                return;

            }

        }
        



        echo '404';
    }
    
}