<?php

//auto cargador 
//para cargar automáticamente las clases y archivos necesarios cuando se 
//instancian objetos de esas clases sin necesidad de requerir manualmente cada archivo.

 spl_autoload_register(function($clase){
    $ruta = '../' . str_replace("\\", "/", $clase) . ".php";
    if(file_exists($ruta)){
        require_once $ruta;
    }else{
        die("no pudo cargar la clase $clase");
    }
 });