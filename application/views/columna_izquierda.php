<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/inicio" class="site_title"><img src="/img/sacja_34.jpg" style="border-radius: 50%;"> <span>SACJA</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="/img/usuarios/daniel@sacja.com.png" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span><?= ($persona['sexo']=='femenino')?'Bienvenida':'Bienvenido'; ?>,</span>
        <h2><?= $persona['nombre']?></h2>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>
        <?php
          if($permisos['admin']){ echo 'Admin'; }
          elseif($permisos['asociacion']) { echo 'Asociación'; }
          elseif($permisos['director']) { echo 'Director'; }
          elseif($permisos['tesorero']) { echo 'Tesorero'; }
          elseif($permisos['secretario']) { echo 'Secretario'; }
          elseif($permisos['instructor']) { echo 'Instructor'; }
          elseif($permisos['consejero']) { echo 'Consejero'; }
          elseif($permisos['conquistador']) { echo 'Conquistador'; }
          ?>
          
        </h3>
        <ul class="nav side-menu">
          <li><a href="/inicio"><i class="fa fa-home"></i> Inicio </a></li>
          <li><a><i class="fa fa-edit"></i> Admin <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="/registro/usuario">Registrar Usuario</a></li>
                  <li><a href="/union">Uniones</a></li>
                  <li><a href="/asociacion">Asociaciones</a></li>
                  <li><a href="/distrito">Distritos</a></li>
                  <li><a href="/iglesia">Iglesias</a></li>
                  <li><a href="/club">Clubes</a></li>
                  <li><a href="#">Mi perfil</a></li>
              </ul>
          </li>
          
          <li><a><i class="fa fa-child"></i> Old Admin <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="?pagina=administrarRequisitos">Requisitos de Clase</a></li>
              </ul>
          </li>
      
  

  
          <li><a><i class="fa fa-building"></i> Asociación <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="?pagina=periodos">Periodos de Investidura</a></li>
                  <li><a href="#">Distritos</a></li>
                  <li><a href="#">Iglesias</a></li>
                  <li><a href="#">Clubes</a></li>
              </ul>
          </li>
      
  

  
          <li><a><i class="fa fa-sitemap"></i> Director <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="?pagina=administrarDirectivaClub">Directiva</a></li>
                  <li><a href="?pagina=administrarPermisosClub">Administrar permisos</a></li>
                  <li><a href="?pagina=miembrosClub">Miembros</a></li>
              </ul>
          </li>
      
  

  
          <li><a><i class="fa fa-usd"></i> Tesorero <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="#">Opciones</a></li>
              </ul>
          </li>
      
  

  
          <li><a><i class="fa fa-calendar-o"></i> Secretario <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="#">Opciones</a></li>
              </ul>
          </li>
      
  

  
          <li><a><i class="fa fa-bicycle"></i> Instructor <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="#">Opciones</a></li>
              </ul>
          </li>
      
  

  
          <li><a><i class="fa fa-group"></i> Consejero <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="#">Opciones</a></li>
              </ul>
          </li>
      
  

  
          <li><a><i class="fa fa-binoculars"></i> Conquistador <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu" style="display: none">
                  <li><a href="#">Opciones</a></li>
              </ul>
          </li>
        </ul>
      </div>
      

    </div>
    <!-- /sidebar menu -->
  </div>
</div>
