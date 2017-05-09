<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <?php
      //CSS
      foreach ($css as $key => $value) {
        echo '<link href="'.$value.'" rel="stylesheet">';
      }
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- Columna Izquierda -->
        <?php $this->load->view('columna_izquierda'); ?>
        <!-- /Columna Izquierda -->

        <!-- Barra Superior -->
        <?php $this->load->view('barra_superior'); ?>
        <!-- /Barra Superior -->

        <!-- page content -->
        <?php $this->load->view('contenido_plantilla'); ?>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

    <?php
      //SCRIPTS
      foreach ($js as $key => $value) {
        echo '<script src="'.$value.'"></script>';
      }
    ?>
  </body>
</html>
