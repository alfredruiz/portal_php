<!-- 
    ************************** 
    BARRA DE NAVEGACIÓN ADMIN 
    **************************
    -->

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navegación</span> Menú <i class="fa fa-bars"></i>
                </button>
                <?php require '../admin/razonsocial.php'; ?>

            </div>
    
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li> 
                    <li class="page-scroll"><a href="#">[<?php echo $_SERVER['HTTP_HOST']; ?>]</a></li>
                    <?php if (isset($_SESSION['usuario'])): ?>
                        <!-- <li><a href="#"><?php echo $blog_config['urlActual']; ?></a></li> -->
                        <li><a href="#"><?php echo 'Hola, ' . ucfirst($_SESSION['usuario']); ?></a></li>
                        <li class="page-scroll">
                            <a href="#"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="../admin/listado.php">Secciones</a>
                        </li>
                        <li class="page-scroll">
                            <a href="../galeria/listado_imagenes.php">Galería</a>
                        </li>
<!--                         <li class="page-scroll">
                            <a href="../admin/registrar.php">Añadir usuario</a>
                        </li> -->
                        <li class="page-scroll">
                            <a href="../admin/listado_usuario.php">Usuarios</a>
                        </li>
                        
                        <li class="page-scroll">
                            <a href="../admin/cerrar.php">Cerrar sesión</a>
                        </li>
                    <?php endif ?>   
                         
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>