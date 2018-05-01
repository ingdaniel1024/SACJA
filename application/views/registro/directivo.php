<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Registrar</h3>
            </div>
            <div class="title_right">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Directivo</h2>
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
                        <form class="form-horizontal form-label-left" id="formulario_registro_directivo" action="/club/registrar_directivo" method="POST" enctype="multipart/form-data">
                            <?php if($id_club!=null){ echo form_hidden('id_club', $id_club);}?>
                            <?php if($id_periodo_anual!=null){ echo form_hidden('id_periodo_anual', $id_periodo_anual);}?>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Selecciona un usuario</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="usuario" name="usuario" required style="width: 100%;">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Selecciona un usuario</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" id="cargo" name="cargo" required style="width: 100%;">
                                        <option value="0"></option>
                                        <option value="consejero">Consejero</option>
                                        <option value="instructor">Instructor</option>
                                        <option value="secretario">Secretario</option>
                                        <option value="tesorero">Tesorero</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Aceptar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

