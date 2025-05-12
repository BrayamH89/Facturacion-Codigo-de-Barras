<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\authController;
use App\Http\Middleware\autenticationMiddleware;

Route::get('/', function () {
     return view('auth.login');
})->name('login.usuarios');

Route::post('/login', [authController::class, 'login'])->name('login.procesar');

Route::middleware([autenticationMiddleware::class])->group(function(){

Route::get('/register', [authController::class, 'registro'])->name('register.usuarios');
Route::post('/register', [authController::class, 'register'])->name('register.usuario');

Route::delete('/eliminar/usuario/{id}',[authController::class,'eliminarUsuario'])->name('eliminar.usuario');

Route::get('/usuarios/{id}/editar', [authController::class, 'editarUsuario'])->name('editar.usuario');
Route::put('/usuarios/{id}', [authController::class, 'updateUser'])->name('actualizar.usuarios');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/factura/subir', [FacturaController::class, 'mostrarFormulario'])->name('factura.subir');
Route::post('/factura/procesar', [FacturaController::class, 'procesarExcel'])->name('factura.procesar');

Route::get('/factura/plantilla', [FacturaController::class, 'descargarPlantilla'])->name('factura.plantilla');

Route::get('/factura/descargar/{numero_factura}', [FacturaController::class, 'descargarFactura'])
     ->name('factura.descargar');
     
Route::get('/factura/ver/{id}', [FacturaController::class, 'verFactura'])->name('factura.ver');

Route::get('/factura/mostrarPdfs', [FacturaController::class, 'mostrarPdfs'])->name('Pdfs');

Route::get('/usuarios', [authController::class, 'traerUsuarios'])->name('listar.usuarios');

Route::get('/descargar/plantilla', [FacturaController::class, 'descargarPlantilla'])->name('plantilla.descargar');

Route::get('/logout', [authController::class, 'logout'])->name('logout');

});