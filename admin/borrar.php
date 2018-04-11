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

	$sql = 'DELETE FROM articulos WHERE id = :id; SET @count = 0; UPDATE articulos SET orden = @count:= @count + 1';

	$borrar_articulo = $conexion->prepare($sql);
	$borrar_articulo->execute(array(':id' => $id));

	// $borrar_articulo = $conexion->prepare('DELETE FROM articulos WHERE id = :id');
	// $borrar_articulo->execute(array(':id' => $id));

	// $ordenarArticulos = $conexion->prepare('SET @count = 0');
	// $ordenarArticulos = $conexion->prepare('UPDATE articulos SET orden = @count:= @count + 1');



	// for ($i = 1; $i <= $totalArticulos ; $i++) {
		
	// $orden = i;

	// 	// foreach ($articulos as $articulo) {
			
	// 		$cambiarOrden = $conexion->prepare('UPDATE articulos SET orden = :orden WHERE orden = :ordenMas1');
	// 		$cambiarOrden->execute(array(':orden' => $orden, ':ordenMas1' => $orden+1));

	// 		//$orden++;
			
	// 	// }
	// }

	
}


if ($sec == 'us') {
	$borrar_usuario = $conexion->prepare('DELETE FROM usuarios WHERE id = :id');
	$borrar_usuario->execute(array(':id' => $id));	
}

header('Location: ' . RUTA . '/admin/listado.php');
	
 ?>