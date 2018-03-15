
<!--         <section class="fondogris" id="contacto">
        <div class="container "> -->

            <!-- FORMULARIO -->
            <?php require 'idiomas/'.$idioma.'.php';?>

<!--             <div class="row">
                <div class="col-lg-12 text-center">
                <img src="img/sobre.png" alt="hello picture" class="imagenPie">
                <h2><?php echo $textos['contactoTitulo']; ?></h2>
                <hr class="hrnegra">
            </div> -->
            
                <form name="frmContacto" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                    <div class="col-xs-12">
                        <div class="texstoContacto">
                            <label class="contactLabel" ><?php echo $textos['contactoTexto']; ?> </label>
                        
                        </div>
                    </div>
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['contactoNombre']; ?></label>
                                <input type="text" class="form-control contactInput" id="nombre" name="nombre">
                                </div>
                            </div>
                             <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['contactoEmail']; ?></label>
                                <input type="text" class="form-control contactInput" id="email" name="email" >
                                </div>
                            </div>
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['contactoTelefono']; ?></label>
                                <input type="text" class="form-control contactInput" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class=" col-xs-12">
                                <div class="divinput">
                                <label class="contactLabel"><?php echo $textos['cotactoMensaje']; ?></label>
                                <textarea type="text" class="form-control contactInput" id="mensaje" name="mensaje"></textarea>
                                </div>
                            </div>

                       <div class="row">
                                <div class="col-xs-12">
                                    <div class="divbutton">
                                         <button name="btn_send" type="submit" class="btn btn-success btn-lg" onclick=""><?php echo $textos['contactoEnviar']; ?></button>
                                    </div>
                                </div>
                          </div>
                        <br>
                       
                    </form>
                     <?php
                      if(isset($msg))
                      {
                       echo $msg;
                       
                       echo "<script type='text/javascript'>swal('Mensaje enviado');</script>";
                      }
                      ?>
            </div>