<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Factura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body class="bg-light">
@extends('layouts.prueba')
@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Subir Archivo Excel de Factura</h2>
        
        <form action="{{ route('factura.procesar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="archivo_excel" class="form-label">Selecciona archivo Excel</label>
                <input type="file" name="archivo_excel" id="archivo_excel" class="form-control" required>
            </div>
            <div class="btn_subir">
                <a href="{{ route('plantilla.descargar') }}" class="btn"> Descargar Plantilla Excel <i class="fa-solid fa-file-excel"></i></a>
                <button type="submit" class="btn"> Procesar Factura <i class="fa-solid fa-file-pdf"></i></button>
            </div>
        </form>
        
    </div>
</body>
@endsection
</html>