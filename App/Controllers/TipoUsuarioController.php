<?php

namespace App\Controllers;

use App\Models\ModeloTipoUsuario;



class TipoUsuarioController {

    //CONTROLADOR PARA TRAER EL TIPO DE USUARIO QUE SE VA REGISRAR 
    //POR EL MOMENTO SOLO PROFESOR
    static public function listarTipoUsuario() {
        $modeloTipoUsuario = new ModeloTipoUsuario();
        $tipoUsuarios = $modeloTipoUsuario->obtenerTipoUsuario();

        return $tipoUsuarios;
    }
}
