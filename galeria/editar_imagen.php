<?php 

session_start();

require '../admin/config.php';
require '../funciones.php';
require 'funciones_galeria.php';

comprobarSesion();

$usuario = $_SESSION['usuario'];

$conexion = conexion($bd_config);

if (!$conexion) {
	header('Location: ../error.php');
}


/*Si se llama a editar.php desde el formulario editar.view.php mediante POST...	
Este archivo sirve para editar tanto la cabecera como las secciones*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$id = limpiarDatos($_POST['id']);
	$idioma = $_POST['idiomas'];
	$titulo = limpiarDatos($_POST['titulo']);
	$subtitulo = limpiarDatos($_POST['subtitulo']);
	$texto = $_POST['texto'];
	$imagen_subida = $_POST['imagen_subida'];
	$imagen = $_FILES['imagen'];
	$enlace = $_POST['enlace'];
	$titulo_enlace = $_POST['titulo_enlace'];

	/*Si no se ha seleccionado imagen, se mantiene la que ya había subida.
	*/

	if (empty($imagen['name'])) {
		$imagen = $imagen_subida;
	} else {
		$imagen_subida = '../' . $blog_config['carpeta_imagenes_galeria'] . $_FILES['imagen']['name'];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida);
		$imagen = $_FILES['imagen']['name'];
	}

	$editar_imagen = $conexion->prepare('UPDATE galeria_img SET idioma = :idioma, titulo = :titulo, subtitulo = :subtitulo, descripcion = 	:texto, imagen = :imagen, enlace = :enlace, titulo_enlace = :titulo_enlace WHERE id = :id');

	$editar_imagen->execute(array(	
		':idioma' => $idioma,
		':titulo' => $titulo,
		':subtitulo' => $subtitulo,
		':texto' => $texto,
		':imagen' => $imagen,
		':enlace' => $enlace,
		':titulo_enlace' => $titulo_enlace,
		':id' => $id
	));

	header('Location: ' .RUTA . '/galeria/listado_imagenes.php');
} 

//Si se llama a editar.php desde el listado mediante GET...
if ($_SERVER['REQUEST_METHOD'] == 'GET')
 {
	$id_imagen = id_imagen($_GET['id']);
	
	if (empty($id_imagen)) {
		header('Location: '. RUTA . '/galeria/listado_imagenes.php');
	}

	if ($_GET['sec'] == 'img') {
		$post = obtener_imagen_por_id($conexion, $id_imagen);
	}

	if (!$post) {
		header('Location: '. RUTA . '/galeria/listado_imagenes.php');
	}

	$post = $post[0];
	
}

require '../galeria/view/editar_imagen.view.php';

 ?>