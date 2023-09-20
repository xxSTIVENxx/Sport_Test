<?php

namespace App\Controllers;

use App\Models\ModeloGenero;
//Controlador para listar los generos en el caso de registrar un deportista 
class GeneroController {

    static public function listarGenero() {
        $modeloGenero = new ModeloGenero();
        $generos = $modeloGenero->obtenerGenero();
        return $generos;
    }
}
