<?php

namespace App\Controllers;

use App\Models\ModeloRegistroDeportista;

//lo extendemos del controlador Controller 
//para que trauga sus funciones 

class RegistroDeportistaController extends Controller {

    public function index(){

        //el que trae las vistas, yendo a buscar los archivos

        $uri = $_SERVER['REQUEST_URI'];
		$uri = explode("?",$uri)[0];
        if ($uri === '/inicioSesion/registroDeportista') {
            return Controller::view('registroDeportista');
        } elseif ($uri === '/inicioSesion/registroDeportista/vistaRegistroDeportista') {
            return Controller::view('vistaRegistroDeportista');
        } else {
            // Manejar otras rutas o mostrar un mensaje de error
            echo "Ruta no encontrada";
        }
        
    }


	/*============================*
	//CONTROLADOR DE REGISTRO
	*============================*/
    static public function ctrRegistroDeportista(){
		
		if(isset($_POST["registroNombreDeportista"])){

			$tabla = "deportista";
			if(isset($_FILES["registroFotoDeportista"]["tmp_name"])){
				file_put_contents(__DIR__."/../../public/img/fotos/".$_FILES["registroFotoDeportista"]["name"],file_get_contents($_FILES["registroFotoDeportista"]["tmp_name"]));
			}
			
			$datos = array("nombre" => $_POST["registroNombreDeportista"],
                           "apellido" => $_POST["registroApellidoDeportista"],
                           "edad" => $_POST["registroEdadDeportista"],
                           "telefono" => $_POST["registroTelefonoDeportista"],
                           "correo" => $_POST["registroCorreoDeportista"],
                           "direccion" => $_POST["registroDireccionDeportista"],
				           "foto"=> "/img/fotos/".$_FILES["registroFotoDeportista"]["name"],
                           "fk_id_genero" => $_POST["fk_id_registroGeneroDeportista"],
						   "fk_id_posicion" => $_POST["fk_id_registroPosicion"],
						  
						);

			$respuesta = ModeloRegistroDeportista::mdlRegisDeportista($tabla, $datos);
			if($respuesta ==="ok"){
				header("location:/inicioSesion/registroDeportista?estado=ok");
			}
			else{
				header("location:/inicioSesion/registroDeportista?error=1");
			}
			

		}

	}

		/*============================*
	//CONTROLADOR SELECCIONAR O TRAER REGISTROS
	*============================*/

	static public function ctrSeleccionarDeportista($item = null, $valor = null){

		$tabla = "deportista";

		$respuesta = ModeloRegistroDeportista::mdlSeleccionarDeportista($tabla, $item, $valor);

		return $respuesta;

	}


     /*=============================================
	ACTUALIZAR REGISTRO
	=============================================*/
	static public function ctrActualizarDeportista(){

		if(isset($_POST["nombre"])){

			$tabla = "deportista";

			$datos = array("id" => $_POST["id"],
							"nombre" => $_POST["nombre"],
						    "apellido" => $_POST["apellido"],
                            "edad" => $_POST["edad"],
                            "telefono" => $_POST["telefono"],
                            "correo" => $_POST["correo"],
                            "direccion" => $_POST["direccion"],
                            // "fotoDeportista"=> addslashes(file_get_contents ($_FILES["actualizarFotoDeportista"]["tmp_name"])),
                            "fk_id_genero" => $_POST["fk_id_genero"],
							"fk_id_posicion" => $_POST["fk_id_posicion"],
                        );//ES IMG

			$respuesta = ModeloRegistroDeportista::mdlActualizarDeportista($tabla, $datos);

			return $respuesta;

		}


	}

	/*=============================================
	ELIMINAR REGISTRO
	=============================================*/
	public function ctrEliminarDeportista(){

		if(isset($_POST["eliminarRegistroDeportista"])){

			$tabla = "deportista";
			$valor = $_POST["eliminarRegistroDeportista"];

			$respuesta = ModeloRegistroDeportista::mdlEliminarDeportista($tabla, $valor);

			if($respuesta == "ok"){
 
				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "/inicioSesion/registroDeportista/vistaRegistroDeportista";

				</script>';

			}

		}

	}

}