<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="ITSSAT">
  <meta name="description" content="Página del Tecnológico Superior de San Andrés Tuxtla">
  <meta name="keywords" content="TecNM, Instituto Tecnológico Nacional de México, Tec, Tecnológico de San Andrés, Universidad, ITSSAT"/>



<!-- CSS y js básico plantilla -->

<script src="{{ asset('js/spinner.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/spinner.css') }}">

<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<link rel="stylesheet" href="{{ asset('css/menu.css') }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/menu.js') }}"></script>


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>

  <div class="agrupador_header">
    <div class="contenedor_verde_gobernacion">
          <div class="mini_cont">
            <a href="https://www.gob.mx">
              <img src="{{ asset('images/logos/logo_gob_blanco.svg') }}" style="height: 30px;">
            </a>
          </div>
          <div class="mini_cont">
            &nbsp;
          </div>
          <div class="mini_cont" id="mc_derecha">
              <a href="https://www.gob.mx/gobierno">Gobierno</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="http://www.participa.gob.mx/">Participa</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="https://datos.gob.mx/">Datos</a>&nbsp;&nbsp;&nbsp;
              <a href="https://www.gob.mx/busqueda">
                <img src="{{ asset('images/favicon/buscar_circular.png') }}" style="height: 25px;">
              </a>&nbsp;&nbsp;
          </div>
    </div>



    <div class="contenedor" id="contenedorDesvanecer"> 
        <center>
          
            <a href="https://www.gob.mx/"><img src="{{ asset('images/logos/SEGOB_2024.png') }}" class="logos_header" style="height: 38px;" alt="Gobierno de México"></a>
            <a href="https://www.sep.gob.mx/"><img src="{{ asset('images/logos/educacion.png') }}" class="logos_header" style="height: 32px;" alt="Educación"></a>
            <!--<a href="https://www.tecnm.mx//"><img src="img/logos/tecnm_azul_nb.png" class="logos_header" height="45px" alt="TecNM"></a>&nbsp;-->
            <a href="https://www.itssat.edu.mx//"><img src="{{ asset('images/logos/ITSSAT.png') }}" class="logos_header" style="height: 38px;" alt="ITSSAT"></a>
            <a href="https://www.veracruz.gob.mx/"><img src="{{ asset('images/logos/gob-veracruz.png') }}" class="logos_header" style="height: 35px;" alt="Gobierno Veracruz"></a>&nbsp;&nbsp;
            <a href="https://www.sev.gob.mx/#!/"><img src="{{ asset('images/logos/sev.png') }}" class="logos_header" style="height: 35px;" alt="SEV"></a>&nbsp;&nbsp;
            <a href="https://www.sev.gob.mx/media-superior/#!/"><img src="{{ asset('images/logos/sectur_2024.png') }}" class="logos_header" style="height: 35px;" alt="SECTUR"></a>&nbsp;&nbsp;
            <a href="https://www.sev.gob.mx/educacion-tecnologica//"><img src="{{ asset('images/logos/det.png') }}" class="logos_header" style="height: 35px;" alt="DET"></a>&nbsp;&nbsp;
   
        </center>
    </div> <!-- Fin contendor desvanecido -->

  


<!-- Inicio del contendor sticky -->
<div class="contenedor" id="contenedorPegajoso">

    <!-- MENU AZUL -->
    <header>

      <div class="escritorio_btec">
        <a href="https://www.tecnm.mx/"><img src="{{ asset('images/logos/tecnm_menu.png') }}" width="110px"></a>&nbsp;
      </div>
      <div class="escritorio_btec">
        <a href="{{ route('inicio') }}"><img src="{{ asset('images/favicon/home.png') }}" width="30px"></a>&nbsp;
      </div>


      <!-- Container de los 3btn main-->
      <div class="agrupador_3btns">

          <!-- Btn tecnmn -->
          <div class="fant_btntecnm">
            <a href="https://www.tecnm.mx/"><img src="{{ asset('images/logos/tecnm_menu.png') }}" width="110px"></a>&nbsp;
          </div>


          <div class="fant_home">
            <a href="{{ route('inicio') }}"><img src="{{ asset('images/favicon/home.png') }}" width="30px"></a>&nbsp;
          </div>


          <div class="menu_bar">
            <a href="#" class="bt-menu" onclick="event.preventDefault();">
              <img src="{{ asset('images/favicon/menu.png') }}" height="38px">
            </a>
          </div>
          
      </div><!--end 3btn main-->
        
      
      <nav>
        
        <ul>
          <li><a href="{{ route('inicio') }}">Inicio</a></li>

          <li><a href="{{ route('inicio') }}">Turismo Comunitario</a></li>

          <li class="submenu">
          <a href="#">Centros Ecoturísticos</a>
            <ul class="children">
              <li><a href="{{ route('apompal') }}">{{ $centros[0]->nomcentur }}</a></li>
              <li><a href="{{ route('arrecifes') }}">{{ $centros[1]->nomcentur }}</a></li>
              <li><a href="{{ route('benitojuarez') }}">{{ $centros[2]->nomcentur }}</a></li>
              <li><a href="{{ route('cabanasencantadas') }}">{{ $centros[3]->nomcentur }}</a></li>
              <li><a href="{{ route('cascadasencantadas') }}">{{ $centros[4]->nomcentur }}</a></li>
              <li><a href="{{ route('ceytaks') }}">{{ $centros[5]->nomcentur }}</a></li>
              <li><a href="{{ route('elmirador') }}">{{ $centros[6]->nomcentur }}</a></li>
              <li><a href="{{ route('jomxuk') }}">{{ $centros[7]->nomcentur }}</a></li>
              <li><a href="{{ route('kantasejkan') }}">{{ $centros[8]->nomcentur }}</a></li>
              <li><a href="{{ route('lagunadelostion') }}">{{ $centros[9]->nomcentur }}</a></li>
              <li><a href="{{ route('lasmargaritas') }}">{{ $centros[10]->nomcentur }}</a></li>
              <li><a href="{{ route('manglaressontecomapan') }}">{{ $centros[11]->nomcentur }}</a></li>
              <li><a href="{{ route('ranchodonaelia') }}">{{ $centros[12]->nomcentur }}</a></li>
              <li><a href="{{ route('rocapartida') }}">{{ $centros[13]->nomcentur }}</a></li>
              <li><a href="{{ route('selvaelmarinero') }}">{{ $centros[14]->nomcentur }}</a></li>

            </ul>
          </li>
          
          
          <li><a href="https://wa.me/5212941016169?text=Hola, me gustaría saber más acerca de la carrera Ingeniería Informática">Contacto</a></li>
        </ul>
      </nav>
    </header>


</div><!-- contenedor pegajoso -->
</div><!-- agrupador -->




</body>
</html>