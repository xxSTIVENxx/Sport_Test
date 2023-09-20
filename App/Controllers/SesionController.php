<?php

namespace App\Controllers;

use App\Models\ModeloSesion;

class SesionController extends Controller {

    public function index(){

        // Obtener la ruta actual
        $uri = $_SERVER['REQUEST_URI'];

        //VALIDAR Y TRAER UNA VISTA DEPENDIENDO DE LA URL EN LA QUE ESTE 
        if ($uri === '/inicioSesion') {
            return Controller::view('sesion.inicioSesion');
        } elseif ($uri === '/registro') {
            return Controller::view('sesion.registro');
        } else {
            // Manejar otras rutas o mostrar un mensaje de error
            echo "Ruta no encontrada";
        }
    }

    	/*============================*
	//CONTROLADOR DE REGISTRO PROFESOR
	*============================*/
    static public function ctrRegistroUsuario(){

		if(isset($_POST["registrarNombre"])){

			$tabla = "registro";

			$datos = array("nombre_completo" => $_POST["registrarNombre"],
                           "correo_electronico" => $_POST["registrarCorreo"],
                           "contrasena" => $_POST["registrarContrasena"],
                           "edad" => $_POST["registraredad"],
                           "fk_id_deporte" => $_POST["registrofk_id_deporte"],
                           "fk_id_usuario" => $_POST["registrofk_id_tipo_usuario"],
			
						
						);

			$respuesta = ModeloSesion::mdlRegisUsuario($tabla, $datos);

			return $respuesta;

		}

	}

    

		/*============================*
	//CONTROLADOR PARA SELECCIONAR O TRAER REGISTROS
	*============================*/

	static public function ctrSeleccionarUsuario($item, $valor){

		$tabla = "registro";

		$respuesta = ModeloSesion::mdlSeleccionarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*============================*
	//CONTROLADOR PARA VALIDAR INGRESO
	*============================*/
public function ctrIngreso() {
    setcookie("error",0);
    if (isset($_POST["ingresoCorreo"])) {
        $tabla = "registro";
        $item = "correo_electronico";
        $valor = $_POST["ingresoCorreo"];

        $respuesta = ModeloSesion::mdlSeleccionarUsuario($tabla, $item, $valor);

        if ($respuesta && password_verify($_POST["ingresoContrasena"], $respuesta["contrasena"])) {
            $_SESSION["id"] = $respuesta["id"];
            $_SESSION["nombre"] = $respuesta["nombre_completo"];
            $_SESSION["correo"] = $respuesta["correo_electronico"];
            $_SESSION["edad"] = $respuesta["edad"];
            $_SESSION["fk_id_deporte"] = $respuesta["fk_id_deporte"];
            header("location:/inicioSesion/inicio");
        } else {
            setcookie("error",1);
            header("location:/inicioSesion");
        }
    }
}



}
