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
  <title>Apompal – ¡Bienvenido!</title>


</head>


<body>

<div id="preloader">
    <div class="spinner"></div>
</div>


@include('partials.header')



<br><br><br> 


APOMPAL PRUEBA

<!---Contador vacacionistas--->
<div class="visitantes">
  Más de  <div class="counter">85,000</div>
</div>
<div class="visitantes">visitantes en el último año...</div>


<!---Imagen full--->
<div class="imagen_full">
  <img src="{{ asset('images/benito-juarez/horizontal.jpg') }}" loading="lazy">
</div>


<h2>Centros Ecoturísticos</h2>
<div class="grid-container">
    
    <div class="grid-item" style="background-image: url('{{ asset('images/apompal/portada2.jpg') }}');">
        <h3>Apompal Miguel Hidalgo</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/benito-juarez/cascada2.jpg') }}');">
        <h3>Benito Juárez</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/arrecifes/portada.jpg') }}');">
        <h3>Arrecifes</h3>
    </div>
    
    <div class="grid-item" style="background-image: url('{{ asset('images/cabanas-encantadas/portada.jpg') }}');">
        <h3>Cabañas Encantadas</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/cascadas-encantadas/portada.jpg') }}');">
        <h3>Cascadas Encantadas</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/jomxuk/portada.jpg') }}');">
        <h3>Jomxuk</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/kan-tasejkan/portada.jpg') }}');">
        <h3>Kan tasejkan</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/laguna-del-ostion/BARRA_LAGUNADELOSTION.jpg') }}');">
        <h3>Laguna del Ostion</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/las-margaritas/portada.jpg') }}');">
        <h3>Las Margaritas</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/rancho-dona-elia/portada.jpg') }}');">
        <h3>Rancho Sustentable Doña Elia</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/roca-partida/portada.png') }}');">
        <h3>Roca Partida</h3>
    </div>

    <div class="grid-item" style="background-image: url('{{ asset('images/selva-el-marinero/portada.jpg') }}');">
        <h3>Selva El Marinero</h3>
    </div>
    
</div>

<!--

<div class="cards">
  <a href="informatica.php" class="card">
    <div class="card-background" style="background-image: url(img/img_ingenieria_informatica.jpg)" ></div>
    <div class="card-content">
      <p>Ingeniería</p>
      <h3>Informática</h3>
    </div>
  </a>
  
  <a href="ambiental.php" class="card">
    <div class="card-background" style="background-image: url(img/img_ingenieria_ambiental.jpg)"></div>
    <div class="card-content">
      <p>Ingeniería</p>
      <h3>Ambiental</h3>
    </div>
  </a>
  
  <a href="electromecanica.php" class="card">
    <div class="card-background" style="background-image: url(img/img_ingenieria_electromecanica.jpg)"></div>
    <div class="card-content">
      <p>Ingeniería</p>
      <h3>Electromecánica</h3>
    </div>
  </a>
  
  <a href="mecatronica.php" class="card">
    <div class="card-background" style="background-image: url(img/img_ingenieria_mecatronica.jpg)"></div>
    <div class="card-content">
      <p>Ingeniería</p>
      <h3>Mecatrónica</h3>
    </div>
  </a>

  <a href="industrial.php" class="card">
    <div class="card-background" style="background-image: url(img/img_ingenieria_industrial.jpg)"></div>
    <div class="card-content">
      <p>Ingeniería</p>
      <h3>Industrial</h3>
    </div>
  </a>
  
  <a href="gestion.php" class="card">
    <div class="card-background" style="background-image: url(img/img_ingenieria_gestion.jpg)"></div>
    <div class="card-content">
      <p>Ingeniería en</p>
      <h3>Gestión Empresarial</h3>
    </div>
  </a>
  
  <a href="sistemas.php" class="card">
    <div class="card-background" style="background-image: url(img/img_ingenieria_sistemas.jpg)"></div>
    <div class="card-content">
      <p>Ingeniería en</p>
      <h3>Sistemas Computacionales</h3>
    </div>
  </a>
  
  <a href="administracion.php" class="card">
    <div class="card-background" style="background-image: url(img/img_licenciatura_administracion.jpg)"></div>
    <div class="card-content">
      <p>Licenciatura en</p>
      <h3>Administración</h3>
    </div>
  </a>
</div>

-->







<br><br><br><br><br>
<!--videos -->
<h2>Videos</h2>

<div class="cont_videos">
  <div class="child_videos">
    <iframe width="100%" height="380px" src="https://www.youtube.com/embed/dEAoZAM88N8?si=AqBCGsDgWepBUqer" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
  </div>
  <div class="child_videos">
    <video width="100%" height="380px" controls autoplay loop muted>
      <source src="img/EstamosListos2022.webm" type="video/mp4">
      Tu navegador no soporta la reproducción de videos.
    </video>
  </div>
</div><!--cont videos -->


<br><br><br><br>


<!-- Mapa -->
<br><br><br><br><br>
<h2>¡Vísitanos!</h2>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15140.214781280141!2d-95.169389!3d18.435871!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c272311db4bbeb%3A0x55cb48e28a387d4!2sTecNM-Campus%20-%20San%20Andr%C3%A9s%20Tuxtla!5e0!3m2!1ses-419!2smx!4v1737149286702!5m2!1ses-419!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


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
      friction: 0.2
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