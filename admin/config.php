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

} elseif ($urlActual == 'www.tradcbm.com') {
	
	//en alojamiento 1&1
	define('RUTA', 'http://' .$urlActual);

	$bd_config = array(
		'host' => 'db726656774.db.1and1.com',
		'basedatos' => 'db726656774',
		'usuario' => 'dbo726656774',
		'password' => 'dar3sii741An.'
	);

} else {

	//en alojamiento web innovars
	define('RUTA', 'http://' .$urlActual);

	$bd_config = array(
		'host' => 'hl67.dinaserver.com',
		'basedatos' => 'innovars',
		'usuario' => 'alfredruizinn',
		'password' => 'dar3sii74DIn'
	);
	
}



$blog_config = array(
	'post_por_pagina' => '2',
	'carpeta_imagenes' => 'img/',
	'carpeta_imagenes_galeria' => 'galeria/portfolio/',
	'es' => 'es',
	'en' => 'en',
	'fr' => 'fr',
	'ca' => 'ca',
	'usuarioContactos' => 'alfredo',
	'urlActual' => $urlActual,
	'razonSocial' => 'TRADCBM'
);

//CONFIGURACION PARA CORREO 1&1 (no admite otra)
$mail_config = array(
	'smtpDebug' => 0,                     
	'smtpAuth' => true,                  
	'smtpSecure' => 'tls',                 
	'host' => 'smtp.1and1.com',      
	'port' => 25,             
	'username' => 'info@tradcbm.com',  
	'password' => 'dar3sii74TRa.',
	'timeZone' => 'Europe/Madrid'
);

$idioma_principal = 'es';

$idiomas_config = array (
	'es' => 'español',
	'en' => 'english'
	//'fr' => 'francais'
	// 'ca' => 'català'
);

$complement_confing = array(
	'galeria' => true,
	'correo' => false,
	'cv' => true,
	'blog' => false //próximamente
);

?>