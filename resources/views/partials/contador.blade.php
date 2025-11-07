<?php
function contador()
{
    // Obtener el nombre del archivo actual sin la extensión
    $pagina = basename($_SERVER['PHP_SELF'], ".php");
    
    // Crear un archivo de contador único para cada página
    $fichero = "contador_visitas/contador_" . $pagina . ".txt";
    
    // Si el archivo no existe, crearlo con valor inicial 0
    if (!file_exists($fichero)) {
        file_put_contents($fichero, "0");
    }
    
    // Leer el número actual de visitas
    $num = (int) file_get_contents($fichero);
    
    // Incrementar el contador
    $num++;
    
    // Guardar el nuevo valor en el archivo
    file_put_contents($fichero, $num);
    
    return $num;
}
?>
