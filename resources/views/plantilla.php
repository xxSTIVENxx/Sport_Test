<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Plantilla</title>
    <link rel="icon" type="image/png" href="/img/logoSportTest.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/aos.min.css">
    <link rel="stylesheet" href="/css/untitled.css">
    
    
    
</head>


<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-16"><i ><img src="/img/logoSportTest.png" alt="" style="width: 80px; "></i></div>
                    <div class="sidebar-brand-text mx-1"><span>SPORT TEST</span></div>
                </a>
                <hr class="sidebar-divider my-0" />
                <ul id="accordionSidebar" class="navbar-nav text-light">
                    <li class="nav-item elemento"><a class="nav-link" href="/inicioSesion/inicio"><i class="fas fa-home" style="font-size: 14px;"></i><span>Inicio</span></a></li>
                    <li class="nav-item elemento"><a class="nav-link" href="/inicioSesion/tests"><i class="fas fa-clipboard-list" style="font-size: 14px;"></i><span>Test de Velocidad</span></a></li>
                    <li class="nav-item elemento"><a class="nav-link" href="/inicioSesion/unidadEntrenamiento"><i class="fas fa-chart-bar" style="font-size: 14px;"></i><span>Unidad Entrenamiento</span></a></li>
                    <li class="nav-item elemento"><a class="nav-link" href="/inicioSesion/registroDeportista"><i class="fas fa-user-plus" style="font-size: 14px;"></i><span>Registro deportista&nbsp;</span></a></li>

                    <li class="nav-item "></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button id="sidebarToggle" class="btn rounded-circle border-0" type="button"></button></div>
            </div>
        </nav>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                  
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo $_SESSION["nombre"]; ?></span><img class="border rounded-circle img-profile" src="/img/user.png" /></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                       <a class="dropdown-item" href="/inicioSesion/logout"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>Cerrar Sesion</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <script src="/js/bootstrap.min.js"></script>
                <script src="/js/aos.min.js"></script>
                <script src="/js/bs-init.js"></script>
                <script src="/js/theme.js"></script>
        </body>
</html>
