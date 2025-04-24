<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura Generada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2>Factura generada correctamente</h2>
        <p>Puedes descargar la factura en PDF a continuación:</p>

        <a href="{{ asset('storage/facturas/' . $archivoFactura) }}" class="btn btn-success" download>
            📄 Descargar Factura
        </a>
    </div>
</body>
</html>