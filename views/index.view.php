<!DOCTYPE html>

<!-- <head> -->
<?php require 'head.view.php'; ?>
<title><?php echo $usuario['razonsocial']; ?></title>
<link rel="shortcut icon" href="<?php echo RUTA . '/img/' .$cabecera['imagen']; ?>" />
<!-- </head> -->

<style>
     .fondoS {
    background-image: url("<?php echo RUTA . '/img/' .$cabecera['imagen_fondo']; ?>") !important;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
</style>

<body id="page-top" class="index">

    <?php require 'menu_superior.view.php'; ?>

    <!-- 
    ***************** 
    CABECERA 
    ******************
    -->    

    <header class="fondoS" id="page-top">
            <div class="transparente"></div>
        <div class="container logo">
            <div class="row" >
                <div class="col-lg-12" >
                    <img class="img-responsive logoweb" src="<?php echo RUTA . '/img/' .$cabecera['imagen']; ?>" alt="">
                    <div class="intro-text">
                    <h4 class="subtitulotradcbm"><?php echo $cabecera['titulo1']; ?></h4>
                        <span class="name"><?php echo $cabecera['titulo2']; ?></span>
                        <hr class="hrheader">
                        <span class="skills"><?php echo $cabecera['titulo3']; ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- 
    *********************** 
    ARTICULOS y APARTADOS 
    ***********************
    -->
<?php if (!empty($articulos)): ?>
    
    <?php foreach ($articulos as $articulo): ?>
        <?php if ($articulo['orden'] % 2 == 0): ?>
            <section id="<?php echo substr($articulo['titulo'],0,6) ?>" class="fondoazul">
        <?php else: ?>  
            <section id="<?php echo substr($articulo['titulo'],0,6) ?>">
        <?php endif ?>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="<?php echo RUTA . '/img/' . $articulo['imagen']; ?>" alt="<?php echo $articulo['imagen'] ?> " class="imagenApartado">
                     <h2><?php echo $articulo['titulo']; ?></h2>
                    <hr class="hrnegra">
                </div>
            </div>
            <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <p><?php echo $articulo['texto']; ?></p>
            </div>
        </div>
        </section>

    <?php endforeach ?>
    
    <?php endif ?>








    <!-- 
    ********************** 
    FORMULARIO DE CONTACTO 
    **********************
    -->

    <!--<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contacto</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">-->
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <!--<form name="sentMessage" id="contactForm" action="mailto:alfredruiz@gmail.com" method="post" enctype="text/plain" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mombre</label>
                                <input type="text" class="form-control" placeholder="Nombre" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Correo Electrónico</label>
                                <input type="email" class="form-control" placeholder="Correo electrónico" id="email" required data-validation-required-message="Escriba su correo electrónico.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Teléfono</label>
                                <input type="tel" class="form-control" placeholder="Teléfono" id="phone" required data-validation-required-message="Escriba su número de teléfono.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensaje</label>
                                <textarea rows="5" class="form-control" placeholder="Mensaje" id="message" required data-validation-required-message="Escriba un mensaje."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <form name="sentMessage" id="contactForm" action="mailto:alfredruiz@gmail.com" method="post" enctype="text/plain" novalidate>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                            </div>
                        </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </section>-->

        <!-- 
    ********************** 
    SECCIÓN CONTACTO 
    **********************
    -->

        <section class="fondogris" id="contacto">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-12 text-center">
                    <img src="img/sobre.png" alt="hello picture" class="imagenPie">
                    <h3>Contacto</h3>
                    <h4><?php echo $usuario['nombre']; ?></h4>

                    <?php if (!empty($usuario['email'])): ?>
                        <p><?php echo $usuario['email']; ?></p>
                    <?php endif ?>

                    <?php if (!empty($usuario['direccion'])): ?>
                        <p><?php echo $usuario['direccion']; ?></p>
                    <?php endif ?>
                    
                    <?php if (!empty($usuarios['direccion'])): ?>
                        <p>
                            <?php 
                                if (!empty($usuario['codigopostal'])) echo $usuario['codigopostal'] . ' ';
                                if (!empty($usuario['ciudad'])) echo $usuario['ciudad'] . '. ';
                                if (!empty($usuario['ccaa'])) echo $usuario['ccaa'] . '. ';
                                if (!empty($usuario['pais'])) echo $usuario['pais'] . '. ';

                            ?>

                        </p>
                    <?php endif ?>

                    <?php if (!empty($usuarios['telefono1'])): ?>
                        <p>Tel: <?php echo $usuarios['telefono1']; ?></p>
                    <?php endif ?>

                </div>
                
                <!-- REDES SOCIALES -->

                <!-- <div class="col-lg-12 text-center">
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>

    </section>

    <?php require 'pie.php'; ?>


    <!-- ********************************************************************************************** -->


    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
        
</body>

</html>
