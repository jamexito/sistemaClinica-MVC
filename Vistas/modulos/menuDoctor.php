<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <ul class="sidebar-menu">
        
        <li>
          
          <a href="http://localhost:8082/clinica/inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>

        </li>

        <li>

          <?php 

          echo '<a href="http://localhost:8082/clinica/Citas/'.$_SESSION["id"].'">';   

          ?>          
          
            <i class="fa fa-user-md"></i>
            <span>Citas</span>
          </a>

        </li>

        <li>
          
          <a href="http://localhost:8082/clinica/pacientes">
            <i class="fa fa-medkit"></i>
            <span>Pacientes</span>
          </a>

        </li>

      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>