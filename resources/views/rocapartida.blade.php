<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a la Región de Los Tuxtlas</title>
    <!-- Aquí irían tus enlaces a CSS puro: -->
    <!-- <link rel="stylesheet" href="{{ asset('mycss/style.css') }}"> -->
    <style>
        body {
            font-family: sans-serif;
            background-color: #f0f4f8;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 { color: #004d40; }
        .data-box { border-left: 4px solid #004d44; padding-left: 15px; margin-top: 20px; }
        .btn-admin { 
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #5d50c6;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sistema de Gestión Turística - Los Tuxtlas</h1>
        <p>Esta es la página de inicio pública del sistema.</p>

        <!-- ============================================= -->
        <!-- Impresión de Datos del Primer Centro Turístico -->
        <!-- ============================================= -->
        <hr>
        <h2>Información de Muestra (Primer Registro)</h2>

        @if ($primerCentro)
            <div class="data-box">
                <h3>Centro Turístico:</h3>
                <!-- Accede a la propiedad nomcentur que viene de la DB/Modelo -->
                <strong>Nombre:</strong> {{ $primerCentro->nomcentur }} <br>
                <strong>Dirección:</strong> {{ $primerCentro->dircentur }} <br>
                <p>
                    <a href="{{ route('centro.mostrar', ['nombre' => $primerCentro->nomcentur]) }}">Ver Detalle Público</a>
                </p>
            </div>
        @else
            <p style="color: #cc0000;">¡Aún no hay centros turísticos registrados en la base de datos!</p>
        @endif

        <!-- ============================================= -->
        <!-- Impresión de Datos del Primer Guía Turístico -->
        <!-- ============================================= -->
        @if ($primerGuia)
            <div class="data-box">
                <h3>Guía Turístico:</h3>
                <!-- Accede a la propiedad nomguia que viene de la DB/Modelo -->
                <strong>Nombre:</strong> {{ $primerGuia->nomguia }}
            </div>
        @endif

        <a href="{{ route('dashboard') }}" class="btn-admin">Acceder al Panel de Administración</a>
    </div>
</body>
</html>