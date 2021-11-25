<?php

include ("layout/header.php");

?>
  <title>Cablevisión | Robles</title>
  <!-- Tell the browser to be responsive to screen width -->
 
<?php

include ("layout/nav.php");

?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Ver</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        
                        <?php
                          $personal = new Personal();
                          $idBusqueda = $_REQUEST['id'];

                          $personalResultado = $personal->buscarPorId($idBusqueda);
                        
                          $nombres = $personalResultado->getNombres();
                          $apellidos = $personalResultado->getApellidos();
                          $telefono = $personalResultado->getTelefono();
                          $cargo = $personalResultado->getCargo();
                          $genero = $personalResultado->getGenero();
                          $fechaNacimiento = $personalResultado->getFechaNacimiento();
                        
                        
                        echo "<input type='text' class='form-control' placeholder='Nombre' value='$nombres'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        
                        ?>

                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <?php
                        
                        echo "<input type='text' class='form-control' placeholder='Apellido' value='$apellidos'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";

                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telefono</label>
                        
                        <?php
                        echo "<input type='number' class='form-control' placeholder='Telefono' min='1' pattern='^[0-9]+' disabled value='$telefono'>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cargo</label>
                      <?php
                        
                        echo "<input type='text' class='form-control' placeholder='Cargo' min='1' pattern='^[0-9]+' disabled value='$cargo'>";
                        
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                      <?php  
                          echo "<input type='text' class='form-control' placeholder='Genero' min='1' pattern='^[0-9]+' value='$genero' disabled>";
                      ?>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='Fecha de nacimiento' value='$fechaNacimiento' disabled>";
                        
                        ?>
                        </div>
                    </div>
                    </div>  
                  <div class="">
                  
                  <a type="submit" class="btn btn-danger" href="personal.php">Regresar</a>
                </div>     
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php

include ("layout/footer.php");

?>
