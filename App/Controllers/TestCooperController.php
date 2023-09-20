<?php

namespace App\Controllers;

Use App\Models\ModeloTestCooper;

//lo extendemos del controlador Controller 
//para que trauga sus funciones 

class TestCooperController extends Controller {

    public function index(){

        // $conexionCong = new Conexion();

        $uri = $_SERVER['REQUEST_URI'];

        if (explode("?",$uri)[0] === '/inicioSesion/tests/testCooper') {
            return Controller::view('tests.testCooper');
        
        } else {
            // Manejar otras rutas o mostrar un mensaje de error
            echo "Ruta no encontrada";
        }

        // para que reconozca archivos dentro de la carpeta 
        // views return Controller::view('nameCarpe.home');
    }

	/*============================*
	//CONTROLADOR DE REGISTRO TEST COOPER
	*============================*/
    static public function ctrRegistroTestCooper() {
        if (isset($_POST["registroTiempoEnSegundos"])) {
            $_POST["registroDistanciaRecorrida"] = $_POST["registroTiempoEnSegundos"];
            unset($_POST["registroTiempoEnSegundos"]);
            $tabla = "test_cooper";

            $datos = array(
                "distancia_recorrida" => $_POST["registroDistanciaRecorrida"],
                "fecha_realizacion" => $_POST["registroFecha"],
                "estado" => $_POST["registroEstado"],
                "fk_id_deportista" => $_POST["registroFkIdDeportista"]
            );

            $respuesta = ModeloTestCooper::mdlRegisTestCooper($tabla, $datos);

            header("location:/inicioSesion/tests/testCooper");
        }
    }

  	/*============================*
	//CONTROLADOR DE SELECCIONAR O TRAER REGISTROS 
	*============================*/

    static public function ctrSeleccionarTestCooper($item = null, $valor = null) {
        $tabla = "test_cooper";
        $respuesta = ModeloTestCooper::mdlSeleccionarTestCooper($tabla, $item, $valor);
        return $respuesta;
    }

	/*============================*
	//CONTROLADOR ACTUALIZAR TEST COOPER
	*============================*/
    static public function ctrActualizarTestCooper() {
        if (isset($_POST["tiempo"])) {
            $tabla = "test_cooper";
            $datos = array(
                "id" => $_POST["id"],
                "distancia_recorrida" => $_POST["tiempo"],
                "fecha_realizacion" => $_POST["fecha"],
                "estado" => $_POST["estado"],
                //FK PARA TARER EL NOMBRE DEL DEPORTISTA 
                "fk_id_deportista" => $_POST["idD"]
            );
            $respuesta = ModeloTestCooper::mdlActualizarTestCooper($tabla, $datos);
            return $respuesta;
        }
    }

    /*=============================================
    CONTROLADOR ELIMINAR REGISTROS TEST COOPER
    =============================================*/
    public function ctrEliminarTestCooper() {
        if (isset($_POST["id"])) {
            $tabla = "test_cooper";
            $valor = $_POST["id"];
            $respuesta = ModeloTestCooper::mdlEliminarTestCooper($tabla, $valor);

            if ($respuesta == "ok") {
                echo '<script>
                    if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                    }
                    window.location = "index.php?pagina=inicio";
                </script>';
            }
        }
    }

    //
}