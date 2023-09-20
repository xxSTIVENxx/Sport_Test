<?php

//por que se definirar todas las rutas de 
//tipo web que se podran visualizar desde el navegador 

//se carga con el autolad 
use Lib\Route;

use App\Controllers\HomeController;

use App\Controllers\SesionController;
use App\Controllers\InicioController;


use App\Controllers\TestTreintaController;

use App\Controllers\TestCooperController;


use App\Controllers\TestController;
use App\Controllers\RegistroDeportistaController;
use App\Controllers\UnidadEntrenamientoController;


//ruta principal

//realizamos peticiones GET O POST dependiendo si queremos traer o enviar informacion 

Route::get('/', [HomeController::class, 'index']);

// Las rutas dentro de este grupo requerirán que el usuario no esté autenticado (invitado)
// para acceder a ellas. Se definen rutas para mostrar la página de inicio de sesión y procesar 
//el inicio de sesión.
Route::group(["middleware"=>"Guest","prefix"=>"/inicioSesion"],function(){
    Route::get('/inicioSesion', [SesionController::class, 'index']);
    Route::post('/inicioSesion', [SesionController::class, 'ctrIngreso']);
});

// Similar al grupo anterior, este bloque define un grupo de rutas con el prefijo "/registro" y 
//protegidas por el middleware "Guest". Estas rutas están relacionadas con el registro de usuarios.
Route::group(["middleware"=>"Guest","prefix"=>"/registro"],function(){
    Route::get('/registro', [SesionController::class, 'index']);
    Route::post('/registro', [SesionController::class, 'index']);
});


 //Este bloque define un grupo de rutas que tienen el prefijo "/inicioSesion" y están protegidas 
 //por el middleware "Auth". 
 //Estas rutas requieren que el usuario esté autenticado para acceder a ellas y se definen las rutas que queremos acceder y su respectivo metodo GET o POST.
Route::group(["middleware"=>"Auth","prefix"=>"/inicioSesion"],function($prefix){
    Route::get($prefix.'/inicio', [InicioController::class, 'index']);
    Route::get($prefix.'/logout', [InicioController::class, 'logout']);
    Route::get($prefix.'/tests', [TestController::class, 'index']);
    Route::get($prefix.'/unidadEntrenamiento', [UnidadEntrenamientoController::class, 'index']);
    Route::post($prefix.'/unidadEntrenamiento', [UnidadEntrenamientoController::class, 'index']);
    Route::get($prefix.'/unidadEntrenamiento/registrosUnidad', [UnidadEntrenamientoController::class, 'index']);
    Route::post($prefix.'/unidadEntrenamiento/registrosUnidadD', [UnidadEntrenamientoController::class, 'ctrEliminarUnidadEntre']);
    Route::post($prefix.'/unidadEntrenamiento/actualizarUnidad', [UnidadEntrenamientoController::class, 'ctrActualizarUnidadEntre']);
    Route::get($prefix.'/registroDeportista', [RegistroDeportistaController::class, 'index']);
    Route::post($prefix.'/registroDeportistaC', [RegistroDeportistaController::class, 'ctrRegistroDeportista']);
    Route::get($prefix.'/registroDeportista/vistaRegistroDeportista', [RegistroDeportistaController::class, 'index']);
    Route::post($prefix.'/registroDeportista/vistaRegistroDeportista', [RegistroDeportistaController::class, 'ctrEliminarDeportista']);
    Route::post($prefix.'/registroDeportista/vistaRegistroDeportistaA', [RegistroDeportistaController::class, 'ctrActualizarDeportista']);
    Route::get($prefix.'/tests/test30m', [TestTreintaController::class, 'index']);
    Route::post($prefix.'/tests/test30mC', [TestTreintaController::class, 'ctrRegistroTestTreintametros']);
    Route::post($prefix.'/test/test30mA', [TestTreintaController::class, 'ctrActualizarTestTreintametros']);
    Route::post($prefix.'/test/test30mD', [TestTreintaController::class, 'ctrEliminarTestTreintametros']);
    Route::get($prefix.'/tests/testCooper', [TestCooperController::class, 'index']);
    Route::post($prefix.'/tests/testCooperC', [TestCooperController::class, 'ctrRegistroTestCooper']);
    Route::post($prefix.'/tests/testCooperA', [TestCooperController::class, 'ctrActualizarTestCooper']);
    Route::post($prefix.'/tests/testCooperD', [TestCooperController::class, 'ctrEliminarTestCooper']);

});



Route::dispatch();