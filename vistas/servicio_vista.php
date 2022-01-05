<?php


include("layout/header.php");

?>

<?php

include("layout/nav.php");

?>

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
                <h3 class="card-title">Vista</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="post" action="">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dirección</label>
                        <?php
                        $detalle = new DetalleServicio();
                        $id= $_REQUEST['id'];
                        $resultado = $detalle->buscarPorId($id);

                        $direccion = $resultado->getNombreDireccion();
                        $servicio = $resultado->getNombreServicio();
                        $fecha = $resultado->getFecha();
                        $estado= $resultado->getEstado();
                        echo "<input type='text' class='form-control' placeholder='$direccion' name='dirección' id='dirección'
                        pattern='^[a-zA-Záéíóú ]{1,30}' required minlength='1' maxlength='50' disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tipo de servicio</label>
                        <?php
                        echo "<input type='number' class='form-control' placeholder='$servicio' name='tipo' id='tipo'
                        pattern='^[0-9]{1,30}' required minlength='1' maxlength='50' disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de contratación</label>
                        <?php
                        echo "
                        <input type='text' class='form-control' placeholder='$fecha' name='fecha' id='fecha'
                        pattern='^[a-zA-Záéíóú ]{1,30}' required minlength='1' maxlength='50' disabled >";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Estado</label>
                        <?php
                        if($estado==1){
                        echo "
                        <input type='text' class='form-control' placeholder='Activo' name='estado' id='estado'
                        pattern='^[a-zA-Záéíóú ]{1,30}' required minlength='1' maxlength='50' disabled>";
                        }else{
                          echo "
                          <input type='text' class='form-control' placeholder='Inactivo' name='estado' id='estado'
                          pattern='^[a-zA-Záéíóú ]{1,30}' required minlength='1' maxlength='50' disabled>";
                        }
                        ?>
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <!--<input type="submit" class="btn btn-primary" value="Guardar" name="btnGuardar" id="btnGuardar">-->
                  <a type="submit" class="btn btn-danger" href="servicio.php">Regresar</a>
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

        <div class="card">
  <div class="card-header">
    Ubicación en el mapa
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>¡La ubicación GPS presentada a continuación puede variar su precisión en intérvalos de 1 a 10 metros!.</p>
      <div id="mapa">
                            
      </div>
     
      <div id="coordenadas">
      <?php      

      $idDireccionBuscar = $resultado->getIdDireccion();

      $dir = new Direccion();
      $resDir = $dir->buscarPorId($idDireccionBuscar);
      $latitud = $resDir->getLatitud();
      $longitud = $resDir->getLongitud();
      
      echo "<a type='submit' class='btn btn-danger' href='https://maps.google.com/?q=$latitud,$longitud' target='_blank'>Abrir en Google Maps</a>";
    echo "<br>";
    echo "<br>";
      
      echo "<div class='embed-responsive embed-responsive-16by9'>
      <iframe class='embed-responsive-item' src='http://maps.google.com/maps?q=$latitud,$longitud&z=15&output=embed' allowfullscreen></iframe>
      </div>";

  ?>

      </div>   

       </blockquote>
  </div>
</div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



<?php

include("layout/footer.php");


?>