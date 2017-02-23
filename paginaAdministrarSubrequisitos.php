<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Administrar Subrequisitos de Investidura</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <!--CONTENIDO-->
                
                <?php
                    if (!isset($_GET['requisito'])) {
                        echo '<h2>Seleccione un requisito.</h2>';
                    } else { $idRequisito = $_GET['requisito']; }
                    $qssr = "SELECT * from requisitosclase where idRequisitosClase = '$idRequisito'";
                    $ssr = $mysqli->query($qssr);
                    while($b=$ssr->fetch_array()){
                        $descripcion = $b['descripcion'];
                        echo '<h2>'.$descripcion.'</h2>';
                        //Mostrar los subrequisitos
                        $qsRequisitos = "SELECT * from subrequisitos where idRequisitoClase = '$idRequisito'";
                        $sRequisitos = $mysqli->query($qsRequisitos);
                        $contador = 1;
                        while($c=$sRequisitos->fetch_array()){
                            $descripcion = $c['descripcion'];
                            //$idRequisitosClase = $c['idRequisitosClase'];
                            echo '<p>'.$contador.'---'.$descripcion.'</p>';
                            $contador++;
                        }
                        echo '<form class="form-horizontal" action="proc/agregarSubrequisito.php" method="POST">
                                <input type="hidden" name="requisito" value="'.$idRequisito.'">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="descripcion" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Es especialidad <span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="checkbox" name="esEspecialidad" class="form-control">
                                    </div>
                                </div>
                                <center>
                                    <button type="submit" class="btn btn-success">Añadir subrequisito</button>
                                </center>
                                
                            </form>';
                    }
                ?>



                <!--/CONTENIDO-->
                

            </div>
        </div>
    </div>
</div>