<?php

use App\Controllers\SesionController;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MagtimusPro</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" type="image/png" href="img/logoSportTest.png">
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
            <!-- Login Form -->
            <div class="contenedor__login-register">
                <form action="/inicioSesion" class="formulario__login"  method="post">
                    <h2>Iniciar Sesión</h2>
                    <?php
                        if (isset($_COOKIE["error"])){
                            if($_COOKIE["error"] == "1"){
                                echo "error de contraseña";
                            }
                        }
                        
                    ?>
                    <input type="text" placeholder="Correo Electrónico" name="ingresoCorreo" required>
                    <input type="password" placeholder="Contraseña" name="ingresoContrasena" required>
                  
                    <button type="submit">Ingresar</button>
                    <!-- Botón para registrarse con enlace -->
                    <a href="/registro" class="btn__registrarse">Registrarse</a>
                </form>
            </div>
        </div>
    </main>
</body>
</html>