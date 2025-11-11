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
   <link rel="stylesheet" href="{{ asset('css/estilos-centros.css') }}">
   <link rel="stylesheet" href="{{ asset('css/docentes.css') }}">


  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

  <!-- Icono pestaña -->
  <link rel="icon" href="{{ asset('images/favicon/tecnm.ico') }}"/>
  <!-- Titulo pestaña -->
  <title>Benito Juárez – ¡Conoce este Centro Ecoturístico!</title>


</head>


<body>

<div id="preloader">
    <div class="spinner"></div>
</div>


@include('partials.header')





<div class="imagen_full" style="background-image: url('{{ asset('images/benito-juarez/horizontal.jpg') }}');" loading="lazy">
      <div class="texto-sobre-full">
        @include('partials.title-benitojuarez')
      </div>
</div>



<!---bounce left--->
<div class="wow animate__animated animate__fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.3s">
  <div class="descripcion_centros"> Breve descripción que el reponsable quiera contar sobre su centro ecoturístico, en que comunidad se ubica el centro turístico y a cuántos km está ubicado desde un punto de referencia conocido. O también puede escribir porqué es tan mítico este lugar.</b></div>
</div><!-- end boounce -->
<iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d46629.499158856546!2d-95.05458578375234!3d18.404284882043708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x85e9df23ec5246c1%3A0x875035b9da12d36e!2sCoyame%2C%20Ver.!3m2!1d18.4369399!2d-95.02360999999999!4m5!1s0x85e9e17adb17b497%3A0x43c56b63f2fefa9c!2sReserva%20Ecol%C3%B3gica%20Benito%20Ju%C3%A0rez%2C%20Unnamed%20Road%2C%20Ver.!3m2!1d18.361602899999998!2d-95.0153339!5e1!3m2!1ses!2smx!4v1762842467191!5m2!1ses!2smx
" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


<br>

<!--appear scroll-->
<div id="content">

  <center>
  <!---Información y botones de contacto--->
    <h2>Contáctanos</h2>


    <div class="contacto-container">
      <div class="contacto-item">
          <img src="{{ asset('images/favicon/reloj.png') }}" alt="Horaio" class="icon" loading="lazy">
          <div>
              <div class="texto_contacto">Horario de Atención</div>
              <p>9:00 a 17:00 hrs.</p>
          </div>
      </div>
      <div class="contacto-item">
          <img src="{{ asset('images/favicon/responsable.png') }}" alt="Responsable" class="icon" loading="lazy">
          <div>
              <div class="texto_contacto">Responsable</div>
              <p>db</p>
          </div>
      </div>
      <div class="contacto-item">
          <img src="{{ asset('images/favicon/correo_sinfondo.png') }}" alt="Correo electronico" class="icon" loading="lazy">
          <div>
              <div class="texto_contacto">Correo Electrónico</div>
              <p>ing_informatica@itssat.edu.mx</p>
          </div>
      </div>
      <div class="contacto-item">
          <img src="{{ asset('images/favicon/llamada.png') }}" alt="Telefono" class="icon" loading="lazy">
          <div>
              <div class="texto_contacto">Teléfono</div>
              <p>222-456-7890</p>
          </div>
      </div>
  </div>



    <a href="https://wa.me/5212941016169?text=Hola, me gustaría saber más acerca del Turismo Comunitario">
      <div title="Clic para enviar mensaje" class="btn_enviawsp">
        Quiero hablar con una persona...
      </div>
    </a>
  </center>

</div><!--end appear-->


<br><br><br><br>
<hr>
<br><br>

<!--Menu centros ecoturisticos-->
<div style="text-align: center;">
  <h2>Servicios</h2>
</div>

<br>

<!--Servicios -->
<div class="contenedor-docentes">
  <div class="docentes">   
    <div class="grid">

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/estacionamiento.png') }}" alt="Servicio estacionamiento">
            <p class="role-docente">Estacionamiento</p>
        </div>
      </div>

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/wifi.png') }}" alt="Servicio WiFi">
            <p class="role-docente">WiFi</p>
        </div>
      </div>

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/restaurante.png') }}" alt="Servicio Restaurante Comida">
            <p class="role-docente">Restaurante</p>
        </div>
      </div>

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/cuarto-de-bano.png') }}" alt="Servicio Sanitarios Baño">
            <p class="role-docente">Sanitarios</p>
        </div>
      </div>

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/cabana.png') }}" alt="Servicio Cabañas">
            <p class="role-docente">Cabañas</p>
        </div>
      </div>

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/ducha.png') }}" alt="Servicio Regaderas Ducha">
            <p class="role-docente">Regaderas</p>
        </div>
      </div>

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/camping.png') }}" alt="Servicio Espacio para Camping">
            <p class="role-docente">Espacio para Camping</p>
        </div>
      </div>

      <div class="card">
        <div class="btn-pdf_docentes">
          <img class="img-docente" src="{{ asset('images/favicon/souvenirs.png') }}" alt="Servicio Artesanías">
            <p class="role-docente">Artesanías</p>
        </div>
      </div>


    </div>
  </div>
</div>



<br><br><br><br><br>

<h2>Galería</h2>
<div class="carousel-container-l">
  
    <div class="main-image-l">
        <img id="featured-laboratorio">      
    </div>


      <!-- Modal para ampliar -->
    <div id="modalImagen" class="iframe-modal-img">
      <img id="imagenAmpliada" src="" alt="Vista ampliada">
    </div>


    
    <div class="thumbnails-l" id="laboratorio-thumbnails">
        <!-- Las imágenes se añaden dinámicamente -->
    </div>
</div>


<br><br><br><br><br>




<div class="titulo-guias">
  Guías Turísticas Certificadas
</div>

<div class="wow animate__animated animate__fadeInLeft" data-wow-duration="1.5s" data-wow-delay="0.3s">
  <div class="descripcion_guias"> Estas guías colaboran con este Centro Ecoturistico, pueden <b>llevarte</b> a este lugar y pueden ofrecerte algunas <b>actividades para que disfrutes de tu estancia... </b><br><br>¡Ponte en contacto con ellos y disfruta tu viaje!</div>
</div>


<div class="agrupador-guias-turisticas">

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
          <a href="https://instagram.com" target="_blank" class="cat">
            <img src="{{ asset('images/favicon/ig.png') }}" alt="Instagram" loading="lazy">
          </a>
          <a href="https://tiktok.com" target="_blank" class="cat">
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




<br><br><br>


<br>
<!------------------------ wsp icon -------------------------->
<a href="https://wa.me/5212941016169?text=Hola, me gustaría saber más acerca de la oferta educativa que ofrece el ITSSAT">
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


<!-- WOW.js bounce -->
<script>
  new WOW().init();  // Inicialización de WOW.js
</script>


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

 




<!--Galeria-->
<script>
    // Las rutas de las imágenes se mantienen igual
    const laboratorioImages = ['{{ asset('images/benito-juarez/cascada.jpg') }}', '{{ asset('images/benito-juarez/rio.jpg') }}', '{{ asset('images/benito-juarez/6.jpg') }}', '{{ asset('images/benito-juarez/portada.jpg') }}', '{{ asset('images/benito-juarez/13.jpg') }}', '{{ asset('images/benito-juarez/7.jpg') }}', '{{ asset('images/benito-juarez/9.jpg') }}', '{{ asset('images/benito-juarez/12.jpg') }}'];

    // Esta es la URL de una imagen de baja calidad o un placeholder que se cargará INMEDIATAMENTE.
    // Usamos una URL simple para el ejemplo. En un caso real, sería un SVG o una imagen muy pequeña.
    const placeholderSrc = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; 

    // --- FUNCIÓN DE CARGA DIFERIDA ---
    function setupLazyLoading(images) {
        // Opción de configuración: la imagen se carga cuando está al 100px de distancia de ser visible
        const options = {
            rootMargin: '100px', 
            threshold: 0.01 // Dispara cuando 1% del elemento es visible
        };

        // 1. Definimos la acción que se ejecuta al intersectar (hacerse visible)
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const lazyImage = entry.target;
                    // Mueve la URL final (guardada en data-src) al atributo src
                    lazyImage.src = lazyImage.dataset.src;
                    
                    // Detenemos la observación una vez que la imagen se ha cargado
                    observer.unobserve(lazyImage); 
                }
            });
        }, options);

        // 2. Registramos todas las miniaturas para ser observadas
        images.forEach(imageElement => {
            observer.observe(imageElement);
        });
    }
    // --- FIN FUNCIÓN DE CARGA DIFERIDA ---


    function setupGallery(images, featuredId, thumbnailsId) {
        const featuredImage = document.getElementById(featuredId);
        const thumbnailsContainer = document.getElementById(thumbnailsId);
        
        // --- CAMBIO CLAVE A: Generación de Miniaturas con Carga Diferida ---
        // 1. Usamos 'src' para el placeholder (carga inmediata, ligero)
        // 2. Usamos 'data-src' para guardar la URL real de alta resolución
        thumbnailsContainer.innerHTML = images.map((img, index) => 
            `<img 
                class="thumbnail-l" 
                src="${placeholderSrc}" 
                data-src="${img}" 
                alt="Imagen ${index + 1}" 
                data-index="${index}"
            >`).join('');
        // --- FIN CAMBIO CLAVE A ---

        const thumbnails = thumbnailsContainer.querySelectorAll('.thumbnail-l');
        
        // --- CAMBIO CLAVE B: Inicializamos la carga diferida para las miniaturas ---
        setupLazyLoading(thumbnails);
        // --- FIN CAMBIO CLAVE B ---


        let currentIndex = 0;
        
        function changeImage(index) {

        setTimeout(() => {
        featuredImage.src = images[index];
        
        const img = new Image();
          img.src = newSrc;

        img.onload = () => {
          featuredImage.src = newSrc;
          featuredImage.classList.add('fade-in');
        };
    
        featuredImage.classList.remove('fade-out');
        void featuredImage.offsetWidth; // ⚙️ Reinicia la animación
        featuredImage.classList.add('fade-in');
      }, 300);

        thumbnails.forEach(thumb => thumb.classList.remove('active'));
        const targetThumb = thumbnailsContainer.querySelector(`[data-index="${index}"]`);
        targetThumb.classList.add('active');

        currentIndex = parseInt(index);
    }


        // ... Lógica de click y autoSlide ...
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', () => {
                clearInterval(autoSlide);
                changeImage(thumb.dataset.index);
                autoSlide = setInterval(() => changeImage((currentIndex + 1) % images.length), 3000);
            });
        });

        let autoSlide = setInterval(() => changeImage((currentIndex + 1) % images.length), 3000);
        changeImage(0); // Carga la primera imagen inmediatamente
    }

    window.onload = () => {
        setupGallery(laboratorioImages, 'featured-laboratorio', 'laboratorio-thumbnails');
    };
  </script>
<!-------------------- Fin Galeria------------------->

<script>
  // Manejo de miniaturas y modal
  const thumbnails = document.querySelectorAll('.main-image-l img');
  const modal = document.getElementById('modalImagen');
  const modalImage = document.getElementById('imagenAmpliada');

  thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener('click', () => {
      modalImage.src = thumbnail.src;
      modal.style.display = 'flex';
      if (window.innerWidth > 768) {
        flktyDesktop.pausePlayer();
      } else {
        flktyMobile.pausePlayer();
      }
    });
  });

  modal.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
      modalImage.src = '';
      if (window.innerWidth > 768) {
        flktyDesktop.playPlayer();
      } else {
        flktyMobile.playPlayer();
      }
    }
  });
</script>


</body>
</html>