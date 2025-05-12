<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
@extends('layouts.prueba')
@section('content')
<body>
    <div class="contenedor_register">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center py-3">
                        <h4>Registro de Usuario</h4>
                    </div>

                    <div class="card-body px-5 py-4">
                        <form method="POST" action="{{ route('register.usuario') }}">
                            @csrf

                            <!-- Nombre Completo -->
                            <div class="mb-3">
                                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                                <input id="nombre_completo" type="text" 
                                       class="form-control @error('nombre_completo') is-invalid @enderror" 
                                       name="nombre_completo" value="{{ old('nombre_completo') }}" 
                                       required autofocus>
                                @error('nombre_completo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Tipo Documento -->
                            <div class="mb-3">
                                <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                                <select id="tipo_documento" class="form-control" name="tipo_documento" required>
                                    <option value="CC">Cédula de Ciudadanía</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="CE">Cédula de Extranjería</option>
                                </select>
                            </div>

                            <!-- Número Documento -->
                            <div class="mb-3">
                                <label for="numero_documento" class="form-label">Número de Documento</label>
                                <input id="numero_documento" type="text" 
                                       class="form-control @error('numero_documento') is-invalid @enderror" 
                                       name="numero_documento" value="{{ old('numero_documento') }}" required>
                                @error('numero_documento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input id="email" type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       name="password" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="mb-4">
                                <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                                <input id="password-confirm" type="password" class="form-control" 
                                       name="password_confirmation" required>
                            </div>

                            <!-- Botón de Registro -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary py-2">
                                    Registrarse
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
</html>