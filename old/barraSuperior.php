<div class="nav_menu">
    <nav class="" role="navigation">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php
                        $imagen = 'img/usuarios/user.png';
                        if (file_exists('img/usuarios/'.$correo.'.png')) {
                            $imagen = 'img/usuarios/'.$correo.'.png';
                        }
                    ?>
                    <img src="<?php echo $imagen;?>"><?php echo $nombre?>
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                    <li><a href="?pagina=perfil">  Perfil</a>
                    </li>
                    <li>
                        <a href="?pagina=cambiarContrasena">Cambiar contraseña</a>
                    </li>
                    <li><a href="proc/cerrarSesion.php"><i class="fa fa-sign-out pull-right"></i>Cerrar sesión</a>
                    </li>
                </ul>
            </li>

            <?php
                $notificaciones=0;
                $ndi=false;
                $ne=false;

                //---NOTIFICACION DATOS INSTITUCIONALES

                //$queryDI = "SELECT * from ocupacion where idUsuario = '$usuario'";
                //$di = $mysqli->query($queryDI);

                //if ($di->num_rows==0) { $notificaciones++; $ndi=true;}

                //$queryE = "SELECT * from escolaridad where idUsuario = '$usuario'";
                //$e = $mysqli->query($queryE);

                //if ($e->num_rows==0) { $notificaciones++; $ne=true; }

                if ($notificaciones>0) { ?>
                    <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green"><?php echo $notificaciones; ?></span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                            
                            <?php
                                if ($ndi) {
                                    echo '<li>
                                            <a href="inicio.php?pagina=datosInstitucionales">
                                                <span class="image">
                                                    <i class="fa fa-university"></i>
                                                </span>
                                                <span>
                                                    <span>Importante</span>
                                                </span>
                                                <span class="message">
                                                    Por favor complete el formulario de Datos Institucionales.
                                                </span>
                                            </a>
                                        </li>';
                                }

                                if ($ne) {
                                    echo '<li>
                                            <a href="inicio.php?pagina=escolaridad">
                                                <span class="image">
                                                    <i class="fa fa-university"></i>
                                                </span>
                                                <span>
                                                    <span>Importante</span>
                                                </span>
                                                <span class="message">
                                                    Por favor complete el formulario de Escolaridad Académica.
                                                </span>
                                            </a>
                                        </li>';
                                }
                            ?>
                            



                        </ul>
                    </li>




                <?php }
            ?>
            <!--ES AQUÍ-->
            
        </ul>
    </nav>
</div>