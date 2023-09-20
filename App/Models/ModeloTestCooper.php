<?php


namespace App\Models; // Asegurarse que el namespace coincida con la ubicación de tu archivo

use App\Config\Conexion;
use PDO;
use PDOException;

class ModeloTestCooper {


    // MODELO CREAR REGISTRO EN EL TEST

    static public function mdlRegisTestCooper($tabla, $datos) {
    
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (distancia_recorrida,fecha_realizacion,estado,fk_id_deportista) 
        VALUES (:distancia_recorrida,:fecha,:estado,:fk_id_deportista)");

        $stmt->bindParam(":distancia_recorrida", $datos["distancia_recorrida"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha_realizacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_id_deportista", $datos["fk_id_deportista"], PDO::PARAM_STR);

        try {
            if ($stmt->execute()) {
                return "ok";
            } else {
                header("location:/inicioSesion/tests/testCooper");
                return;
            }
        } catch (\Throwable $th) {
            header("location:/inicioSesion/tests/testCooper?error=1");
            exit;
        }
       
    
    }

    // MODELO MOSTRAR O SELECCIONAR REGISTROS DEL TEST

    static public function mdlSeleccionarTestCooper($tabla = "test_cooper", $item, $valor) {
 
        if ($item == null && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT *,deportista.id as deportista, test_cooper.id as idtest FROM $tabla inner join deportista where deportista.id = fk_id_deportista");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *,deportista.id as deportista, test_cooper.id as idtest FROM $tabla inner join deportista where deportista.id = fk_id_deportista");
            $stmt->execute();
            return $stmt->fetch();
        }	
    }
    
    //MODELO  ACTUALIZAR REGISTROS DEL TEST

    static public function mdlActualizarTestCooper($tabla, $datos) {
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET distancia_recorrida=:distancia_recorrida,fecha_realizacion=:fecha,estado=:estado,fk_id_deportista=:fk_id_deportista  WHERE id = :id");

        $stmt->bindParam(":distancia_recorrida", $datos["distancia_recorrida"], PDO::PARAM_STR); 
        $stmt->bindParam(":fecha", $datos["fecha_realizacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_id_deportista", $datos["fk_id_deportista"], PDO::PARAM_INT);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt->closeCursor();
        	
    }

    //MODELO ELIMINAR REGISTROS DEL TEST
    static public function mdlEliminarTestCooper($tabla, $valor) {
	
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    
        
    }

}