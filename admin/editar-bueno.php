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
	$id = limpiarDatos($_POST['id']);
	$imagen_subida = $_POST['imagen_subida'];
	$imagen = $_POST['imagen'];
	$usuario = $_SESSION['usuario'];
	$seccion = '';

	if (empty($imagen['name'])) {
		$imagen = $imagen_subida;
	} else {
		$imagen_subida = '../' . $blog_config['carpeta_imagenes'] . $_FILES['imagen']['name'];
		move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen_subida);
		$imagen = $_FILES['imagen']['name'];
	}

		$editar_articulo = $conexion->prepare('UPDATE articulos SET idioma = :idioma, seccion = :seccion, titulo = :titulo, texto = :texto, imagen = :imagen, usuario = :usuario WHERE id = :id');

		$editar_articulo->execute(array(
				':idioma' => $idioma,
				':seccion' => $seccion,
				':titulo' => $titulo,
				':texto' => $texto,
				':imagen' => $imagen_subida,
				':usuario' => $usuario,
				':id' => $id
			));
	

	header('Location: ' .RUTA . '/admin/listado.php');


	} else {
		$id_articulo = id_articulo($_GET['id']);

		if (empty($id_articulo)) {
			header('Location: '. RUTA . '/admin');
		}

		$post = obtener_articulo_por_id($conexion, $id_articulo);
		if (!$post) {
			header('Location: '. RUTA . '/admin');
		}

		$post = $post[0];
			
		}



		
	// }
	// header('Location: ' .RUTA . '/admin/listado.php');
// }


// }


require '../views/editar.view.php';

 ?>