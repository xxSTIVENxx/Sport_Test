<?php

namespace App\Models; // Asegúrate de que el namespace coincida con la ubicación de tu archivo

use App\Config\Conexion;
use PDO;

class ModeloPosicion {

    //MODELO PARA OBTENER LAS POSICIONES 
    public function obtenerPosicion() {
        $tabla = "posiciones";
        
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Otros métodos para interactuar con la tabla de deportes, como insertar, actualizar o eliminar registros, según sea necesario.
}

