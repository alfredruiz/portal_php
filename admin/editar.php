<?php 

session_start();

require 'config.php';
require '../funciones.php';

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
	$imagen_subida = $_POST['imagen_subida'];
	$imagen = $_FILES['imagen'];
	$sinImagen = $_POST['sinImagen'];
	$usuario = $_SESSION['usuario'];

	/*Si el valor título está vacío se trata de la cabecera*/
	if (empty($_POST['titulo'])) {
		$titulo1 = (!empty($_POST['titulo1'])) ? limpiarDatos($_POST['titulo1']) : " ";
		$titulo2 = (!empty($_POST['titulo2'])) ? limpiarDatos($_POST['titulo2']) : " ";
		$titulo3 = (!empty($_POST['titulo3'])) ? limpiarDatos($_POST['titulo3']) : " ";
		$imagen_fondo_subida = $_POST['imagen_fondo_subida'];
		$imagen_fondo = $_FILES['imagen_fondo'];
	
		/*Si no, se trata de un artículo*/	
		} else {
			$titulo = limpiarDatos($_POST['titulo']);
			$texto = $_POST['texto'];
			$seccion = '';
		}

	/*Si no se ha seleccionado imagen, se mantiene la que ya había subida.
	*/

	if (empty($imagen['name'])) {
		if (isset($_POST['sinImagen']) && $_POST['sinImagen'] == 'noimg' ) {
			$sql = 'DELETE imagen FROM cabecera WHERE idioma = :idioma';
			$borrar_imagen = $conexion->prepare($sql);
			$borrar_imagen->execute(array(':idioma' => $idioma));

		} else {
		$imagen = $imagen_subida;}
	} else {
		$imagen_subida = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen']['name'];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida);
		$imagen = $_FILES['imagen']['name'];
	}



	if (empty($imagen_fondo['name'])) {
		$imagen_fondo = $imagen_fondo_subida;
	} else {
		$imagen_fondo_subida = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen_fondo']['name'];
		move_uploaded_file($_FILES['imagen_fondo']['tmp_name'], $imagen_fondo_subida);
		$imagen_fondo = $_FILES['imagen_fondo']['name'];
	}

	if (!empty($titulo)) {
		
		$editar_articulo = $conexion->prepare('UPDATE articulos SET idioma = :idioma, seccion = :seccion, titulo = :titulo, texto = :texto, imagen = :imagen, usuario = :usuario WHERE id = :id');

		$editar_articulo->execute(array(
			':idioma' => $idioma,
			':seccion' => $seccion,
			':titulo' => $titulo,
			':texto' => $texto,
			':imagen' => $imagen,
			':usuario' => $usuario,
			':id' => $id
		));

	} else {

		$editar_cabecera = $conexion->prepare('UPDATE cabecera SET idioma = :idioma, titulo1 = :titulo1, titulo2 = :titulo2, titulo3 = :titulo3, imagen = :imagen, imagen_fondo = :imagen_fondo, usuario = :usuario WHERE id = :id');

		$editar_cabecera->execute(array(
			':idioma' => $idioma,
			':titulo1' => $titulo1,
			':titulo2' => $titulo2,
			':titulo3' => $titulo3,
			':imagen' => $imagen,
			':imagen_fondo' => $imagen_fondo,
			':usuario' => $usuario,
			':id' => $id
		));
	}

	header('Location: ' .RUTA . '/admin/listado.php');
} 

//Si se llama a editar.php desde el listado mediante GET...
if ($_SERVER['REQUEST_METHOD'] == 'GET')
 {
	$id_articulo = id_articulo($_GET['id']);
	$id_cabecera = id_cabecera($_GET['id']);
	$seccion = id_cabecera( $_GET['sec']);

	if (empty($id_articulo) || empty($id_cabecera) ) {
		header('Location: '. RUTA . '/admin');
	}

	if ($_GET['sec'] == 'art') {
		$post = obtener_articulo_por_id($conexion, $id_articulo);
	} elseif ($_GET['sec'] == 'cab') {
		$post = obtener_cabecera_por_id($conexion, $id_cabecera);
	}


	if (!$post) {
		header('Location: '. RUTA . '/admin');
	}

	$post = $post[0];
	
}
// header('Location: ' .RUTA . '/admin/listado.php');
// }


require '../views/editar.view.php';

 ?>