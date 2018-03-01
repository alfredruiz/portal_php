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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$nombre = $_POST['nombre'];
	$razonsocial = $_POST['razonsocial'];
	$email = $_POST['email'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$direccion = $_POST['direccion'];
	$codigopostal = $_POST['cp'];
	$ciudad = $_POST['ciudad'];
	$provincia = $_POST['provincia'];
	$ccaa = $_POST['ccaa'];
	$pais = $_POST['pais'];
	$telefono1 = $_POST['telefono1'];

	$errores = '';

	if (empty($usuario) or empty($password2) or empty($password2) or empty($razonsocial)) {
		echo '<br><br>';
		$errores .= "Por favor complete todos los campos obligatorios";

	} else {

		$conexion = conexion($bd_config);

		if (!$conexion) {
		$errores .= 'Se ha producido un error de conexión a la Base de Datos';
		echo $errores;
		// header('Location: ../error.php');
		}

		$usuario_login = obtener_usuario($conexion, $usuario);
	
		// echo print_r($usuario_login);

		if ($usuario_login != false) {
			$errores .= 'El nombre de usuario ya existe';
		}

		if ($password != $password2) {
			$errores .= 'Las constraseñas no coinciden';
		}

		if ($errores == '') {
			insertar_usuario($conexion, $usuario, $password, $nombre, $razonsocial, $email, $direccion, $codigopostal, $ciudad, $provincia, $ccaa, $pais, $telefono1);
		}

		header('Location: index.php');
	}
}

require '../views/registrar.view.php';



 ?>