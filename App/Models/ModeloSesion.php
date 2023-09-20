<?php


namespace App\Models; // Asegúrate de que el namespace coincida con la ubicación de tu archivo

use App\Config\Conexion;
use PDO;
use PDOException;

class ModeloSesion {

    // MODELO CREAR 

    static public function mdlRegisUsuario($tabla, $datos) {
        

        try {
            // Código que puede lanzar una excepción
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_completo, correo_electronico, contrasena, edad, fk_id_deporte, fk_id_usuario) 
                VALUES (:nombre_completo, :correo_electronico, :contrasena, :edad, :fk_id_deporte, :fk_id_usuario)");
        
            // Bind parameters here...
            $stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
            $stmt->bindParam(":correo_electronico", $datos["correo_electronico"], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
            $stmt->bindParam(":edad", $datos["edad"], PDO::PARAM_STR);
            $stmt->bindParam(":fk_id_deporte", $datos["fk_id_deporte"], PDO::PARAM_STR);
            $stmt->bindParam(":fk_id_usuario", $datos["fk_id_usuario"], PDO::PARAM_STR);



            //INCRIPTAR 
            $contrasenaUsuario = $datos["contrasena"];

            // Genera un hash de contraseña seguro
            $hashContrasena = password_hash($contrasenaUsuario, PASSWORD_DEFAULT);
    
            // Asigna el hash de contraseña al parámetro :contrasena
            $stmt->bindParam(":contrasena", $hashContrasena, PDO::PARAM_STR);

        
            if ($stmt->execute()) {
                // Inserción exitosa
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    alert("El usuario ha sido registrado exitosamente");
                    // Redirigir al usuario a otra página, si es necesario
                </script>';
            } else {
                // Error en la inserción
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    alert("Error al registrar usuario. Por favor, inténtalo de nuevo más tarde.");
                </script>';
            }
        } catch (PDOException $e) {
            // Manejar excepción de PDO
            echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                alert("Error en la base de datos: ' . $e->getMessage() . '");
            </script>';
        }
    }


    // En tu modelo ModeloRegistroUsuario.php

    

    // MODELO MOSTRAR

    static public function mdlSeleccionarUsuario($tabla, $item, $valor) {

        
        
        if ($item == null && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }

        // $stmt->close();
        //} $stmt = null;	
    }
    


   
}


