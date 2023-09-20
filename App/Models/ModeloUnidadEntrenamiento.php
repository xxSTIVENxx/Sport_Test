<?php


namespace App\Models; // Asegúrate de que el namespace coincida con la ubicación de tu archivo

use App\Config\Conexion;
use PDO;
use PDOException;

class ModeloUnidadEntrenamiento {

    static public function mdlRegisUnidadEntre($tabla, $datos)
{
    try {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (unidad, fecha_hora, lugar, periodo, etapa, metodo, contenido, re_dato, tareas, objetivos, fase_inicial, foto_FaseInicial, fase_central, foto_FaseCentral, fase_final, foto_FaseFinal) 
        VALUES (:unidad, :fecha_hora, :lugar, :periodo, :etapa, :metodo, :contenido, :re_dato, :tareas, :objetivos, :fase_inicial, :foto_FaseInicial, :fase_central, :foto_FaseCentral, :fase_final, :foto_FaseFinal)");
        
        $hora = explode("T",$datos["fecha_hora"]);
        $hora = $hora[0]." ".$hora[1].":00";

        $stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_hora", $hora , PDO::PARAM_STR);
        $stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
        $stmt->bindParam(":periodo", $datos["periodo"], PDO::PARAM_STR);
        $stmt->bindParam(":etapa", $datos["etapa"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
        $stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt->bindParam(":re_dato", $datos["re_dato"], PDO::PARAM_STR);
        $stmt->bindParam(":tareas", $datos["tareas"], PDO::PARAM_STR);
        $stmt->bindParam(":objetivos", $datos["objetivos"], PDO::PARAM_STR);
        $stmt->bindParam(":fase_inicial", $datos["fase_inicial"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_FaseInicial", $datos["foto_FaseInicial"], PDO::PARAM_LOB);
        $stmt->bindParam(":fase_central", $datos["fase_central"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_FaseCentral", $datos["foto_FaseCentral"], PDO::PARAM_LOB);
        $stmt->bindParam(":fase_final", $datos["fase_final"], PDO::PARAM_STR);
        $stmt->bindParam(":foto_FaseFinal", $datos["foto_FaseFinal"], PDO::PARAM_LOB);
        // Agrega la vinculación para fk_id_deportista si es necesario

        // Ejecuta la declaración
        if ($stmt->execute()) {
            return "ok"; // Devuelve un mensaje de éxito
        } else {
            return "error"; // Devuelve un mensaje de error
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage(); // Devuelve el mensaje de error
    } finally {
        // Cierra la declaración
        $stmt->closeCursor();
    }
}


    // MODELO MOSTRAR


    static public function mdlSeleccionarUnidadEntre ($tabla, $item, $valor){

	

		if($item == null && $valor == null){

		  $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		  $stmt->execute();

		  return $stmt -> fetchAll();

	  }else{

		  $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		  $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		  $stmt->execute();

		  return $stmt -> fetch();


	  }

    }

    
    
    // funcion actualizar

    static public function mdlActualizarUnidadEntre($tabla, $datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET unidad=:unidad,fecha_hora=:fecha_hora, lugar=:lugar, etapa=:etapa, metodo=:metodo, contenido=:contenido,re_dato=:re_dato,tareas=:tareas,objetivos=:objetivos,fase_inicial=:fase_inicial,fase_central=:fase_central,fase_final=:fase_final WHERE id_unidad = :id_unidad_entrenamiento");

        $stmt->bindParam(":unidad", $datos["unidad"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_hora", $datos["fecha_hora"], PDO::PARAM_STR);
        $stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
        $stmt->bindParam(":etapa", $datos["etapa"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo", $datos["metodo"], PDO::PARAM_STR);
        $stmt->bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $stmt->bindParam(":re_dato", $datos["RE"], PDO::PARAM_STR);
        $stmt->bindParam(":tareas", $datos["tareas"], PDO::PARAM_STR);
        $stmt->bindParam(":objetivos", $datos["objetivo"], PDO::PARAM_STR);
        $stmt->bindParam(":fase_inicial", $datos["fase_inicial"], PDO::PARAM_STR);
        $stmt->bindParam(":fase_central", $datos["fase_central"], PDO::PARAM_STR);
        $stmt->bindParam(":fase_final", $datos["fase_final"], PDO::PARAM_STR);
        $stmt->bindParam(":id_unidad_entrenamiento", $datos["id_unidad"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            $error = $smtp->getMessage();
            print_r($error);

        }

        $stmt->closeCursor();

    }


    static public function mdlEliminarUnidadEntre($tabla, $valor){
	
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_unidad = :id_unidad");
    
        $stmt->bindParam(":id_unidad", $valor, PDO::PARAM_STR);
    
        if($stmt->execute()){
    
            return "ok";
    
        }else{

            echo $stmt;
            print_r(Conexion::conectar()->errorInfo());
    
        }
    
        
    }

}