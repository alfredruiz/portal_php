<?php 

session_start();

require '../admin/config.php';
require '../funciones.php';
require 'funciones_galeria.php';

$usuario = $_SESSION['usuario'];

comprobarSesion();

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$idioma = $_POST['idiomas'];
	$titulo = limpiarDatos($_POST['titulo']);
	$subtitulo = limpiarDatos($_POST['subtitulo']);
	$texto = $_POST['texto'];
	$imagen = $_FILES['thumb']['tmp_name'];
	$usuario = $_SESSION['usuario'];
	$totalImagenes = (int)total_imagenes($conexion, $idioma);
	$orden = $totalImagenes + 1;
	$enlace = $_POST['enlace'];
	$titulo_enlace = $_POST['titulo_enlace'];

	var_dump($_POST);

	$imagen_guardada = '../' . $blog_config['carpeta_imagenes_galeria'] . $_FILES['thumb']['name'];
	$imagen_subida = $_FILES['thumb']['name'];


	move_uploaded_file($imagen, $imagen_guardada);


	$statement = $conexion->prepare('INSERT INTO galeria_img (idioma, titulo, subtitulo, descripcion, imagen, orden, enlace, titulo_enlace) VALUES (:idioma,:titulo, :subtitulo, :texto,:imagen, :orden, :enlace, :titulo_enlace)');

	$statement->execute(array(
		':idioma' => $idioma,
		':titulo' => $titulo,
		':subtitulo' => $subtitulo,
		':texto' => $texto,
		':imagen' => $imagen_subida,
		':orden' => $orden,
		':enlace' => $enlace,
		':titulo_enlace' => $titulo_enlace

	));

	header('Location: '. RUTA . '/galeria/listado_imagenes.php');
}

require '../galeria/view/nueva_imagen.view.php';

 ?>