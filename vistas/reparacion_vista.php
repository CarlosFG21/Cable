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
            <h1>Editar Reparacion</h1>
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
                <form role="form">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cliente</label>
                        <?php
                        $reparacion = new Reparacion();
                        $id= $_REQUEST['id'];
                        $resultado = $reparacion->buscarPorId($id);

                        $nombre = $resultado->getNombreCliente();
                        $direccion = $resultado->getNombreDireccion();
                        $empleado =  $resultado->getNombrePersonal();
                        $descripcion = $resultado->getDescripcion();
                        $estado =  $resultado->getEstado();
                       echo " <input type='text' class='form-control' placeholder='$nombre'  disabled>";
                         ?>
                        </div>
                    </div>  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Direccion</label>
                        <?php
                       echo "<input type='text' placeholder='$direccion' class='form-control' disabled>"
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Empleado</label>
                        <?php
                        echo "<input type='text' placeholder='$empleado'class='form-control' disabled>"
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Descripcion</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$descripcion' disabled>"
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Proceso</label>
                        <?php
                        if($estado==0){
                          echo "<input type='text' class='form-control' placeholder='Atendida' disabled>";
                        }elseif($estado==1){
                          echo "<input type='text' class='form-control' placeholder='Ingresada' disabled>";
                        }elseif($estado==2){
                        echo "<input type='text' class='form-control' placeholder='En proceso' disabled>";
                        }
                        ?>
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <a type="submit" class="btn btn-danger" href="reparacion.php">Regresar</a>
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