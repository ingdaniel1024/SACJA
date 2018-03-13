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
            <h2>Distrito</h2>
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
              <form class="form-horizontal form-label-left" id="formulario_registro_distrito" action="/distrito/registrar" method="POST" enctype="multipart/form-data">
                <?php if($distrito!=null){ echo form_hidden('id_distrito', $distrito['id_distrito']);}?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_distrito">Nombre del Distrito <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?=$distrito['nombre_distrito']?>" id="nombre" name="nombre_distrito" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Asociación</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" id="id_asociacion" name="id_asociacion" required>
                          <option value="0">Selecciona una Asociación</option>
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