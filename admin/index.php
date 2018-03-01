<?php 

/*****************
*INDEX DE ADMIN
******************/

session_start();

require  'config.php';
require '../funciones.php';

/*Si el usuario ya estaba logueado, se redirige a la página de listado*/
if (isset($_SESSION['usuario'])) {
	header ('Location: ../admin/listado.php');
}

/*Envío de los datos*/
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password = hash('sha512', $password);


	/*Validación*/
	$errores = '';

	if (empty($usuario) or empty($password2)) {
		echo '<br><br>';
		$errores .= "Por favor complete todos los campos";
	} 

	$conexion = conexion($bd_config);

	if (!$conexion) {
	$errores .= 'Se ha producido un error de conexión a la Base de Datos';
	}

	/*comprobar que el usaurio correcto*/
	$usuario_login = login($conexion, $usuario, $password);

	/*Si es correcto...*/
	if ($usuario_login !== false) {
		$_SESSION['usuario'] = $usuario;
	header('Location: ../admin/listado.php');

	/*si no, se indica el error*/
	} else {
	$errores .= 'Usuario o contraseña incorrectos';

	}

	echo $usuario;
}




require '../views/admin.view.php';

 ?>