<?php

namespace App\Controllers;

use App\Models\ModeloPosicion;

	/*============================*
	//CONTROLADOR PARA TRAER REGISTROS
	*============================*/
class PosicionController {

    static public function listarPosicion() {
        $modeloPosicion = new ModeloPosicion();
        $posiciones = $modeloPosicion->obtenerPosicion();

        return $posiciones;
    }
}
