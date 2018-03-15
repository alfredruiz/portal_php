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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$idioma = $_POST['idiomas'];
	$titulo = limpiarDatos($_POST['titulo']);
	$texto = $_POST['texto'];
	$imagen = $_FILES['thumb']['tmp_name'];
	$seccion = '';
	$totalArticulos = (int)total_articulos($conexion, $idioma);
	$orden = $totalArticulos + 1;
	$usuario = $_SESSION['usuario'];

	$imagen_subida = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

	move_uploaded_file($imagen, $imagen_subida);

	$statement = $conexion->prepare('INSERT INTO articulos (idioma, seccion, orden, titulo, texto, imagen, usuario) VALUES (:idioma,:seccion,:orden,:titulo,:texto,:imagen,:usuario)');

	$statement->execute(array(
		':idioma' => $idioma,
		':seccion' => $seccion,
		':orden' => $orden,
		':titulo' => $titulo,
		':texto' => $texto,
		':imagen' => $imagen_subida,
		':usuario' => $usuario
	));

	header('Location: '. RUTA . '/admin/listado.php');
}
require '../views/nuevo.view.php';

 ?>