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
<?php require '../views/head.view.php'; ?>
<!-- </head> -->

<body id="page-top" class="index">

 <?php require '../views/menu_superior_admin.view.php'; ?>

<div class="separadorcabecera"></div>

<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">

                        <h2>Editar imagen</h2>

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
                                        <img class="img-responsive imgGaleria" src="<?php echo RUTA . '/galeria/portfolio/' . $post['imagen']; ?>" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                               <div class=" col-md-6 col-sm-12" >
                                    <div class="divinput">
                                         <label class="formlabel">Cambiar imagen</label>
                                        <input type="file" class="form-control" name="imagen">
                                    </div>
                                </div>
                            <!-- </div> -->
                            
                            <!-- <div class="row"> -->
                                <div class=" col-md-6 col-sm-12">
                                    <div class="divinput">
                                        <label class="formlabel">Idioma</label>
                                        <select name="idiomas" class="form-control listadesplegable">
                                            <!-- <option value="">Idioma...</option> -->
                                            <?php foreach ($idiomas_config as $key => $value): ?>
                                                <option <?php if($post['idioma'] == $key) echo "selected= 'selected';" ?> value="<?php echo $key; ?> "><?php  echo $value; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>




                            <!-- <div class="row">
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
                            </div> -->

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
                                        <label class="formlabel">Subtítulo</label>
                                        <input type="text" class="form-control inputtexto" id="subtitulo" name="subtitulo" value="<?php echo $post['subtitulo']; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Descripción de la imagen</label>
                                        <textarea  type="text" class="form-control inputtexto" id="texto" name="texto"><?php echo $post['descripcion']; ?></textarea>
                                        <script>
                                            CKEDITOR.replace('texto', {
                                                customConfig: '../js/config.js'
                                                });

                                        </script>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Enlace</label>
                                        <input type="text" class="form-control inputtexto" id="enlace" name="enlace" value="<?php echo $post['enlace']; ?>">
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class=" col-xs-12">
                                    <div class="divinput">
                                        <label class="formlabel">Texto del enlace</label>
                                        <input type="text" class="form-control inputtexto" id="titulo_enlace" name="titulo_enlace" value="<?php echo $post['titulo_enlace']; ?>">
                                    </div>
                                </div>
                            </div>



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
 <?php require '../views/pie.php'; ?>        
</body>

</html>