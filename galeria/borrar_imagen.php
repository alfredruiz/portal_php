<?php 

session_start();

require '../admin/config.php';
require '../funciones.php';

$usuario = $_SESSION['usuario'];

comprobarSesion();

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: ../error.php');
}

$id = limpiarDatos($_GET['id']);
$sec = limpiarDatos($_GET['sec']);
$lan = limpiarDatos($_GET['lan']);

if (!$id || !$sec) {
	header('Location: ' . RUTA . '/galeria/listado_imagenes.php');
}

if ($sec == 'img') {

	/*Opcion multi-query para borrar y luego resetear el orden de los artículos.*/

	$sql = 'DELETE FROM galeria_img WHERE id = :id; SET @count = 0; UPDATE galeria_img SET orden = @count:= @count + 1';

	$borrar_imagen = $conexion->prepare($sql);
	$borrar_imagen->execute(array(':id' => $id));
	
}



header('Location: ' . RUTA . '/galeria/listado_imagenes.php');
	
 ?>