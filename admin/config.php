<?php 

$urlActual = $_SERVER['HTTP_HOST'];

if ($urlActual == 'localhost'){
	
	//en local
	define('RUTA', 'http://'.$urlActual.'/tradcbm_php');

	$bd_config = array(
		'host' => 'localhost',
		'basedatos' => 'tradcbmweb',
		'usuario' => 'root',
		'password' => 'admin'
	);

} else {

	//en alojamiento web
	define('RUTA', 'http://' .$urlActual);

	$bd_config = array(
		'host' => 'hl67.dinaserver.com',
		'basedatos' => 'tradcbmweb',
		'usuario' => 'alfredruiz',
		'password' => 'dar3sii74DIn'
	);
	
}



$blog_config = array(
	'post_por_pagina' => '2',
	'carpeta_imagenes' => 'img/',
	'es' => 'es',
	'en' => 'en',
	'fr' => 'fr',
	'ca' => 'ca',
	'usuarioContactos' => 'carmen',
	'urlActual' => $urlActual,
	'razonSocial' => 'TRADCBM'
);
 ?>