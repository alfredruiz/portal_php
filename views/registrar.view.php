<!-- <!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""> -->

<!DOCTYPE html>
<!-- <html lang="es-es"> -->


<!-- <head> -->

<?php require '../views/head.view.php'; ?>

<!-- </head> -->

<body id="page-top" class="index">

        <?php require 'menu_superior_admin.view.php'; ?>
 
    <!-- 
    ********************** 
    AÑADIR USUARIO 
    **********************
    -->

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Registro de usuarios</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="post" 
                        name="login">
                                
                        <div class="row">
                            <div class=" col-xs-5">
                                <div class="divinput">
                                <label class="formlabel">Nombre de usuario/a</label>
                                <input type="text" class="form-control inputtexto" placeholder="Campo obligatorio" id="usuario" name="usuario">
                                </div>
                            </div>
                             <div class=" col-xs-7">
                                <div class="divinput">
                                <label class="formlabel">Correo electrónico</label>
                                <input type="text" class="form-control inputtexto" placeholder="Campo obligatorio" id="email" name="email">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" col-xs-6">
                                <div class="divinput">
                                <label class="formlabel">Contraseña</label>
                                <input type="password" class="form-control inputtexto" id="password" name="password" placeholder="Campo obligatorio">
                                </div>
                            </div>
                             <div class=" col-xs-6">
                                <div class="divinput">
                                <label class="formlabel">Repetir contraseña</label>
                                <input type="password" class="form-control inputtexto" id="password2" name="password2" placeholder="Campo obligatorio">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                             <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="formlabel">Razón social</label>
                                <input type="text" class="form-control inputtexto" id="nombre" name="nombre" placeholder="Campo obligatorio">
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($errores)): ?>
                            
                            <div class="text-danger ">
                                <span><?php echo $errores; ?></span>
                                <br>
                                <br>
                            
                            </div>
                        <?php endif ?>



                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divTituloContacto">
                                <h4>Campos de contacto</h4>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="formlabel">Nombre y apellidos</label>
                                <input type="text" class="form-control inputtexto" id="nombre" name="nombre">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                             <div class=" col-xs-9">
                                <div class="divinput">
                                <label class="formlabel">Dirección</label>
                                <input type="text" class="form-control inputtexto"  id="direccion" name="direccion">
                                </div>
                            </div>
                            <div class=" col-xs-3">
                                <div class="divinput">
                                <label class="formlabel">C.P.</label>
                                <input type="text" class="form-control inputtexto"  id="cp" name="cp">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                             <div class=" col-xs-6">
                                <div class="divinput">
                                <label class="formlabel">Ciudad</label>
                                <input type="text" class="form-control inputtexto"  id="ciudad" name="ciudad">
                                </div>
                            </div>
                            <div class=" col-xs-6">
                                <div class="divinput">
                                <label class="formlabel">Provincia</label>
                                <input type="text" class="form-control inputtexto"  id="provincia" name="provincia">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class=" col-xs-6">
                                <div class="divinput">
                                <label class="formlabel">Comunidad autónoma</label>
                                <input type="text" class="form-control inputtexto"  id="ccaa" name="ccaa">
                                </div>
                            </div>
                            <div class=" col-xs-6">
                                <div class="divinput">
                                <label class="formlabel">País</label>
                                <input type="text" class="form-control inputtexto"  id="pais" name="pais" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                             <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="formlabel">Teléfono</label>
                                <input type="text" class="form-control inputtexto" id="telefono1" name="telefono1">
                                </div>
                            </div>
                        </div>
<!-- 
                        <?php if (!empty($errores)): ?>
                            <div class="text-danger">
                                <span><?php echo $errores; ?></span>
                                <br>
                                <br>
                            </div>
                        <?php endif ?> -->
                        
                        <div class="row">
                                <div class="col-xs-12">
                                    <div class="divbutton">
                          <button type="submit" class="btn btn-success btn-lg" onclick="login.submit()">Registrar</button>
                                    </div>
                                </div>
                          </div>

                    
                    </form>
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
