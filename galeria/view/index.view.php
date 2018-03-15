<!-- 
    *********************** 
    GALERIA
    ***********************
    -->
<?php require 'idiomas/'.$idioma.'.php';?>

<section id="galeria" class="fondoazulclaro">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 text-center">
        <img src="<?php echo RUTA . '/img/' . 'bombilla.png'; ?>" class="imagenApartado">
        <h2><?php echo $textos['galeria_titulo']; ?></h2>
        <hr class="hrazul">
      </div>
    </div>
      
    <?php if (!isset($_GET['total'])): ?>

    <div class="row">
      <?php foreach ($imagenes as $imagen): ?>
        <?php if ($imagen['orden'] <= $totalImagenesMostradas): ?>

          <div class=" col-md-4">
            <div class="contenedorImagen">
              <a href="#<?php echo limpiarDatosImagen($imagen['titulo']); ?>" class="portfolio-link" data-toggle="modal">
              <img  class="imagenGaleria centrar" src="<?php echo RUTA . '/galeria/portfolio/' . $imagen['imagen']; ?>" width=50% alt="Los Angeles"></a>
              <div class="middle">
                
                <div class="divTextoGaleria">
              <p class="textoGaleria text-center" ><a href="<?php echo RUTA . '/index.php#'.limpiarDatosImagen($imagen['titulo']); ?>"  data-toggle="modal"><?php echo $imagen['titulo'] ?></a></p>
                </div>
              </div>
            </div>
          </div>

          <?php endif ?>
      <?php endforeach ?>

      <div class="row">
        <div class="col-xs-12">
          <div class="divbutton text-center">
            <br>
            <?php if ($idioma == $idioma_principal): ?>
              <a class="btn btn-primary centrar" href='index.php?total=true/#galeria'><?php echo $textos['galeria_ver_todas']; ?></a>
              <?php else: ?>
              <a class="btn btn-primary centrar" href='index.php?lan=<?php echo $idioma; ?>&total=true/#galeria'><?php echo $textos['galeria_ver_todas']; ?></a>
            <?php endif ?>
           <br>
          </div>
        </div>
      </div>

      <?php elseif (isset($_GET['total'])): ?>
        
        <?php foreach ($imagenes as $imagen): ?>
        <div class="row">
          <div class=" col-md-4">
            <div class="contenedorImagen">
              <a href="<?php echo RUTA . '/index.php#'.limpiarDatosImagen($imagen['titulo']); ?>" class="portfolio-link" data-toggle="modal">
              <img  class="imagenGaleria centrar" src="<?php echo RUTA . '/galeria/portfolio/' . $imagen['imagen']; ?>" width=50% alt="Los Angeles"></a>
            <div class="middle">
            <div class="divTextoGaleria">
              <p class="textoGaleria text-center" ><a href="<?php echo RUTA . '/index.php#'.limpiarDatosImagen($imagen['titulo']); ?>"  data-toggle="modal"><?php echo $imagen['titulo'] ?></a></p>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach ?>

      <div class="row">
        <div class="col-xs-12">
          <div class="divbutton">
            <br>
           <!-- <a class="btn btn-primary centrar" href='index.php/#galeria'><?php echo $textos['galeria_ver_menos']; ?></a> -->
           <?php if ($idioma == $idioma_principal): ?>
              <a class="btn btn-primary centrar" href='index.php/#galeria'><?php echo $textos['galeria_ver_menos']; ?></a>
              <?php else: ?>
              <a class="btn btn-primary centrar" href='index.php?lan=<?php echo $idioma; ?>#galeria'><?php echo $textos['galeria_ver_menos']; ?></a>
            <?php endif ?>
           <br>
          </div>
        </div>
      </div>
      <?php endif ?>
      

    </div>
  </div>
</section>

 <!-- 
    ********************************** 
    VENTANAS EMERGENTES DEL PORTAFOLIO 
    **********************************
    -->
    
    <!-- ARSMEDIATIO -->
    <?php foreach ($imagenes as $imagen): ?>
      
    
    <div class="portfolio-modal modal fade" id="<?php echo limpiarDatosImagen($imagen['titulo']); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2><?php echo $imagen['titulo'] ?></h2>
                            <h3><?php echo $imagen['subtitulo'] ?></h3>
                            <hr class="star-primary">
                            <img src="<?php echo RUTA . '/galeria/portfolio/' . $imagen['imagen']; ?>" class="img-responsive img-centered" alt="">
                            <p><?php echo $imagen['descripcion'] ?></p>
                            <ul class="list-inline item-details">
                                <li>Enlace:
                                    <strong><a href="<?php echo $imagen['enlace'] ?> " target="_blank"><?php echo $imagen['titulo_enlace'] ?></a>
                                    </strong>
                                </li>
                                <!-- <li>Cliente:
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
                                </li> -->
                            </ul>
                            <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>