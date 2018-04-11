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
            <section id="<?php echo str_replace(' ', '',$articulo['titulo']) ?>" class="fondoazul">
        <?php else: ?>  
            <section id="<?php echo str_replace(' ', '',$articulo['titulo']) ?>">
        <?php endif ?>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="<?php echo RUTA . '/img/' . $articulo['imagen']; ?>" alt="<?php echo $articulo['imagen'] ?> " class="imagenApartado">
                     <h2><?php echo $articulo['titulo']; ?></h2>
                    <hr class="hrazul">
                </div>
            </div>
            <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-justify">
                <p><?php echo $articulo['texto']; ?></p>
            </div>
        </div>
        </section>

    <?php endforeach ?>
    
    <?php endif ?>


        <!-- 
    ********************** 
    SECCIÓN CONTACTO 
    **********************
    -->
    

        <section class="fondogris" id="contacto">
        <div class="container ">

            <!-- FORMULARIO -->
            <?php
                if ($idioma == 'en') {
                    require 'idiomas/en.php';
                } elseif ($idioma == 'es') {
                    require 'idiomas/es.php';
                } elseif ($idioma == 'fr') {
                    require 'idiomas/fr.php';
                }
            ?>

            <div class="row">
                <div class="col-lg-12 text-center">
                <img src="img/sobre.png" alt="hello picture" class="imagenPie">
                <h2><?php //echo $textos['contactoTitulo']; ?></h2>
                <!-- <hr class="hrnegra"> -->
            </div>
            
                <!-- <form name="frmContacto" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <div class="col-xs-12">
                        <div class="texstoContacto">
                            <label class="contactLabel" ><?php echo $textos['contactoTexto']; ?> </label>
                        
                        </div>
                    </div>
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['contactoNombre']; ?></label>
                                <input type="text" class="form-control contactInput" id="nombre" name="nombre">
                                </div>
                            </div>
                             <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['contactoEmail']; ?></label>
                                <input type="text" class="form-control contactInput" id="email" name="email" >
                                </div>
                            </div>
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['contactoTelefono']; ?></label>
                                <input type="text" class="form-control contactInput" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['cotactoMensaje']; ?></label>
                                <textarea type="text" class="form-control contactInput" id="mensaje" name="mensaje"></textarea>
                                </div>
                            </div>

                       <div class="row">
                                <div class="col-xs-12">
                                    <div class="divbutton">
                                         <button name="btn_send" type="submit" class="btn btn-success btn-lg" onclick=""><?php echo $textos['contactoEnviar']; ?></button>
                                    </div>
                                </div>
                          </div>
                        <br>
                       
                    </form>
                     <?php
                      if(isset($msg))
                      {
                       echo $msg;
                       
                       echo "<script type='text/javascript'>swal('Mensaje enviado');</script>";
                      }
                      ?>
            </div> -->

            <!-- DATOS DE CONTACTO -->
            <div class="row ">
                <div class="col-lg-12 text-center">
                    <!-- <img src="img/sobre.png" alt="hello picture" class="imagenPie"> -->
                    <!-- <h3>Contacto</h3> -->
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

                    <?php if (!empty($usuario['telefono1'])): ?>
                        <p><?php echo $usuario['telefono1']; ?></p>
                    <?php endif ?>

                    <?php if (!empty($usuario['telefono2'])): ?>
                        <p><?php echo $usuario['telefono2']; ?></p>
                    <?php endif ?>

                    <?php if (!isset($usuario['fax'])): ?>
                        <p>fax: <?php echo $usuario['fax']; ?></p>
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
