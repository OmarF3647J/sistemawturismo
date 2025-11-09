<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Institucional</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* --- ENCABEZADO CORREGIDO CON TABLA HTML --- */
        header {
            position: fixed;
            top: -10px;   /* ajusta según el tamaño del header */
            left: 0;
            right: 0;
            margin-top: 1.5cm;
            margin-bottom: 1cm;
            padding: 0 1cm; /* Padding horizontal del header */
        }
        .barra-roja{
            position: fixed;
            width: 100%;
            height: 1cm;
            background-color: rgb(109, 15, 15);
            margin-bottom: 1cm;
        }
        
        /* Estilo para la tabla dentro del header */
        .header-table {
            width: 100%; /* La tabla ocupa todo el ancho del header */
            border-collapse: collapse;
        }
        
        .header-table td {
            width: 25%; /* Cada celda ocupa el 25% */
            height: auto;
            text-align: center;
            vertical-align: middle;
            padding: 0 0.4cm; /* Espacio entre logos */
        }
        
        .header-table img {
            width: 100%;
            height: auto;
            object-fit: contain;
            max-height: 2.5cm; 
        }




        /* PIE DE PÁGINA */
        footer {
            position: fixed;
            bottom: -10px; /* ajusta según el tamaño del footer */
            left: 0;
            right: 0;
            height: 2.6cm;
            text-align: center;
            margin: 0 auto;

            width: 100%;
        }
        footer img{
            width: 100%;
            margin: 0 auto;
            margin-bottom: 0.7cm;
        }

        /* Estilo para la tabla dentro del header */
        .footer-table {
            width: 100%; /* La tabla ocupa todo el ancho del header */
            border-collapse: collapse;
            margin: auto;
            padding-left: 1cm;
            padding-right: 1cm;
        }
        
        .footer-table td {
            width: 15%; /* Cada celda ocupa el 25% */
            height: auto;
            text-align: center;
            vertical-align: middle;
            padding: 0 0.4cm; /* Espacio entre logos */
        }
        
        .footer-table img {
            width: 100%;
            height: auto;
            object-fit: contain;
            max-height: 3cm;
            
        }




        /* CONTENIDO */
        main {
            /* Dejamos el espacio necesario para el header */
            margin-top: 4.5cm;  
            margin-bottom: 2.5cm; 
            text-align: justify;
            font-size: 13px;
            padding: 0 1cm; /* Padding para el contenido */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 25px;
        }

        .descripcion_centro{
            margin: auto;
            width: 85%;
            font-size: 15PX;
        }


/* Estilos para la tabla externa de 2 columnas */
.data-grid-table {

    margin: auto;
    width: 85%;
    border-collapse: collapse;
    margin-top: 1.5cm;
    margin-bottom: 1cm;
}

/* Estilos para las celdas de la tabla externa (las 2 columnas) */
.grid-col {
    width: 50%; /* Cada columna ocupa la mitad */
    padding-right: 1.5cm; /* Espacio entre las dos grandes secciones */

    top: 3cm;
}

/* Títulos de la sección (DIRECCIÓN Y CONTACTO) */
.data-title {
    font-size: 15px;
    margin: 0;
    text-align: left;
    color: #333;
    text-transform: uppercase;
}

/* Línea separadora roja */
.title-divider {
    border: none;
    height: 2px;
    background-color: #d9534f; /* Rojo */
    width: 100%;
    margin-top: 5px;
    margin-bottom: 10px;
    text-align: left;
}

/* Estilos para la tabla interna (los 5 datos) */
.inner-data-table {
    width: 100%;
    border-collapse: collapse;
}

.inner-data-table tr {
    line-height: 1.6;
}

/* Estilo para los datos de la izquierda */
.inner-data-table td {
    padding: 3px 0;
    text-align: left;
    font-size: 14px;
}

/* Opcional: Estilo para enlaces o correos */
.email-link {
    color: #007bff;
    text-decoration: underline;
}

hr{
    width: 85%;
    background-color: #909090;
}




</style>




</head>
<body>
    <!-- HEADER (Usando Tabla para máxima compatibilidad PDF) -->
    <div class="barra-roja"></div>
    <header>
        <table class="header-table">
            <tr>
                <td>
                    <img src="{{ public_path('images/logos/educacion.png') }}">
                </td>
                <td>
                    <img src="{{ public_path('images/logos/sectur_2024.png') }}">
                </td>
                <td>
                    <img src="{{ public_path('images/logos/tecnm_azul_nb.png') }}" height="90%">
                </td>
                <td>
                    <img src="{{ public_path('images/logos/ITSSAT.png') }}">
                </td>
   

            </tr>
        </table>
    </header>

    <!-- FOOTER -->
    <footer>
            
        <table class="footer-table">
            <tr>
                <td>
                    <img src="{{ public_path('images/logos/gob-veracruz.png') }}">
                </td>
                <td>
                    <img src="{{ public_path('images/logos/sev-lineas.png') }}">
                </td>
                <td>
                    <img src="{{ public_path('images/logos/semsys.png') }}">
                </td>
                <td>
                    <img src="{{ public_path('images/logos/det.png') }}">
                </td>
                <td>
                    
                </td>
                <td>
                    <img src="{{ public_path('images/logos/amor-veracruz.png') }}">
                </td>


            </tr>
        </table>
        <img src="{{ public_path('images/logos/barradecorada.png') }}">
    </footer>

    <!-- CONTENIDO -->
    <main>

        <div class="descripcion_centro">
        <h1>Centro Turístico: db</h1>
        <p>
            Este reporte ha sido generado automáticamente por el sistema de turismo,
            mostranddo la información más reciente de los centros registrados.
        </p>
        </div>


    <table class="data-grid-table">
        <tr>
            <!-- Columna 1 de la tabla externa (50% de ancho) -->
            <td class="grid-col">
                <h3 class="data-title">DIRECCIÓN Y CONTACTO</h3>
                <hr class="title-divider">
                
                <!-- Tabla Interna de 5 filas, 1 columna -->
                <table class="inner-data-table">
                    <tr><td><b>Tipo de Centro:</b> Parque Natural</td></tr>
                    <tr><td><b>Dirección:</b> Av. Principal 123, Col. Centro, Ciudad Verde, México</td></tr>
                    <tr><td><b>Responsable:</b> Laura Mendoza</td></tr>
                    <tr><td><b>Teléfono:</b> 55-1234-5678</td></tr>
                    <tr><td><b>Correo:</b> <span class="email-link">parquesol@example.com</span></td></tr>
                </table>
            </td>

            <!-- Columna 2 de la tabla externa (50% de ancho) -->
            <td class="grid-col">
                <h3 class="data-title">Servicios</h3>
                <hr class="title-divider">

                <!-- Tabla Interna de 5 filas, 1 columna (Ejemplo 2) -->
                <table class="inner-data-table">
                    <tr><td>- CABAÑAS</td></tr>
                    <tr><td>- RESTAURANTES</td></tr>
                    <tr><td>- GUÍAS TURÍSTICOS</td></tr>
                    <tr><td>- ARTESANÍAS</td></tr>

                </table>
            </td>
        </tr>
    </table>
  

    <hr>
    <br>
    <br>





    <table class="data-grid-table">
        <tr>
            <!-- Columna 1 de la tabla externa (50% de ancho) -->
            <td class="grid-col">
                <h3 class="data-title">GUÍAS TURÍSTICAS</h3>
                <hr class="title-divider">
                
                <!-- Tabla Interna de 5 filas, 1 columna -->
                <table class="inner-data-table">
                    <tr><td><b>Nombre del grupo: </b> Ixmatis Operadora Turística </td></tr>
                    <tr><td><b>Dirección:</b> Av. Principal 123, Col. Centro, Ciudad Verde, México</td></tr>
                    <tr><td><b>Responsable:</b> Laura Mendoza</td></tr>
                    <tr><td><b>Teléfono:</b> 55-1234-5678</td></tr>
                    <tr><td><b>Correo:</b> <span class="email-link">parquesol@example.com</span></td></tr>
                </table>
            </td>


        </tr>
    </table>



    <table class="data-grid-table">
        <tr>
            <!-- Columna 1 de la tabla externa (50% de ancho) -->
            <td class="grid-col">
                <h3 class="data-title">GUÍAS TURÍSTICAS</h3>
                <hr class="title-divider">
                
                <!-- Tabla Interna de 5 filas, 1 columna -->
                <table class="inner-data-table">
                    <tr><td><b>Nombre del grupo: </b> Ixmatis Operadora Turística </td></tr>
                    <tr><td><b>Dirección:</b> Av. Principal 123, Col. Centro, Ciudad Verde, México</td></tr>
                    <tr><td><b>Responsable:</b> Laura Mendoza</td></tr>
                    <tr><td><b>Teléfono:</b> 55-1234-5678</td></tr>
                    <tr><td><b>Correo:</b> <span class="email-link">parquesol@example.com</span></td></tr>
                </table>
            </td>


        </tr>
    </table>





    </main>
</body>
</html>