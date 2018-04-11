<?php 

session_start();

require 'config.php';
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
	header('Location: ' . RUTA . '/admin/listado.php');
}

if ($sec == 'art') {

	/*Opcion multi-query para borrar y luego resetear el orden de los artículos.*/

	$sql = 'DELETE FROM articulos WHERE id = :id and idioma = :lan; SET @count = 0; UPDATE articulos SET orden = @count:= @count + 1 WHERE idioma = :lan';

	$borrar_articulo = $conexion->prepare($sql);
	$borrar_articulo->execute(array(
		':id' => $id,
		':lan' => $lan
	));

	
}


if ($sec == 'us') {
	$borrar_usuario = $conexion->prepare('DELETE FROM usuarios WHERE id = :id');
	$borrar_usuario->execute(array(':id' => $id));	
}

header('Location: ' . RUTA . '/admin/listado.php');
	
 ?>