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



Route::get('/', [HomeController::class, 'index']);

Route::group(["middleware"=>"Guest","prefix"=>"/inicioSesion"],function(){
    Route::get('/inicioSesion', [SesionController::class, 'index']);
    Route::post('/inicioSesion', [SesionController::class, 'ctrIngreso']);
});

Route::group(["middleware"=>"Guest","prefix"=>"/registro"],function(){
    Route::get('/registro', [SesionController::class, 'index']);
    Route::post('/registro', [SesionController::class, 'index']);
});


 
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








//-- COMO METODO CALLBAk 

//para llevar a esto a un controlador 
// Route::get('/about', function (){
//     return 'Hola desde la pagina about';
// });

// Route::get('/courses/:slug', function ($slug){
//     return 'Hola desde la pagina ' . $slug;
// });


Route::dispatch();