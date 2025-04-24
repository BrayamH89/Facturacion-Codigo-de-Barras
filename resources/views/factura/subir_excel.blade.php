<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Subir Archivo Excel de Factura</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('factura.procesar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="archivo_excel" class="form-label">Selecciona archivo Excel</label>
                <input type="file" name="archivo_excel" id="archivo_excel" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Procesar Factura</button>
        </form>

        <hr>

        <a href="{{ route('factura.plantilla') }}" class="btn btn-success mt-3">Descargar Plantilla Excel</a>
    </div>
</body>
</html>