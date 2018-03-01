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

                        <h2>Editar cabecera</h2>


                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                        
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="row control-group">
                                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                                <input type="hidden" name="imagen_subida" value="<?php echo $post['imagen']; ?>">
                                <input type="hidden" name="imagen_fondo_subida" value="<?php echo $post['imagen_fondo']; ?>">
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
                                    <p>Título 1...</p>
                                    <input type="text" class="form-control inputtexto" id="titulo1" name="titulo1" value="<?php echo $post['titulo1']; ?>">
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <p>Título 2...</p>
                                    <input type="text" class="form-control inputtexto" id="titulo2" name="titulo2" value="<?php echo $post['titulo2']; ?>">
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <p>Título 3...</p>
                                    <input type="text" class="form-control inputtexto" id="titulo3" name="titulo3" value="<?php echo $post['titulo3']; ?>">
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <div class="col-xs-2">
                                        <img class="img-responsive logolistado col-xs-12" src="<?php echo RUTA . '/img/' .$post['imagen']; ?>" alt="">
                                    </div>
                                    <div class="col-xs-10">
                                  	   <p>Cambiar logo</p>
                                	   <input type="file" class="form-control inputtexto" name="imagen">
                                    </div>
                                </div>
                            </div>

                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <div class="col-xs-2">
                                        <img class="img-responsive logolistado col-xs-12" src="<?php echo RUTA . '/img/' .$post['imagen_fondo']; ?>" alt="">
                                    </div>
                                    <div class="col-xs-10">
                                       <p>Cambiar imagen de fondo</p>
                                       <input type="file" class="form-control inputtexto" name="imagen_fondo">
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