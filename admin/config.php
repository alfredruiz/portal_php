<?php 

$urlActual = $_SERVER['HTTP_HOST'];

if ($urlActual == 'localhost'){
	
	//en localhost
	define('RUTA', 'http://'.$urlActual.'/portalphp');

	$bd_config = array(
		'host' => 'localhost',
		'basedatos' => 'portalphp',
		'usuario' => 'root',
		'password' => 'admin'
	);

} elseif ($urlActual == 'alfredoruiz.innovars.es') {
	
	//en alojamiento web innovars
	define('RUTA', 'http://' .$urlActual);

$pashost_1 = 'dar';		$pashost_2 = 2+1;
$pashost_3 = 'sii';		$pashost_4 = 70+4;
$pashost_5 = 'DIn';		

$ushost_1 = 'alfred';	$ushost_2 = 'ruizweb';

	$bd_config = array(
		'host' => 'hl67.dinaserver.com',
		'basedatos' => 'alfredruiz',
		'usuario' => $ushost_1 . $ushost_2,
		'password' => $pashost_1 . (string)$pashost_2 . $pashost_3 . (string)$pashost_4 . $pashost_5 
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


//CONFIGURACION PARA CORREO 

$pasmail_1 = 'dar';		$pasmail_2 = 2+1;
$pasmail_3 = 'sii';		$pasmail_4 = 70+4;
$pasmail_5 = '.GOo!';		$usmail = 'alfredruizsmtp';
$dommail = 'gmail.com';

$mail_config = array(
	'smtpDebug' => 0,                     
	'smtpAuth' => true,                  
	'smtpSecure' => 'ssl',                 
	'host' => 'smtp.gmail.com',      
	'port' => 465,    
	'username' => $usmail . '@' . $dommail,  
	'password' => $pasmail_1 . (string)$pasmail_2 . $pasmail_3 . (string)$pasmail_4 . $pasmail_5,
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