<?php

use App\Controllers\GeneroController;
use App\Controllers\PosicionController;
use App\Controllers\RegistroDeportistaController;

     $item = null;
     $valor = null;

    $genero = GeneroController::listarGenero($item, $valor);
    $posicion = PosicionController::listarPosicion($item, $valor);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registro Deportista</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/bootstrap/css/animate.min.css">
    <link rel="stylesheet" href="/bootstrap/css/aos.min.css">
    <link rel="stylesheet" href="/css/untitled.css">
    <link rel="icon" type="image/png" href="/img/logoSportTest.png">

    <script>
    (function(){
        var not = function(){
            window.history.replaceState(null, null, window.location.href);
        }
        setTimeout(not, 0);
    })();
    </script>
    
</head>


<body id="page-top">

        <?php

            include ('plantilla.php')


        ?>

<div class="container-fluid">
                    
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <?php

                                        if(isset($_GET["estado"])|| isset($_GET["error"])){
                                            if($_GET["estado"] == "ok"){
                                                echo "Deportista registrado exitosamente";
                                            }else{
                                                if($_GET["error"] == "1"){
                                                    echo "No se pudo registrar";
                                                }
                                            }

                                        }
                                            
                                        ?>
                                        <div class="card-header py-3">
                                            <p class="m-0 fw-bold" style="color: var(--bs-gray-dark);">Registrar Deportista</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="/inicioSesion/registroDeportistaC" method="post" enctype= multipart/form-data>
                                                <div class="col-sm-4 col-md-3 col-lg-3 col-xl-1 btnguardar">
                                                    <div class="mb-3"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-5 col-xxl-3">
                                                        <div class="mb-3"><label class="form-label" for="registroNombreDeportista"><strong>Nombre</strong></label>
                                                        <input class="form-control" type="text" id="registroNombreDeportista" name="registroNombreDeportista"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-5 col-md-5 col-lg-4 col-xl-5 col-xxl-3">
                                                        <div class="mb-3"><label class="form-label" for="registroApellidoDeportista"><strong>Apellido</strong></label>
                                                        <input class="form-control" type="text" id="registroApellidoDeportista"  name="registroApellidoDeportista"></div>
                                                    </div>
                                                    <div class="col-6 col-sm-2 col-md-2  col-xl-2">
                                                        <div class="mb-3"><label class="form-label" for="registroEdadDeportista"><strong>Edad</strong></label>
                                                        <input class="form-control" type="text" id="registroEdadDeportista" name="registroEdadDeportista"></div>
                                                    </div>
                                                    <div class="col-6 col-sm-2 col-md-3 col-lg-2 col-xl-2">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="registroGeneroDeportista">
                                                                <strong>Genero</strong>
                                                            </label>
                                                            <select class="form-select" style="color: var(--bs-btn-color);"  name="fk_id_registroGeneroDeportista">
                                                                
                                                                    <?php
                                                                    foreach ($genero  as $generos) {
                                                                        ?>
                                                                    
                                                                    

                                                                    <option value='<?php echo $generos["id"];?>'><?php echo $generos["tipo_genero"];?></option>
                                                                    <?php

                                                                    }
                                                                    ?>
                                                               
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-5 col-md-5 col-lg-2 col-xl-2">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="fk_id_registroPosicion">
                                                                <strong>Posicion</strong>
                                                            </label>
                                                            <select class="form-select" style="color: var(--bs-btn-color);"  name="fk_id_registroPosicion">
                                                                
                                                                    <?php
                                                                    foreach ($posicion  as $posiciones) {
                                                                        ?>
                                                                    
                                                                    

                                                                    <option value='<?php echo $posiciones["id"];?>'><?php echo $posiciones["nombre_posicion"];?></option>
                                                                    <?php

                                                                    }
                                                                    ?>
                                                                
                                                            </select> 
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-3">
                                                        <div class="mb-3"><label class="form-label" for="registroTelefonoDeportista"><strong>Telefono</strong></label>
                                                        <input class="form-control" type="text" id="registroTelefonoDeportista" name="registroTelefonoDeportista"></div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-5">
                                                        <div class="mb-3"><label class="form-label" for="registroCorreoDeportista"><strong>Correo</strong></label>
                                                        <input class="form-control" type="email" id="registroCorreoDeportista" name="registroCorreoDeportista" placeholder="email@gmail.com"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-xl-6">
                                                        <div class="mb-3"><label class="form-label" for="registroDireccionDeportista"><strong>Direccion</strong></label>
                                                        <input class="form-control" type="text" id="registroDireccionDeportista" name="registroDireccionDeportista"></div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3"><label class="form-label" for="last_name"></label>
                                                            <label class="form-label" for="registroFotoDeportista">
                                                                <strong>Foto</strong>
                                                            </label>
                                                            <input class="form-control" type="file" id="registroFotoDeportista" name="registroFotoDeportista"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><label class="form-label" for="btn"></label>

                                                    <button class="btn btn-sm btnguardar" type="submit">Guardar</button>
                                        
                                                    <a class="btn btn-sm btnverregistro" role="button" href="/inicioSesion/registroDeportista/vistaRegistroDeportista">Ver registros</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3"></div>
        
</html>
