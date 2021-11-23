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
                <h3 class="card-title">Ver</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>DPI</label>
                        <?php

                        $cliente = new Cliente();
                        $idvista = $_REQUEST['id'];
                        $resultado = $cliente->buscarPorId($idvista);

                        $dpi = $resultado->getDpi();
                        $nit = $resultado->getNit();
                        $nombre = $resultado->getNombres();
                        $apellido = $resultado->getApellidos();
                        $genero= $resultado->getGenero();
                        $telefono=$resultado->getTelefono();
                        $fecha=$resultado->getFechaNacimiento();

                       echo "<input type='text' class='form-control' placeholder='$dpi'  disabled>";
                      ?>
                        </div>
                    </div>  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NIT</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$nit'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$nombre'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$apellido'  disabled>";
                        ?>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$genero'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telefono</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$telefono'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$fecha'  disabled>";
                        ?>
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  
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