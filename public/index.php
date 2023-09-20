<?php
//esto es solo para importaciones 

//este autolad permitira llamar ese archivo en cual quier otro y asi importar las clase

use App\Config\Conexion;



require_once '../autoload.php';

//archivo de rutas 
require_once '../routes/web.php';




//para ver si esta la conexion
//require_once "..App\Config\Conexion.php";
$conexion = Conexion::conectar();
