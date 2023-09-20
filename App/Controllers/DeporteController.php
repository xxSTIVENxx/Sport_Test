<?php

namespace App\Controllers;

use App\Models\ModeloDeporte;

//Controlador para listar los deportes en el caso del registro 


class DeporteController {

    static public function listarDeportes() {
        $modeloDeporte = new ModeloDeporte();
        $deportes = $modeloDeporte->obtenerDeportes();
        return $deportes;
    }
}
