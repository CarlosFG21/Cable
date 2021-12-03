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
            <h1>Pagos</h1>
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
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
              <a type="submit" class="btn btn-primary" href="pago_ingresar.php">Ingresar pago</a>
              <a type="submit" class="btn btn-primary" target="_blank" href="../reportes/reporte_usuario.php">Reporte</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Cliente</th>
                    <th>Mes de pago</th>
                    <th>Año de pago</th>
                    <th>Total</th>
                    <th>Fecha de pago</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $pago = new Pago();
                $pagoArray = $pago->obtenerPagos();
                
                for($i=0; $i<sizeof($pagoArray);$i++){
                  echo "<tr>";

                  $idPago = $pagoArray[$i]->getIdPago();
                  $nombreServicio = $pagoArray[$i]->getNombreServicio();
                  $nombreCliente = $pagoArray[$i]->getNombreCliente();
                  $mesPago = $pagoArray[$i]->getMes();
                  $anioPago = $pagoArray[$i]->getAnio();
                  $total = $pagoArray[$i]->getTotal();
                  $fechaPago = $pagoArray[$i]->getFecha();
                  $estado = $pagoArray[$i]->getEstado();

                  //Imprimimos datos
                  echo "
                    
                    <td>$idPago</td>
                    <td>$nombreServicio</td>
                    <td>$nombreCliente</td>";
                    
                    if($mesPago==1){
                    echo "<td>Enero</td>";
                    }
                    if($mesPago==2){
                      echo "<td>Febrero</td>";
                    }
                    if($mesPago==3){
                      echo "<td>Marzo</td>";
                    }
                    if($mesPago==4){
                      echo "<td>Abril</td>";
                    }
                    if($mesPago==5){
                      echo "<td>Mayo</td>";
                    }
                    if($mesPago==6){
                      echo "<td>Junio</td>";
                    }
                    if($mesPago==7){
                      echo "<td>Julio</td>";
                    }
                    if($mesPago==8){
                      echo "<td>Agosto</td>";
                    }
                    if($mesPago==9){
                      echo "<td>Septiembre</td>";
                    }
                    if($mesPago==10){
                      echo "<td>Octubre</td>";
                    }
                    if($mesPago==11){
                      echo "<td>Noviembre</td>";
                    }
                    if($mesPago==12){
                      echo "<td>Diciembre</td>";
                    }
                   
                   
                    echo "<td>$anioPago</td>
                    <td>$total</td>
                    <td>$fechaPago</td>";
                    

                  //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-success'>Pagado</span></h4></td>";
                  }else{
                    echo "<td><h4><span class='badge bg-danger'>Anulado</span></h4></td>";
                  }

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='pago_editar.php?id=$idPago' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarPago' href='../crud/eliminarPago.php?id=$idPago'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivarPago' href='../crud/reactivarPago.php?id=$idPago'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='pago_vista.php?id=$idPago'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";
                  
                  echo "</tr>";
                }
                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Cliente</th>
                    <th>Mes de pago</th>
                    <th>Año de pago</th>
                    <th>Total</th>
                    <th>Fecha de pago</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php

include ("layout/footer.php");

?>