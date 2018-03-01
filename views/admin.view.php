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

<?php require 'head.view.php'; ?>

<!-- </head> -->

<body id="page-top" class="index">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
<a class="navbar-brand" href="<?php echo RUTA; ?>"><i class="fas fa-window-close"></i> Volver</a>            <div class="navbar-header page-scroll">
            </div>
        </div>
    </nav>

        <?php //require 'menu_superior_admin.view.php'; ?>



    


    <!-- 
    ********************** 
    FORMULARIO DE LOGIN 
    **********************
    -->

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Acceso a administración</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);  ?>" method="post" 
                        name="login">

                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="formlabel">Usuario</label>
                                <input type="text" class="form-control inputtexto" id="name" name="usuario">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="formlabel">Contraseña</label>
                                <input type="password" class="form-control inputtexto" id="password" name="password">
                                </div>
                            </div>
                        </div>
                        

                        
                        <br>

                        <?php if (!empty($errores)): ?>
                            <div class="text-danger">
                                <span><?php echo $errores; ?></span>
                                <br>
                                <br>
                            </div>
                        <?php endif ?>

                        <!-- <div class="row"> -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="divbutton">
                          <button type="submit" class="btn btn-success btn-lg" onclick="login.submit()">Entrar</button>
                          </div>
                          </div>
                          </div>
                        <!-- </div> -->
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
