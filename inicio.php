<?php
    require('proc/conexion.php');
    require('head.php');
?>

<!DOCTYPE html>
<html>

<?php //require('notificaciones.php'); ?>



<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <?php require('columnaIzquierda.php');?>

            <!-- top navigation -->
            <div class="top_nav">

                <?php require('barraSuperior.php'); ?>

            </div>
            <!-- /top navigation -->

            <!-- CONTENIDO -->
            <div class="right_col" role="main">
                <?php
                    if (isset($_GET['pagina'])) {       //Si existe la variable "pagina".
                        switch ($_GET['pagina']) {      //Verifica el valor de la variable
                                                        //Cargar página dependiendo el valor

                            case 'cambiarContrasena':
                                require('paginaCambiarContrasena.php');
                            break;

                            case 'perfil':
                                require('paginaPerfil.php');
                            break;

                            case 'editarPerfil':
                                require('paginaEditarPerfil.php');
                            break;
                            //ADMINISTRADOR
                            case 'administrarRequisitos':
                                if($esAdmin){
                                    require('paginaAdministrarRequisitos.php');
                                } else { require('paginaAccesoRestringido.php'); }
                            break;
                            //ASOCIACIÓN
                            case 'periodos':
                                if($esAsociacion){
                                    require('paginaPeriodos.php');
                                } else { require('paginaAccesoRestringido.php'); }
                            break;
                            case 'administrarSubrequisitos':
                                if($esAdmin){
                                    require('paginaAdministrarSubrequisitos.php');
                                } else { require('paginaAccesoRestringido.php'); }
                                
                            break;
                            //DIRECTOR
                            case 'administrarPermisosClub':
                                if($esDirector){
                                    require('paginaAdministrarPermisosClub.php');
                                } else { require('paginaAccesoRestringido.php'); }
                                
                            break;
                            case 'miembrosClub':
                                if($esDirector){
                                    require('paginaMiembrosClub.php');
                                } else { require('paginaAccesoRestringido.php'); }
                                
                            break;

                            case 'administrarDirectivaClub':
                                if($esDirector){ //Verificar permisos de usuario
                                    require('paginaAdministrarDirectivaClub.php'); //Cargar página
                                } else { require('paginaAccesoRestringido.php'); } //Cargar página de acceso restringido
                                
                            break;

                            default:
                                require('paginaInicio.php'); //Cargar página de inicio predeterminadamente.
                            break;
                        }
                    } else { require('paginaInicio.php'); }
                    
                ?>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Aplicación web desarrollado por la <a>Universidad de Navojoa</a>. |
                            <span class="lead"> <i class="fa fa-cloud"></i> SAC-JA</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    

</body>

</html>

