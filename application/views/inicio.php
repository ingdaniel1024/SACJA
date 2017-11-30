<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= (isset($title))?$title:'SACJA'; ?></title>
    <link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />

    <link href="" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/nprogress.css" rel="stylesheet">
    <link href="/css/custom.min.css" rel="stylesheet">
    <?php
      //CSS ADICIONALES
      if(isset($css)){
        foreach ($css as $key => $value) {
          echo '<link href="'.$value.'" rel="stylesheet">';
        }
      }
    ?>
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <!-- Columna Izquierda -->
        <?php $this->load->view('columna_izquierda'); ?>
        <!-- /Columna Izquierda -->

        <!-- Barra Superior -->
        <?php $this->load->view('barra_superior'); ?>
        <!-- /Barra Superior -->

        <!-- Pagina -->
        <?php $this->load->view($view); ?>
        <!-- /Pagina -->

        <!-- footer content -->
        <?php $this->load->view('footer'); ?>
        <!-- /footer content -->
      </div>
    </div>

      <script src="/js/jquery.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/fastclick.js"></script>
      <script src="/js/nprogress.js"></script>
      <script src="/js/custom.min.js"></script>
    <?php
      //SCRIPTS ADICIONALES
    if(isset($js)){
      foreach ($js as $key => $value) {
        echo '<script src="'.$value.'"></script>';
      }
    }
    ?>
  </body>
</html>
