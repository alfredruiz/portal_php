<?php 

require '../admin/config.php';
require '../funciones.php';
require 'funciones_galeria.php';


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
	$idioma = $idioma_principal;
}

$imagenes = obtener_imagenes($conexion, $idioma);

require 'view/index.view.php';

?>