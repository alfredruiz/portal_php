<?php 

header("Content-type: text/css");
require "../admin/config.php";
require '../index.php';

$imagenFondo = "echo RUTA . '/img/' .$cabecera['imagen']";

 ?>

 .fondoS {
	background-image: url("<?php echo $imagenFondo; ?>") !important;
	background-repeat: no-repeat;
	background-size: 100% 100%;

}