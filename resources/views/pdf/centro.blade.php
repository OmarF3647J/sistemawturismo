<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Centro - {{ $centrosturist->nomcentur }}</title>
  <style>
    body { font-family: Arial, sans-serif; font-size: 12px;  margin-top: 90px; margin-bottom: 90px;}
    
    
    
    .linea {
      border: 1px solid #ccc;
      width: 86%;
    }

    .titulo { 
      width: 66%;
      text-align:center; 
      margin: 0 auto;
      margin-bottom:-25px;
    }

    .descripcion {
      width: 74%;
      text-align: justify; 
      font-size: 17px;
      line-height: 1.4;
      /* margin-bottom:20px;  */
      margin: 0 auto;
    }

    .centrosturist {
      display: table;
      width: 100%;
      table-layout: fixed;
      /* background: #20b338ff; */
      margin: 0 auto;
      margin-top:-20px;
      margin-bottom:-15px;
      /* margin-top: 20px; */
      /* border-spacing: 10px; separación interna */
    }

    .centrosturist > div {
      display: table-cell;
      vertical-align: top;
      font-size: 17px;
      box-sizing: border-box;
    }

    .contacto {
      /* background: #9178beff; */
      width: 30%;
      line-height: 1.3;
      padding:0 10px 0 90px;
    }

    .servicios {
      /* background: #e9e9e9; */
      width: 30%;
      line-height:2;
      padding:0 90px 0 10px;
    }

    .titulo_tablas {
      text-align:center; 
      line-height: 1;
      
    }
    .titulo_tablas::after {
      
      content: "";
      display: block;
      width: 80%;
      height: 2px;
      background: #b10000ff;
      margin: 4px auto 0 auto;
    }

    @page {
      margin: 0;
    }

    footer {
      position: fixed;
      bottom: 0;
    }
    
    .footer-img {
      width: 100%;
      object-fit: cover; /* llena el area sin deformar */
      display: block;
    }
    .header-img {
      width: 100%;
      object-fit: cover; /* llena el area sin deformar */
      display: block;
      position: fixed;
      top: 0;
      left: 0;
      height: auto;
      z-index: 999;
    }

    .footer-img-container {
      page-break-after: always; /* fuerza salto de página después del footer */
    }

    .guia-container {
      width: 70%;
      font-size: 17px;
      line-height: 1;
      /* border:1px solid #ccc; */
      margin: -10px auto;
      page-break-inside: avoid; /* evita cortar el bloque */
    }

  </style>

 

</head>
<body>
  @php
        $path = storage_path('app/public/imgReportes/header.jpg');
        $headerImg = null;
        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $headerImg = 'data:image/'.$type.';base64,'.base64_encode($data);
        }
    @endphp
  <img src="{{ $headerImg }}" class="header-img" alt="imagen">


  <div class="titulo">
    <h1>Centro Turístico: {{ $centrosturist->nomcentur }}</h1>
  </div>

  <div class="descripcion">
    <p>{{ $centrosturist->descentur }}</p>
  </div>

  <hr class="linea">

  <div class="centrosturist">
    <div class="contacto">
      <h3 class="titulo_tablas">DIRECCIÓN Y CONTACTO</h3>
      <p><strong><b>Tipo de centro: </b></strong> {{ $centrosturist->producto->nomproduct ?? '-' }}</p>
      <p><strong><b>Dirección: </b></strong> {{ $centrosturist->dircentur ?? '-' }}</p>
      <p><strong><b>Responsable: </b></strong> {{ $centrosturist->rescentur ?? '-' }}</p>
      <p><strong><b>Telefono: </b></strong> {{ $centrosturist->telcentur ?? '-' }}</p>
      <p><strong><b>Correo: </b></strong> {{ $centrosturist->corcentur ?? '-' }}</p>
    </div>

    <div class="servicios">
      <h3 class="titulo_tablas">SERVICIOS TURÍSTICOS</h3>
      <ul>
        @foreach($centrosturist->serviciosturist as $serv)
          <li>{{ $serv->nomsertur ?? $act->idsertur }}</li>
        @endforeach
      </ul>
    </div>
  </div>



  <h2 class="titulo_tablas">GUÍAS TURÍSTICOS Y SUS ACTIVIDADES</h2>

  @php
    $guides = $centrosturist->guiasturist ?? collect();
    $actividadesCentro = $centrosturist->actividadturist ?? collect();
  @endphp


  @if($guides->isNotEmpty())
      @foreach($guides as $g)
          @php
              $nombreGuia = $g->nomguiatur ?? $g->name ?? $g->nombre ?? $g->full_name ?? null;
              $telefonoGuia = $g->telguiatur ?? $g->telefono ?? $g->phone ?? null;
              $correoGuia = $g->corguiatur ?? $g->email ?? null;
              $responsableGuia = $g->nomresguiatur ?? $g->name ?? null;

              // si la relación ya está cargada:
              $actividadesGuia = ($g->actividadturist instanceof \Illuminate\Support\Collection)
                                  ? $g->actividadturist->intersect($actividadesCentro)
                                  : $g->actividadturist()->get()->intersect($actividadesCentro);
          @endphp

          <div class="guia-container">
              <p><strong>Nombre de la agencia:</strong>{{ $nombreGuia ?? ('Guía #' . ($g->idguiatur ?? $g->id ?? '-')) }}</p>

              <p><strong>Responsable:</strong> {{ $responsableGuia ?? '-' }}</p>

              <p><strong>Teléfono:</strong> {{ $telefonoGuia ?? '-' }} &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>Correo:</strong> {{ $correoGuia ?? '-' }}</p>
              
              <h4>Actividades en este centro:</h4>
              @if($actividadesGuia->count() > 0)
                  <ul style="margin-left:20px;">
                      @foreach($actividadesGuia as $act)
                          @php
                              $nombreAct = $act->nomacttur ?? $act->name ?? $act->nombre ?? null;
                              $descripcionAct = $act->descacttur ?? $act->descripcion ?? null;
                          @endphp
                          <li>
                              {{ $nombreAct ?? ('Actividad #' . ($act->idacttur ?? $act->id ?? '-')) }}
                              @if($descripcionAct) - {{ \Illuminate\Support\Str::limit($descripcionAct, 120) }} @endif
                          </li>
                      @endforeach
                  </ul>
              @else
                  <p style="font-style:italic; margin-left:20px;">- No tiene actividades asignadas en este centro -</p>
              @endif
              
          </div>
          <hr class="linea">
      @endforeach
  @else
      <p>- No hay guías registrados para este centro -</p>
  @endif


  
  <!-- @php
    $path = storage_path('app/public/imgReportes/pie_pagina.png');
@endphp -->

<!-- forma segura -->

@php
    $path = storage_path('app/public/imgReportes/footer.jpg');
    $footerImg = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $footerImg = 'data:image/'.$type.';base64,'.base64_encode($data);
    }
@endphp





<div class="page-bottom-spacer"></div>

<footer class="footer-img-container">
    @if($footerImg)
        <img src="{{ $footerImg }}" class="footer-img" alt="imagen">
    @endif
</footer>
  
  

</footer>





</body>



</html>
