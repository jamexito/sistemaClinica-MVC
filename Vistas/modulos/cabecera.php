<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>M</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CLINICA </b>MEDICA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 

              <?php 

                if ($_SESSION["foto"] == "") {
                  
                  echo '<img src="http://localhost:8082/clinica/Vistas/img/defecto.png" class="user-image" alt="User Image">';

                }else{

                    echo '<img src="http://localhost:8082/clinica/'.$_SESSION["foto"].'" class="user-image" alt="User Image">';

                }

              ?>

              
              <span class="hidden-xs"><?php echo $_SESSION["nombre"]; echo " - "; echo $_SESSION["rol"]; ?></span>

            </a>

            <ul class="dropdown-menu">
             
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-left">

                  <?php 

                    echo '<a href="http://localhost:8082/clinica/perfil-'.$_SESSION["rol"].'" class="btn btn-primary btn-flat">Perfil</a>';

                  ?>                  

                </div>

                <div class="pull-right">

                  <a href="http://localhost:8082/clinica/salir" class="btn btn-danger btn-flat">Salir</a>

                </div>

              </li>

            </ul>

          </li>

        </ul>

      </div>

    </nav>

  </header>