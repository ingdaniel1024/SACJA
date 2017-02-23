<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Administrar Requisitos de Investidura</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <!--CONTENIDO-->
                <center>
                   <div class="btn-group  btn-group-lg">
                        <?php
                            //Sacar clases
                            $qsClases = "SELECT * from clases where nombreClase not like '%Avanzado'";
                            $sClases = $mysqli->query($qsClases);
                            while($a=$sClases->fetch_array()){
                                
                                $nombreClase = $a['nombreClase'];
                                if (isset($_GET['clase'])) {
                                    if($nombreClase==$_GET['clase']){
                                        $idClase = $a['idClase'];
                                        $tipoBoton = 'btn-primary';
                                        $claseActual = $a['nombreClase'];
                                    } else {$tipoBoton = 'btn-default';}

                                } else {$tipoBoton = 'btn-default';}
                                
                                echo '<a href="?pagina=administrarRequisitos&clase='.$nombreClase.'">
                                        <button class="btn '.$tipoBoton.'" type="button">'.$nombreClase.'</button>
                                    </a>';
                            }
                        ?>
                    </div> 
                </center>
                <?php
                    if (!isset($_GET['clase'])) {
                        echo '<h2>Seleccione una clase.</h2>';
                    } else {
                        $qsCategorias = "SELECT * from categoriaclases where idClase = '$idClase'";
                        $sCategorias = $mysqli->query($qsCategorias);
                        while($b=$sCategorias->fetch_array()){
                            $nombreCategoria = $b['nombreCategoria'];
                            $idCategoria = $b['idCategoriaClases'];
                            echo '<h2>'.$nombreCategoria.'</h2>';
                            //Mostrar los requisitos
                            $qsRequisitos = "SELECT * from requisitosclase where idCategoriaClases = '$idCategoria'";
                            $sRequisitos = $mysqli->query($qsRequisitos);
                            $contador = 1;
                            while($c=$sRequisitos->fetch_array()){
                                $descripcion = $c['descripcion'];
                                $idRequisitosClase = $c['idRequisitosClase'];
                                echo '<a href="?pagina=administrarSubrequisitos&requisito='.$idRequisitosClase.'"><p>'.$contador.'---'.$descripcion.'</p></a>';
                                $contador++;
                                //Subrequisitos
                                $qsSubrequisitos = "SELECT * from subrequisitos where idRequisitoClase = '$idRequisitosClase'";
                                $sSubrequisitos = $mysqli->query($qsSubrequisitos);
                                $contador2 = 1;
                                while($d=$sSubrequisitos->fetch_array()){
                                    $descripcionSubrequisito = $d['descripcion'];
                                    echo '<p style="color: black; text-indent: 4em">'.$contador2.'---'.$descripcionSubrequisito.'</p>';
                                    $contador2++;
                                }

                            }
                            echo '<form class="form-horizontal" action="proc/agregarRequisito.php" method="POST">
                                    <input type="hidden" name="idCategoriaClases" value="'.$idCategoria.'">
                                    <input type="hidden" name="clase" value="'.$claseActual.'">
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
                                        <button type="submit" class="btn btn-success">Añadir</button>
                                    </center>
                                    
                                </form>';
                        }
                    }
                    
                ?>



                <!--/CONTENIDO-->
                

            </div>
        </div>
    </div>
</div>