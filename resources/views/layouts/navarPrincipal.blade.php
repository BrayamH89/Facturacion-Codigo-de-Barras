<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lobster&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/administracion.css') }}">

</head>
<body>
    <header class="headePadre">
        <div>
            <img class="verticalAmarillo"src="{{ asset('storage/logos/horizontal_full_color.png') }}" alt="verticalAmarillo" />
        </div>
        <div class="titulosNav">
            <h3 class="titulo-principal">Generador de Codigo de Barras</h3>        
        </div>
    </header>

    <div class="container-fluid">
        <!-- Contenido principal -->
        <main  class="col-12 col-md-9 mt-4">
            @yield('content')
        </main>
    </div>
    
    <footer class="text-center py-5 ">
        
            <p class="mb-2">
                Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación Nacional – Resolución No. 944 de 1996 MEN – SNIES 2731
            </p>
            <p class="mb-2">
                <strong>Sede Principal:</strong> Cra. 122 No. 12-459 Pance, Cali – Colombia<br>
                Teléfonos: +57 (2) 555 2767 – +57 (2) 312 0038

            <p class="small mb-0">© 2025 Universidad Católica. Todos los derechos reservados.</p>
        
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>