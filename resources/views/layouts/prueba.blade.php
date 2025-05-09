<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Lobster&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/administracion2.css') }}">

    <title>Navar</title>

</head>

<header class="headePadre">
    <div>
        <img class="verticalAmarillo"src="{{ asset('storage/logos/horizontal_full_color.png') }}" alt="verticalAmarillo" />
    </div>
    <div class="titulosNav">
        <h3 class="titulo-principal">Generador de Codigo de Barras</h3>        
    </div>
</header>

<div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-12 col-md-3 sidebar vh-100 d-none d-md-block" style="color: #333; box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.2); background-color: #f8f9fa;">
                <h4 class="text-center py-3"  onclick="window.history.back()">
                    <i class="fas fa-tachometer-alt me-2"></i> <!-- Logo de dashboard -->
                    Menú
                </h4>
                <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('factura.subir') }}">
                    <i class="fa-solid fa-house"></i> Subir Archivos
                </a>
                <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('listar.usuarios') }}">
                    <i class="fa-solid fa-users"></i> Listar Usuarios
                </a>
                <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('register.usuarios') }}">
                    <i class="fa-solid fa-user-plus"></i> Registrar Usuarios
                </a>
                <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('logout') }}">
                    <i class="fa-solid fa-right-from-bracket"></i>Salir
                </a>
            </div>
    
            <!-- Navbar para móviles -->
            <nav class="navbar navbar-expand-md navbar-light bg-light d-md-none">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <span class="navbar-brand">
                        <i class="fas fa-tachometer-alt me-2"></i> Menú
                    </span>
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                            <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('factura.subir') }}">
                                <i class="fa-solid fa-house"></i> Subir Archivos
                            </a>
                            <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('listar.usuarios') }}">
                                <i class="fa-solid fa-file-arrow-up"></i> Listar Usuarios
                            </a>
                            <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('register.usuarios') }}">
                                <i class="fa-solid fa-file-arrow-up"></i> Registrar Usuarios
                            </a>
                            <a class="d-block py-2 px-3 sidebar-link"  href="{{ route('logout') }}">
                                <i class="fa-solid fa-right-from-bracket"></i>Salir
                            </a>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <!-- Contenido principal -->
            <main  class="col-12 col-md-9 mt-4">
                @yield('content')
            </main>
        </div>
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
