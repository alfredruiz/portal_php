<?php 

require 'admin/config.php';
require 'funciones.php';
// require 'head.php';

$mensajeError = '';

// $urlActual = $_SERVER['HTTP_HOST'];

/*Se llama a la conexión, en el archivo funciones.php y se comprueba si hay error*/
$conexion = conexion($bd_config);

if (!$conexion) {
	$mensajeError .= 'Se ha producido un error de conexión a la Base de Datos';
	echo $mensajeError;
	//header('Location: error.php');
} 

/*Para poder el contenido en los distintos idiomas, se envía por get el parámetro
que modifica la variable idioma que luego se usará para la funcióin obtener_artículos.
Para el español no se envía parámetro*/

if (isset($_GET['lan'])) {
	$idioma = $_GET['lan'];
	
} else {
	$idioma = "es";
}


/*Se llama a las funciones de obtener artículos, cabecera y usuario, en este 
caso para rellenar el apartado de contacto.
Los datos de contacto son los del usuario dueño de la web y que está definido
en el archivo config.php*/

$articulos = obtener_articulos($conexion, $idioma);

// if (!$articulos) {
// 	$mensajeError .= 'No se ha recibido información de la base de datos';
// 	//echo $mensajeError;
// 	//header('Location: error.php');
// }

$cabecera = obtener_cabecera($conexion, $idioma);

if (!$cabecera) {
	$mensajeError .= 'No se ha recibido información de la base de datos';
	echo $mensajeError;
	header('Location: error.php');
}

$usuario_propietario = $blog_config['usuarioContactos'];

$usuario = obtener_usuario($conexion, $usuario_propietario);

if (!$usuario) {
    $mensajeError .= 'No se ha recibido información de la base de datos';
    echo $mensajeError;
    header('Location: error.php');
}

require 'views/index.view.php';


 ?>