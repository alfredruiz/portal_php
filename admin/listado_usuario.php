<?php 

session_start();

require 'config.php';
require '../funciones.php';

comprobarSesion();

$usuario = $_SESSION['usuario'];

$mensajeError = '';

$conexion = conexion($bd_config);

if (!$conexion) {
    $mensajeError .= 'Se ha producido un error de conexión a la Base de Datos';
    echo $mensajeError;
    header('Location: error.php');
} 

// $usuario = $blog_config['usuarioContactos'];

// $usuarios = obtener_usuario($conexion, $usuario);

// if (!$usuarios) {
//     $mensajeError .= 'No se ha recibido información de la base de datos';
//     // echo $mensajeError;
//     header('Location: error.php');
// }

$lista_usuarios = obtener_usuarios($conexion);

if (!$lista_usuarios) {
    $mensajeError .= 'No se ha recibido información de la base de datos';
    // echo $mensajeError;
    header('Location: error.php');
}

$usuario = $blog_config['usuarioContactos'];

$usuarios = obtener_usuario($conexion, $usuario);

if (!$usuarios) {
    $mensajeError .= 'No se ha recibido información de la base de datos';
    // echo $mensajeError;
    header('Location: error.php');
}



require '../views/listado_usuarios.view.php';
 ?>