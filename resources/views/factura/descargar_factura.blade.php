<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>

    <!-- Estilos CSS de Bootstrap y DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/descargarPDF.css') }}">
    <link rel="stylesheet" href="{{ asset('js/dashboard.js') }}">
    
</head>
<body>
@extends('layouts.navarPrincipal')
@section('content')

    <div class="container mt-4">
    <h2 class="text-center mb-4">Descargar Factura</h2>
        <table id="tb_pdf" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">Número de Factura</th>
                    <th class="text-center">Nombre del Responsable</th>
                    <th class="text-center">Número ID</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factura as $item)
                    
                
                    <tr>
                        <td class="text-center">{{$item->numero_factura}}</td>
                        <td class="text-center">{{$item->responsable}}</td>
                        <td class="text-center">{{$item->numero_id}}</td>
                        <td>
                            <div class= "btn-descargar">
                                 <a href="{{ asset('storage/facturas/factura_' . $item['numero_factura'] . '.pdf') }}" class="btn btn-success mt-3 w-100" download>
                                    Descargar PDF <i class="fa-solid fa-file-pdf"></i>
                                </a> 
                            </div>
                        </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>
        <a href="{{ route('factura.subir') }}" class="btn btn-primary mt-4">⬅ Volver a subir la plantilla</a>

    </div>
</body>
@endsection
</html>
    <!-- Scripts al final del body -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts de DataTables -->
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tb_pdf').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                }
            });
        });

        // $(document).ready(function() {
        //     $('#tb_pdf').DataTable({
        //         columnDefs: [
        //             { 
        //                 type: 'date-euro', 
        //                 targets: 0 // Columna de fecha
        //             }
        //         ],
        //         order: [[0, 'desc']] // Ordenar por fecha más reciente primero
        //     });
        // });
    </script>
    


    

    
