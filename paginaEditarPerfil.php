<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Editar perfil</h3>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <?php
                    $query = "SELECT * from usuarios where idUsuario = '$usuario'";
                    $datos = $mysqli->query($query);

                    while($a=$datos->fetch_array()){
                        $idUsuario = $a['idUsuario'];
                        $nombre = $a['nombre'];
                        $apellidoPaterno = $a['apellidoPaterno'];
                        $apellidoPaterno = $a['apellidoPaterno'];
                        $apellidoMaterno = $a['apellidoMaterno'];
                        $sexo = $a['sexo'];
                        $correo = $a['correo'];
                    }
                    //Cargar información del usuario
                    $qiPerfil = "SELECT * from perfil where idUsuario = '$idUsuario'";
                    $iPerfil = $mysqli->query($qiPerfil);
                    while($d=$iPerfil->fetch_array()){
                        $fechaDeNacimiento = $d['fechaDeNacimiento'];
                        $claseActual = $d['claseActual'];
                        if($d['lada']!=0){$lada=$d['lada'];} else {$lada='';}
                        if($d['telefono']!=0){$telefono=$d['telefono'];} else {$telefono='';}
                        $ciudad = $d['ciudad'];
                        $estado = $d['estado'];
                        $pais = $d['pais'];
                    }
                    //Cambiar formato de la fecha de nacimiento
                    $fechaDeNacimiento = date("d-m-Y", strtotime($fechaDeNacimiento));
                ?>
                
                <!--CONTENIDO-->
                <div class="col-md-12 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                        <!-- end of image cropping -->
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <center>
                                <div class="avatar-view" title="Change the avatar">
                                <?php
                                    $imagen = 'img/usuarios/user.png';
                                    if (file_exists('img/usuarios/'.$correo.'.png')) {
                                        $imagen = 'img/usuarios/'.$correo.'.png';
                                    }
                                ?>
                                <img src="<?php echo $imagen;?>" alt="Avatar">
                            </div>
                            </center>
                            

                            <!-- Cropping modal -->
                            <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal -->

                            <!-- Loading state -->
                            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                        </div>
                        <!-- end of image cropping -->

                    </div>
                    <center>
                        <h3><?php echo $nombre.' '.$apellidoPaterno.' '.$apellidoMaterno;?></h3>
                    </center>

                    <form class="form-horizontal" action="proc/actualizarPerfil.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="idUsuario" value="<?php echo $usuario;?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Foto de Perfil <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="fotoUsuario" accept="image/*" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="nombre" value="<?php echo $nombre;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ApellidoPaterno <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="apellidoPaterno" value="<?php echo $apellidoPaterno;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ApellidoMaterno <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="apellidoMaterno" value="<?php echo $apellidoMaterno;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de nacimiento <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="fechaDeNacimiento" name="fechaDeNacimiento" value="<?php echo $fechaDeNacimiento;?>" class="form-control" data-inputmask="'mask': '99-99-9999'" placeholder="30-12-1994">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default <?php if($sexo=='masculino'){echo 'active';}?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="sexo" <?php if($sexo=='masculino'){echo 'checked';}?> value="masculino" >Masculino
                                    </label>
                                    <label class="btn btn-default <?php if($sexo=='femenino'){echo 'active';}?>" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="sexo" <?php if($sexo=='masculino'){echo 'checked';}?> value="femenino" >Femenino
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Correo electrónico <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="correo" value="<?php echo $correo;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Teléfono <span class="required"></span>
                            </label>
                            <div class="col-md-1 col-sm-6 col-xs-12">
                                <input type="text" name="lada" value="<?php echo $lada;?>" placeholder="###" class="form-control">
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <input type="text" name="telefono" value="<?php echo $telefono;?>" placeholder="##########" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ciudad <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="ciudad" value="<?php echo $ciudad;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="estado" value="<?php echo $estado;?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">México <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="pais" value="<?php echo $pais;?>" class="form-control">
                            </div>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-success btn-lg">
                            <i class="fa fa-save"></i> Guardar 
                        </button>
                        </center>
                        

                        
                    </form>
                <!--/CONTENIDO-->
            </div>
        </div>
    </div>
</div>