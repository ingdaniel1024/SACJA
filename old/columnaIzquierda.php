<?php
    //---INFORMACIÓN GENERAL
    $qDatos = "SELECT nombre, apellidoPaterno, apellidoMaterno, correo, sexo from personas, usuarios 
    where personas.idUsuario = $usuario
    and usuarios.idUsuario = $usuario"
    ;
    $datos = $mysqli->query($qDatos);
    while ($a = $datos->fetch_array()) {
        $nombre = $a['nombre'];
        $apellidoPaterno = $a['apellidoPaterno'];
        $apellidoMaterno = $a['apellidoMaterno'];
        $correo = $a['correo'];
        $sexo = $a['sexo'];
    }
    //---PERMISOS
    $qPermisos = "SELECT * from permisos where idUsuario = $usuario";
    $permisos = $mysqli->query($qPermisos);

    while ($a = $permisos->fetch_array()) {
        $esConquistador = $a['esConquistador'];
        $esConsejero = $a['esConsejero'];
        $esInstructor = $a['esInstructor'];
        $esSecretario = $a['esSecretario'];
        $esTesorero = $a['esTesorero'];
        $esDirector = $a['esDirector'];
        $esAsociacion = $a['esAsociacion'];
        $esAdmin = $a['esAdmin'];
    }
?>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="inicio.php" class="site_title"><i class="fa fa-cloud"></i> <span>SAC-JA</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <?php
                    $imagen = 'img/usuarios/user.png';
                    if (file_exists('img/usuarios/'.$correo.'.png')) {
                        $imagen = 'img/usuarios/'.$correo.'.png';
                    } else { $imagen='img/usuarios/user.png';}
                ?>
                <img src="<?php echo $imagen;?>" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span><?php if ($sexo=='masculino') {
                    echo 'Bienvenido';
                } else {
                    echo 'Bienvenida';
                }?>,</span>
                <h2><?php echo $nombre.' '.$apellidoPaterno;?></h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3><?php
                    if ($esAdmin) { echo 'Administrador'; }
                    elseif($esAsociacion) { echo 'Asociación'; }
                    elseif($esDirector) { echo 'Director'; }
                    elseif($esTesorero) { echo 'Tesorero'; }
                    elseif($esSecretario) { echo 'Secretario'; }
                    elseif($esInstructor) { echo 'Instructor'; }
                    elseif($esConsejero) { echo 'Consejero'; }
                    elseif($esConquistador) { echo 'Conquistador'; }
                ?></h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Inicio </a></li>
                    <li><a><i class="fa fa-edit"></i> Opciones <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="?pagina=perfil">Mi perfil</a></li>
                        </ul>
                    </li>
                    <?php if ($esAdmin) { ?>
                            <li><a><i class="fa fa-child"></i> Admin <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="?pagina=administrarRequisitos">Requisitos de Clase</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    <?php if ($esAsociacion) { ?>
                            <li><a><i class="fa fa-building"></i> Asociación <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="?pagina=periodos">Periodos de Investidura</a></li>
                                    <li><a href="#">Distritos</a></li>
                                    <li><a href="#">Iglesias</a></li>
                                    <li><a href="#">Clubes</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    <?php if ($esDirector) { ?>
                            <li><a><i class="fa fa-sitemap"></i> Director <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="?pagina=administrarDirectivaClub">Directiva</a></li>
                                    <li><a href="?pagina=administrarPermisosClub">Administrar permisos</a></li>
                                    <li><a href="?pagina=miembrosClub">Miembros</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    <?php if ($esTesorero) { ?>
                            <li><a><i class="fa fa-usd"></i> Tesorero <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Opciones</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    <?php if ($esSecretario) { ?>
                            <li><a><i class="fa fa-calendar-o"></i> Secretario <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Opciones</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    <?php if ($esInstructor) { ?>
                            <li><a><i class="fa fa-bicycle"></i> Instructor <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Opciones</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    <?php if ($esConsejero) { ?>
                            <li><a><i class="fa fa-group"></i> Consejero <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Opciones</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    <?php if ($esConquistador) { ?>
                            <li><a><i class="fa fa-binoculars"></i> Conquistador <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="#">Opciones</a></li>
                                </ul>
                            </li>
                        <?php }
                    ?>

                    
                </ul>
            </div>
            

        </div>
        <!-- /sidebar menu -->

        
    </div>
</div>