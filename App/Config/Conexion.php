<?php

namespace App\config;

use PDO;


// función es establecer una conexión a una base de datos MySQL utilizando 
//la extensión PDO (PHP Data Objects). 

class  Conexion{

    static public function   conectar(){
          #PDO(nombre de mi servidor: nombre de la base de datos, nombre del usuario,contraseña)

          $link = new PDO("mysql:host=localhost;dbname=sporttest","root","12345");

          $link->exec("set names utf8");
          $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $link;

     }
}