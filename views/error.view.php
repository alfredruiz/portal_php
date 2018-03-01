<!DOCTYPE html>
<html lang="en">

<?php
require 'head.view.php';
 ?>
<style>
     .fondoS {
    background-image: url("<?php echo RUTA . '/img/' .$cabecera['imagen_fondo']; ?>") !important;
    background-repeat: no-repeat;
    background-size: 100% 100%;

}
</style>
<!--*********************************************************************************************************************-->

<body id="page-top" class="index">


    <?php require 'menu_superior_admin.view.php'; ?>

    <!-- 
    ***************** 
    CABECERA 
    ******************
    -->    

    <header class="fondoS" >
            <div class="transparente"></div>
        <div class="container logo">
            <div class="row" >
                <div class="col-lg-12" >
                    <img class="img-responsive logoweb" src="<?php echo RUTA . '/img/' .$cabecera['imagen']; ?>" 
                    <div class="intro-text">
                        <br><br>
                    <h4 class="subtitulotradcbm">Se ha producido un error...</h4>
                        
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php require 'pie.php'; ?>
        
</body>

</html>