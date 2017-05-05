<?php if (isset($_SESSION['mensajeNotificacion'])) { ?>
    <script type="text/javascript">

        $(function () {
            console.log('Hay variables de sesión.');
            //Comentario
            
            var mensajeNotificacion = "<?php echo $_SESSION['mensajeNotificacion']; ?>";
            var tituloNotificacion = "<?php echo $_SESSION['tituloNotificacion']; ?>";
            var tipoNotificacion = "<?php echo $_SESSION['tipoNotificacion']; ?>";

            new PNotify({
                title: tituloNotificacion,
                text: mensajeNotificacion,
                type: tipoNotificacion,
                hide: true
            });
        });
    </script>
<?php } 
    unset($_SESSION['mensajeNotificacion']);
    unset($_SESSION['tituloNotificacion']);
    unset($_SESSION['tipoNotificacion']);
 ?>