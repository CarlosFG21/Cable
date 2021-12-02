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
            <h1>Reparaciones</h1>
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
              <a type="submit" class="btn btn-primary" href="reparacion_ingresar.php">Ingresar Reparcion</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Dirección</th>
                    <th>Tecnico</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                 
                <?php
                
                $reparacion = new Reparacion();
                $reparacionArray = $reparacion->obtenerReparaciones();
                
                for($i=0; $i<sizeof($reparacionArray);$i++){
                  echo "<tr>";

                  $id = $reparacionArray[$i]->getIdReparacion();
                  $cliente = $reparacionArray[$i]->getNombreCliente();
                  $direccion = $reparacionArray[$i]->getNombreDireccion();
                  $tecnico = $reparacionArray[$i]->getNombrePersonal();
                  $descripcion = $reparacionArray[$i]->getDescripcion();
                  $estado = $reparacionArray[$i]->getEstado();
                  

                  //Imprimimos datos
                  echo "
                    
                    <td>$id</td>
                    <td>$cliente</td>
                    <td>$direccion</td>
                    <td>$tecnico</td>
                    <td>$descripcion</td>";
                   //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-warning'>Ingresado</span></h4></td>";
                  }elseif($estado==2){
                    echo "<td><h4><span class='badge bg-primary'>En proceso</span></h4></td>";
                  }elseif($estado==3){
                    echo "<td><h4><span class='badge bg-success'>Atendida</span></h4></td>";
                  }
   
                  //Imprimimos botones

                    echo "<td><a type='submit' href='reparacion_vista.php?id=$id' class='btn btn-success'>
                    <i class='fas fa-eye'></i> 
                    </a>";

                    if($estado==3){
                      echo"<a type='submit' class='btn btn-danger' id='btnBaja' href='../crud/darBaja.php?id=$id'>
                      <i class='fas fa-trash-alt'></i>
                      </a>";
                    }elseif($estado==1){
                      echo"<a type='submit' class='btn bg-warning' id='btnProceso' href='../crud/procesoReparacion.php?id=$id'>
                      <i class='fa fa-arrow-right'></i>
                      </a>"; 
                      }elseif($estado==2){
                        //Imprimimo botón de reactivar
                        echo"<a type='submit' class='btn bg-primary' id='btnAtendida' href='../crud/atendidaReparacion.php?id=$id'>
                      <i class='fa fa-arrow-right'></i>
                      </a>"; 
                      }
                    
                  
                  echo "</tr>";
                }
                  ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Cliente</th>
                    <th>Dirección</th>
                    <th>Tecnico</th>
                    <th>Descripcion</th>
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