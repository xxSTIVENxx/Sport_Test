<?php

use App\Controllers\SesionController;

use App\Controllers\DeporteController;

use App\Controllers\TipoUsuarioController;

     $item = null;
     $valor = null;

     $deporte = DeporteController::listarDeportes($item, $valor);
     $tipoUsuario = TipoUsuarioController::listarTipoUsuario($item, $valor);
     

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - MagtimusPro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/logoSportTest.png">


    <!-- PARA QUE SE PUEDA REFRESCAR LA PAGINA Y NO SE DUPLIQUEN DATOS -->
    <script>
    (function(){
        var not = function(){
            window.history.replaceState(null, null, window.location.href);
        }
        setTimeout(not, 0);
    })();
    </script>


</head>
<body>
    <main>
        <div class="contenedor__todo">
            <!-- Register Form -->
            <form action="" class="formulario__register" method="post">
                <h2>Regístrate</h2>
                <input type="text" placeholder="Nombre completo" name="registrarNombre" required>
                <input type="email" placeholder="Correo Electrónico" name="registrarCorreo" required>
                <input type="password" placeholder="Contraseña" name="registrarContrasena" required>
                <input type="text" placeholder="Edad"  name="registraredad" required>


                <div class="contenedorSelect">
                            <label for="RegistrarDeporte">Deporte</label> 
                                <select id="RegistrarDeporte" name="registrofk_id_deporte">
               
                                    <?php
                                    foreach ($deporte  as $deportes) {
                                        ?>
                                    
                                    

                                    <option value='<?php echo $deportes["id"];?>'><?php echo $deportes["tipo_deporte"];?></option>
                                    <?php

                                    }
                                    ?>
                           </select>
                        </div>





                        <div class="contenedorSelect">
                            <label for="registroFk_id_profesion">Profesion</label> 
                                <select id="registroFk_id_profesion" name="registrofk_id_tipo_usuario">
               
                                    <?php
                                    foreach ($tipoUsuario  as $tipoUsuarios) {
                                        ?>
                                    
                                    

                                    <option value='<?php echo $tipoUsuarios["id"];?>'><?php echo $tipoUsuarios["nombre_tipo_usuario"];?></option>
                                    <?php

                                    }
                                    ?>
                           </select>
                        </div>


                        <?php 
                            $registro = SesionController::ctrRegistroUsuario();


                            if($registro == "ok"){
                    
                                echo '<script>

                                if ( window.history.replaceState ) {
                
                                    window.history.replaceState( null, null, window.location.href );
                
                                }
                
                            </script>';
                
                            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                        
                        
                        }
                
                     ?>
                        
                <button class="btn__registrarse"  type="submit">Registrarme</button>
                <!-- Botón para registrarse con enlace -->
                <a href="/inicioSesion" class="btn__registrarse">Iniciar Sesion</a>
            </form>
        </div>
    </main>
</body>
</html>
