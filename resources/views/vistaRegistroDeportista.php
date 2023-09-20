<?php


use App\Controllers\GeneroController;
use App\Controllers\PosicionController;
use App\Controllers\RegistroDeportistaController;

$listarDeportista = RegistroDeportistaController::ctrSeleccionarDeportista(null,null);

$genero = GeneroController::listarGenero();
$posicion = PosicionController::listarPosicion();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</head>
<body id="page-top">

        <?php

            include ('plantilla.php')


        ?>
<div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="m-0 fw-bold" style="color: var(--bs-gray-dark);">Registros de deportistas</p>
                        </div>
                        <div class="card-body">
                        
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th >N°</th>
                                            <th >Nombre</th>
                                            <th >Apellido</th>
                                            <th  >Edad</th>
                                            <th >Genero</th>
                                            <th >Posicion</th>
                                            <th >Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($listarDeportista as $key => $value): ?>
                                            <tr>
                                                <td scope="row"><?php echo ($key + 1); ?></td>
                                                <td><?php echo $value["nombre"]; ?></td>
                                                <td><?php echo $value["apellido"]; ?></td>
                                                <td><?php echo $value["edad"]; ?></td>
                                                <td><?php echo $value["tipo_genero"]; ?></td>
                                                <td><?php echo $value["nombre_posicion"]; ?></td>
                                                <td>
                                                    <button class="btn btn-primary btn-actualizar" data-target="#actualizarDeportistaModal" data-id="<?php echo $value["id"]; ?>"
                                                        data-nombre="<?php echo $value["nombre"]; ?>"
                                                        data-apellido="<?php echo $value["apellido"]; ?>"
                                                        data-edad="<?php echo $value["edad"]; ?>"
                                                        data-genero="<?php echo $value["fk_id_genero"]; ?>"
                                                        data-posicion="<?php echo $value["fk_id_posicion"]; ?>"
                                                        data-telefono="<?php echo $value["telefono"]; ?>"
                                                        data-correo="<?php echo $value["correo"]; ?>"
                                                        data-direccion="<?php echo $value["direccion"]; ?>"
                                                        >
                                                        <i class="fas fa-pencil-alt"></i> Actualizar
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-eliminar" onClick="$('#eliminarDeportistaId').val(`<?php echo $value["id"]; ?>`)" data-toggle="modal" data-target="#confirmDeleteModal" data-id="<?php echo $value["id"]; ?>"><i class="fas fa-trash-alt"></i> Eliminar</button>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                       
                        </div>
                    </div>
                </div>
                
           

            </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>



 <!-- ... Previous HTML code ... -->
<!-- Modal for confirming deletion -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar este registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <input type="hidden" id="eliminarDeportistaId"  name="eliminarRegistroDeportista">
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn"><i class="fas fa-trash-alt"></i> Confirmar Eliminación</button>
            </div>
        </div>
    </div>
</div>






<!-- Modal para actualizar deportista --> 
<div class="modal fade" id="actualizarDeportistaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Deportista</h5>
               
            </div>
            <div class="modal-body">
                <!-- Formulario para actualizar los campos del deportista -->
                <form id="actualizarDeportistaForm" method="post">
                    
                    <div class="mb-3">
                        <label for="actualizarNombreDeportista" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="actualizarNombreDeportista" name="actualizarNombreDeportista" placeholder="Nombre del deportista">
                    </div>
                    <div class="mb-3">
                        <label for="actualizarApellidoDeportista" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="actualizarApellidoDeportista" name="actualizarApellidoDeportista" placeholder="Apellido del deportista">
                    </div>
                    <div class="mb-3">
                        <label for="actualizarEdadDeportista" class="form-label">Edad</label>
                        <input type="text" class="form-control" id="actualizarEdadDeportista" name="actualizarEdadDeportista" placeholder="Edad del deportista">
                    </div>
                     <div class="mb-3">
                        <label for="fk_id_actualizarGeneroDeportista" class="form-label">Género</label>
                        <select class="form-select" id="fk_id_actualizarGeneroDeportista" name="fk_id_actualizarGeneroDeportista">
                        <option value='<?php echo $listarDeportista["fk_id_genero"];?>'><?php echo $listarDeportista["tipo_genero"]; ?></option>
                            <?php
                                 foreach ($genero  as $generos) {
                                 ?>
                                <option value='<?php echo $generos["id"];?>'><?php  echo $generos["tipo_genero"];?></option>
                            <?php

                                }
                            ?>
                        </select>
                        
                    </div>
                    <div class="mb-3">
                        <label for="fk_id_actualizarPosicionDeportista" class="form-label">Posicion</label>
                        <select class="form-select" id="fk_id_actualizarPosicionDeportista" name="fk_id_actualizarPosicionDeportista">
                            <option></option>
                            <?php
                                foreach ($posicion as $posiciones) {
                                    echo "<option value=".$posiciones["id"].">".$posiciones["nombre_posicion"]."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="actualizarTelefonoDeportista" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="actualizarTelefonoDeportista" name="actualizarTelefonoDeportista" placeholder="Teléfono del deportista">
                    </div>
                    <div class="mb-3">
                        <label for="actualizarCorreoDeportista" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="actualizarCorreoDeportista" name="actualizarCorreoDeportista" placeholder="Correo del deportista">
                    </div>
                    <div class="mb-3">
                        <label for="actualizarDireccionDeportista" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="actualizarDireccionDeportista" name="actualizarDireccionDeportista" placeholder="Dirección del deportista">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            
                <input type="hidden" id="deportistaIdActualizar" name="deportistaIdActualizar">
                <button type="button" class="btn btn-primary" id="guardarCambiosDeportistaBtn">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>




<!-- JavaScript actualizado -->
<script>
   $(document).ready(function () 
   {
    $("#dataTable").DataTable();
   

    // Manejar el cierre de la vista modal al hacer clic en el botón "Cancelar" o en la "x"
    $("#confirmDeleteModal").on("hidden.bs.modal", function () {
        // Limpiar el valor del input oculto
        $("#eliminarDeportistaId").val("");
        // Restaurar el fondo a su estado normal
        $("body").removeClass("modal-open");
        $(".modal-backdrop").remove();
    });

    // Capturar clic fuera de la vista modal para cerrarla
    $(document).on("click", function (e) {
        if ($(e.target).hasClass("modal")) {
            $("#confirmDeleteModal").modal("hide");
        }
    });

    $("#confirmDeleteBtn").on("click", function () {
        var deportistaId = $("#eliminarDeportistaId").val();
        console.log(deportistaId);
        $("#confirmDeleteModal").modal("hide");
        $.ajax({
            type: "POST",
            url: "/inicioSesion/registroDeportista/vistaRegistroDeportista",
            data: { eliminarRegistroDeportista: deportistaId },
            success: function (response) {
                window.location.reload();
            },
            error: function () {
                alert("Error de conexión");
            }
        });
    });

    



   // Manejar el clic en el botón "Actualizar"
   $(".btn-actualizar").on("click", function () {
        var id = $(this).data("id");
        var nombre = $(this).data("nombre");
        var apellido = $(this).data("apellido");
        var genero = $(this).data("genero");
        var posicion = $(this).data("posicion");
        var edad = $(this).data("edad");
        var telefono = $(this).data("telefono");
        var correo = $(this).data("correo");
        var direccion = $(this).data("direccion");
        // var fk_id_genero = $(this).data("fk_id_genero");
        console.log(genero);
        // Configurar el campo oculto con el valor del ID del deportista
        $("#deportistaIdActualizar").val(id);
        // Llenar los campos del formulario en la vista modal con los datos del deportista
        $("#actualizarNombreDeportista").val(nombre);
        $("#actualizarApellidoDeportista").val(apellido);
        $("#actualizarEdadDeportista").val(edad);
        $("#actualizarTelefonoDeportista").val(telefono);
        $("#actualizarCorreoDeportista").val(correo);
        $("#actualizarDireccionDeportista").val(direccion);
        $("#fk_id_actualizarGeneroDeportista").val(genero);
        $("#fk_id_actualizarPosicionDeportista").val(posicion);

        // Mostrar la vista modal de actualización
        $("#actualizarDeportistaModal").modal("show");
    });


        $("#guardarCambiosDeportistaBtn").on("click", function () {
            id = $("#deportistaIdActualizar").val();
            nombre = $("#actualizarNombreDeportista").val();
            apellido = $("#actualizarApellidoDeportista").val();
            edad = $("#actualizarEdadDeportista").val();
            telefono = $("#actualizarTelefonoDeportista").val();
            correo = $("#actualizarCorreoDeportista").val();
            direccion = $("#actualizarDireccionDeportista").val();
            fk_id_posicion = $("#fk_id_actualizarPosicionDeportista").val();
            fk_id_genero = $("#fk_id_actualizarGeneroDeportista").val();

            $("#actualizarDeportistaModal").modal("hide");
            $.ajax({
                type: "POST",
                url: "/inicioSesion/registroDeportista/vistaRegistroDeportistaA",
                data: {
                    id, // Usar "id" en lugar de "deportistaIdActualizar"
                    nombre,
                    apellido,
                    edad,
                    telefono,
                    correo,
                    direccion,
                    fk_id_genero,
                    fk_id_posicion
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


});



</script>


<!-- Incluye jQuery y Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        // Manejar el cierre de la vista modal al hacer clic en el botón "Cancelar" o en la "x"
        $("#actualizarDeportistaModal").on("hidden.bs.modal", function () {
            // Limpiar el valor del input oculto
            $("#deportistaIdActualizar").val("");
            // Restaurar el fondo a su estado normal
            $("body").removeClass("modal-open");
            $(".modal-backdrop").remove();
        });
    });
</script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



</body>
</html>