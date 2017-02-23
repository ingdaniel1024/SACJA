<script type="text/javascript">
    $(document).ready(function(){
        $(function(){
            setInterval(listarConAjax, 500);
        });

        function listarConAjax() {
            $.ajax({
                url: "ajax/listarPeriodosAnuales.php"
            }).success(function (response){
                $("#ajaxPeriodos").html(response);
            });
        }
        
    });
</script>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Periodos de Investidura</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs">
            <div class="x_panel">
                <!--CONTENIDO-->
                <h2>Crear Periodo</h2>
                <form class="form-horizontal" action="proc/crearPeriodo.php" method="POST">
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Periodo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nombre" name="nombrePeriodo" class="form-control col-md-7 col-xs-12" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de inicio <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="fechaDeNacimiento" name="fechaInicio" class="form-control" data-inputmask="'mask': '99-99-9999'" placeholder="30-12-1994">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de fin <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="fechaDeNacimiento" name="fechaFin" class="form-control" data-inputmask="'mask': '99-99-9999'" placeholder="30-12-1994">
                        </div>
                    </div>

                    
                    <center>
                        <button type="submit" class="btn btn-success">Añadir</button>
                    </center>
                </form>
                
                <div id="ajaxPeriodos"></div>


                <!--/CONTENIDO-->
            </div>
        </div>
    </div>
</div>