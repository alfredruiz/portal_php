<?php 

session_start();

require  'config.php';
require '../funciones.php';
require '../head.php';
$usuario = $_SESSION['usuario'];
comprobarSesion();


// if(isset($_SESSION['usuario'])){
// 	haeder('Location: ../views/editar.view.php');
// }
$conexion = conexion($bd_config);

if (!$conexion) {
$errores .= 'Se ha producido un error de conexión a la Base de Datos';
echo $errores;
// header('Location: ../error.php');
}

$usuario = $blog_config['usuarioContactos'];

$usuarios = obtener_usuario_por_nombre($conexion, $usuario);

// if (!$usuarios) {
//     $mensajeError = 'No se ha recibido información de la base de datos';
    // echo $mensajeError;
    //header('Location: error.php');
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id = limpiarDatos($_POST['id']);
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$nombre = $_POST['nombre'];
	$razonsocial = $_POST['razonsocial'];
	$direccion = $_POST['direccion'];
	$codigopostal = $_POST['cp'];
	$ciudad = $_POST['ciudad'];
	$provincia = $_POST['provincia'];
	$ccaa = $_POST['ccaa'];
	$pais = $_POST['pais'];
	$telefono1 = $_POST['telefono1'];
	$telefono2 = $_POST['telefono2'];
	$fax = $_POST['fax'];

	// $password = hash('sha512', $password);


	$errores = '';

	if (empty($usuario)) {
		echo '<br><br>';
		$errores .= "Por favor especifique un usuario";

	} else {

		// $conexion = conexion($bd_config);

		// if (!$conexion) {
		// $errores .= 'Se ha producido un error de conexión a la Base de Datos';
		// echo $errores;
		// // header('Location: ../error.php');
		// }

		//$usuario_login = obtener_usuario($conexion, $usuario);
	
		// echo print_r($usuario_login);


		if ($password != $password2) {
			$errores .= 'Las constraseñas no coinciden';
		}


		if (empty($password)) {

			if ($errores == '') {
			$password = hash('sha512', $password);
			$editar_usuario = $conexion->prepare('UPDATE usuarios SET usuario = :usuario, nombre = :nombre, razonsocial = :razonsocial, email = :email, direccion = :direccion, codigopostal = :codigopostal, ciudad = :ciudad, provincia = :provincia, ccaa = :ccaa, pais = :pais, telefono1 = :telefono1, telefono2 = :telefono2, fax = :fax WHERE id = :id');

			//Cuidado con el orden en el array!!!
			$editar_usuario->execute(array(
				':usuario' => $usuario,
				':nombre' => $nombre,
				'razonsocial' => $razonsocial,
				':email' => $email,
				':direccion' => $direccion,
				':codigopostal' => $codigopostal,
				':ciudad' => $ciudad,
				':provincia' => $provincia,
				':ccaa' => $ccaa,
				':pais' => $pais,
				':telefono1' => $telefono1,
				':telefono2' => $telefono2,
				':fax' => $fax,
				':id' => $id
			));		

			header('Location: listado_usuario.php');
			}	
		
		} else {

			if ($errores == '') {
			$password = hash('sha512', $password);
			$editar_usuario = $conexion->prepare('UPDATE usuarios SET usuario = :usuario, pass = :password, nombre = :nombre, razonsocial = :razonsocial, email = :email, direccion = :direccion, codigopostal = :codigopostal, ciudad = :ciudad, provincia = :provincia, ccaa = :ccaa, pais = :pais, telefono1 = :telefono1, telefono2 = :telefono2, fax = :fax WHERE id = :id');

			//Cuidado con el orden en el array!!!
			$editar_usuario->execute(array(
				':usuario' => $usuario,
				':password' => $password,
				':nombre' => $nombre,
				'razonsocial' => $razonsocial,
				':email' => $email,
				':direccion' => $direccion,
				':codigopostal' => $codigopostal,
				':ciudad' => $ciudad,
				':provincia' => $provincia,
				':ccaa' => $ccaa,
				':pais' => $pais,
				':telefono1' => $telefono1,
				':telefono2' => $telefono2,
				':fax' => $fax,
				':id' => $id
			));		

			header('Location: listado_usuario.php');
			}

		}

		

	
	}
}

//Si se llama a editar.php desde el listado mediante GET...
if ($_SERVER['REQUEST_METHOD'] == 'GET')
 {
	$id_usuario = id_usuario($_GET['id']);

	if (empty($id_usuario)) {
		header('Location: '. RUTA . '/admin');
	}

	$post = obtener_usuario_por_id($conexion, $id_usuario);

	if (!$post) {
		header('Location: '. RUTA . '/admin');
	}

	$post = $post[0];
	
}

require '../views/editar_usuario.view.php';



 ?>