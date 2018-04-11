<?php 

$urlActual = $_SERVER['HTTP_HOST'];

if ($urlActual == 'localhost'){
	
	//en local
	define('RUTA', 'http://'.$urlActual.'/portalphp');

	$bd_config = array(
		'host' => 'localhost',
		'basedatos' => 'innovars',
		'usuario' => 'root',
		'password' => 'admin'
	);

} elseif ($urlActual === 'tradcbm.com' || $urlActual === 'www.tradcbm.com') {
	
	//en alojamiento 1&1
	define('RUTA', 'http://' .$urlActual);

$pashost1and1_1 = 'dar';		$pashost1and1_2 = 2+1;
$pashost1and1_3 = 'sii';		$pashost1and1_4 = 70+4;
$pashost1and1_5 = '1An';		

	$bd_config = array(
		'host' => 'db726656774.db.1and1.com',
		'basedatos' => 'db726656774',
		'usuario' => 'dbo726656774',
		'password' => $pashost1and1_1 . (string)$pashost1and1_2 . $pashost1and1_3 . (string)$pashost1and1_4 . $pashost1and1_5 . '.'
		// 'password' => 'dar3sii741An.'
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
	'usuarioContactos' => 'carmen',
	'urlActual' => $urlActual,
	'razonSocial' => 'TRADCBM'
);

$pasmail_1 = 'dar';		$pasmail_2 = 2+1;
$pasmail_3 = 'sii';		$pasmail_4 = 70+4;
$pasmail_5 = 'TRa';		$usmail = 'info';
$dommail = 'tradcbm.com';
//CONFIGURACION PARA CORREO 1&1 (no admite otra)
$mail_config = array(
	'smtpDebug' => 0,                     
	'smtpAuth' => true,                  
	'smtpSecure' => 'tls',                 
	'host' => 'smtp.1and1.com',      
	'port' => 25,             
'username' => $usmail . '@' . $dommail,  
	'password' => $pasmail_1 . (string)$pasmail_2 . $pasmail_3 . (string)$pasmail_4 . $pasmail_5 . '.' ,
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
	'galeria' => false,
	'correo' => false,
	'cv' => false,
	'blog' => false //próximamente
);

?>