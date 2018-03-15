
<!DOCTYPE html>
<!-- <html lang="es-es"> -->

<!-- <head> -->

<?php require RUTA . '/views/head.view.php'; ?>

<!-- </head> -->

<body id="page-top" class="index">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
<a class="navbar-brand" href="<?php echo RUTA; ?>"><i class="fas fa-window-close"></i> Volver</a>            <div class="navbar-header page-scroll">
            </div>
        </div>
    </nav>

        <!-- 
    *********************** 
    GALERIA
    ***********************
    -->



<section class="sectionlistado">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 text-center">
        <img src="<?php echo RUTA . '/img/' . 'www.png'; ?>" class="imagenApartado">
        <h2>Portafolio</h2>
        <hr class="hrazul">
      </div>
    </div>

    <div class="row">
      <?php foreach ($imagenes as $imagen): ?>
      <?php if ($imagen['orden'] <= 6): ?>

      <div class=" col-md-4">
        <div class="contenedorImagen">
          <a href="#arsmediatio" class="portfolio-link" data-toggle="modal">
          <img  class="imagenGaleria centrar" src="<?php echo RUTA . '/galeria/portfolio/' . $imagen['imagen']; ?>" width=50% alt="Los Angeles"></a>
          <div class="middle">
            <div class="texto"><?php echo $imagen['titulo'] ?></div>
          </div>
        </div>
      </div>

      <?php endif ?>
      <?php endforeach ?>

      <p>Ver más... </p>
                  
    </div>
  </div>
</section>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->




   


<!-- VENTANAS EMERGENTES -->

 <!-- 
    ********************************** 
    VENTANAS EMERGENTES DEL PORTAFOLIO 
    **********************************
    -->
    
    <!-- ARSMEDIATIO -->
    <div class="portfolio-modal modal fade" id="arsmediatio" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="cerrar-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>ArsMediatio, gestión del conflicto, mediación y comunicación</h2>
                            <hr class="star-primary">
                            <img src="galeria/portfolio/arsmediatio.png" class="img-responsive img-centered" alt="">
                            <p>Diseño de página web y boletín informativo. Diseño de logotipo y trípticos informaivos. Community manager.</p>
                            <ul class="list-inline item-details">
                                <li>Enlace:
                                    <strong><a href="http://arsmediatio.innovars.es" target="_blank">arsmediatio.innovars.es</a>
                                    </strong>
                                </li>
                                <li>Cliente:
                                    <strong><a href="http://arsmediatio.innovars.es" target="_blank">ArsMediatio</a>
                                    </strong>
                                </li>
                                <li>Fecha:
                                    <strong>Septiembre 2011
                                    </strong>
                                </li>
                                <li>Producto:
                                    <strong>Diseño web y Community Manager
                                    </strong>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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