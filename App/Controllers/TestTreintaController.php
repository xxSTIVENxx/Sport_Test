<?php

namespace App\Controllers;

use App\Models\ModeloTestTreinta;

//lo extendemos del controlador Controller 
//para que trauga sus funciones 

class TestTreintaController extends Controller {

    public function index(){

        return Controller::view('tests.testtreintam');

    }

    	/*============================*
	//CONTROLADOR DE REGISTRO
	*============================*/
    static public function ctrRegistroTestTreintametros() {
        if (isset($_POST["registroTiempoEnSegundos"])) {
            $tabla = "test_treinta_metros"; 
            
            
            $datos = array(
                "tiempo_en_segundos" => $_POST["registroTiempoEnSegundos"],
                "fecha_realizacion" => $_POST["registroFecha"],
                "estado" => $_POST["registroEstado"],
                "fk_id_deportista" => $_POST["registroFkIdDeportista"]
            );

            $respuesta = ModeloTestTreinta::mdlRegistroTestTreintametros($tabla, $datos);

			header("location:/inicioSesion/tests/test30m");
        }
    }

  
	/*============================*
	//CONTROLADOR SELECCIONAR O TRAER REGISTROS
	*============================*/
    static public function ctrSeleccionarTestTreintametros($item = null, $valor = null) {
        $tabla = "test_treinta_metros";
        $respuesta = ModeloTestTreinta::mdlSeleccionarTestTreintametros($tabla, $item, $valor);
        return $respuesta;
    }

    	/*============================*
	//CONTROLADOR ACTUALIZAR 
	*============================*/
    static public function ctrActualizarTestTreintametros() {
        if (isset($_POST["tiempo"])) {
            $tabla = "test_treinta_metros";
            $datos = array(
                "id" => $_POST["id"],
                "tiempo_en_segundos" => $_POST["tiempo"],
                "fecha_realizacion" => $_POST["fecha"],
                "estado" => $_POST["estado"],
                "fk_id_deportista" => $_POST["idD"]
            );
            $respuesta = ModeloTestTreinta::mdlActualizarTestTreintametros($tabla, $datos);
            return $respuesta;
        }
    }

	/*============================*
	//CONTROLADOR PARA ELIMINAR REGISTROS
	*============================*/
    public function ctrEliminarTestTreintametros() {
        if (isset($_POST["id"])) {
            $tabla = "test_treinta_metros";
            $valor = $_POST["id"];
            $respuesta = ModeloTestTreinta::mdlEliminarTestTreintametros($tabla, $valor);

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