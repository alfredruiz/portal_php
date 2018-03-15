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

    <?php require 'menu_superior.view.php'; require 'idiomas/'.$idioma.'.php'; ?>



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
            <div class="col-lg-8 col-lg-offset-2">
                <p><?php echo $articulo['texto']; ?></p>
            </div>
        </div>
        </section>

    <?php endforeach ?>
    
    <?php endif ?>



    <!-- 
    *********************** 
    GALERIA
    ***********************
    -->

    <?php 
    if ($complement_confing['galeria'] == true) {
    require 'galeria/view/index.view.php'; 
        }
    ?>


    <!-- 
    *********************** 
    CV
    ***********************
    -->

    <?php 
    if ($complement_confing['cv'] == true) {
    require 'cv.view.php'; 
        }
    ?>

    <!-- <section class="fondoazul""  >
        <div class="container" id="cv">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Curriculum</h2>
                    <hr class="hrazul">
                </div>
            <div class="col-lg-12 text-center">
                <a href="http://www.innovars.es/cv" class="btn btn-lg btn-outline" target="blank">
                    <i ></i> <?php echo $textos['curriculum_online'] ?>
                </a>
                <a href="http://www.innovars.es/cv/docs/cv16esq.pdf" class="btn btn-lg btn-outline" target="blank">
                    <i ></i> <?php echo $textos['curriculum_esquema'] ?>
                </a>
            </div>
        </div>
    </section> -->



        <!-- 
    ********************** 
    SECCIÓN CONTACTO 
    **********************
    -->
    
            <section class="fondogris" id="contacto">
        <div class="container ">

                        <div class="row">
                <div class="col-lg-12 text-center">
                <img src="img/sobre.png" alt="hello picture" class="imagenPie">
                <h2><?php echo $textos['contactoTitulo']; ?></h2>
                <hr class="hrnegra">
            </div>
        
        <!-- FORMULARIO DE CONTACTO -->

    <?php 
    if ($complement_confing['correo'] == true) {
    require 'contact_form.view.php'; 
        }
    ?>


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

                <div class="col-lg-12 text-center">
                    <ul class="list-inline">
                       
                        <li>
                            <a href="https://www.linkedin.com/in/alfredoruizsanchez/" title="Linkedin" target="blank" class="btn-social btn-outline"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                        <li>
                            <a href="https://github.com/alfredruiz/" target="blank" title="GitHub" class="btn-social btn-outline"><i class="fab fa-github"></i></a>
                        </li>
                         <li>
                            <a href="https://bitbucket.org/alfredruiz/" target="blank" title="Bitbucket" class="btn-social btn-outline"><i class="fab fa-bitbucket"></i></a>
                        </li>
                    </ul>
                </div>
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
