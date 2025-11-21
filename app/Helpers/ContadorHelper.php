<?php

if (!function_exists('contador')) {
    /**
     * Función que incrementa el contador de visitas y devuelve el nuevo número.
     * Utiliza archivos de texto para el conteo, manteniendo la lógica original.
     * * @return int El número actual de visitas para la página actual.
     */
    function contador(): int
    {
        // 1. Definimos la ruta base para guardar los archivos de conteo.
        // Usamos base_path() para asegurar que PHP pueda escribir en la raíz del proyecto
        // (asumiendo que la carpeta 'contador_visitas' existe).
        $ruta_base = base_path('contador_visitas');

        // 2. Obtenemos el nombre de la página actual de la URL para crear un archivo único.
        // Esto reemplaza a basename($_SERVER['PHP_SELF']) de PHP puro.
        $pagina = request()->path() === '/' ? 'inicio' : str_replace('/', '_', request()->path());
        $fichero = "{$ruta_base}/contador_{$pagina}.txt";
        
        // Crea la carpeta si no existe (con permisos)
        if (!is_dir($ruta_base)) {
            mkdir($ruta_base, 0777, true);
        }
        
        // 3. Si el archivo no existe, crearlo con valor inicial 0
        if (!file_exists($fichero)) {
            file_put_contents($fichero, "0");
        }
        
        // 4. Leer, Incrementar y Guardar el nuevo valor
        $num = (int) file_get_contents($fichero);
        $num++;
        file_put_contents($fichero, $num);
        
        return $num;
    }
}
