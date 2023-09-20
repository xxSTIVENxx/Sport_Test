<?php

namespace App\Models;

use App\Config\Conexion;
use PDO;
use PDOException; 
  
class ModeloRegistroDeportista
{
    static public function mdlRegisDeportista($tabla, $datos)
    {
        try {
            // Prepara la statement SQL
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, apellido, edad, telefono, correo, fk_id_genero, fk_id_posicion, direccion, foto) 
            VALUES (:nombre, :apellido, :edad, :telefono, :correo, :fk_id_genero, :fk_id_posicion, :direccion, :foto)");

            // Parametros
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
            $stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
            $stmt->bindParam(":fk_id_genero", $datos["fk_id_genero"], PDO::PARAM_STR);
            $stmt->bindParam(":fk_id_posicion", $datos["fk_id_posicion"], PDO::PARAM_STR);
            $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

            // Execute the statement
            if ($stmt->execute()) {
                return "ok"; // Return success message
            } else {
                return "error"; // Return error message
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage(); // Return error message with exception details
        } finally {
            // Close the statement
            $stmt->closeCursor();
        }
    }



    // MODELO MOSTRAR
    static public function mdlSeleccionarDeportista($tabla, $item, $valor)
    {
        $stmt = null; // Initialize $stmt as null

        if ($item == null && $valor == null) {
		  $stmt = Conexion::conectar()->prepare("SELECT deportista.id , nombre, apellido, edad, telefono, correo, direccion, tipo_genero, nombre_posicion, fk_id_posicion, fk_id_genero FROM  $tabla, genero, posiciones Where deportista.fk_id_genero = genero.id AND deportista.fk_id_posicion = posiciones.id");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT deportista.id , Emanombre, apellido, edad, telefono ,correo, direccion, tipo_genero, nombre_posicion, fk_id_posicion, fk_id_genero  FROM deportista, genero, posiciones WHERE $item = :$item AND deportista.fk_id_genero = genero.id AND deportista.fk_id_posicion = posiciones.id");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }

        // Only close and set to null if $stmt is not null
        if ($stmt !== null) {
            $stmt->close();
        }
    }



    
    
    // funcion actualizar

    static public function mdlActualizarDeportista($tabla, $datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, apellido=:apellido, edad=:edad, telefono=:telefono,direccion=:direccion, correo=:correo, fk_id_genero=:fk_id_genero,fk_id_posicion=:fk_id_posicion  WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], PDO::PARAM_STR);
        $stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_id_genero", $datos["fk_id_genero"], PDO::PARAM_STR);
        $stmt->bindParam(":fk_id_posicion", $datos["fk_id_posicion"], PDO::PARAM_STR);
      
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            print_r(Conexion::conectar()->errorInfo());

        }

        $stmt->closeCursor();

    }


    static public function mdlEliminarDeportista($tabla, $valor){
	
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);
    
        try {
            if ($stmt->execute()) {
                return "ok";
            } else {
                header("location:/inicioSesion/registroDeportista/vistaRegistroDeportista");
                return;
            }
        } catch (\Throwable $th) {
            header("location:/inicioSesion/registroDeportista/vistaRegistroDeportista?error=1");
            exit;
        }
    
        
    }

}