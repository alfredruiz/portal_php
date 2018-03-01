<?php 

require 'funciones.php';
// require 'index.php';

$conexion = conexion($bd_config);

if (!$conexion) {
    $mensajeError .= 'Se ha producido un error de conexión a la Base de Datos';
    echo $mensajeError;
    header('Location: error.php');

} 

// $usuarios = obtener_usuarios($conexion);

// if (!$usuarios) {
//     $mensajeError .= 'No se ha recibido información de la base de datos';
//     // echo $mensajeError;
//     header('Location: error.php');
// }

require 'views/menu_superior.view.php';

 ?>