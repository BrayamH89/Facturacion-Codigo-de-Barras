<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <div class="d-flex gap-3 mt-4">
            <a href="{{ route('plantilla.descargar') }}" class="btn btn-success mt-3">Descargar Plantilla Excel</a>
            <button type="submit" class="btn btn-success mt-3">Procesar Factura</button>
        </div>
        </form>
        
    </div>
</body>
@endsection
</html>