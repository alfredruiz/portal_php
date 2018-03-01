<!DOCTYPE html>
<!-- <html lang="es-es"> -->

<!-- <head> -->
<?php require 'head.view.php'; ?>
<!-- </head> -->

<body id="page-top" class="index">

 <?php require 'menu_superior_admin.view.php'; ?>

<!-- 
***************** 
CABECERA 
******************
-->    

<div class="separadorcabecera"></div>

    <div class="container">

     <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Lista de secciones</h2>
            <hr>
        </div>
        <a href="../admin/nuevo.php" class="btn btn-primary text-right"><i class="fas fa-plus"></i> Nueva sección</a>&nbsp;
        <a href="../admin/listado.php" class="btn btn-success text-right">En español</a>
        <a href="../admin/listado.php?lan=en" class="btn btn-success text-right">In English</a>
        <a href="../admin/listado.php?lan=fr" class="btn btn-success text-right">En francais</a>
        <a href="../admin/listado.php?lan=ca" class="btn btn-success text-right">En català</a>
        </div>
    </div>
    <br>


   <section class="sectionlistado">
        <div class="container">
            <div class="row">
                <div class="listado cabecerapie col-xs-12">
                 <div class="col-xs-12">
                        <div class=" titulo col-xs-12 col-lg-1">
                            <a href="editar.php?id=<?php echo $cabecera['id']; ?>&sec=cab"><i class="far fa-edit "></i></a>&nbsp;
                            <!-- <a href="#"><i class="far fa-trash-alt ">&nbsp;</i></a> -->
                        </div>
                        <div class="titulo col-xs-12 col-lg-11">
                            Cabecera
                        </div>

                    </div>
                    <div class="col-xs-12">

                        <div class="col-lg-1 col-xs-12 center">
                            <div>
                                <img class="logocabecera col-xs-5" src="<?php echo RUTA . '/img/' .$cabecera['imagen']; ?>" alt="">
                                <img class="logocabecera col-xs-5" src="<?php echo RUTA . '/img/' .$cabecera['imagen_fondo']; ?>" alt="">&nbsp;
                                </div>
                        </div>

                        <div class="col-lg-11 col-xs-12">
                            <p class="cabeceratitulo1"><?php echo $cabecera['titulo1']; ?></p>
                            <p class="cabeceratitulo2"><?php echo $cabecera['titulo2']; ?></p>
                            <p class="cabeceratitulo3"><?php echo $cabecera['titulo3']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- 
    *********************** 
    ARTICULOS y APARTADOS 
    ***********************
    -->
    <?php if (!empty($articulos)): ?>
        
    
    <?php foreach ($articulos as $articulo): ?>

    <section class="sectionlistado">
        <div class="container">
            <div class="row">
                <div class="listado col-xs-12">

                    <div class=" titulo col-xs-12 col-lg-1">
                        <a href="editar.php?id=<?php echo $articulo['id']; ?>&sec=art"><i class="far fa-edit "></i></a>&nbsp;
                        <a href="borrar.php?id=<?php echo $articulo['id']; ?>&sec=art"><i class="far fa-trash-alt ">&nbsp;</i></a>
                    </div>

                    <div class="titulo col-xs-12 col-lg-11">
                       <?php echo $articulo['titulo']; ?>
                    </div>



                    <div class="contenido">
                        <div class="col-lg-1 col-xs-12">
                            <img src="<?php echo RUTA . '/img/' .$articulo['imagen']; ?>" alt="hello picture" class="logolistado">
                            <br>
                        </div>
                        <div class="col-lg-11 col-xs-12">
                            <p class="texto"><?php echo substr($articulo['texto'], 0, 200) . "..." ; ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php endforeach ?>
    <?php endif ?>

   <!--  ********************** 
    SECCIÓN CONTACTO 
    ********************** -->
    <section class="sectionlistado">
        <div class="container">
            <div class="row">
                <div class="listado cabecerapie col-xs-12">
                    <div class=" titulo col-xs-12 col-lg-1">
                        <a href="editar_usuario.php?id=<?php echo $usuarios['id']; ?>"><i class="far fa-edit textoderecha"></i></a><!-- &nbsp;<a href="#"><i class="far fa-trash-alt textoderecha">&nbsp;</i></a> -->
                    </div>
                    <div class="titulo col-xs-12 col-lg-11">
                       Contacto
                    </div>

                     <div class="contenido">
                        <div class="col-lg-1 col-xs-12">
                            <img src="../img/sobre.png" alt="hello picture" class="logolistado">
                            <br>
                        </div>
                        <div class="col-lg-11 col-xs-12">
                            <div class="col-lg-6">
                                <h4><?php echo $usuarios['nombre']; ?></h4>

                                <?php if (!empty($usuarios['email'])): ?>
                                    <p><?php echo $usuarios['email']; ?></p>
                                <?php endif ?>
                            </div>
                            <div class="col-lg-6">

                                <?php if (!empty($usuarios['direccion'])): ?>
                                    <p><?php echo $usuarios['direccion']; ?></p>
                                <?php endif ?>
                                
                                <?php if (!empty($usuarios['direccion'])): ?>
                                    <p>
                                        <?php 
                                            if (!empty($usuarios['codigopostal'])) 
                                                    echo $usuarios['codigopostal'] . ' ';
                                            if (!empty($usuarios['ciudad'])) echo $usuarios['ciudad'] . '. ';
                                            if (!empty($usuarios['ccaa'])) echo $usuarios['ccaa'] . '. ';
                                            if (!empty($usuarios['pais'])) echo $usuarios['pais'] . '. ';
                                        ?>
                                    </p>
                                <?php endif ?>

                                <?php if (!empty($usuarios['telefono1'])): ?>
                                    <p>Tel: <?php echo $usuarios['telefono1']; ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
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
