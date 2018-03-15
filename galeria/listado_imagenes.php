<?php 

/*LISTADO DE SECCIONES*/

session_start();

require '../admin/config.php';
require '../funciones.php';
require 'funciones_galeria.php';

comprobarSesion();

$origen = "";
$destino = "";

$usuario = $_SESSION['usuario'];

$mensajeError = '';

$conexion = conexion($bd_config);

if (!$conexion) {
    $mensajeError .= 'Se ha producido un error de conexión a la Base de Datos';
    echo $mensajeError;
    //header('Location: error.php');

} 

/*Determina si se muestran los contenidos de un idioma u otro mediante el envío del
parámetro por GET*/
if (isset($_GET['lan'])) {
    $idioma = $_GET['lan'];
    
} else {
    $idioma = "es";
}

$totalImagenes = (int)total_imagenes($conexion, $idioma);

$imagenes = obtener_imagenes($conexion, $idioma);

/*Se muestra las entradas que se muestran en el apartado de contacto
y que corresponden a los datos del propietario de la web, 
establecido en el archivo config.php*/
$usuario = $blog_config['usuarioContactos'];

$usuarios = obtener_usuario($conexion, $usuario);

if (!$usuarios) {
    $mensajeError .= 'No se ha recibido información de la base de datos';
    // echo $mensajeError;
    header('Location: error.php');
}

if (isset($_GET['ord'])) {
    $posicionOrigen = (int)$_GET['ord'];
    $posicionDestino = (int)$_GET['nord'];
    subirBajarImagen($conexion, $posicionOrigen, $posicionDestino);
    header('Location: listado_imagenes.php');
}

require '../galeria/view/listado_imagenes.view.php';
 ?>