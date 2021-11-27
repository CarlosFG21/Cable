<?php

include ("layout/header.php");

?>

<title>Cablevision | Robles</title>


<?php

include ("layout/nav.php");

?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="../js/script_selector.js"></script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Servicios</h1>
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
                <h3 class="card-title">Buscar un usuario</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                  
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IDENTIFICADOR</label>
                        <?php
                        
                        $idMostrar = 1;
                        echo "<input type='text' class='form-control' placeholder='$idMostrar'  disabled>";
                        ?>
                      </div>
                    </div>

                    <script>
                      $(document).ready(function() {
                           $('.js-example-basic-single').select2();
                      });

                    </script>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <select class="js-example-basic-single" name="state">
  <option value="AL">Alabama</option>
    
  <option value="WY">Wyoming</option>
</select>
                      </div>
                    </div>
                  
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>DPI</label>
                        <?php

                        $cliente = new Cliente();
                        $idvista = 1;
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