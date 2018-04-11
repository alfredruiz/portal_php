<!-- 
    ******************* 
    BARRA DE NAVEGACIÓN 
    *******************
    -->
    <?php
        if ($idioma == 'en') {
            require 'idiomas/en.php';
        } elseif ($idioma == 'es') {
            require 'idiomas/es.php';
        } elseif ($idioma == 'fr') {
            require 'idiomas/fr.php';
        }
    ?>

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navegación</span> Menú <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo RUTA; ?>"><?php echo $usuario['razonsocial']; ?></a>
            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php if (!empty($articulos)): ?>
                        
                    
                    <?php foreach ($articulos as $articulo): ?>
    
                    <li>
                        <a href="<?php  echo '#' . str_replace(' ', '',$articulo['titulo']) ?>"><?php echo $articulo['titulo']; ?></a>
                    </li>
    
                    <?php endforeach ?>
                    <?php endif ?>

                    <?php if ($complement_confing['cv'] == true): ?>
                        <li><a href="#cv">CV</a></li>
                    <?php endif ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($idioma); ?> <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <!-- Si es español no envia parámetro. Si es otro idioma, sí -->
                        <?php foreach ($idiomas_config as $key => $value): ?>
                            <?php if ($key ==  'es'): ?>
                            <a class="dropdown-item" href="<?php echo RUTA; ?> ">Español</a><br>
                            <?php else: ?>  
                            <a class="dropdown-item" href="<?php echo RUTA; ?>/index.php?lan=<?php echo $key; ?>"><?php echo $value; ?></a><br>    
                            <?php endif ?>
                        <?php endforeach ?>
                        </div>

                    </li>
                    <?php if ($complement_confing['galeria'] == true): ?>
                        <li><a href="#galeria"><i class="fas fa-images menuawesome"></i></a></li>
                    <?php endif ?>

                    <!-- <li><a href="#galeria"><i class="fas fa-images menuawesome"></i></a></li> -->
                    <li class="page-scroll">
                        <a href="#contacto"><i class="fas fa-envelope menuawesome"></i></a>
                    </li> 
                    <li><a href="<?php echo RUTA; ?>/admin/index.php"><i class="fa fa-cog menuawesome"></i></a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>