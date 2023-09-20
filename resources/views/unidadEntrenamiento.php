<?php



use App\Controllers\UnidadEntrenamientoController;



?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Unidad de Entrenamiento</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/bootstrap/css/animate.min.css">
    <link rel="stylesheet" href="/bootstrap/css/aos.min.css">
    <link rel="stylesheet" href="/css/untitled.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">


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

<div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container-fluid">
                        
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <?php
                                                if(isset($_GET["status"])){
                                                    echo "No se pudo guardar la unidad";
                                                }
                                            ?>
                                            <div class="card-header py-3">
                                                <p class="m-0 fw-bold" style="color: var(--bs-gray-dark);">Unidad de entrenamiento</p>
                                            </div>

                                            <div class="card-body">
                                                <form method="post" enctype= multipart/form-data>
                                                    <div class="row">
                                                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
                                                            <div class="mb-3"><label class="form-label" for="registroUnidad"><strong>Unidad N°*</strong></label>
                                                            <input class="form-control" type="text" id="registroUnidad" placeholder="" name="registroUnidad"></div>
                                                        </div>
                                                        <div class="col-sm-9 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                            <div class="mb-3"><label class="form-label" for="registroFechaHora"><strong>Fecha/Hora*</strong></label>
                                                            <input class="form-control" type="datetime-local" id="registroFechaHora" name="registroFechaHora"></div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-2 col-xxl-4">
                                                            <div class="mb-3"><label class="form-label" for="registroLugar"><strong>Lugar</strong></label>
                                                            <input class="form-control" type="text" id="registroLugar" placeholder="" name="registroLugar"></div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-2 col-xxl-4">
                                                            <div class="mb-3"><label class="form-label" for="registroPeriodo"><strong>Periodo</strong></label>
                                                            <input class="form-control" type="text" id="registroPeriodo" placeholder="" name="registroPeriodo"></div>
                                                        </div>
                                                        <div class="col-md-6 col-lg-3 col-xl-3 col-xxl-2">
                                                            <div class="mb-3"><label class="form-label" for="registroEtapa"><strong>Etapa</strong></label>
                                                            <input class="form-control" type="text" id="registroEtapa" placeholder="" name="registroEtapa"></div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-4">
                                                            <div class="mb-3"><label class="form-label" for="registroMetodo"><strong>Metodo</strong></label>
                                                            <input class="form-control" type="text" id="registroMetodo" placeholder="" name="registroMetodo"></div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-9 col-xl-7 col-xxl-4">
                                                            <div class="mb-3"><label class="form-label" for="registroContenido"><strong>Contenido</strong></label>
                                                            <input class="form-control" type="text" id="registroContenido" placeholder="" name="registroContenido"></div>
                                                        </div>
                                                        <div class="col-sm-4 col-md-3 col-lg-3 col-xl-2 col-xxl-2">
                                                            <div class="mb-3"><label class="form-label" for="registroRE"><strong>%R.E (PPM)</strong></label>
                                                            <input class="form-control" type="text" id="registroRE" placeholder="" name="registroRE"></div>
                                                        </div>
                                                        <div class="col-sm-8 col-md-9 col-lg-6 col-xl-6 col-xxl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroTareas"><strong>Tareas</strong></label>
                                                            <input class="form-control" type="text" id="registroTareas" placeholder="" name="registroTareas"></div>
                                                        </div>
                                                        <div class="col-lg-6 col-xl-6 col-xxl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroObjetivo"><strong>Objetivo</strong></label>
                                                            <input class="form-control" type="text" id="registroObjetivo" placeholder="" name="registroObjetivo"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroFaseInicial"><strong>Fase inicial / Entrada en calor</strong></label>
                                                            <textarea class="form-control descripcion" id="registroFaseInicial" name="registroFaseInicial"></textarea></div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroFotoFaseInicial"><strong>Grafica 1</strong></label>
                                                            <input class="form-control inputImg" type="file" id="registroFotoFaseInicial" name="registroFotoFaseInicial" accept="image"></div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroFaseCentral"><strong>Fase Centarl/ Desarrollo</strong></label>
                                                            <textarea class="form-control descripcion" id="registroFaseCentral" name="registroFaseCentral"></textarea></div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroFotoFaseCentral"><strong>Grafica 2</strong></label>
                                                            <input class="form-control inputImg" type="file" id="registroFotoFaseCentral" name="registroFotoFaseCentral" accept="image"></div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroFaseFinal"><strong>Fase final/ Vuelta a la calma</strong></label>
                                                            <textarea class="form-control descripcion" id="registroFaseFinal" name="registroFaseFinal"></textarea></div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="mb-3"><label class="form-label" for="registroFotoFaseFinal"><strong>Grafica 3</strong></label>
                                                            <input class="form-control inputImg" type="file" id="registroFotoFaseFinal" name="registroFotoFaseFinal" accept="image"></div>
                                                        </div>
                                                       
                                                            <div class="mb-3"><label class="form-label" for="last_name"></label>
                                                            <?php
                                                                if (isset($_POST["registroUnidad"])) {
                                                                    $registroUnidadEntrenamiento = UnidadEntrenamientoController::ctrRegistroUnidadEntre();
                                                                
                                                                    if ($registroUnidadEntrenamiento == "ok") {
                                                                        echo '<script>
                                                                                if (window.history.replaceState) {
                                                                                    window.history.replaceState(null, null, window.location.href);
                                                                                }
                                                                            </script>';
                                                                
                                                                        echo '<div class="alert alert-success" role="alert">
                                                                                <i class="bi bi-check-circle"></i> Deportista registrado con éxito
                                                                            </div>';
                                                                    } else {
                                                                        echo '<div class="alert alert-danger" role="alert">
                                                                                <i class="bi bi-exclamation-circle"></i> ' . $registroUnidadEntrenamiento . '
                                                                            </div>';
                                                                    }
                                                                }
                                                                
                                                                ?>
                                                            <button class="btn btn-sm btnguardar" type="submit">Guardar</button></div>
                                                            
                                                    
                                                            
                                                    </div>
                                                    <a class="btn btn-sm btnverregistro" role="button" href="/inicioSesion/unidadEntrenamiento/registrosUnidad">Ver registros</a></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3"></div>
                    </div>
                </div>

        
</html>
