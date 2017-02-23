<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Perfil</h3>
        </div>

    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <?php
                    $perfil_correo = $correo;
                    if (isset($_GET['perfil'])) {
                        $vpQuery = "SELECT * from usuarios where correo = '".$_GET['perfil']."'";
                        $vPerfil = $mysqli->query($vpQuery);

                        if ($vPerfil->num_rows==1) {
                            $perfil_correo = $_GET['perfil'];
                            while($a = $vPerfil->fetch_array()){
                                $perfil_idUsuario = $a['idUsuario'];
                                $perfil_nombre = $a['nombre'];
                                $perfil_apellidoPaterno = $a['apellidoPaterno'];
                                $perfil_apellidoPaterno = $a['apellidoPaterno'];
                                $perfil_apellidoMaterno = $a['apellidoMaterno'];
                                $perfil_sexo = $a['sexo'];
                                $perfil_correo = $a['correo'];
                            }
                        }
                    } else {
                        $query = "SELECT * from usuarios where correo = '$correo'";
                        $datos = $mysqli->query($query);

                        while($a=$datos->fetch_array()){
                            $perfil_idUsuario = $a['idUsuario'];
                            $perfil_nombre = $a['nombre'];
                            $perfil_apellidoPaterno = $a['apellidoPaterno'];
                            $perfil_apellidoPaterno = $a['apellidoPaterno'];
                            $perfil_apellidoMaterno = $a['apellidoMaterno'];
                            $perfil_sexo = $a['sexo'];
                            $perfil_correo = $a['correo'];
                        }
                    }
                    //Cargar información del usuario
                    $qiPerfil = "SELECT * from perfil where idUsuario = '$perfil_idUsuario'";
                    $iPerfil = $mysqli->query($qiPerfil);
                    while($d=$iPerfil->fetch_array()){
                        $perfil_fechaDeNacimiento = $d['fechaDeNacimiento'];
                        $perfil_claseActual = $d['claseActual'];
                        if($d['lada']!=0){$perfil_lada=$d['lada'];} else {$perfil_lada='';}
                        if($d['telefono']!=0){$perfil_telefono=$d['telefono'];} else {$perfil_telefono='';}
                        $perfil_ciudad = $d['ciudad'];
                        $perfil_estado = $d['estado'];
                        $perfil_pais = $d['pais'];
                    }
                ?>
                
                <!--CONTENIDO-->
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                    <div class="profile_img">

                        <!-- end of image cropping -->
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <div class="avatar-view">
                                <?php
                                    $imagen = 'img/usuarios/user.png';
                                    if (file_exists('img/usuarios/'.$perfil_correo.'.png')) {
                                        $imagen = 'img/usuarios/'.$perfil_correo.'.png';
                                    }
                                ?>
                                <img src="<?php echo $imagen;?>" alt="Avatar">
                            </div>

                            <!-- Cropping modal -->
                            <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
                                            <div class="modal-header">
                                                <button class="close" data-dismiss="modal" type="button">&times;</button>
                                                <h4 class="modal-title" id="avatar-modal-label">Cambiar Avatar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="avatar-body">

                                                    <!-- Upload image and data -->
                                                    <div class="avatar-upload">
                                                        <input class="avatar-src" name="avatar_src" type="hidden">
                                                        <input class="avatar-data" name="avatar_data" type="hidden">
                                                        <label for="avatarInput">Local upload</label>
                                                        <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                                    </div>

                                                    <!-- Crop and preview -->
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="avatar-wrapper"></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="avatar-preview preview-lg"></div>
                                                            <div class="avatar-preview preview-md"></div>
                                                            <div class="avatar-preview preview-sm"></div>
                                                        </div>
                                                    </div>

                                                    <div class="row avatar-btns">
                                                        <div class="col-md-9">
                                                            <div class="btn-group">
                                                                <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                                                <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                                                <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                                                <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                                            </div>
                                                            <div class="btn-group">
                                                                <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                                                <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                                                <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                                                <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <button class="btn btn-primary btn-block avatar-save" type="submit">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="modal-footer">
                              <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                            </div> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /.modal -->

                            <!-- Loading state -->
                            <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                        </div>
                        <!-- end of image cropping -->

                    </div>
                    <h3><?php echo $perfil_nombre.' '.$perfil_apellidoPaterno.' '.$perfil_apellidoMaterno;?></h3>

                    <ul class="list-unstyled user_data">
                        <li>
                            <i class="fa fa-phone user-profile-icon"></i> <?php echo $perfil_lada.$perfil_telefono;?>
                        </li>

                        <li>
                            <i class="fa fa-envelope user-profile-icon"></i> <?php echo $perfil_correo;?>
                        </li>

                        <li>
                            <i class="fa fa-map-marker user-profile-icon"></i>
                            <?php 
                                if($perfil_ciudad!=''){echo $perfil_ciudad; }
                                if($perfil_ciudad!=''&&$perfil_estado!=''){echo ', '.$perfil_estado; }
                            ?>
                        </li>
                        <li>
                            <?php
                                $qeClub = "SELECT * from miembros where idUsuario = '$usuario'";
                                $eClub = $mysqli->query($qeClub);
                                while($ec = $eClub->fetch_array()){ $idClub = $ec['idClub']; }
                                $qClub = "SELECT * from clubes where idClub = '$idClub'";
                                $cClub = $mysqli->query($qClub);
                                while($ec = $cClub->fetch_array()){ $nombreClub = $ec['nombreClub']; }
                            ?>
                            <i class="fa fa-users user-profile-icon"></i> <?php echo 'Club '.$nombreClub;?>
                        </li>
                    </ul>

                    <a class="btn btn-success"><i class="fa fa-envelope m-right-xs"></i>  Enviar Mensaje</a>
                    <br />

                    <!-- start skills -->
                    <h4>Skills</h4>
                    <ul class="list-unstyled user_data">
                        <li>
                            <p>Web Applications</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                        </li>
                        <li>
                            <p>Website Design</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                            </div>
                        </li>
                        <li>
                            <p>Automation & Testing</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                            </div>
                        </li>
                        <li>
                            <p>UI / UX</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                            </div>
                        </li>
                    </ul>
                    <!-- end of skills -->

                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">

                        <?php
                            if($usuario==$perfil_idUsuario){
                        ?>
                        <a href="?pagina=editarPerfil" class="btn btn-app">
                            <i class="fa fa-edit"></i> Editar
                        </a>
                        <?php
                            }
                        ?>
                        
                    <!-- start of user-activity-graph -->
                    <div id="graph_bar" style="width:100%; height:280px;"></div>
                    <!-- end of user-activity-graph -->

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Clases</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Especialidades</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Experiencia</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <h3>Sección en construcción</h3>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <h3>Sección en construcción</h3>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <h3>Sección en construcción</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/CONTENIDO-->
            </div>
        </div>
    </div>
</div>