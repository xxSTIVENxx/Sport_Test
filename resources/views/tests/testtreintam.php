<?php


use App\Controllers\TestTreintaController;

use App\Controllers\RegistroDeportistaController;

     $item = null;
     $valor = null;

     $deportista = RegistroDeportistaController::ctrSeleccionarDeportista($item, $valor);
     $test = TestTreintaController::ctrSeleccionarTestTreintametros();
     

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Test de 30m</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/bootstrap/css/animate.min.css">
    <link rel="stylesheet" href="/bootstrap/css/aos.min.css">
    <link rel="stylesheet" href="/css/untitled.css">
    <link rel="icon" type="/image/png" href="img/logoSportTest.png">

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


            require_once '../resources/views/plantilla.php';



            ?>
    <div id="wrapper">
        <div class="container-fluid">
            <div class="col">
                <div class="card shadow mb-3">
                    <?php
                        if(isset($_GET["error"])){
                            echo "No se pudo guardar el registro";
                        }
                    ?>
                    <div class="card-header py-3">
                        <p class="m-0 fw-bold" style="color: var(--bs-gray-dark);">Test de 30m</p>
                    </div>
                    <div class="card-body">
                        <form action="/inicioSesion/tests/test30mC" method="post">
                            <div class="col-sm-4 col-md-3 col-lg-3 col-xl-1 btnguardar">
                                <div class="mb-3"></div>
                            </div>
                            <div class="row">
                            <div class="col-12 col-sm-6 col-md-7 col-lg-5 col-xl-5">
                                    <div class="mb-3">
                                        <label class="form-label" for="registroFkIdDeportista"><strong>Deportista</strong>
                                        </label>
                                        <select class="form-select" style="color: var(--bs-btn-color);" id="registroFkIdDeportista"  name="registroFkIdDeportista">
                                            <option value=""></option>
                                            <?php
                                            foreach ($deportista  as $deportistas) {
                                                ?>
                                                    <option data-genero='<?php echo $deportistas["fk_id_genero"];?>' data-edad='<?php echo $deportistas["edad"];?>' value='<?php echo $deportistas["id"];?>'><?php echo $deportistas["nombre"];?></option>
                                                <?php

                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-5 col-lg-2 col-xl-2 col-xxl-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="registroFecha">
                                            <strong>Fecha</strong>
                                        </label>
                                    <input id="registroFecha" class="form-control" type="date" name="registroFecha" /></div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5 col-xxl-5">
                                    <div class="mb-3">
                                        <label class="form-label" for="registroTiempoEnSegundos">
                                            <strong>Tiempo en segundos</strong>
                                        </label>
                                        <input type="hidden" id="registroEstado" name="registroEstado" >
                                        <input type="hidden" id="registroEdad" name="registroEdad" >
                                        <input type="hidden" id="registroGenero" name="registroGenero" >
                                        <input id="registroTiempoEnSegundos" class="form-control" value="00:00:00.0" type="text" name="registroTiempoEnSegundos" /></div>
                                </div>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="last_name"></label>

                                <?php

                                        $registroTestTreinta = TestTreintaController::ctrRegistroTestTreintametros();



                                        if($registroTestTreinta == "ok")
                                        {
                                            echo '<script>
                                            if (window.history.replaceState) {
                                                window.history.replaceState(null, null, window.location.href);
                                            }
                                            </script>';

                                        echo '<div class="alert alert-success" role="alert">
                                            <i class="bi bi-check-circle"></i> Unidad de entrenamiento registrada
                                        </div>';
                                        }


                                        ?>

                                <button class="btn btn-sm btnguardar" type="submit">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
            
            

            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="m-0 fw-bold title-test">Registros  Test de 30 m</p>
                  
                </div>
                <div class="card-body">
                    
                    <div id="dataTable1" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                        <table id="dataTable" class="table my-0">
                            <thead>
                                <tr>
                                    <th style="width: 235px;">Name</th>
                                    <th style="width: 156px;">fecha</th>
                                    <th style="width: 156px;">Tiempo</th>
                                    <th style="width: 156px;">Estado</th>
                                    <th style="width: 250px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        foreach ($test as $tests) {
                                            echo '
                                            <tr>
                                                <td><img class="rounded-circle me-2" width="30" height="30" src="'.$tests["foto"].'" />'.$tests["nombre"]." ".$tests["apellido"].'</td>
                                                <td>'.$tests["fecha_realizacion"].'</td>
                                                <td>'.$tests["tiempo_en_segundos"].'</td>
                                                <td>'.$tests["estado"].'</td>
                                                <td><button class="btn btnactualizar" data-target="#actualizarTest30" data-estado="'.$tests["estado"].'" data-sexo="'.$tests["fk_id_genero"].'" data-edad="'.$tests["edad"].'" data-id="'.$tests["idtest"].'" data-deportista="'.$tests["deportista"].'" data-fecha="'.$tests["fecha_realizacion"].'" data-tiempo="'.$tests["tiempo_en_segundos"].'"  type="button">Actualizar</button>
                                                <button data-id="'.$tests["idtest"].'" class="btn btn-primary btneliminar btn-danger" type="button">Eliminar</button></td>
                                            </tr>
                                            ';
                                        }
                                    ?>
                                    
                               
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                            
                        </div>
                        <div class="modal-body">
                            ¿Está seguro de que desea eliminar este registro?
                        </div>
                        <div class="modal-footer">

                            <input type="hidden" id="eliminarDeportistaId"  name="eliminarRegistroDeportista">
                            <button  type="button" class="btn btn-danger" id="confirmDeleteBtn"><i class="fas fa-trash-alt"></i> Confirmar Eliminación</button>


                        </div>
                    </div>
                </div>
            </div>


            
            <div class="modal fade" id="actualizarTest30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar Test</h5>
                            
                        </div>
                        <div class="modal-body">
                            <!-- Formulario para actualizar los campos del deportista -->
                            <form id="actualizarTestForm" method="post">
                                
                                <div class="mb-3">
                                    <label for="deportista" class="form-label">Deportista</label>
                                    <input type="hidden" id="id" name="id">
                                    <select type="text" class="form-control" id="deportista" name="deportista" placeholder="Nombre del deportista">
                                        <?php
                                        foreach ($deportista as $deportistas) {
                                            echo "<option data-genero='".$deportistas["fk_id_genero"]."' data-edad='".$deportistas["edad"]."' value='".$deportistas["id"]."'>".$deportistas["nombre"]." ".$deportistas["apellido"]."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
                                </div>
                                <div class="mb-3">
                                    <label for="tiempo" class="form-label">Tiempo (s)</label>
                                    <input type="text" class="form-control" id="tiempo" name="tiempo" placeholder="00:00:00.0">
                                    <input type="hidden" class="form-control" id="sexo" name="sexo">
                                    <input type="hidden" class="form-control" id="edad" name="edad">
                                </div>
                                <div class="mb-3">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" id="estado" readonly name="estado" placeholder="Estado">
                                </div>
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                           
                            <button type="button" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>




        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
   
    
    

                <script src="/js/bootstrap.min.js"></script>
                <script src="/js/aos.min.js"></script>
                <script src="/js/bs-init.js"></script>
                <script src="/js/theme.js"></script>


                


        </body>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
            $("#dataTable").DataTable();

            $(".btneliminar").on("click",function(){
                $("#eliminarDeportistaId").val($(this).data("id"));
                $("#confirmDeleteModal").modal("show");
            })

            $(".btnactualizar").on("click",function(){
                var id = $(this).data("id");
                var deportista = $(this).data("deportista");
                var estado = $(this).data("estado");
                var fecha = $(this).data("fecha");
                var tiempo = $(this).data("tiempo");
                var sexo = $(this).data("sexo");
                var edad = $(this).data("edad");

                $("#id").val(id);
                $("#deportista").val(deportista);
                $("#estado").val(estado);
                $("#fecha").val(fecha);
                $("#tiempo").val(tiempo);
                $("#sexo").val(sexo);
                $("#edad").val(edad);

                $("#actualizarTest30").modal("show");


            })

            $("#confirmDeleteBtn").on("click",function(){
                let id = $("#eliminarDeportistaId").val();
                
                $("#confirmDeleteModal").modal("hide");
                $.ajax({
                    type: "POST",
                    url: "/inicioSesion/test/test30mD",
                    data: { id },
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function () {
                        alert("Error de conexión");
                    }
                });
            })

            $("#guardarCambios").on("click",function(){
                id = $("#id").val();
                tiempo = $("#tiempo").val();
                idD = $("#deportista").val();
                estado = $("#estado").val();
                fecha = $("#fecha").val();

                

                $("#actualizarDeportistaModal").modal("hide");
                    $.ajax({
                        type: "POST",
                        url: "/inicioSesion/test/test30mA",
                        data: {
                            id, 
                            idD,
                            tiempo,
                            estado,
                            fecha
                        },
                        success: function (response) {
                            window.location.reload();
                        },
                        error: function (xhr, status, error) {
                            alert("Error al actualizar el deportista: " + error);
                            console.log(xhr.responseText);
                        }
                });
            });

            $("#deportista").on("change",function(){
                let option = $(this).find('option:selected');
                $("#sexo").val(option.data("genero"));
                $("#edad").val(option.data("edad"));
            })

            $("#registroFkIdDeportista").on("change",function(){
                let option = $(this).find('option:selected');
                $("#registroGenero").val(option.data("genero"));
                $("#registroEdad").val(option.data("edad"));
            })

            $("#tiempo").on("keypress",function(e){
                if(isNaN(String.fromCharCode(e.which))){
                    if(String.fromCharCode(e.which) != ":" && String.fromCharCode(e.which) != "." ){
                        e.preventDefault();
                    }
                }
            })
            $("#tiempo").on("input",function(){
                formatoValido = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9].[0-9]$/.test($(this).val());
                if(!formatoValido){
                    $(this).css("color","red");
                    $("#estado").val("Tiempo no valido");
                }else{
                    $(this).css("color","black");
                    
                    $("#estado").val( calcularResultado($("#sexo").val(),$("#edad").val(),convertirATiempoEnSegundos($(this).val()))) ;

                }
            })

            $("#registroTiempoEnSegundos").on("input",function(){
                formatoValido = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9].[0-9]$/.test($(this).val());
                if(!formatoValido){
                    $(this).css("color","red");
                    $("#registroEstado").val("Tiempo no valido");
                }else{
                    $(this).css("color","black");
                    $("#registroEstado").val( calcularResultado($("#registroGenero").val(),$("#registroEdad").val(),convertirATiempoEnSegundos($(this).val()))) ;
                }
            })
            $("#registroTiempoEnSegundos").on("keypress",function(e){
                if(isNaN(String.fromCharCode(e.which))){
                    if(String.fromCharCode(e.which) != ":" && String.fromCharCode(e.which) != "." ){
                        e.preventDefault();
                    }
                }
            })

            function calcularResultado(sexo, edad, tiempo) {
                if (sexo == "1") { // Hombre
                    if (edad >= 16 && edad <= 24) {
                        if (tiempo < 3.5) {
                            return "Excelente";
                        } else if (tiempo >= 3.5 && tiempo < 3.9) {
                            return "Muy bueno";
                        } else if (tiempo >= 3.9 && tiempo < 4.4) {
                            return "Bueno";
                        } else if (tiempo >= 4.4 && tiempo < 4.9) {
                            return "Aceptable";
                        } else {
                            return "Necesita mejorar";
                        }
                    } else if (edad >= 25 && edad <= 34) {
                        if (tiempo < 3.6) {
                            return "Excelente";
                        } else if (tiempo >= 3.6 && tiempo < 4.0) {
                            return "Muy bueno";
                        } else if (tiempo >= 4.0 && tiempo < 4.5) {
                            return "Bueno";
                        } else if (tiempo >= 4.5 && tiempo < 5.0) {
                            return "Aceptable";
                        } else {
                            return "Necesita mejorar";
                        }
                    } else if (edad >= 35 && edad <= 44) {
                        if (tiempo < 3.7) {
                            return "Excelente";
                        } else if (tiempo >= 3.7 && tiempo < 4.1) {
                            return "Muy bueno";
                        } else if (tiempo >= 4.1 && tiempo < 4.6) {
                            return "Bueno";
                        } else if (tiempo >= 4.6 && tiempo < 5.1) {
                            return "Aceptable";
                        } else {
                            return "Necesita mejorar";
                        }
                    } else {
                        return "Edad no válida";
                    }
                } else if (sexo == "2") { // Mujer
                    if (edad >= 16 && edad <= 24) {
                        if (tiempo < 3.9) {
                            return "Excelente";
                        } else if (tiempo >= 3.9 && tiempo < 4.3) {
                            return "Muy bueno";
                        } else if (tiempo >= 4.3 && tiempo < 4.8) {
                            return "Bueno";
                        } else if (tiempo >= 4.8 && tiempo < 5.3) {
                            return "Aceptable";
                        } else {
                            return "Necesita mejorar";
                        }
                    } else if (edad >= 25 && edad <= 34) {
                        if (tiempo < 4.0) {
                            return "Excelente";
                        } else if (tiempo >= 4.0 && tiempo < 4.4) {
                            return "Muy bueno";
                        } else if (tiempo >= 4.4 && tiempo < 4.9) {
                            return "Bueno";
                        } else if (tiempo >= 4.9 && tiempo < 5.4) {
                            return "Aceptable";
                        } else {
                            return "Necesita mejorar";
                        }
                    } else if (edad >= 35 && edad <= 44) {
                        if (tiempo < 4.1) {
                            return "Excelente";
                        } else if (tiempo >= 4.1 && tiempo < 4.5) {
                            return "Muy bueno";
                        } else if (tiempo >= 4.5 && tiempo < 5.0) {
                            return "Bueno";
                        } else if (tiempo >= 5.0 && tiempo < 5.5) {
                            return "Aceptable";
                        } else {
                            return "Necesita mejorar";
                        }
                    } else {
                        return "Edad no válida";
                    }
                } else {
                    return "Sexo no válido";
                }
            }
            function convertirATiempoEnSegundos(tiempo) {
                const partes = tiempo.split(":"); // Dividimos el tiempo en partes

                if (partes.length === 3) {
                    const horas = parseInt(partes[0], 10);
                    const minutos = parseInt(partes[1], 10);
                    const segundos = parseFloat(partes[2]);

                    // Calculamos el tiempo total en segundos
                    const tiempoTotalEnSegundos = horas * 3600 + minutos * 60 + segundos;

                    return tiempoTotalEnSegundos;
                } else {
                    return "Formato de tiempo no válido";
                }
            }
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</html>