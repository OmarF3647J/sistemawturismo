<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="ITSSAT">
  <meta name="description" content="Página del Tecnológico Superior de San Andrés Tuxtla">
  <meta name="keywords" content="TecNM, Instituto Tecnológico Nacional de México, Tec, Tecnológico de San Andrés, Universidad, ITSSAT"/>
  

  <!-- Animate.css bounce -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- WOW.js bounce -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <!-- JavaScript -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <!-- counter -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    
  <!-- CSS y js básico plantilla -->
  <script src="{{ asset('js/spinner.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/spinner.css') }}">
  <script src="https://code.jquery.com/jquery-latest.js"></script>

  
  <!-- CSS estilos de esta página -->
   <link rel="stylesheet" href="{{ asset('css/index.css') }}">


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

  <!-- Icono pestaña -->
  <link rel="icon" href="{{ asset('images/favicon/tecnm.ico') }}"/>
  <!-- Titulo pestaña -->
  <title>Centros Ecoturísticos – ¡Conoce la Región de los Tuxtlas!</title>


</head>


<body>

<div id="preloader">
    <div class="spinner"></div>
</div>


@include('partials.header')


<!---carrusel carreras--->
<div class="carrusel_carreras js-flickity"
  data-flickity-options='{
    "cellAlign": "left", 
    "contain": true, 
    "wrapAround": true, 
    "autoPlay": 3000, 
    "pauseAutoPlayOnHover": false, 
    "prevNextButtons": true, 
    "selectedAttraction": 0.01, 
    "friction": 0.2 
  }'> 

  
  <div class="carrusel_portadas">
    <a href="{{ route('apompal') }}">
      <img src="{{ asset('images/apompal/portada2.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Apompal Miguel Hidalgo</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('arrecifes') }}">
      <img src="{{ asset('images/arrecifes/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Arrecifes</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('benitojuarez') }}">
      <img src="{{ asset('images/benito-juarez/cascada2.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Benito Juárez</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>
  
  
  <div class="carrusel_portadas">
    <a href="{{ route('cabanasencantadas') }}">
      <img src="{{ asset('images/cabanas-encantadas/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Cabañas Encantadas</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('cascadasencantadas') }}">
      <img src="{{ asset('images/cascadas-encantadas/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Cascadas encantadas</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>
 

  <div class="carrusel_portadas">
    <a href="{{ route('jomxuk') }}">
      <img src="{{ asset('images/jomxuk/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Jomxuk</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('kantasejkan') }}">
      <img src="{{ asset('images/kan-tasejkan/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Kan Tasejkan</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('lagunadelostion') }}">
      <img src="{{ asset('images/laguna-del-ostion/BARRA_LAGUNADELOSTION.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Laguna del Ostion</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('lasmargaritas') }}">
      <img src="{{ asset('images/las-margaritas/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Las Margaritas</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('ranchodonaelia') }}">
      <img src="{{ asset('images/rancho-dona-elia/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Rancho Sustentable Doña Helia - Laguna encantada</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

  <div class="carrusel_portadas">
    <a href="{{ route('rocapartida') }}">
      <img src="{{ asset('images/roca-partida/portada.png') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Roca Partida</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

 <div class="carrusel_portadas">
    <a href="{{ route('selvaelmarinero') }}">
      <img src="{{ asset('images/selva-el-marinero/portada.jpg') }}" loading="lazy">
      <div class="titulo_carrera_telefono">Selva El Marinero</div>
      <br>
      <button class="btn-sobre-imagen">Conocer más...</button>
    </a>
  </div>

</div><!---fin carrusel--->
<div class="flickity-page-dots"></div>
<!---fin carrusel--->


<br><br><br> 

<!---Contador vacacionistas--->
<div class="visitantes">
  Más de  <div class="counter">85,000</div>
</div>
<div class="visitantes">visitantes en el último año...</div>


<!--appear scroll-->
<div id="content">

  <div class="imagen_full">
      <div class="texto-sobre-full">
        @include('partials.conecta-con-naturaleza')
      </div>
  </div>

</div>






<br>


<!--Menu centros ecoturisticos-->
<div style="text-align: center;">
  <h2>Centros Ecoturísticos</h2>
  <h3><b>en la región de los Tuxtlas.</b></h3>
</div><!--fin agrupador centros ecoturisticos  -->

<br>

<!---bounce left--->
<div class="wow animate__animated animate__fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.3s">
  <div class="descripcion_centros"> Estos lugares ofrecen alojamiento en cabañas, sanitarios, espacio para camping, restaruantes, artesanías y <b>paisajes naturales inolvidables.</b></div>
</div><!-- end boounce -->


<!--inicio agrupador centros turitticos -->
<div class="agrupador-centros-turisticos">

  <a href="{{ route('apompal') }}">
      <div class="grid-item" style="background-image: url('{{ asset('images/apompal/portada2.jpg') }}');" loading="lazy">
          <h3>{{ $centros[1]->nomcentur }}</h3>
      </div>
  </a>

  
  <a href="{{ route('arrecifes') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/arrecifes/portada.jpg') }}');" loading="lazy">
        <h3>{{ $centros[2]->nomcentur }}</h3>
    </div>
  </a>


  <a href="{{ route('benitojuarez') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/benito-juarez/cascada2.jpg') }}');" loading="lazy">
        <h3>{{ $centros[3]->nomcentur }}</h3>
    </div>  
  </a>
    
  <a href="{{ route('cabanasencantadas') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/cabanas-encantadas/portada.jpg') }}');" loading="lazy">
        <h3>Cabañas Encantadas</h3>
    </div>
  </a>

  <a href="{{ route('cascadasencantadas') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/cascadas-encantadas/portada.jpg') }}');" loading="lazy">
        <h3>Cascadas Encantadas</h3>
    </div>
  </a>

  <a href="{{ route('jomxuk') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/jomxuk/portada.jpg') }}');" loading="lazy">
        <h3>{{ $centros[6]->nomcentur }}</h3>
    </div>
  </a>


  <a href="{{ route('kantasejkan') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/kan-tasejkan/portada.jpg') }}');" loading="lazy">
        <h3>{{ $centros[7]->nomcentur }}</h3>
    </div>
  </a>


  <a href="{{ route('lagunadelostion') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/laguna-del-ostion/BARRA_LAGUNADELOSTION.jpg') }}');" loading="lazy">
        <h3>{{ $centros[8]->nomcentur }}</h3>
    </div>
  </a>

  <a href="{{ route('lasmargaritas') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/las-margaritas/portada.jpg') }}');" loading="lazy">
        <h3>{{ $centros[9]->nomcentur }}</h3>
    </div>
  </a>

  <a href="{{ route('ranchodonaelia') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/rancho-dona-elia/portada.jpg') }}');" loading="lazy">
        <h3>{{ $centros[10]->nomcentur }}</h3>
    </div>
  </a>

  <a href="{{ route('rocapartida') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/roca-partida/portada.png') }}');" loading="lazy">
        <h3>{{ $centros[11]->nomcentur }}</h3>
    </div>
  </a>

  <a href="{{ route('selvaelmarinero') }}">
    <div class="grid-item" style="background-image: url('{{ asset('images/selva-el-marinero/portada.jpg') }}');" loading="lazy">
        <h3>{{ $centros[12]->nomcentur }}</h3>
    </div>
  </a>
    
</div>




<br><br><br>


<div class="titulo-guias">
  Guías Turísticas Certificadas
</div>

<div class="wow animate__animated animate__fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.3s">
  <div class="descripcion_guias"> Ellos pueden <b>llevarte</b> a los Centros Ecoturísticos de la región de Los Tuxtlas y pueden ofrecerte algunas <b>actividades.</b></div>
</div>


<!--inicio agrupador guias turisticas -->
<div class="agrupador-guias-turisticas">

  <!--
  <div class="agrupador-itemgt-y-tarjeta">
      <div class="grid-itemgt">
        <img src="{{ asset('images/noimage.jpg') }}" loading="lazy">
      </div>

    <div class="tarjeta-guia">
        
      <div style="text-align: center;">
        <h3>Ecoturismo el Apompal</h3>
      </div>

      <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
      <h4>Número: <span style="font-weight: 300;">bd</span></h4>
      <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
      <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
  
      <br>
      
      <div class="btn-redes-sociales">
        <a href="https://facebook.com" target="_blank" class="cat">
          <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
        </a>
        <a href="https://instagram.com" target="_blank" class="cat">
          <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
        </a>
        <a href="https://tiktok.com" target="_blank" class="cat">
          <img src="{{ asset('images/favicon/tiktok-circular.png') }}" alt="Tiktok" loading="lazy">
        </a>
      </div>

    </div>
  </div>
  -->

  <div class="agrupador-itemgt-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/degraaf-travel.jpg') }}" loading="lazy">
        </div>
        
      <div class="tarjeta-guia">
        
        <div style="text-align: center;">
          <h3>Degaaf Travel & Tours</h3>
        </div>

        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque dignissimos consectetur, error fugiat soluta facilis molestiae.</span></h4>
        
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/profile.php?id=100064519459589" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/degraaftraveltours?igsh=MWg3YTFsbjdmemlveQ%3D%3D&utm_source=qr&fbclid=IwY2xjawN6R-tleHRuA2FlbQIxMABicmlkETFBd3B5Q2JCN0FLY2pRdTlEc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHmAPC4UW07qkGHi7caS05Rp0OmKZiZQnAcT9zNxRqhhVkSfC5wmPF3CQ3sl8_aem_XNLgHFftYwkMk6AeiRMA4w" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>
          <a href="https://www.tiktok.com/@degraaf.travel.to?_r=1&_t=ZS-91B3jHc6KSg&fbclid=IwY2xjawN6SCdleHRuA2FlbQIxMABicmlkETFBd3B5Q2JCN0FLY2pRdTlEc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHk1QmcF-zDkXnHlBYhg7ieo2ktE70HKERQPlEtUvfCu8ZMd9TrU9y6daJJwT_aem_aWHbbPqZIeyRJD-mFh4PXw" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/tiktok-circular.png') }}" alt="Tiktok" loading="lazy">
          </a>
        </div>
        
      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/explore-catemaco.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;">
          <h3>EXPLORE CATEMACO</h3>
        </div>

        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/explorecatemaco" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>

        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/ixmatis.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;"> 
            <h3>Ixmatis</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/Ixmatisturismo" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/ixmatis_tours/" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>
          <a href="hhttps://www.tiktok.com/@ixmatistours" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/tiktok-circular.png') }}" alt="Tiktok" loading="lazy">
          </a>
        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/Jose-Elias-Chagala- Ramírez.jpg') }}" loading="lazy">
        </div>
      <div class="tarjeta-guia">

        <div style="text-align: center;"> 
            <h3>José Elías Chagala Ramírez</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">José Elías Chagala Ramírez</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realiza <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/chagala.elias" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/minolei-tours.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;"> 
          <h3>MinoLei Tours</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/minoleitours" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/minoleitours" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>

        </div>
 
      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/natouralexa.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;"> 
          <h3>Natouralexa</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/natouralexaxtrema" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/natouralexa?fbclid=IwY2xjawN6ZQVleHRuA2FlbQIxMABicmlkETFMN05ub1N1cEpHc2RQYUFpc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHiVV-Ur_7xB6qV2VVYrUpWMSZW8GMgrOp1Ih2fe3z9z1BwiKvaBnBYajTL2M_aem_2x0imjh_pC_hvDVznFke4g" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>
          <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.tiktok.com%2F%40daniellua97%3F_r%3D1%26_t%3DZS-91C0oLMLQvv%26fbclid%3DIwZXh0bgNhZW0CMTAAYnJpZBExTDdObm9TdXBKR3NkUGFBaXNydGMGYXBwX2lkEDIyMjAzOTE3ODgyMDA4OTIAAR76I3f5E7zB_a-zy_75qrHG6PCUfXcD1Do4QK1rqOrtb2u2N60ZFJmxiAgG5A_aem_M42qQkpMVAUIfQCAZfgniw&h=AT2itVxPsrc7N2AW5mSTrT011yzKd8C69_OmFL5ZlWf5ijZFJk-Yq1OuY9eTF9INtr04av9363y8donjqoIMWBBCf7AWmy1PcjMPTpXK07iKk8LECStx1_Nl2raxo5PKTt34uEraC03UrnYUKtnwTA" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/tiktok-circular.png') }}" alt="Tiktok" loading="lazy">
          </a>
        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/river-tours.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;"> 
          <h3>RIVER TOURS</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/profile.php?id=100067588916915" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/river_tours_los_tuxtla?fbclid=IwY2xjawN6ZVJleHRuA2FlbQIxMABicmlkETFMN05ub1N1cEpHc2RQYUFpc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHpzdJFGM6rxL1i2YpHWtMcTlJU4RCiH-mEN0zmFR1zaybBongxWj8HTF_hRN_aem_PZC-itdhmwhZ2sTnAvsT0A" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>

        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/riviera-del-toro.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;"> 
          <h3>Riviera del Toro “Ecoturismo y Aventura”</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/profile.php?id=100066491815971" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/rivieradeltoro/?igsh=MXJpZzR5ZDk2bTVsdQ%3D%3D&fbclid=IwY2xjawN-ZhhleHRuA2FlbQIxMABicmlkETE1ZFN3cU85T0NPc2RMdms5c3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHk8rP1A6PP4dAJU4P1j-fBow4jWaFXlu-4-GBkw-7kMwLC2ESTCxfCdUTMGt_aem_jIUzu6vfgFZYgDXLGCNJaA#" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>
          <a href="https://www.tiktok.com/@rivieradeltoro?_r=1&_t=ZS-91H9X8uIoAa&fbclid=IwY2xjawN-ZhtleHRuA2FlbQIxMABicmlkETE1ZFN3cU85T0NPc2RMdms5c3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHvgpp5-R3enuekXLMHgob1kR9DhnYTKNc6dq2DqL9Ksofv2FBm8TVmVUJ7PR_aem_2ur5v8xUCeADytEp1vWFPA" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/tiktok-circular.png') }}" alt="Tiktok" loading="lazy">
          </a>

        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
      <div class="grid-itemgt">
        <img src="{{ asset('images/roca-tour.jpg') }}" loading="lazy">
      </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;"> 
          <h3>Roca Tour</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/profile.php?id=100064053428400" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>

        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
      <div class="grid-itemgt">
        <img src="{{ asset('images/noimage.jpg') }}" loading="lazy">
      </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;">
          <h3>SELVA FIRME. Excursiones y Expediciones</h3>
        </div>
        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>

        <br>
        <!-- Contenedor de iconos 
        <div class="btn-redes-sociales">
          <a href="https://facebook.com" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://instagram.com" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>
          <a href="https://tiktok.com" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/tiktok-circular.png') }}" alt="Tiktok" loading="lazy">
          </a>
        </div>
        -->

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/split-rock.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;">
          <h3>SPLIT ROCK</h3>
        </div>

        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/profile.php?id=100063525416990" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/splitrock_tours/" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>
          <a href="https://www.tiktok.com/@splitrock_tours" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/tiktok-circular.png') }}" alt="Tiktok" loading="lazy">
          </a>
        </div>


      </div>
    </div>
    
    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/temazcalli-xolotl.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;">
          <h3>Grupo Temazcalli Xolotl</h3>
        </div>

        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/temazcalcatemaco" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>

        </div>
        
      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
        <div class="grid-itemgt">
          <img src="{{ asset('images/tours-roca-partida.jpg') }}" loading="lazy">
        </div>

      <div class="tarjeta-guia">
        
        <div style="text-align: center;">
          <h3>Tours Roca Partida Veracruz.</h3>
        </div>

        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/rocapartidaveracruz20" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>

        </div>
         
      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
      <div class="grid-itemgt">
        <img src="{{ asset('images/tribu-wounaan.jpg') }}" loading="lazy">
      </div>

      <div class="tarjeta-guia">

        <div style="text-align: center;">
          <h3>TRIBU WOUNAAN</h3>
        </div>

        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="hhttps://www.facebook.com/tribuwounaan" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>

        </div>

      </div>
    </div>

    <div class="agrupador-itemgt-y-tarjeta">
      <div class="grid-itemgt">
        <img src="{{ asset('images/turismo-sontecomapan.jpg') }}" loading="lazy">
      </div>

      <div class="tarjeta-guia">
        <div style="text-align: center;">
          <h3>Turismo Sontecomapan</h3>
        </div>

        <h4>Responsable: <span style="font-weight: 300;">Nombre</span> </h4>
        <h4>Número: <span style="font-weight: 300;">bd</span></h4>
        <h4>Correo: <span style="font-weight: 300;">bd</span></h4>   
        <h4>Actividades que realizan <span style="font-weight: 300;">bd</span></h4>
        <br>
        <!-- Contenedor de iconos -->
        <div class="btn-redes-sociales">
          <a href="https://www.facebook.com/TurismoSontecomapa" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/facebook_circular.png') }}" alt="Facebook" loading="lazy">
          </a>
          <a href="https://www.instagram.com/turismo_sontecomapan?fbclid=IwY2xjawN6cXBleHRuA2FlbQIxMABicmlkETFMN05ub1N1cEpHc2RQYUFpc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHuVi6adKzyQxdY7f9qUFti9RLNOIxjnjHicFk_LEniykTCH1gHLCslZugFM9_aem_fL0ILyRfRbzmaWJ2-zAL_w" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>

        </div>

      </div>
    </div>



</div><!--fin agrupador guias turisticas -->




<br><br><br><br>



<div class="titulo_opinion_turistas">
  ¿Qué dicen los turistas?
</div>
<center><h3>¡Las personas aman esta región!</h3></center>

<div class="agrupador_opinion">

  <div class="opinion_turista">
    <div class="bloque bloque-1">"Me encantó el lugar pude realizar senderismo, nadar en una cascada y hospedarme con una gran anfitriona Sra. Amelia y su hija Marisela. Una cabaña junto a un estanque."</div>
    <div class="bloque bloque-2">★★★★</div>
    <div class="bloque bloque-3">-Anónimo</div>
  </div>

  <div class="opinion_turista">
    <div class="bloque bloque-1">"Se trata de un lugar hermoso, muestra perfecta de como la Naturaleza y el hombre pueden convivir en una sinergia equilibrada"</div>
    <div class="bloque bloque-2">★★★★★</div>
    <div class="bloque bloque-3">-Visitante Mexicano</div>
  </div>

  <div class="opinion_turista">
    <div class="bloque bloque-1">"Excelente Lugar es una Maravilla Especialmente la Atención Al Turista"</div>
    <div class="bloque bloque-2">★★★★★</div>
    <div class="bloque bloque-3">-Anónimo</div>
  </div>

</div>





<!-- Mapa -->
<br><br><br><br><br>
<h2>¡Vísitanos!</h2>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15140.214781280141!2d-95.169389!3d18.435871!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c272311db4bbeb%3A0x55cb48e28a387d4!2sTecNM-Campus%20-%20San%20Andr%C3%A9s%20Tuxtla!5e0!3m2!1ses-419!2smx!4v1737149286702!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



<br>
<!------------------------ wsp icon -------------------------->
<a href="https://wa.me/5212941016169?text=Hola, me gustaría saber más acerca del Turismo Comunitario">
  <div id="wsp" title="Whatsapp">
    <img src="{{ asset('images/favicon/whatsapp.png') }}" width="60px">
  </div>
</a>
<br>


@php
    $visitas = contador(); 
@endphp


<p style="text-align: center;">
    Esta página ha sido visitada {{ $visitas }} veces.
</p>


@include('partials.footer')



<!--------- Appr up contacto ------->
<script>
  // JavaScript
  const content = document.getElementById('content');

  // Función para verificar si el elemento está en el viewport
  function isInViewport(el) {
    const rect = el.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
  }

  // Evento de scroll
  window.addEventListener('scroll', () => {
    if (isInViewport(content)) {
      content.classList.add('visible'); // Añade la clase para hacerlo visible
    }
  });
</script>

 

<script>
  // Asegurar que autoplay se reanude tras interacción en móviles
  document.addEventListener('touchstart', () => {
    if (window.innerWidth <= 768) {
      flktyMobile.playPlayer();
    }
  });

</script>


<script>
    function animateCounter(target, from, to, duration) {
        const counter = { value: from };

        gsap.to(counter, {
            value: to,
            duration: duration,
            ease: "power1.out",
            onUpdate: function () {
                // Selecciona el elemento y actualiza su texto.
                // Usamos toLocaleString('es-MX') para que se muestren las comas (85,000).
                document.querySelector(target).innerText = Math.ceil(counter.value).toLocaleString('es-MX');
            },
            onComplete: function () {
                console.log(`Animación de ${target} completada.`);
            }
        });
    }

    // 🚀 Llamada corregida y simplificada:
    // 1. Apuntamos directo a la clase '.counter'.
    // 2. Establecemos el valor final en 85000.
    // 3. El elemento .counter debe comenzar en 0 en tu HTML (o el valor 'from' de la función).
  
    animateCounter('.counter', 0, 85000, 5);
</script>


<!-- carrusel carreras -->
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var flkty = new Flickity('.carrusel_carreras', {
      cellAlign: 'left',
      contain: true,
      wrapAround: true,
      autoPlay: 3000, // Cambio automático cada 3 segundos
      pauseAutoPlayOnHover: false, 
      prevNextButtons: true, // Habilita botones de navegación
      selectedAttraction: 0.01,
      friction: 0.2,
      pageDots: true, // mantener dots

    });

      flkty.on('select', function () {
      flkty.playPlayer(); // Reinicia el autoplay después de cualquier acción
    });

    // Evitar que el autoplay se detenga al usar los botones de flecha
    var prevButton = document.querySelector('.flickity-prev-next-button.previous');
    var nextButton = document.querySelector('.flickity-prev-next-button.next');

    [prevButton, nextButton].forEach(function(button) {
      button.addEventListener('click', function() {
        flkty.playPlayer();
      });
    });
  });
</script>

<!-- WOW.js bounce -->
<script>
  new WOW().init();  // Inicialización de WOW.js
</script>






</body>
</html>