<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Facturas Generadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Facturas generadas correctamente</h2>

        @if(count($archivosGenerados) > 0)
            <div class="row">
                @foreach($archivosGenerados as $archivo)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Factura #{{ $archivo['factura_id'] }}</h5>
                                {{-- <iframe src="{{ asset('storage/factura/' . $archivo['nombre_archivo']) }}" width="100%" height="200px"></iframe> --}}
                                <a href="{{ asset('storage/facturas/factura_' . $archivo['factura_id'] . '.pdf') }}" class="btn btn-success mt-3 w-100" download>
                                    📄 Descargar PDF
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('factura.subir') }}" class="btn btn-primary mt-4">⬅ Volver a subir la plantilla</a>
        @else
            <div class="alert alert-warning">
                No se generaron archivos PDF. Por favor, inténtalo de nuevo.
            </div>
        @endif
    </div>
</body>
</html>