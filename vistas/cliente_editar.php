<?php

include ("layout/header.php");

?>

<title>Cablevision | Robles</title>


<?php

include ("layout/nav.php");

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Clientes</h1>
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
                        $cliente = new Cliente();
                        $ideditar= $_REQUEST['id'];
                        $resultado =  $cliente->buscarPorId($ideditar);
                        
                        $dpi = $resultado->getDpi();
                        $nit = $resultado->getNit();
                        $nombre =  $resultado->getNombres();
                        $apellido = $resultado->getApellidos();
                        $genero = $resultado->getGenero();
                        $telefono = $resultado->getTelefono();
                        $fecha = $resultado->getFechaNacimiento();

                        
                        ?>
                <form role="form" method="post" action="../crud/editarCliente.php?id=<?php echo $ideditar;?>">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>DPI</label>
                        <?php
                        echo "<input type='number' class='form-control' placeholder='DPI' value='$dpi' min='1' pattern='^[0-9]+' name='dpi' id='dpi'> ";
                        ?>
                        </div>
                    </div>  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NIT</label>
                        <?php
                        echo "<input type='number' class='form-control' placeholder='NIT' value='$nit' min='1' pattern='^[0-9]+' name='nit' id='nit'>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <?php
                       echo " <input type='text' class='form-control' placeholder='Nombre' value='$nombre' name='nombre' id='nombre'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1'>";
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <?php
                       echo " <input type='text' class='form-control' placeholder='Apellido' value='$apellido' name='apellido' id='apellido'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1'>";
                      ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control" name="genero" id="genero">
                          <?php 
                          if(strcmp($genero, "Masculino") === 0){
                            echo "<option>Masculino</option>";
                            echo "<option>Femenino</option>";
                            }
  
                            if(strcmp($genero, "Femenino") === 0){
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
                        <label>Telefono</label>
                        <?php
                        echo "<input type='number' class='form-control' value='$telefono' placeholder='Telefono' min='1' pattern='^[0-9]+' minlength='8' maxlength='8' required name='telefono' id='telefono'>";
                         ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <?php
                        echo "<input type='date' class='form-control' value='$fecha' placeholder='Fecha de nacimiento' name='fecha' id='fecha'>";
                        ?>
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">
                  <a type="submit" class="btn btn-danger" href="cliente.php">Regresar</a>
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