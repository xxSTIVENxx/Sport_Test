<?php

//traemos los datos de deportista para poder realizar los test
use App\Controllers\TestCooperController;

use App\Controllers\RegistroDeportistaController;

     $item = null;
     $valor = null;

     $deportista = RegistroDeportistaController::ctrSeleccionarDeportista($item, $valor);
     $test = TestCooperController::ctrSeleccionarTestCooper();
     

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Test de Cooper</title>
    
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
    <link rel="icon" type="/png" href="img/logoSportTest.png">

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
                    <div class="card-header py-3">
                        <?php
                        if(isset($_GET["error"])){
                            echo "No se pudo guardar el registro";
                        }
                        ?>
                        <p class="m-0 fw-bold" style="color: var(--bs-gray-dark);">Test de Cooper</p>
                    </div>
                    <div class="card-body">
                        <form action="/inicioSesion/tests/testCooperC" method="post">
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
                                            <strong>Distancia en metros</strong>
                                        </label>
                                        <input type="hidden" id="registroEstado" name="registroEstado" >
                                        <input type="hidden" id="registroEdad" name="registroEdad" >
                                        <input type="hidden" id="registroGenero" name="registroGenero" >
                                        <input id="registroTiempoEnSegundos" class="form-control" value="0" type="text" name="registroTiempoEnSegundos" /></div>
                                </div>
                                
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="last_name"></label>

                                <?php

                                        $registroTestTreinta = TestCooperController::ctrRegistroTestCooper();



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
                    <p class="m-0 fw-bold title-test">Registros Test Cooper</p>
                </div>
                <div class="card-body">
                    
                    <div id="dataTable1" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                        <table id="dataTable" class="table my-0">
                            <thead>
                                <tr>
                                    <th style="width: 235px;">Name</th>
                                    <th style="width: 156px;">fecha</th>
                                    <th style="width: 156px;">Distancia</th>
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
                                                <td>'.$tests["distancia_recorrida"].'</td>
                                                <td>'.$tests["estado"].'</td>
                                                <td><button class="btn btnactualizar" data-target="#actualizarTest30" data-estado="'.$tests["estado"].'" data-sexo="'.$tests["fk_id_genero"].'" data-edad="'.$tests["edad"].'" data-id="'.$tests["idtest"].'" data-deportista="'.$tests["deportista"].'" data-fecha="'.$tests["fecha_realizacion"].'" data-tiempo="'.$tests["distancia_recorrida"].'"  type="button">Actualizar</button>
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




        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
   
        
        <!-- MODAL PARA CONFIRMAR ELIMINACION -->
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


            <!-- MODAL DE ACTUALIZAR DATOS -->
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
                                    <label for="tiempo" class="form-label">Distancia (m)</label>
                                    <input type="text" class="form-control" id="tiempo" name="tiempo" placeholder="0">
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


     
           
    

                <script src="/js/bootstrap.min.js"></script>
                <script src="/js/aos.min.js"></script>
                <script src="/js/bs-init.js"></script>
                <script src="/js/theme.js"></script>


        </body>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script>
            $("#dataTable").DataTable();

            //script permite capturar el id del registro seleccionado 
            $(".btneliminar").on("click",function(){
                $("#eliminarDeportistaId").val($(this).data("id"));
                $("#confirmDeleteModal").modal("show");
            })

             //con este confirmamos la eliminacion del registro 
            $("#confirmDeleteBtn").on("click",function(){
                let id = $("#eliminarDeportistaId").val();
                
                $("#confirmDeleteModal").modal("hide");
                $.ajax({
                    type: "POST",
                    url: "/inicioSesion/tests/testCooperD",
                    data: { id },
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function () {
                        alert("Error de conexión");
                    }
                });
            })


            //Al darle al boton actualizar, captura los datos y los lleva a la vista modal
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

            //permite actualizar los datos
            $("#guardarCambios").on("click",function(){
                id = $("#id").val();
                tiempo = $("#tiempo").val();
                idD = $("#deportista").val();
                estado = $("#estado").val();
                fecha = $("#fecha").val();

                

                $("#actualizarDeportistaModal").modal("hide");
                    $.ajax({
                        type: "POST",
                        url: "/inicioSesion/tests/testCooperA",
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


             //Este código se activa cuando se selecciona una opción en un elemento de selección 
            // el menú desplegable y actualiza los valores de dos campos de entrada
            // ("registroGenero" y "registroEdad") en función de los datos asociados a la opción 
             //seleccionada en este caso el nombre del deportista.
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
               
                $("#estado").val( calcularResultado($("#sexo").val(),$("#edad").val(),$(this).val())) ;

                
            })

            $("#registroTiempoEnSegundos").on("input",function(){
                
                $("#registroEstado").val( calcularResultado($("#registroGenero").val(),$("#registroEdad").val(),$(this).val())) ;
                
            })



            //Este código permite que el usuario solo ingrese números, dos puntos (":") y puntos (".") 
            //en ese campo y evita que se ingresen otros caracteres.
            $("#registroTiempoEnSegundos").on("keypress",function(e){
                if(isNaN(String.fromCharCode(e.which))){
                    if(String.fromCharCode(e.which) != ":" && String.fromCharCode(e.which) != "." ){
                        e.preventDefault();
                    }
                }
            })


            //toma tres parámetros: sexo, edad, y distancia, y calcula el resultado de la condición 
            //física de una persona en función de estos valores. La función utiliza dos tablas 
            //(una para hombres y otra para mujeres) que contienen valores de referencia para 
            //diferentes categorías de edad y distancias.
            function calcularResultado(sexo, edad, distancia) {
                const tablaHombres = {
                    '13-19': [2100, 2200, 2500, 2750, 3000],
                    '20-29': [1950, 2400, 2650, 2850, 2850],
                    '30-39': [1900, 2100, 2350, 2500, 2700],
                    '40-49': [1850, 2000, 2250, 2250, 2650],
                    '50-59': [1650, 1850, 2100, 2300, 2550],
                    '>60': [1400, 1650, 1950, 2150, 2500],
                };

                const tablaMujeres = {
                    '13-19': [1600, 1900, 2100, 2300, 2450],
                    '20-29': [1550, 1800, 1950, 2150, 2350],
                    '30-39': [1500, 1700, 1900, 2100, 2250],
                    '40-49': [1400, 1600, 1800, 2000, 2150],
                    '50-59': [1350, 1500, 1700, 1900, 2100],
                    '>60': [1250, 1600, 1600, 1750, 1900],
                };

                let tabla;
                if (sexo == "1") {
                    // Hombre
                    tabla = tablaHombres;
                } else if (sexo == "2") {
                    // Mujer
                    tabla = tablaMujeres;
                } else {
                    return "Sexo no válido. Debe ser 1 para masculino o 2 para femenino.";
                }

                // Determinar la categoría de edad en base a la edad proporcionada
                let categoriaEdad;
                if (edad >= 13 && edad <= 19) {
                    categoriaEdad = '13-19';
                } else if (edad >= 20 && edad <= 29) {
                    categoriaEdad = '20-29';
                } else if (edad >= 30 && edad <= 39) {
                    categoriaEdad = '30-39';
                } else if (edad >= 40 && edad <= 49) {
                    categoriaEdad = '40-49';
                } else if (edad >= 50 && edad <= 59) {
                    categoriaEdad = '50-59';
                } else if (edad > 60) {
                    categoriaEdad = '>60';
                } else {
                    return "Edad no válida.";
                }

                // Evaluar la condición física en base a la distancia en metros
                if (distancia < tabla[categoriaEdad][0]) {
                    return "Muy Malo";
                } else if (distancia >= tabla[categoriaEdad][0] && distancia < tabla[categoriaEdad][1]) {
                    return "Malo";
                } else if (distancia >= tabla[categoriaEdad][1] && distancia < tabla[categoriaEdad][2]) {
                    return "Medio";
                } else if (distancia >= tabla[categoriaEdad][2] && distancia < tabla[categoriaEdad][3]) {
                    return "Bueno";
                } else if (distancia >= tabla[categoriaEdad][3] && distancia < tabla[categoriaEdad][4]) {
                    return "Muy Bueno";
                } else {
                    return "Excelente";
                }
            }
        </script>
</html>