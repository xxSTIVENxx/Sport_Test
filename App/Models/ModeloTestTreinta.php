<?php


namespace App\Models; // Asegurarse que el namespace coincida con la ubicación de tu archivo

use App\Config\Conexion;
use PDO;
use PDOException;

class ModeloTestTreinta {


    //MODELO PARA REGISTRAR EN EL TEST 
    static public function mdlRegistroTestTreintametros($tabla, $datos) {
        $vlrreturn = "ok";
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (tiempo_en_segundos, fecha_realizacion,estado, fk_id_deportista) VALUES (:tiempo, :fecha, :estado, :fk_id_deportista)");

        $stmt->bindParam(":tiempo", $datos["tiempo_en_segundos"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha_realizacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_id_deportista", $datos["fk_id_deportista"], PDO::PARAM_STR);
        $consultaSQL = $stmt->queryString;
       
        try {
            if ($stmt->execute()) {
                return "ok";
            } else {
                header("location:/inicioSesion/tests/test30m");
                return;
            }
        } catch (\Throwable $th) {
            header("location:/inicioSesion/tests/test30m?error=1");
            exit;
        }

        
           
        
        
        $stmt->closeCursor();
        
        return $vlrreturn;
    }

    // MODELO MOSTRAR O SELECCIONAR REGISTRO

    static public function mdlSeleccionarTestTreintametros($tabla= "test_treinta_metros", $item = null, $valor=null) {
        if ($item == null && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT *,deportista.id as deportista, test_treinta_metros.id as idtest FROM $tabla inner join deportista where deportista.id = fk_id_deportista");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *,deportista.id as deportista, test_treinta_metros.id as idtest FROM $tabla inner join deportista where deportista.id = fk_id_deportista");
            $stmt->execute();
            return $stmt->fetch();
        }
    }
    
    //MODELO PARA ACTUALIZAR REGISTRO DEL TEST

    static public function mdlActualizarTestTreintametros($tabla, $datos) {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET tiempo_en_segundos=:tiempo_en_segundos,fecha_realizacion=:fecha,estado=:estado,fk_id_deportista=:fk_id_deportista  WHERE id = :id");

        $stmt->bindParam(":tiempo_en_segundos", $datos["tiempo_en_segundos"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha_realizacion"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_id_deportista", $datos["fk_id_deportista"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        $stmt->closeCursor();
    }

    //MODELO PARA ELIMINAR REGISTRO DEL TEST
    static public function mdlEliminarTestTreintametros($tabla, $valor) {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR); 
    
        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
    }


}