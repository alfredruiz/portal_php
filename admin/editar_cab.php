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
	$titulo1 = limpiarDatos($_POST['titulo1']);
	$titulo2 = limpiarDatos($_POST['titulo2']);
	$titulo3 = limpiarDatos($_POST['titulo3']);
	$id = limpiarDatos($_POST['id']);
	$imagen_subida = $_POST['imagen_subida'];
	$imagen = $_POST['imagen'];
	$imagen_fondo_subida = $_POST['imagen_fondo_subida'];
	$imagen_fondo = $_POST['imagen_fondo'];
	$usuario = $_SESSION['usuario'];
	$seccion = '';

	if (empty($imagen['name'])) {
		$imagen = $imagen_subida;
	} else {
		$imagen_subida = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen']['name'];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida);
		$imagen = $_FILES['imagen']['name'];
	}

	if (empty($imagen_fondo['name'])) {
		$imagen_fondo_subida = $imagen_fondo_subida;
	} else {
		$imagen_fondo_subida = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen_fondo_subida']['name'];
		move_uploaded_file($_FILES['imagen_fondo_subida']['tmp_name'], $imagen_fondo_subida);
		$imagen = $_FILES['imagen_fondo_subida']['name'];
	}

		$editar_cabecera = $conexion->prepare('UPDATE cabecera SET idioma = :idioma, titulo1 = :titulo1, titulo2 = :titulo2, titulo3 = :titulo3, imagen = :imagen, imagen_fondo = :imagen_fondo, usuario = :usuario WHERE id = :id');

		$editar_cabecera->execute(array(
			':idioma' => $idioma,
			':titulo1' => $titulo1,
			':titulo2' => $titulo2,
			':titulo3' => $titulo3,
			':imagen' => $imagen_subida,
			':imagen_fondo' => $imagen_fondo_subida,
			':usuario' => $usuario,
			':id' => $id
		));
	

	header('Location: ' .RUTA . '/admin/listado.php');


} else {
	$id_cabecera = id_cabecera($_GET['id']);

	if (empty($id_cabecera)) {
		header('Location: '. RUTA . '/admin');
	}

	$post = obtener_cabecera_por_id($conexion, $id_cabecera);
	if (!$post) {
		header('Location: '. RUTA . '/admin');
	}

	$post = $post[0];
		
}

require '../views/editar_cab.view.php';

 ?>