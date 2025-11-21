<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf; // Usa el facade DOMPDF


class ReporteController extends Controller
{
    //
    public function generarPDF()
    {
        // Datos opcionales para pasar a la vista
        $data = [
            'titulo' => 'Reporte de Centros Turísticos',
            'autor' => 'Sistema de Turismo'
        ];

        // Cargar la vista Blade (resources/views/reportes/ejemplo.blade.php)
        $pdf = Pdf::loadView('reportes.Apompal-CentroTuristico', $data);

        // Configurar tamaño carta en centímetros
        $pdf->setPaper([0, 0, 21.59 * 28.35, 27.94 * 28.35], 'portrait'); // ancho x alto en puntos (1cm = 28.35 puntos)

        // Mostrar en el navegador
        return $pdf->stream('Apompal-CentroTuristico.pdf');
    }



}
