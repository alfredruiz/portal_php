<!DOCTYPE html>
<!-- <html lang="es-es"> -->

<!-- <head> -->
<?php require 'head.view.php'; ?>
<!-- </head> -->

<body id="page-top" class="index">

 <?php require 'menu_superior_admin.view.php'; ?>

<div class="separadorcabecera"></div>

<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">

                        <h2>Editar apartado</h2>


                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                        
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="row control-group">
                                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                <input type="hidden" name="imagen_subida" value="<?php echo $post['imagen']; ?>">
                            </div>

                            <div class="row control-group">
                                <select name="idiomas" 
                                    class="form-group col-xs-12 listadesplegable" value="<?php echo $post['idioma']; ?>">
                                    <option value="">Idioma...</option>
                                    <option <?php if($post['idioma'] == 'es') echo "selected= 'selected';" ?> value="es" >Español</option>
                                    <option <?php if($post['idioma'] == 'en') echo "selected= 'selected';" ?> value="en">English</option>
                                    <option <?php if($post['idioma'] == 'fr') echo "selected= 'selected';" ?> value="fr">Francais</option>
                                    <option <?php if($post['idioma'] == 'ca') echo "selected= 'selected';" ?> value="ca">Català</option>
                                </select>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <p>Título...</p>
                                    <input type="text" class="form-control inputtexto" id="titulo" name="titulo" value="<?php echo $post['titulo']; ?>">
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <p>Texto del apartado...</p>
                                    <textarea  type="text" class="form-control inputtexto" id="texto" name="texto"><?php echo $post['texto']; ?></textarea>
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <div class="col-xs-2">
                                        <img class="img-responsive logolistado col-xs-12" src="<?php echo RUTA . '/img/' .$post['imagen']; ?>" alt="">
                                    </div>
                                    <div class="col-xs-10">
                                  	   <p>Cambiar imagen</p>
                                	   <input type="file" class="form-control inputtexto" name="imagen">
                                    </div>
                                </div>
                            </div>
                        
                        <br>
                        <button type="submit" class="btn btn-success btn-lg">Añadir</button>
                    </form>


                </div>
            </div>
        </div>





    <!-- ********************************************************************************************** -->


    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
 <?php require 'pie.php'; ?>        
</body>

</html>