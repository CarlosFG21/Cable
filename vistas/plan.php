<?php

include ("layout/header.php");

?>


<?php

include ("layout/nav.php");

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Plan</h1>
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
              <a type="submit" class="btn btn-primary" href="plan_ingresar.php">Ingresar plan</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $servicio = new Servicio();
                  $servicioArray = $servicio->obtenerServicios();

                  for($i=0; $i<sizeof($servicioArray); $i++){

                    $id =  $servicioArray[$i]->getIdServicio();
                    $tipo = $servicioArray[$i]->getNombre();
                    $precio = $servicioArray[$i]->getPrecio();
                    $estado = $servicioArray[$i]->getEstado();

                    echo "<tr>";

                    echo "
                        <td>$id</td>
                        <td>$tipo</td>
                        <td>$precio</td>
                        
                    
                    ";

                    if($estado==1){
                      echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                    }else{
                      echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                    }

                    echo "<td><a type='submit' href='plan_editar.php?id=$id' class='btn btn-primary'>
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
                    <th>Tipo</th>
                    <th>Precio</th>
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