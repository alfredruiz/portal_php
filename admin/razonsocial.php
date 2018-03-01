<?php 

/*Funcionalidad separa para insertar la razon social en el menú superior de administración*/

$conexion = conexion($bd_config);

if (!$conexion) {
	$mensajeError = 'Se ha producido un error de conexión a la Base de Datos';
	echo $mensajeError;
	//header('Location: error.php');
} 

/*Se coge el usuario del archivo config.php y se llama a la misma función que se usa para el login 
y obtener la razonsocial*/
$usuario = $blog_config['usuarioContactos'];

$usuario_propietario = obtener_usuario($conexion, $usuario);

if (!$usuario_propietario) {
    $mensajeError = 'No se ha recibido información de la base de datos';
    // echo $mensajeError;
    //header('Location: error.php');
}

require '../views/razonsocial.view.php';

 ?>