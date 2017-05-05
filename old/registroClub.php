<?php require('headIndex.php'); ?>
<body style="background:#F7F7F7;">
    <script type="text/javascript">
        $(document).ready(function(){
            //---jQuery
            console.log("Entra a jQuery desde Pagina");
            console.log("Entra a jQuery");
            $("#formDirectorExistente").show();
            $("#formDirectorNuevo").hide();

            var radioDirector=$("input[name=directorExistente]");
            radioDirector.click(function(){
                //console.log("Entra a la función");

                if($("input[name=directorExistente]:checked").val()=='directorNuevo'){
                    console.log('Director Nuevo');
                    //---HABILITAR FORMULARIO DE REGISTRO DE DIRECTOR
                    $("#formDirectorExistente").val("");
                    $("#formDirectorExistente").hide();
                    $("#formDirectorNuevo").show();
                } else {
                    console.log('Director Existente');
                    //---HABILITAR INPUT TEXT PARA EL CORREO DEL DIRECTOR EXISTENTE
                    $("#formDirectorExistente").show();
                    $("#formDirectorNuevo").hide();
                }
            });
        });
    </script>

    <br><br>
    
    <div id="wizard" class="form_wizard wizard_horizontal">
        <ul class="wizard_steps">
            <li>
                <a href="#step-1">
                    <span class="step_no">1</span>
                    <span class="step_descr">
                        Paso 1<br />
                        <small>Director</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-2">
                    <span class="step_no">2</span>
                    <span class="step_descr">
                        Paso 2<br />
                        <small>Club</small>
                    </span>
                </a>
            </li>
            <li>
                <a href="#step-3">
                    <span class="step_no">3</span>
                    <span class="step_descr">
                        Paso 3<br />
                        <small>Términos</small>
                    </span>
                </a>
            </li>
        </ul>
        <div id="step-1">
            <form class="form-horizontal form-label-left" id="formularioRegistroDirector" action="proc/registrarClub.php" method="POST" enctype="multipart/form-data">
            	
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Director existente <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="radio" id="directorExistente" name="directorExistente" checked value="directorExistente" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Director nuevo <span class="required"></span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="radio" id="directorNuevo" name="directorExistente" value="directorNuevo" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <!--
                    /////////////////////////////////////////////////////////////////////////////
                -->
                <div id="formDirectorExistente">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name" >Correo electrónico <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="mail" id="emailDirectorExistente" name="emailDirectorExistente" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                        </div>
                    </div>
                </div>
                <!--
                    /////////////////////////////////////////////////////////////////////////////
                -->
                <div id="formDirectorNuevo">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre/s <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido paterno <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="apellidoPaterno" name="apellidoPaterno" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido materno</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="apellidoMaterno" name="apellidoMaterno" class="form-control col-md-7 col-xs-12" type="text" maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Sexo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="sexo" value="masculino">Masculino
                                </label>
                                <label class="btn btn-default " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="sexo" value="femenino" checked="">Femenino
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Correo electrónico</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="correo" name="correo" class="form-control col-md-7 col-xs-12" type="email" required  maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Contraseña</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="contrasena" name="contrasena" class="form-control col-md-7 col-xs-12" type="password" required  maxlength="50">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Repita contraseña</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="contrasenaRepetida" name="contrasenaRepetida" class="form-control col-md-7 col-xs-12" type="password" required  maxlength="50">
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <div id="step-2">
            <form class="form-horizontal form-label-left" id="formularioRegistroClub" action="proc/registrarClub.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Club <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nombre" name="nombreClub" required="required" class="form-control col-md-7 col-xs-12" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unión</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="asociacion" name="union" class="form-control col-md-7 col-xs-12" type="text" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Asociación o Misión</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="asociacion" name="asociacion" class="form-control col-md-7 col-xs-12" type="text" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Distrito</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="distrito" name="distrito" class="form-control col-md-7 col-xs-12" type="text" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Iglesia</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="iglesia" name="iglesia" class="form-control col-md-7 col-xs-12" type="text" maxlength="50">
                    </div>
                </div>
            </form>
        </div>
        <div id="step-3">
            <h2 class="StepTitle">Términos y condiciones</h2>
            <p><b>Artículo 1: </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p><b>Artículo 2: </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p><b>Artículo 3: </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p><b>Artículo 4: </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p><b>Artículo 5: </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
</body>
</html>