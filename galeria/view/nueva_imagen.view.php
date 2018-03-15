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
                    <h2>Nuevo apartado</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                    <select name="idiomas" class="form-control listadesplegable">
                                        <option value="">Idioma...</option>
                                        <?php foreach ($idiomas_config as $key => $value): ?>
                                            <option value="<?php echo $key; ?> "><?php  echo $value; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                    <label class="formlabel">Título de la imagen</label>
                                    <input type="text" class="form-control inputtexto" id="titulo" name="titulo">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                    <label class="formlabel">Subtítulo de la imagen</label>
                                    <input type="text" class="form-control inputtexto" id="subtitulo" name="subtitulo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                    <label class="formlabel">Enlace de la imagen</label>
                                    <input type="text" class="form-control inputtexto" id="enlace" name="enlace">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                    <label class="formlabel">Título del enlace</label>
                                    <input type="text" class="form-control inputtexto" id="titulo_enlace" name="titulo_enlace">
                                </div>
                            </div>
                        </div>
 						
                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                    <label class="formlabel">Descripción de la imagen</label>
                                    <textarea  type="text" class="form-control inputtexto" id="texto" name="texto"></textarea>
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
                                    <label class="formlabel">Selecciona una imagen</label>
                                    <input type="file" class="form-control inputtexto" name="thumb">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-xs-12">
                                    <div class="divbutton">
                                        <button type="submit" class="btn btn-success btn-lg">Añadir</button>

                                    </div>
                                </div>
                          </div>
                          <br>
                    </form>
                </div>
            </div>
        </div>


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