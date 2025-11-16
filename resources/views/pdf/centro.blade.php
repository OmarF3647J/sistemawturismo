<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Centro - {{ $centrosturist->nomcentur }}</title>
  <style>
    body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
    .header { text-align:center; margin-bottom:20px; }
    .img { max-width:200px; max-height:150px; }
    table { width:100%; border-collapse:collapse; }
    td, th { padding:6px; border:1px solid #ddd; text-align:left; }
  </style>
</head>
<body>
  <div class="header">
    <h1>{{ $centrosturist->nomcentur }}</h1>
  </div>

  <p><strong>ID:</strong> {{ $centrosturist->idcentur }}</p>
  <p><strong>Tel:</strong> {{ $centrosturist->telcentur ?? '-' }}</p>
  <p><strong>Correo:</strong> {{ $centrosturist->corcentur ?? '-' }}</p>

  @if($centrosturist->imgcentur)
    @php $img = public_path("storage/{$centrosturist->imgcentur}"); @endphp
    @if(file_exists($img))
      <div><img src="{{ $img }}" class="img" alt="imagen"></div>
    @endif
  @endif

  <h3>Producto</h3>
  <p>{{ $centrosturist->producto->nomproduct ?? '-' }}</p>

  <h3>Actividades</h3>
  <ul>
    @foreach($centrosturist->actividadturist as $act)
      <li>{{ $act->nomacttur ?? $act->idacttur }}</li>
    @endforeach
  </ul>

  <div style="position: absolute; bottom: 20px; left: 20px; font-size: 10px;">
    Generado: {{ now()->format('d/m/Y H:i') }}
  </div>
</body>
</html>
