<?php

namespace App\Controllers;

use App\Models\ModeloUnidadEntrenamiento;


//lo extendemos del controlador Controller 
//para que trauga sus funciones 

class UnidadEntrenamientoController extends Controller {

		/*============================*
	//CONTROLADOR QUE TRAE LA VISTA
	*============================*/
    public function index(){

        // $conexionCong = new Conexion();

        $uri = $_SERVER['REQUEST_URI'];

        if (explode("?",$uri)[0] === '/inicioSesion/unidadEntrenamiento') {
            return Controller::view('unidadEntrenamiento');
        } elseif (explode("?",$uri)[0] === '/inicioSesion/unidadEntrenamiento/registrosUnidad') {
            return Controller::view('vistaUnidadEntre');
        } else {
            
            echo "Ruta no encontrada";
        }
    }

		/*============================*
	//CONTROLADOR REGISTRO
	*============================*/

	static public function ctrRegistroUnidadEntre()
		{
		$respuesta = "ok"; // Inicializamos la variable de respuesta como "ok"

		if (isset($_POST["registroUnidad"]) && !empty($_POST["registroUnidad"])) {
			$tabla = "unidad_entrenamiento";
			$datos = array(
				"unidad" => $_POST["registroUnidad"],
				"fecha_hora" => $_POST["registroFechaHora"],
				"lugar" => $_POST["registroLugar"],
				"periodo" => $_POST["registroPeriodo"],
				"etapa" => $_POST["registroEtapa"],
				"metodo" => $_POST["registroMetodo"],
				"contenido" => $_POST["registroContenido"],
				"re_dato" => $_POST["registroRE"],
				"tareas" => $_POST["registroTareas"],
				"objetivos" => $_POST["registroObjetivo"],
				"fase_inicial" => $_POST["registroFaseInicial"],
				"fase_central" => $_POST["registroFaseCentral"],
				"fase_final" => $_POST["registroFaseFinal"],
			);

			// Validación de imágenes (Fase Inicial)
			$fotoFaseInicial = !empty($_FILES["registroFotoFaseInicial"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["registroFotoFaseInicial"]["tmp_name"])) : null;

			// Validación de imágenes (Fase Central)
			$fotoFaseCentral = !empty($_FILES["registroFotoFaseCentral"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["registroFotoFaseCentral"]["tmp_name"])) : null;

			// Validación de imágenes (Fase Final)
			$fotoFaseFinal = !empty($_FILES["registroFotoFaseFinal"]["tmp_name"]) ? addslashes(file_get_contents($_FILES["registroFotoFaseFinal"]["tmp_name"])) : null;

			file_put_contents(__DIR__."/../../public/img/fotos/".$_FILES["registroFotoFaseInicial"]["name"],$fotoFaseInicial);
			file_put_contents(__DIR__."/../../public/img/fotos/".$_FILES["registroFotoFaseCentral"]["name"],$fotoFaseCentral);
			file_put_contents(__DIR__."/../../public/img/fotos/".$_FILES["registroFotoFaseFinal"]["name"],$fotoFaseFinal);


			// Agregar las imágenes opcionales a los datos
			$datos["foto_FaseInicial"] = "/img/fotos/".$_FILES["registroFotoFaseInicial"]["name"];
			$datos["foto_FaseCentral"] = "/img/fotos/".$_FILES["registroFotoFaseCentral"]["name"];
			$datos["foto_FaseFinal"] = "/img/fotos/".$_FILES["registroFotoFaseFinal"]["name"];

			$respuesta = ModeloUnidadEntrenamiento::mdlRegisUnidadEntre($tabla, $datos);

			if ($respuesta === "ok") {
				header("location:/inicioSesion/unidadEntrenamiento/registrosUnidad?status=ok");
			} else {
				// En caso de error, asigna el mensaje de error a la respuesta
				header("location:/inicioSesion/unidadEntrenamiento/registrosUnidad");
			}
		} else {
			header("location:/inicioSesion/unidadEntrenamiento?status=error"); // Mensaje de error si el campo está vacío
		}

		
	}
	

	/*============================*
	//CONTROLADOR SELECCIONAR 
	*============================*/

	static public function ctrSeleccionarUnidadEntre($item, $valor){

		$tabla = "unidad_entrenamiento";

		$respuesta = ModeloUnidadEntrenamiento::mdlSeleccionarUnidadEntre($tabla, $item, $valor);

		return $respuesta;

	}


	/*============================*
	//CONTROLADOR ACTUALIZAR 
	*============================*/
	static public function ctrActualizarUnidadEntre()
	{ 
    $respuesta = "ok"; // Inicializamos la variable de respuesta como "ok"

		if (isset($_POST["unidadId"])) {
			$tabla = "unidad_entrenamiento";

			$datos = array(
				"id_unidad" => $_POST["unidadId"],
				"unidad" => $_POST["unidad"],
				"fecha_hora" => $_POST["fechaHora"],
				"lugar" => $_POST["lugar"],
				"etapa" => $_POST["etapa"],
				"metodo" => $_POST["metodo"],
				"contenido" => $_POST["contenido"],
				"RE" => $_POST["re_dato"],
				"tareas" => $_POST["tareas"],
				"objetivo" => $_POST["objetivos"],
				"fase_inicial" => $_POST["faseInicial"],
				"fase_central" => $_POST["faseCentral"],
				"fase_final" => $_POST["faseFinal"],
			);


			$respuesta = ModeloUnidadEntrenamiento::mdlActualizarUnidadEntre($tabla, $datos);

			if ($respuesta == "ok") {
				return '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "/inicioSesion/registroDeportista/vistaRegistroDeportista";

				</script>';
			} else {
				// En caso de error, asigna el mensaje de error a la respuesta
				$respuesta = "Error al actualizar la unidad de entrenamiento.";
			}
		} else {
			$respuesta = "El campo 'Unidad y Fecha' es obligatorio."; // Mensaje de error si el campo está vacío
		}

    	return $respuesta; // Devolvemos la respuesta (ya sea "ok" o el mensaje de error)
	}
 

	/*============================*
	//CONTROLADOR ELIMINAR REGISTROS
	*============================*/
	public function ctrEliminarUnidadEntre(){

		if(isset($_POST["eliminarRegistroUnidad"])){

			$tabla = "unidad_entrenamiento";
			$valor = $_POST["eliminarRegistroUnidad"];

			$respuesta = ModeloUnidadEntrenamiento::mdlEliminarUnidadEntre($tabla, $valor);

			if($respuesta == "ok"){

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "/inicioSesion/unidadEntrenamiento/registrosUnidad";

				</script>';

			}

		}

	}
    //
}