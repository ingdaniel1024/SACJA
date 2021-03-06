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
            <h2>Usuario</h2>
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
              <form class="form-horizontal form-label-left" id="formulario_registro_usuario" action="/usuario/registrar" method="POST" enctype="multipart/form-data">
                <?php if($user!=null){ echo form_hidden('id_usuario', $user['id_usuario']);}?>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Nombre <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?=$user['nombre']?>" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_paterno">Apellido paterno <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?=$user['apellido_paterno']?>" id="apellido_paterno" name="apellido_paterno" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido_materno">Apellido materno
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?=$user['apellido_materno']?>" id="apellido_materno" name="apellido_materno" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="correo">Correo <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" value="<?=$user['correo']?>" id="correo" name="correo" class="form-control col-md-7 col-xs-12" maxlength="50" required>
                    </div>
                </div>
                <?php if(!$user['id_usuario'] >0){?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contrasena">Contraseña <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="contrasena" name="contrasena" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contrasena2">Repita contraseña <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="contrasena2" name="contrasena2" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <?php }?>
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sexo">Sexo:</label>
                      <p>
                          <label>Masculino:</label> <input type="radio" class="flat" name="sexo" id="sexoM" value="masculino" <?= ($user['sexo']=='femenino') ? '' : 'checked'?> required />
                          <label>Femenino:</label> <input type="radio" class="flat" name="sexo" id="sexoF" <?= ($user['sexo']=='femenino') ? 'checked' : ''?> value="femenino" />
                      </p>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_nacimiento">Fecha de Nacimiento
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?=$user['fecha_nacimiento']?>" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" data-inputmask="'mask':'99/99/9999'">
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Clase actual</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" id="id_clase" name="id_clase" required>
                          <option value="0">Selecciona una Clase</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefono">Teléfono
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" value="<?=$user['telefono']?>" name="telefono" id="telefono" class="form-control" data-inputmask="'mask':'(999)-999-9999'">
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
