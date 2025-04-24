<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/factura/subir', [FacturaController::class, 'mostrarFormulario'])->name('factura.subir');
Route::post('/factura/procesar', [FacturaController::class, 'procesarExcel'])->name('factura.procesar');
Route::get('/factura/plantilla', [FacturaController::class, 'descargarPlantilla'])->name('factura.plantilla');
Route::get('/factura/descargar/{archivoFactura}', [FacturaController::class, 'vistaDescarga'])->name('factura.descargar');
Route::get('/factura/ver/{id}', [FacturaController::class, 'verFactura'])->name('factura.ver');