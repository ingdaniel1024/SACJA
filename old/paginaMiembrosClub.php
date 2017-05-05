<script type="text/javascript">
    $(document).ready(function(){
        $("#usuarioExistente").show();
        $("#usuarioNuevo").hide();

        $("select[name=selectRegistrado]").change(function(){
            if($("select[name=selectRegistrado]").val()=='si'){
                $("#usuarioExistente").show();
                $("#usuarioNuevo").hide();

            } else {
                $("input[name=correoUsuarioExistente]").val('');
                $("#usuarioExistente").hide();
                $("#usuarioNuevo").show();
            }
        });
    });
</script>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <?php 
            $qsacarNombreClub = "SELECT * from clubes where idClub = '$idClub'";
            $sacarNombre = $mysqli->query($qsacarNombreClub);
            while($c=$sacarNombre->fetch_array()){ $nombreClubActual = $c['nombreClub']; }
        ?>
            <h3>Miembros del Club <?php echo $nombreClubActual;?></h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <!--CONTENIDO-->
                <h2>Agregar miembro</h2>
                <form class="form-horizontal" action="proc/agregarConquistador.php" method="POST">
                    <input type="hidden" name="idClub" value="<?php echo $idClub;?>">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Clase <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="clase" class="form-control">
                                <option value="Amigo">Amigo</option>
                                <option value="Compañero">Compañero</option>
                                <option value="Explorador">Explorador</option>
                                <option value="Orientador">Orientador</option>
                                <option value="Viajero">Viajero</option>
                                <option value="Guía">Guía</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">¿Registrado en SAC-JA? <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="selectRegistrado" class="form-control">
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>

                    <div id="usuarioExistente">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo electrónico <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="correoUsuarioExistente" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div id="usuarioNuevo">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre/s <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="nombre" name="nombre" class="form-control col-md-7 col-xs-12" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido paterno <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control col-md-7 col-xs-12" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido materno</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="apellidoMaterno" name="apellidoMaterno" class="form-control col-md-7 col-xs-12" type="text" maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="sexo" value="masculino">Masculino
                                    </label>
                                    <label class="btn btn-default " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="sexo" value="femenino" checked="">Femenino
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo electrónico</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="correo" name="correo" class="form-control col-md-7 col-xs-12" type="email"   maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contrasena" name="contrasena" class="form-control col-md-7 col-xs-12" type="password"   maxlength="50">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Repita contraseña</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="contrasenaRepetida" name="contrasenaRepetida" class="form-control col-md-7 col-xs-12" type="password"   maxlength="50">
                            </div>
                        </div>
                    </div>

                    
                    <center>
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </center>
                </form>
                <?php

                    if (hayConquistadores()) {
                        $buscar=hayConquistadores();
                        echo '<hr>';
                        echo '<h2>Conquistadores</h2>';
                        echo '<table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Clase</th>
                                        <th>Perfil</th>
                                    </tr>
                                </thead>
                                <tbody>';
                        while($a=$buscar->fetch_array()){
                            //Buscar nombre de usuario
                            $idUsuarioDirectiva = $a['idUsuario'];
                            $qbNombre = "SELECT * from usuarios where idUsuario = '$idUsuarioDirectiva'";
                            $bNombre = $mysqli->query($qbNombre);
                            while($b=$bNombre->fetch_array()){
                                $nombreUsuarioDirectiva = $b['nombre'];
                                $apellidoPaternoUsuarioDirectiva = $b['apellidoPaterno'];
                                $apellidoMaternoUsuarioDirectiva = $b['apellidoMaterno'];
                                $nombreCompletoUsuarioDirectiva = $nombreUsuarioDirectiva.' '.$apellidoPaternoUsuarioDirectiva.' '.$apellidoMaternoUsuarioDirectiva;
                            }
                            //Buscar clase actual
                            $qbClase = "SELECT * from perfil where idUsuario = '$idUsuarioDirectiva'";
                            $bClase = $mysqli->query($qbClase);
                            while($c=$bClase->fetch_array()){
                                $claseActual = $c['claseActual'];
                            }
                            echo '<tr>
                                    <td>'.$nombreCompletoUsuarioDirectiva.'</th>
                                    <td>'.$claseActual.'</td>
                                    <td>
                                        <a href="">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <i class="fa fa-user"></i> Ver perfil 
                                            </button>
                                        </a>
                                    </td>
                                </tr>';
                        }
                        echo '</tbody>
                            </table>';
                    } else {

                    }

                    function hayConquistadores(){
                        global $mysqli;
                        global $idClub;

                        $query = "SELECT * from miembros where idClub = '$idClub' and cargo ='Conquistador'";
                        $buscar = $mysqli->query($query);

                        if ($buscar->num_rows>0) {
                            return $buscar;
                        } else { return false; }
                    }
                ?>
                <!-- Small modal -->
                
<!--
                <div class="modal fade advertenciaEliminar" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Advertencia</h4>
                            </div>
                            <div class="modal-body">
                                <p>¿Está seguro que desea eliminarlo?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <a href="proc/deleteEscolaridad.php" data-toggle='modal' data-target='#myModal' class='modalLoad'>
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                 /modals -->

            </div>
        </div>
    </div>
</div>