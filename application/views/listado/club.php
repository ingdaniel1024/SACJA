<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Clubes</h3>
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
                        <a href="/club/agregar" class="btn btn-app">
                        <i class="fa fa-plus"></i>Agregar
                        </a>
                        <?php 
                            if(!$clubes){
                              echo '<h2>Por el momento no hay contenido que mostrar</h2>';
                            } else { ?>
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                            <thead>
                                <tr class="headings">
                                    <th>
                                        <input type="checkbox" class="tableflat">
                                    </th>
                                    <th>ID</th>
                                    <th>Club</th>
                                    <th>Iglesia</th>
                                    <th>Director</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $par = FALSE;
                                    foreach ($clubes as $club) {
                                      $id_club = $club['id_club'];
                                      $baction = ($club['status']==1) ? 0 : 1;
                                      $btext = ($club['status']==1) ? 'Desactivar' : 'Activar';
                                      $bclass = ($club['status']==1) ? 'danger' : 'success';
                                      $bicon = ($club['status']==1) ? 'trash' : 'plus';
                                      $director = ($club['director']!=0) ? $club['nombre'].' '.$club['apellido_paterno'] : '';
                                    
                                      //Boton director
                                      $type = ($club['director']==0) ? 'success' : 'info' ;
                                      $text = ($club['director']==0) ? 'Asignar' : '' ;
                                      $icon = ($club['director']==0) ? 'plus' : 'edit' ;
                                      $url = '/modal/asignar_director/'.$id_club;
                                    
                                      ?>
                                <tr class="<?= ($par)?'even':'odd' ?> pointer">
                                    <td class="a-center ">
                                        <input type="checkbox" class="tableflat">
                                    </td>
                                    <td class=" "><?= $club['id_club'] ?></td>
                                    <td class=" "><?= $club['nombre_club'] ?></td>
                                    <td class=" "><?= $club['id_iglesia'] ?></td>
                                    <td class=" "><?= $director.boton($type,$text,$icon,$url) ?></td>
                                    <td class=" ">
                                        <a href="/club/editar/<?=$id_club?>"><button type="button" class="btn btn-info btn-xs">Editar <i class="info fa fa-edit"></i></button></a>
                                        <?php?>
                                        <a href="/club/status/<?=$baction?>/<?=$id_club?>"><button type="button" class="btn btn-<?=$bclass?> btn-xs"><?=$btext?> <i class="<?=$bclass?> fa fa-<?=$bicon?>"></i></button> </a>
                                    </td>
                                </tr>
                                <?php $par = !$par;}
                                    ?>
                            </tbody>
                        </table>
                        <?php } ?>                        

                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Asignar director</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Cargando...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                </div>
                            </div>
                          </div>
                        <!-- <div id="modal_registro_director" data-toggle="modal" data-target="#modal_registro_director"></div> -->

<!--                         <div class="modal fade bs-example-modal-lg" id="mi_modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Agregar director</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Text in a modal</h4>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>