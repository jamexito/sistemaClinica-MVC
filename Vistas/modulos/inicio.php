<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
        <?php 

        $inicio = new InicioC();

        $inicio -> MostrarInicioC();

        if ($_SESSION["rol"] == "Administrador") {
            
          echo '<div class="box-footer">

                  <a href="inicio-editar">
                    
                    <button class="btn btn-success btn-lg">Editar</button>

                  </a>

                </div>';

        }

        ?>

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>