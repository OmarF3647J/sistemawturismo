$(document).ready(function () {
  // Oculta menú y submenús al cargar
  $('nav').css('left', '-100%');
  $('.children').slideUp(0);

  // Si se regresa con historial, cerramos el menú
  if (performance.getEntriesByType("navigation")[0]?.type === "back_forward") {
    $('nav').css('left', '-100%');
    $('.children').slideUp(0);
  }

  function esMovil() {
    return window.innerWidth <= 983;
  }

  $('.menu_bar').click(function (e) {
    e.preventDefault();
    const nav = $('nav');
    const isVisible = nav.css('left') === '0px';
    nav.stop(true, true).animate({ left: isVisible ? '-100%' : '0' }, 300);
    if (isVisible) $('.children').slideUp(400);
  });

  $('.submenu').hover(
    function () {
      if (!esMovil()) $(this).children('.children').stop(true, true).slideDown(400);
    },
    function () {
      if (!esMovil()) $(this).children('.children').stop(true, true).slideUp(400);
    }
  );

  $('.submenu').click(function (e) {
    if (esMovil()) {
      e.stopPropagation();
      $('.children').not($(this).children('.children')).slideUp(400);
      $(this).children('.children').stop(true, true).slideToggle(400);
    }
  });

 

  $('nav ul li a').click(function (e) {
    const isSubmenu = $(this).parent().hasClass('submenu');
    const isMobile = esMovil();
    if (!isSubmenu || !isMobile) {
      e.preventDefault();
      const url = $(this).attr('href');
      $('nav').stop(true, true).animate({ left: '-100%' }, 300, function () {
        window.location.href = url;
      });
    }
  });

  $(document).click(function (e) {
    const $target = $(e.target);
    const nav = $('nav');
    const isVisible = nav.css('left') === '0px';
    if (
      isVisible &&
      !$target.closest('nav').length &&
      !$target.closest('.menu_bar').length
    ) {
      nav.stop(true, true).animate({ left: '-100%' }, 300);
      $('.children').stop(true, true).slideUp(400);
    }
  });

  // Desvanecer y pegar elementos al hacer scroll
  const contenedorDesvanecer = $('#contenedorDesvanecer');
  const contenedorPegajoso = $('#contenedorPegajoso');
  
  $(window).scroll(function () {
    const scrollTop = $(this).scrollTop();
    contenedorDesvanecer.toggleClass('oculto', scrollTop > 50);
    contenedorPegajoso.css('marginTop', scrollTop > 50 ? '-47px' : '0');
  });
});
