<?php
   include("../clases/Cliente.php");
   include("../db/Conexion.php");
   include("../clases/DetalleServicio.php");
                   
?>

<!--CARGAMOS LA TABLA CON RESULTADOS DE DETALLES DE SERVICIOS-->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        
        <?php
            $detalleServicioContar = new DetalleServicio();
            $idConteo = $_REQUEST['id'];
            $res = $detalleServicioContar->obtenerDetallesServiciosPorCliente($idConteo);
            $tamano = sizeof($res);
            echo "<h1>Servicios contratados: $tamano</h1>";
        ?>
        
          
          
        
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
              
              <?php
               $idClienteNuevoServicio = $_REQUEST['id'];
          
                 echo "<a type='submit' class='btn btn-primary' href='detalle_servicio_ingresar.php?id=$idClienteNuevoServicio'>Agregar servicio</a>";
             
             ?>    
             
             <a type="submit" class="btn btn-primary" href="#" target="_blank">Reporte</a>
              </div>

            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Nombre del servicio</th>
                    <th>Fecha de contratación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $detalleServicio = new DetalleServicio();
                  $idClienteBuscar = $_REQUEST['id'];
                  //$idClienteBuscar = 1;
                  $servicioArray = $detalleServicio->obtenerDetallesServiciosPorCliente($idClienteBuscar);

                  for($i=0; $i<sizeof($servicioArray); $i++){

                    $id =  $servicioArray[$i]->getIdDetalleServicio();
                    $idDireccion = $servicioArray[$i]->getIdDireccion();
                    $direccion = $servicioArray[$i]->getNombreDireccion();
                    $idServicio = $servicioArray[$i]->getIdServicio();
                    $nombreServicio = $servicioArray[$i]->getNombreServicio();
                    $fecha = $servicioArray[$i]->getFecha();
                    $estado = $servicioArray[$i]->getEstado();


                    echo "<tr>";

                    echo "
                        <td>$id</td>
                        <td>$direccion</td>
                        <td>$nombreServicio</td>
                        <td>$fecha</td>
                        
                    
                    ";

                    if($estado==1){
                      echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                    }else{
                      echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                    }

                    echo "<td><a type='submit' href='detalle_servicio_editar.php?id=$id&idDireccion=$idDireccion&idServicio=$idServicio&idCliente=$idClienteBuscar' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminar' href='../crud/eliminarPlan.php?id=$id'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivar' href='../crud/reactivarPlan.php?id=$id'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='plan_vista.php?id=$id'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";



                    echo "</tr>";

                  }

                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Dirección</th>
                    <th>Nombre del servicio</th>
                    <th>Fecha de contratación</th>
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

