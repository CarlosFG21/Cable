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
                <h3 class="card-title">Editar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
              
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
                      ?>

              <form role="form" method="post" action="../crud/editarPersonal.php?id=<?php echo $idBusqueda;?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <label>Nombres</label>

                        <?php
                        echo "<input type='text' class='form-control' placeholder='Nombres'
                        required min='1' value='$nombres' name='nombres' id='nombres'>";
                      
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <?php
                        
                        echo "<input type='text' class='form-control' placeholder='Apellidos'
                        required min='1' value='$apellidos' name='apellidos' id='apellidos'>";
                        
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telefono</label>
                      <?php
                        echo "<input type='number' class='form-control' placeholder='Telefono' min='1' pattern='^[0-9]+' value='$telefono' required name='telefono' id='telefono'>";
                      ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cargo</label>
                        <select class="form-control" name="cargo" id="cargo">
                          
                          <?php
                          if(strcmp($cargo,"Técnico")===0){
                          echo "<option>Técnico</option>";
                          echo "<option>Asistente</option>";
                          }else{
                            echo "<option>Asistente</option>";
                            echo "<option>Técnico</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control" name="genero" id="genero">
                          
                        <?php
                          if(strcmp($genero,"Masculino")===0){
                          echo "<option>Masculino</option>";
                          echo "<option>Femenino</option>";
                          }else{
                            echo "<option>Femenino</option>";
                            echo "<option>Masculino</option>";
                          }
                        
                        ?>
                          </select>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        
                        <?php
                        echo "<input type='date' class='form-control' placeholder='Fecha de nacimiento' value='$fechaNacimiento' required id='fechaNacimiento' name='fechaNacimiento'>";
                        ?>
                        </div>
                    </div>
                    </div>  
                  <div class="">
                  <a><input type="submit" class="btn btn-primary" href="" value="Editar" name="btnEditar" id="btnEditar"></a>
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
