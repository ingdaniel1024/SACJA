<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SAC-JA</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>
    <!-- PNotify -->
    <script type="text/javascript" src="js/notify/pnotify.core.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.buttons.js"></script>
    <script type="text/javascript" src="js/notify/pnotify.nonblock.js"></script>
    <?php //require('notificaciones.php'); ?>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form action="proc/validarLogin.php" method="POST">
                        <h1>Inicio de Sesión</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Correo" name="correo" required>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required>
                        </div>
                        <div>
                            <button class="btn btn-default" type="submit">
                                Iniciar sesión
                                <i class="fa fa-sign-in user-profile-icon"></i></button>
                            <a href="registroClub.php">¡Registra tu club!</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <!--<p class="change_link">New to site?
                                <a href="#toregister" class="to_register"> Create Account </a>
                            </p>-->
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-cloud" style="font-size: 26px;"></i> SAC-JA</h1>

                                <p>©2016 Todos los derechos reservados.</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            
        </div>
    </div>

</body>

</html>