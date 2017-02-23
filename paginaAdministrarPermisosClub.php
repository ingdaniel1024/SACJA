<div class="">
    <div class="page-title">
        <div class="title_left">
            <?php 
                $qsacarNombreClub = "SELECT * from clubes where idClub = '$idClub'";
                $sacarNombre = $mysqli->query($qsacarNombreClub);
                while($c=$sacarNombre->fetch_array()){ $nombreClubActual = $c['nombreClub']; }
            ?>
            <h3>Administrar Permisos del Club <?php echo $nombreClubActual;?></h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <!--CONTENIDO-->
                <?php
                    if (hayDirectiva()) {
                        $buscar=hayDirectiva();
                        echo '<h2>Directiva</h2>';
                        echo '<table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cargo</th>
                                        <th>P. Consejero</th>
                                        <th>P. Instructor</th>
                                        <th>P. Secretario</th>
                                        <th>P. Tesorero</th>
                                        <th>P. Director</th>
                                        <th></th>
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
                            //Verificar permisos
                            $qvPermisos = "SELECT * from permisos where idUsuario = '$idUsuarioDirectiva'";
                           
                            $bPermisos = $mysqli->query($qvPermisos);
                            while($p=$bPermisos->fetch_array()){
                                $esConsejero = $p['esConsejero'];
                                $esInstructor = $p['esInstructor'];
                                $esSecretario = $p['esSecretario'];
                                $esTesorero = $p['esTesorero'];
                                $esDirector = $p['esDirector'];
                            }
                            ?>

                            <tr>
                                <form action="proc/actualizarPermisosDirectiva.php" method="POST">
                                    <input type="hidden" name="idUsuario" value="<?php echo $idUsuarioDirectiva;?>">
                                    <td><?php echo $nombreCompletoUsuarioDirectiva;?></th>
                                    <td><?php echo $a['cargo']; ?></td>
                                    <td>
                                        <?php
                                            if($esConsejero==1){$checkedConsejero='checked';} else {$checkedConsejero='';}
                                        ?>
                                        <input type="checkbox" class="flat" name="esConsejero" <?php echo $checkedConsejero;?>>
                                    </td>
                                    <td>
                                        <?php
                                            if($esInstructor==1){$checkedInstructor='checked';} else {$checkedInstructor='';}
                                        ?>
                                        <input type="checkbox" class="flat" name="esInstructor" <?php echo $checkedInstructor;?>>
                                    </td>
                                    <td>
                                        <?php
                                            if($esSecretario==1){$checkedSecretario='checked';} else {$checkedSecretario='';}
                                        ?>
                                        <input type="checkbox" class="flat" name="esSecretario" <?php echo $checkedSecretario;?>>
                                    </td>
                                    <td>
                                        <?php
                                            if($esTesorero==1){$checkedTesorero='checked';} else {$checkedTesorero='';}
                                        ?>
                                        <input type="checkbox" class="flat" name="esTesorero" <?php echo $checkedTesorero;?>>
                                    </td>
                                    <td>
                                        <?php
                                            if($esDirector==1){$checkedDirector='checked';} else {$checkedDirector='';}
                                        ?>
                                        <input type="checkbox" class="flat" name="esDirector" <?php echo $checkedDirector;?>>
                                    </td>
                                    <td>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Actualizar 
                                            </button>
                                    </td>
                                </form>
                            </tr>
                                <?php
                        }
                        echo '</tbody>
                            </table>';

                    
                    }
                    function hayDirectiva(){
                        global $mysqli;
                        global $idClub;

                        $query = "SELECT * from miembros where idClub = '$idClub' and cargo != 'Conquistador'";
                        $buscar = $mysqli->query($query);

                        if ($buscar->num_rows>0) {
                            return $buscar;
                        } else { return false; }
                }?>
                <!--/CONTENIDO-->
            </div>
        </div>
    </div>
</div>