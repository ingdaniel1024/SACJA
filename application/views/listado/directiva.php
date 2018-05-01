<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Directiva</h3>
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Listado</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <a href="/club/agregar_directivo" class="btn btn-app">
                        <i class="fa fa-plus"></i>Agregar
                        </a>
                        <?php 
                            if(!$directiva){
                              echo '<h2>Por el momento no hay contenido que mostrar</h2>';
                            } else { ?>
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" class="tableflat">
                                    </th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $par = FALSE;
                                    foreach ($directiva as $directivo) {
                                        $cargo = '';
                                        if($directivo['tesorero']){$cargo='Tesorero';}
                                        elseif($directivo['secretario']){$cargo='Secretario';}
                                        elseif($directivo['instructor']){$cargo='Instructor';}
                                        elseif($directivo['consejero']){$cargo='Consejero';}
                                    
                                      ?>
                                <tr class="<?= ($par)?'even':'odd' ?> pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="tableflat">
                                    </td>
                                    <td class=" "><?= $directivo['id_miembro'] ?></td>
                                    <td class=" "><?= $directivo['nombre'].' '.$directivo['apellido_paterno'] ?></td>
                                    <td class=" "><?= $cargo ?></td>
                                    <td class=" ">
                                        <a href="/club/eliminar_directivo/<?=$directivo['id_miembro']?>"><button type="button" class="btn btn-info btn-xs">Editar <i class="info fa fa-edit"></i></button></a>
                                    </td>
                                </tr>
                                <?php $par = !$par;}
                                    ?>
                            </tbody>
                        </table>
                        <?php } ?>                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>