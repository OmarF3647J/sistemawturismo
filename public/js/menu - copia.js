//menú responsivo
$(document).ready(function () {
  let contador = 2;

  // Mostrar/ocultar menú
  $('.menu_bar').click(function (event) {
    event.preventDefault();
    const left = contador ? '0' : '-100%';
    $('nav').animate({ left });
    contador = 2 - contador;
  });
  
  // Verifica si la pantalla es móvil
  function esMovil() {
    return window.innerWidth <= 768;
  }

  // Maneja la interacción con los submenús en dispositivos móviles y de escritorio
  $('.submenu > a').click(function (event) {
    event.preventDefault();
  });

  $('.submenu').hover(
    function () {
      if (!esMovil()) $(this).children('.children').stop(true, true).slideDown(600);
    },
    function () {
      if (!esMovil()) $(this).children('.children').stop(true, true).slideUp(600);
    }
  );

  $('.submenu').click(function (e) {
    if (esMovil()) {
      $('.children').not($(this).children('.children')).slideUp(600);
      $(this).children('.children').slideToggle(600);
      e.stopPropagation();
      
    }
  });
  
  // Redirige al hacer clic en un enlace del submenú
  $('.submenu .children li a').click(function (event) {
    
    event.preventDefault();
    const url = $(this).attr('href');
    $('nav').animate({ left: '-100%' }, 300, function () {
      window.location.href = url;
    });
  });

  // Desvanecer y pegar elementos al hacer scroll
  const contenedorDesvanecer = $('#contenedorDesvanecer');
  const contenedorPegajoso = $('#contenedorPegajoso');

  $(window).scroll(function () {
    const scrollPosition = $(this).scrollTop();
    contenedorDesvanecer.toggleClass('oculto', scrollPosition > 50);
    contenedorPegajoso.css('marginTop', scrollPosition > 50 ? '-47px' : '0');
  });
});
