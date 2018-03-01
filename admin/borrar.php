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
	$borrar_articulo = $conexion->prepare('DELETE FROM articulos WHERE id = :id');
	$borrar_articulo->execute(array(':id' => $id));
}

if ($sec == 'us') {
	$borrar_usuario = $conexion->prepare('DELETE FROM usuarios WHERE id = :id');
	$borrar_usuario->execute(array(':id' => $id));	
}

header('Location: ' . RUTA . '/admin/listado.php');
	
 ?>