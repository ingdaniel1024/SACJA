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
      <!-- PNotify -->
      <script type="text/javascript" src="/js/notify/pnotify.core.js"></script>
      <script type="text/javascript" src="/js/notify/pnotify.buttons.js"></script>
      <script type="text/javascript" src="/js/notify/pnotify.nonblock.js"></script>
      <script>
        $(function () {
            var cnt = 10; //$("#custom_notifications ul.notifications li").length + 1;
            TabbedNotification = function (options) {
                var message = "<div id='ntf" + cnt + "' class='text alert-" + options.type + "' style='display:none'><h2><i class='fa fa-bell'></i> " + options.title + "</h2><div class='close'><a href='javascript:;' class='notification_close'><i class='fa fa-close'></i></a></div><p>" + options.text + "</p></div>";

                if (document.getElementById('custom_notifications') == null) {
                    alert('doesnt exists');
                } else {
                    $('#custom_notifications ul.notifications').append("<li><a id='ntlink" + cnt + "' class='alert-" + options.type + "' href='#ntf" + cnt + "'><i class='fa fa-bell animated shake'></i></a></li>");
                    $('#custom_notifications #notif-group').append(message);
                    cnt++;
                    CustomTabs(options);
                }
            }

            CustomTabs = function (options) {
                $('.tabbed_notifications > div').hide();
                $('.tabbed_notifications > div:first-of-type').show();
                $('#custom_notifications').removeClass('dsp_none');
                $('.notifications a').click(function (e) {
                    e.preventDefault();
                    var $this = $(this),
                        tabbed_notifications = '#' + $this.parents('.notifications').data('tabbed_notifications'),
                        others = $this.closest('li').siblings().children('a'),
                        target = $this.attr('href');
                    others.removeClass('active');
                    $this.addClass('active');
                    $(tabbed_notifications).children('div').hide();
                    $(target).show();
                });
            }

            CustomTabs();

            var tabid = idname = '';
            $(document).on('click', '.notification_close', function (e) {
                idname = $(this).parent().parent().attr("id");
                tabid = idname.substr(-2);
                $('#ntf' + tabid).remove();
                $('#ntlink' + tabid).parent().remove();
                $('.notifications a').first().addClass('active');
                $('#notif-group div').first().css('display','block');
            });
        })
    </script>
    <script type="text/javascript">
        var permanotice, tooltip, _alert;
        $(function () {
            new PNotify({
                title: "Hello",
                type: "dark",
                text: "Welcome. Try hovering over me. You can click things behind me, because I'm non-blocking.",
                nonblock: {
                    nonblock: true
                },
                before_close: function (PNotify) {
                    // You can access the notice's options with this. It is read only.
                    //PNotify.options.text;

                    // You can change the notice's options after the timer like this:
                    PNotify.update({
                        title: PNotify.options.title + " - Enjoy your Stay",
                        before_close: null
                    });
                    PNotify.queueRemove();
                    return false;
                }
            });

        });
    </script>

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
