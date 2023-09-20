<?php

use App\Controllers\UnidadEntrenamientoController;

$listarUnidad = UnidadEntrenamientoController::ctrSeleccionarUnidadEntre(null,null);

if(isset($_GET["id_unidad"])){

	$item = "id_unidad";
	$valor = $_GET["id_unidad"];

     $undiad = UnidadEntrenamientoController::ctrSeleccionarUnidadEntre($item, $valor);
     

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Unidad de Entrenamiento</title>
    
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    

    <link rel="icon" type="image/png" href="/img/logoSportTest.png">
    
</head>


<body id="page-top">
<?php include('plantilla.php') ?>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="m-0 fw-bold" style="color: var(--bs-gray-dark);">Registros de la unidad de entrenamiento</p>
        </div>
        <div class="card-body">
           
            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Unidad</th>
                        <th>Fecha y Hora</th>
                        <th>Lugar</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                     <tbody>
                     <?php foreach ($listarUnidad as $key => $value): ?>
                        <tr>
                            <td scope="row"><?php echo ($key + 1); ?></td>
                            <td><?php echo $value["unidad"]; ?></td>
                            <td><?php echo $value["fecha_hora"]; ?></td>
                            <td><?php echo $value["lugar"]; ?></td>
                    
                            <td>
                            <button class="btn btn-info btn-ver-todo" data-toggle="modal"
                                data-target="#verTodoModal"
                                data-id="<?php echo $value["id_unidad"]; ?>"
                                data-unidad="<?php echo $value["unidad"]; ?>"
                                data-fecha-hora="<?php echo $value["fecha_hora"]; ?>"
                                data-lugar="<?php echo $value["lugar"]; ?>"
                                data-periodo="<?php echo $value["periodo"]; ?>"
                                data-etapa="<?php echo $value["etapa"]; ?>"
                                data-metodo="<?php echo $value["metodo"]; ?>"
                                data-contenido="<?php echo $value["contenido"]; ?>"
                                data-tareas="<?php echo $value["tareas"]; ?>"
                                data-objetivos="<?php echo $value["objetivos"]; ?>"
                                data-fase-inicial="<?php echo $value["fase_inicial"]; ?>"
                                data-fase-central="<?php echo $value["fase_central"]; ?>"
                                data-fase-final="<?php echo $value["fase_final"]; ?>">
                                <i class="fas fa-eye"></i> Ver Todo
                            </button>

                                <!-- Botón Eliminar que abre su propia vista modal -->
                                <button onClick="$('#eliminarUnidadId').val(`<?php echo $value["id_unidad"]; ?>`)" class="btn btn-danger btn-eliminar" data-toggle="modal" data-target="#eliminarModal"
                                    data-id="<?php echo $value["id_unidad"]; ?>">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>

                                <!-- Botón Actualizar que abre la vista modal de actualización -->
                                <button class="btn btn-primary btn-actualizar" data-target="#actualizarModal" data-id="<?php echo $value["id_unidad"]; ?>"
                                    data-unidad="<?php echo $value["unidad"]; ?>"
                                    data-fecha_hora="<?php echo $value["fecha_hora"]; ?>"
                                    data-lugar="<?php echo $value["lugar"]; ?>"
                                    data-etapa="<?php echo $value["etapa"]; ?>"
                                    data-metodo="<?php echo $value["metodo"]; ?>"
                                    data-contenido="<?php echo $value["contenido"]; ?>"
                                    data-re_dato="<?php echo $value["re_dato"]; ?>"
                                    data-tareas="<?php echo $value["tareas"]; ?>"
                                    data-objetivos="<?php echo $value["objetivos"]; ?>"
                                    data-fase-inicial="<?php echo $value["fase_inicial"]; ?>"
                                    data-fase-central="<?php echo $value["fase_central"]; ?>"
                                    data-fase-final="<?php echo $value["fase_final"]; ?>">
                                    <i class="fas fa-pencil-alt"></i> Actualizar
                                </button>
                            </td>
                        </tr>
                        
                       
                    <?php endforeach ?>


                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
</div>

</div>
<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

    <!-- La vista modal que se mostrará cuando el usuario haga clic en "Ver todo" -->
    <div class="modal fade" id="verTodoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalles de la Unidad de Entrenamiento</h5>
                    
                </div>
                <div class="modal-body">
                    <!-- Aquí se mostrarán los detalles de la unidad de entrenamiento -->
                    <div class="unidad-detalle-modal">
                        <div class="unidad">Unidad: <span id="unidadDetalle"></span></div>
                        <div class="fecha_hora"><span id="fechaHoraDetalle"></span></div>
                        <div class="lugar">Lugar: <span id="lugarDetalle"></span></div>
                        <div class="periodo">Periodo: <span id="periodoDetalle"></span></div>
                        <div class="etapa">Etapa: <span id="etapaDetalle"></span></div>
                        <div class="metodo">Método: <span id="metodoDetalle"></span></div>
                        <div class="contenido">Contenido: <span id="contenidoDetalle"></span></div>
                        <div class="tareas">Tareas: <span id="tareasDetalle"></span></div>
                        <div class="objetivos">Objetivos: <span id="objetivosDetalle"></span></div>
                        <div class="fase_inicial">Fase Inicial: <span id="faseInicialDetalle"></span></div>
                        <div class="fase_central">Fase Central: <span id="faseCentralDetalle"></span></div>
                        <div class="fase_final">Fase Final: <span id="faseFinalDetalle"></span></div>
                        <!-- Agrega otros campos que deseas mostrar -->
                    </div>
                </div>
                <div class="modal-footer">
                   
                </div>
            </div>
        </div>
    </div>

<!-- Vista modal para Actualizar-->
<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Unidad de Entrenamiento</h5>
              
            </div>
            <div class="modal-body">
    <!-- Formulario para actualizar la unidad de entrenamiento -->
    <form id="actualizarForm" method="post">
    <div class="form-group">
        <label for="unidadActualizada">Unidad:</label>
        <input type="text" class="form-control" id="unidadActualizada" name="unidad">
        <input type="hidden" class="form-control" id="unidadIdActualizar" name="unidad">
    </div>
    <div class="form-group">
        <label for="fechaHoraActualizada">Fecha y Hora:</label>
        <input type="datetime-local" class="form-control" id="fechaHoraActualizada" name="fecha_hora">
    </div>
    <div class="form-group">
        <label for="lugarActualizado">Lugar:</label>
        <input type="text" class="form-control" id="lugarActualizado" name="lugar">
    </div>
    <div class="form-group">
        <label for="etapaActualizada">Etapa:</label>
        <input type="text" class="form-control" id="etapaActualizada" name="etapa">
    </div>
    <div class="form-group">
        <label for="metodoActualizado">Metodo:</label>
        <input type="text" class="form-control" id="metodoActualizado" name="metodo">
    </div>
    <div class="form-group">
        <label for="contenidoActualizado">Contenido:</label>
        <input type="text" class="form-control" id="contenidoActualizado" name="contenido">
    </div>
    <div class="form-group">
        <label for="REActualizado">RE:</label>
        <input type="text" class="form-control" id="REActualizado" name="RE">
    </div>
    <div class="form-group">
        <label for="tareasActualizado">Tareas:</label>
        <input type="text" class="form-control" id="tareasActualizado" name="tareas">
    </div>
    <div class="form-group">
        <label for="objetivoActualizado">Objetivos:</label>
        <input type="text" class="form-control" id="objetivoActualizado" name="objetivos">
    </div>
    <div class="form-group">
        <label for="faseInicialActualizada">fASE Inicial:</label>
        <input type="text" class="form-control" id="faseInicialActualizada" name="fase_inicial">
    </div>
    <div class="form-group">
        <label for="faseCentralActualizada">fASE Central:</label>
        <input type="text" class="form-control" id="faseCentralActualizada" name="fase_central">
    </div>
    <div class="form-group">
        <label for="faseFinalActualizada">fASE Final:</label>
        <input type="text" class="form-control" id="faseFinalActualizada" name="fase_final">
    </div>
</form>
            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="guardarCambiosBtn">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>


<!-- Vista modal para Eliminar -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Unidad de Entrenamiento</h5>
               
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar esta unidad de entrenamiento?
            </div>
            <div class="modal-footer">
               
                <input type="hidden" id="eliminarUnidadId" name="eliminarRegistroUnidad">
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn"><i class="fas fa-trash-alt"></i> Confirmar Eliminación</button>
            </div>
        </div>
    </div>
</div>





<!-- JavaScript -->

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {

        $("#dataTable").DataTable();

        // Manejar clic en el botón "Ver todo"
        $(".btn-ver-todo").on("click", function () {
        var unidadId = $(this).data("id");
        var unidad = $(this).data("unidad");
        var fechaHora = $(this).data("fecha-hora");
        var lugar = $(this).data("lugar");
        var periodo = $(this).data("periodo");
        var etapa = $(this).data("etapa");
        var metodo = $(this).data("metodo");
        var contenido = $(this).data("contenido");
        var tareas = $(this).data("tareas");
        var objetivos = $(this).data("objetivos");
        var faseInicial = $(this).data("fase-inicial");
        var faseCentral = $(this).data("fase-central");
        var faseFinal = $(this).data("fase-final");

        // Llenar los detalles en la vista modal de "verTodoModal"
        $("#unidadDetalle").text("Unidad: " + unidad);
        $("#fechaHoraDetalle").text("Fecha y Hora: " + fechaHora);
        $("#lugarDetalle").text("Lugar: " + lugar);
        $("#periodoDetalle").text("Periodo: " + periodo);
        $("#etapaDetalle").text("Etapa: " + etapa);
        $("#metodoDetalle").text("Método: " + metodo);
        $("#contenidoDetalle").text("Contenido: " + contenido);
        $("#tareasDetalle").text("Tareas: " + tareas);
        $("#objetivosDetalle").text("Objetivos: " + objetivos);
        $("#faseInicialDetalle").text("Fase Inicial: " + faseInicial);
        $("#faseCentralDetalle").text("Fase Central: " + faseCentral);
        $("#faseFinalDetalle").text("Fase Final: " + faseFinal);

        // Mostrar la vista modal
        $("#verTodoModal").modal("show");
    });



        $("#verTodoModal").on("hidden.bs.modal", function () {
            // Limpiar el valor del input oculto
            $("#verTodoModal").val("");
            // Restaurar el fondo a su estado normal
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
        });

        // Capturar clic fuera de la vista modal para cerrarla
        $(document).on("click", function (e) {
            if ($(e.target).hasClass("modal")) {
                $("#verTodoModal").modal("hide");
            }
        });









        // Manejar clic en el botón "Eliminar"
        // Manejar clic en el botón "Eliminar" de la tabla
            $(".btn-eliminar").on("click", function () {
                var unidadId = $(this).data("id");
                $("#eliminarUnidadId").val(unidadId);
                $("#eliminarModal").modal("show");
            });

            $("#verTodoModal").on("hidden.bs.modal", function () {
            // Limpiar el valor del input oculto
            $("#verTodoModal").val("");
            // Restaurar el fondo a su estado normal
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
        });

        // Capturar clic fuera de la vista modal para cerrarla
        $(document).on("click", function (e) {
            if ($(e.target).hasClass("modal")) {
                $("#verTodoModal").modal("hide");
            }
        });



    // Manejar el cierre de la vista modal al hacer clic en el botón "Cancelar" o en la "x"
$("#eliminarModal").on("hidden.bs.modal", function () {
    // Limpiar el valor del input oculto
    $("#eliminarUnidadId").val("");
    // Restaurar el fondo a su estado normal
    $("body").removeClass("modal-open");
    $(".modal-backdrop").remove();
});

// Capturar clic fuera de la vista modal para cerrarla
$(document).on("click", function (e) {
    if ($(e.target).hasClass("modal")) {
        $("#eliminarModal").modal("hide");
    }
});


    // Manejar clic en el botón "Confirmar Eliminación"
    $("#confirmDeleteBtn").on("click", function () {
    var unidadId = $("#eliminarUnidadId").val();
    $("#eliminarModal").modal("hide");
    $.ajax({
        type: "POST",
        url: "/inicioSesion/unidadEntrenamiento/registrosUnidadD",
        data: { eliminarRegistroUnidad: unidadId },
        success: function (response) {
            window.location.reload();
        },
        error: function () {
            alert("Error de conexión");
        }
    });
});
 

//---------------------------------------------------------

// Manejar clic en el botón "Actualizar"
// Manejar clic en el botón "Actualizar"




        

        // Manejar clic en el botón "Guardar Cambios"
       $("#guardarCambiosBtn").on("click", function () {
    // Obtener el valor del campo oculto unidadIdActualizar
    var unidadId = $("#unidadIdActualizar").val();

    // Obtener los valores de los campos del formulario de actualización
    var unidad = $("#unidadActualizada").val();
    var fechaHora = $("#fechaHoraActualizada").val();
    var lugar = $("#lugarActualizado").val();
    var etapa = $("#etapaActualizada").val();
    var metodo = $("#metodoActualizado").val();
    var contenido = $("#contenidoActualizado").val();
    var re_dato = $("#REActualizado").val();
    var tareas = $("#tareasActualizado").val();
    var objetivo = $("#objetivoActualizado").val();
    var faseInicial = $("#faseInicialActualizada").val();
    var faseCentral = $("#faseCentralActualizada").val();
    var faseFinal = $("#faseFinalActualizada").val();

    // Realizar una solicitud AJAX para enviar los datos actualizados al servidor
    $.ajax({
        type: "POST",
        url: "/inicioSesion/unidadEntrenamiento/actualizarUnidad", // Reemplaza con la URL correcta para actualizar la unidad
        data: {
            unidadId: unidadId, // Enviar el ID de la unidad a actualizar
            unidad: unidad,
            fechaHora: fechaHora,
            lugar: lugar,
            etapa: etapa,
            metodo: metodo,
            contenido: contenido,
            re_dato: re_dato,
            tareas: tareas,
            objetivos: objetivo,
            faseInicial: faseInicial,
            faseCentral: faseCentral,
            faseFinal: faseFinal
            // Agrega otros campos aquí si es necesario
        },
        success: function (response) {
            // Manejar la respuesta del servidor, por ejemplo, mostrar un mensaje de éxito
            
             window.location.reload(); // Recargar la página o realizar otras acciones necesarias
            
        },
        error: function () {
            alert("Error de conexión");
        }
    });
});




    });

    


    $(".btn-actualizar").on("click", function () {
    var unidadId = $(this).data("id");
    var unidad = $(this).data("unidad");
    var fechaHora = $(this).data("fecha_hora");
    var lugar = $(this).data("lugar");
    var etapa = $(this).data("etapa");
    var metodo = $(this).data("metodo");
    var contenido = $(this).data("contenido");
    var re_dato = $(this).data("re_dato");
    var tareas = $(this).data("tareas");
    var objetivo = $(this).data("objetivos");
    var faseInicial = $(this).data("fase-inicial");
    var faseCentral = $(this).data("fase-central");
    var faseFinal = $(this).data("fase-final");

    // Configura el campo oculto con el valor de unidadId
    $("#unidadIdActualizar").val(unidadId);

    // Llenar los campos del formulario con los datos de la unidad seleccionada
    $("#unidadActualizada").val(unidad);
    $("#fechaHoraActualizada").val(fechaHora);
    $("#lugarActualizado").val(lugar);
    $("#etapaActualizada").val(etapa);
    $("#metodoActualizado").val(metodo);
    $("#contenidoActualizado").val(contenido);
    $("#REActualizado").val(re_dato);
    $("#tareasActualizado").val(tareas);
    $("#objetivoActualizado").val(objetivo);
    $("#faseInicialActualizada").val(faseInicial);
    $("#faseCentralActualizada").val(faseCentral);
    $("#faseFinalActualizada").val(faseFinal);

    // Mostrar la vista modal de actualización
    $("#actualizarModal").modal("show");
});
</script>


</body>
</html>
