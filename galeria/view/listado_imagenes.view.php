<!DOCTYPE html>
<!-- <html lang="es-es"> -->

<!-- <head> -->
<?php require '../views/head.view.php'; ?>
<!-- </head> -->

<body id="page-top" class="index">

 <?php require '../views/menu_superior_admin.view.php'; ?>

  

<div class="separadorcabecera"></div>

    <div class="container">

     <div class="row">
        <div class="col-lg-12 text-center">
            <h2>Lista de imágenes</h2>
            <hr>
        </div>
        <a href="../galeria/nueva_imagen.php" class="btn btn-primary text-right"><i class="fas fa-plus"></i> Nueva imagen</a>&nbsp;
            <?php foreach ($idiomas_config as $key => $value): ?>
                <?php if ($key ==  'es'): ?>
                    <a href="../galeria/listado_imagenes.php" class="btn btn-success text-right">español</a>
                <?php else: ?>  
                    <a href="../galeria/listado_imagenes.php?lan=<?php echo $key; ?>" class="btn btn-success text-right"><?php  echo $value; ?></a>
                <?php endif ?>
            <?php endforeach ?>
 <!--        <a href="../admin/listado.php?lan=fr" class="btn btn-success text-right">En francais</a>
        <a href="../admin/listado.php?lan=ca" class="btn btn-success text-right">En català</a> -->
        </div>
    </div>
    <br>


   


    <!-- 
    *********************** 
    LISTA DE IMAGENES
    ***********************
    -->
    <?php if (!empty($imagenes)): ?>
        
    
    <?php foreach ($imagenes as $imagen): ?>

    <section class="sectionlistado">
        <div class="container">
            <div class="row">
                <div class="listado col-xs-12">

                    <div class=" titulo col-xs-12 col-lg-1">
                        <a href="editar_imagen.php?id=<?php echo $imagen['id']; ?>&sec=img"><i class="far fa-edit "></i></a>&nbsp;
                        <a href="borrar_imagen.php?id=<?php echo $imagen['id']; ?>&sec=img&lan=<?php echo $imagen['idioma'] ?>"><i class="far fa-trash-alt ">&nbsp;</i></a>
                    </div>

                    <div class="titulo col-xs-11 col-lg-10">
                       [<?php echo $imagen['orden']  ?>] <?php echo $imagen['titulo']; ?>  - <?php echo $imagen['subtitulo']; ?> 
                       

                    </div>
                    <div class="text-right col-xs-1 col-lg-1">

                        <?php if ($imagen['orden'] > 1): ?>
                        <a href="listado_imagenes.php?ord=<?php echo $imagen['orden']; ?>&nord=<?php echo (int)$imagen['orden']-1; ?>"><i class="fas fa-caret-up fa-2x ">&nbsp;</i></a>
                        <?php endif ?>

                        <?php if ($imagen['orden'] < $totalImagenes): ?>
                        <a href="listado_imagenes.php?ord=<?php echo $imagen['orden']; ?>&nord=<?php echo (int)$imagen['orden']+1; ?>"><i class="fas fa-caret-down fa-2x ">&nbsp;</i></a>
                        <?php endif ?>

                    </div>


                    <div class="contenido">
                        <div class="col-lg-1 col-xs-12">
                            <img src="<?php echo RUTA . '/galeria/portfolio/' . $imagen['imagen']; ?>" alt="imagen" class="logolistado">
                            <br>
                        </div>
                        <div class="col-lg-11 col-xs-12">
                            <p class="texto">Ubicación: <?php echo $imagen['imagen']; ?></p>
                            <p class="texto">Enlace: <?php echo $imagen['enlace']; ?></p>
                            <p class="texto">Texto del enlace: <?php echo $imagen['titulo_enlace']; ?></p>
                            <p class="texto">Descripción: <?php echo $imagen['descripcion']; ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php endforeach ?>
    <?php endif ?>

    <?php require '../views/pie.php'; ?>


    <!-- ********************************************************************************************** -->


    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
        
</body>

</html>
