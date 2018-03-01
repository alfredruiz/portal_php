<!DOCTYPE html>
<!-- <html lang="es-es"> -->

<!-- <script>
    CKEDITOR.editorConfig = function( config ) {
    config.toolbar = [
        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
        { name: 'editing', items: [ 'Scayt' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
        { name: 'tools', items: [ 'Maximize' ] },
        { name: 'document', items: [ 'Source' ] },
        '/',
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
        { name: 'styles', items: [ 'Styles', 'Format' ] },
        { name: 'about', items: [ 'About' ] }
    ];
};
</script> -->

<!-- <head> -->
<?php require 'head.view.php'; ?>
<!-- </head> -->

<body id="page-top" class="index">

 <?php require 'menu_superior_admin.view.php'; ?>

<div class="separadorcabecera"></div>

<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">

                    <?php if ($_GET['sec'] == 'art'): ?>
                        <h2>Editar apartado</h2>
                    <?php elseif ($_GET['sec'] == 'cab'): ?>
                            <h2>Editar cabecera</h2>                        
                    <?php endif ?>

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
                            
                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <select name="idiomas" 
                                        class="form-control listadesplegable" value="<?php echo $post['idioma']; ?>">
                                        <option value="">Idioma...</option>
                                            <option <?php if($post['idioma'] == 'es') echo "selected= 'selected';" ?> value="es" >Español</option>
                                            <option <?php if($post['idioma'] == 'en') echo "selected= 'selected';" ?> value="en">English</option>
                                            <option <?php if($post['idioma'] == 'fr') echo "selected= 'selected';" ?> value="fr">Francais</option>
                                            <option <?php if($post['idioma'] == 'ca') echo "selected= 'selected';" ?> value="ca">Català</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        <?php if ($_GET['sec'] == 'art'): ?>

                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Título</label>
                                        <input type="text" class="form-control inputtexto" id="titulo" name="titulo" value="<?php echo $post['titulo']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Texto del apartado</label>
                                        <textarea  type="text" class="form-control inputtexto" id="texto" name="texto"><?php echo $post['texto']; ?></textarea>
                                        <script>
                                            CKEDITOR.replace('texto', {
                                                customConfig: '../js/config.js'
                                                });

                                        </script>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-2">
                                    <div class="divinput">
                                        <img class="img-responsive logolistado" src="<?php echo RUTA . '/img/' .$post['imagen']; ?>" alt="">
                                    </div>
                                </div>
                                <div class=" col-xs-10">
                                    <div class="archivoImagen">
                                        <label class="formlabel">Cambiar imagen</label>
                                        <input type="file" class="form-control" name="imagen">
                                    </div>
                                </div>
                            </div>
                        
                        <?php elseif ($_GET['sec'] == 'cab'): ?>
                        
                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Título 1</label>
                                        <input type="text" class="form-control inputtexto" id="titulo1" name="titulo1" value="<?php echo $post['titulo1']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Título 2</label>
                                        <input type="text" class="form-control inputtexto" id="titulo2" name="titulo2" value="<?php echo $post['titulo2']; ?>">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Título 3</label>
                                        <input type="text" class="form-control inputtexto" id="titulo3" name="titulo3" value="<?php echo $post['titulo3']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-2">
                                    <div class="divinput">
                                        <img class="img-responsive logolistado" src="<?php echo RUTA . '/img/' .$post['imagen']; ?>" alt="">

                                    </div>
                                </div>
                                <div class=" col-xs-10">
                                    <div class="archivoImagen">
                                        <label class="formlabel">Cambiar logotipo</label>
                                        <input type="file" class="form-control inputtexto" name="imagen">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-2">
                                    <div class="divinput">
                                        <img class="img-responsive logolistado" src="<?php echo RUTA . '/img/' .$post['imagen_fondo']; ?>" alt="">

                                    </div>
                                </div>
                                <div class=" col-xs-10">
                                    <div class="archivoImagen">
                                        <label class="formlabel">Cambiar fondo</label>
                                        <input type="file" class="form-control inputtexto" name="imagen_fondo">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="imagen_fondo_subida" value="<?php echo $post['imagen_fondo']; ?>">    
                        
                        <?php endif ?>


                        <br>
                        <div class="row">
                                <div class="col-xs-12">
                                    <div class="divbutton">
                        <button type="submit" class="btn btn-success btn-lg">Cambiar</button>
                                    </div>
                                </div>
                          </div>
                        
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