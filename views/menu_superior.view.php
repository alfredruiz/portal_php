<!-- 
    ******************* 
    BARRA DE NAVEGACIÓN 
    *******************
    -->


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
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php if (!empty($articulos)): ?>
                        
                    
                    <?php foreach ($articulos as $articulo): ?>
    
                    <li>
                        <a href="<?php  echo '#' . substr($articulo['titulo'],0,6) ?>"><?php echo $articulo['titulo']; ?></a>
                    </li>
    
                    <?php endforeach ?>
                    <?php endif ?>
                   <!--  <li class="page-scroll">
                        <a href="#apartado2">Traducción y corrección</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#apartado3">Maquetación y creación web</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-language menuawesome"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo RUTA; ?> ">Español</a><br>
                        <a class="dropdown-item" href="<?php echo RUTA; ?>/index.php?lan=en">English</a><br>
                        <a class="dropdown-item" href="<?php echo RUTA; ?>/index.php?lan=fr">Francais</a><br>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?php echo RUTA; ?>/index.php?lan=ca">Català</a>
                        </div>

                    </li>
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