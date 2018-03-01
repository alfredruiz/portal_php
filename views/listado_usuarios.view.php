<!DOCTYPE html>
<!-- <html lang="es-es"> -->

<!-- <head> -->
<?php require 'head.view.php'; ?>
<!-- </head> -->

<body id="page-top" class="index">

 <?php require 'menu_superior_admin.view.php'; ?>
<div class="separadorcabecera"></div>
<div class="container">
    <div class="col-lg-12 text-center">
            <h2>Lista de usuarios</h2>
            <hr>
        </div>
    <a href="../admin/registrar.php" class="btn btn-primary text-right">Registrar usuario/a</a>
</div>
<br>



<!-- 
    *********************** 
    ARTICULOS y APARTADOS 
    ***********************
    -->
    <?php foreach ($lista_usuarios as $usuario): ?>

    <section class="sectionlistado">
        <div class="container">
            <div class="row">
                <div class="listado col-xs-12">

                    <div class=" titulo col-xs-12 col-lg-1">
                        <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>"><i class="far fa-edit "></i></a>&nbsp;
                        <a href="borrar.php?id=<?php echo $usuario['id']; ?>&sec=us"><i class="far fa-trash-alt ">&nbsp;</i></a>
                    </div>

                    <div class="titulo col-xs-12 col-lg-11">
                       <?php echo $usuario['usuario']; ?>

                    </div>



                    <div class="contenido">
<!--                         <div class="col-lg-1 col-xs-12">
                            <img src="<?php //echo RUTA . '/img/' .$articulo['imagen']; ?>" alt="hello picture" class="logolistado">
                            <br>
                        </div> -->
                        <div class="col-lg-11 col-xs-12">
                            <p class="texto"><?php echo $usuario['nombre']; ?> - <?php echo $usuario['email']; ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php endforeach ?>

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