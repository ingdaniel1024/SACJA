<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Periodos anuales</h3>
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
            <a href="/periodo_anual/agregar" class="btn btn-app">
              <i class="fa fa-plus"></i>Agregar
            </a>
            <?php 
              if(!$periodo_anuales){
                echo '<h2>Por el momento no hay contenido que mostrar</h2>';
              } else { ?>
                <table id="example" class="table table-striped responsive-utilities jambo_table">
                  <thead>
                      <tr class="headings">
                          <th>
                              <input type="checkbox" class="tableflat">
                          </th>
                          <th>ID</th>
                          <th>Periodo</th>
                          <th>Acción</th>
                      </tr>
                  </thead>

                  <tbody>
                    <?php
                      $par = FALSE;
                      foreach ($periodo_anuales as $periodo_anual) {
                        $id_periodo_anual = $periodo_anual['id_periodo_anual'];
                        $baction = ($periodo_anual['status']==1) ? 0 : 1;
                        $btext = ($periodo_anual['status']==1) ? 'Desactivar' : 'Activar';
                        $bclass = ($periodo_anual['status']==1) ? 'danger' : 'success';
                        $bicon = ($periodo_anual['status']==1) ? 'trash' : 'plus';
                        
                        ?>
                        <tr class="<?= ($par)?'even':'odd' ?> pointer">
                          <td class="a-center ">
                              <input type="checkbox" class="tableflat">
                          </td>
                          <td class=" "><?= $periodo_anual['id_periodo_anual'] ?></td>
                          <td class=" "><?= $periodo_anual['nombre_periodo'] ?></td>
                          <td class=" ">
                            <a href="/periodo_anual/editar/<?=$id_periodo_anual?>"><button type="button" class="btn btn-info btn-xs">Editar <i class="info fa fa-edit"></i></button></a>
                            <?php?>
                            <a href="/periodo_anual/status/<?=$baction?>/<?=$id_periodo_anual?>"><button type="button" class="btn btn-<?=$bclass?> btn-xs"><?=$btext?> <i class="<?=$bclass?> fa fa-<?=$bicon?>"></i></button> </a>
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
