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
            <h1>Detalles del pago</h1>
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
                <h3 class="card-title">Información</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombre del cliente</label>
                        <?php  
                        
                        $pago = new Pago();
                        $id= $_REQUEST['id'];
                        $resultado = $pago->buscarPorId($id);
                        $nombreCliente = $resultado->getNombreCliente();
                        $nombreServicio = $resultado->getNombreServicio();
                        $descripcion = $resultado->getDescripcion();
                        $mes = $resultado->getMes();
                        $anio = $resultado->getAnio();
                        $total = $resultado->getTotal();
                        $fecha = $resultado->getFecha();
                        $hora = $resultado->getHora();
                        $nombreUsuario = $resultado->getNombreUsuario();

                        
                        //Imprimimos nombre
                        echo "<input type='text' class='form-control' placeholder='$nombreCliente'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Servicio facturado</label>
                        
                        <?php
                        //-----------------Imprimimos el nombre del servicio
                        echo "<input type='text' class='form-control' placeholder='$nombreServicio'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>"; 
                        
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Descripción del pago</label>
                      <?php  
                        //-----------Imprimimos el usuario
                        echo "<input type='text' class='form-control' placeholder='$descripcion' disabled>";
                      ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mes de pago</label>
                        
                        <?php
                        //------------Imprimimos el mes de pago

                        if($mes==1){
                        echo "<input type='text' class='form-control' placeholder='Enero'
                        required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==2){
                            echo "<input type='text' class='form-control' placeholder='Febrero'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==3){
                            echo "<input type='text' class='form-control' placeholder='Marzo'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==4){
                            echo "<input type='text' class='form-control' placeholder='Abril'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==5){
                            echo "<input type='text' class='form-control' placeholder='Mayo'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==6){
                            echo "<input type='text' class='form-control' placeholder='Junio'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==7){
                            echo "<input type='text' class='form-control' placeholder='Julio'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==8){
                            echo "<input type='text' class='form-control' placeholder='Agosto'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==9){
                            echo "<input type='text' class='form-control' placeholder='Septiembre'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==10){
                            echo "<input type='text' class='form-control' placeholder='Octubre'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==11){
                            echo "<input type='text' class='form-control' placeholder='Noviembre'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        if($mes==12){
                            echo "<input type='text' class='form-control' placeholder='Diciembre'
                            required autocomplete='off' onkeypress='return (event.charCode >= 65 && event.charCode <= 165)' min='1' disabled>";
                        }
                        
                        
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Año de pago</label>
                        <?php
                        echo "<input type='text' class='form-control' value='$anio' disabled>";
                        ?>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de pago</label>
                        <?php
                        echo "<input type='text' class='form-control' value='$fecha' disabled>";
                        ?>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Hora de pago</label>
                        <?php
                        echo "<input type='text' class='form-control' value='$hora' disabled>";
                        ?>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Personal remitente</label>
                        <?php
                        echo "<input type='text' class='form-control' value='$nombreUsuario' disabled>";
                        ?>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Total facturado (Q)</label>
                        <?php
                        echo "<input type='text' class='form-control' value='$total' disabled>";
                        ?>
                      </div>
                    </div>

                  </div>  
                  <div class="">
                  <a type="submit" class="btn btn-danger" href="pago.php">Regresar</a>
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