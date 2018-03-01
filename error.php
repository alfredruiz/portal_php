<?php

require 'admin/config.php';
require 'funciones.php';

/*Se llama a la conexión, en el archivo funciones.php y se comprueba si hay error*/
$conexion = conexion($bd_config);

if (!$conexion) {
    $mensajeError .= 'Se ha producido un error de conexión a la Base de Datos';
    echo $mensajeError;
    //header('Location: error.php');
} 

/*Se llama a la cabecera para mostrar fondo y logo. El idioma se establece en español*/
$idioma = 'es';
$cabecera = obtener_cabecera($conexion, $idioma);

if (!$cabecera) {
    $mensajeError .= 'No se ha recibido información de la base de datos';
    echo $mensajeError;
    
}

require 'views/error.view.php';
 ?>
