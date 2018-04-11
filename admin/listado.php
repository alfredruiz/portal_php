<?php 

/*LISTADO DE SECCIONES*/

session_start();

require 'config.php';
require '../funciones.php';

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

$totalArticulos = (int)total_articulos($conexion, $idioma);
// $orden = $totalArticulos + 1;

$articulos = obtener_articulos($conexion, $idioma);

// if (!$articulos) {
//     $mensajeError .= 'No se ha recibido información de la base de datos';
//     // echo $mensajeError;
//     header('Location: error.php');
// }

$cabecera = obtener_cabecera($conexion, $idioma);

if (!$cabecera) {
    $mensajeError .= 'No se ha recibido información de la base de datos';
    // echo $mensajeError;
    header('Location: error.php');
}

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
    subirBajarArticulo($conexion, $posicionOrigen, $posicionDestino);
    header('Location: listado.php');
}


require '../views/listado.view.php';
 ?>