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
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
              <a type="submit" class="btn btn-primary" href="cliente_ingresar.php">Ingresar cliente</a>
              <a type="submit" class="btn btn-primary" href="../reportes/reporte_cliente.php" target="_blank">Reporte</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nit</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Mensaje</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php

                    $client = new Cliente();
                    $clientArray = $client->obtenerClientes();

                    for($i=0; $i<sizeof($clientArray); $i++){

                      echo "<tr>";

                      $id = $clientArray[$i]->getIdCliente();
                      $nit = $clientArray[$i]->getNit();
                      $nombre = $clientArray[$i]->getNombres();
                      $apellido = $clientArray[$i]->getApellidos();
                      $telefono = $clientArray[$i]->getTelefono();
                      $fecha = $clientArray[$i]->getFechaNacimiento(); 
                      $estado = $clientArray[$i]->getEstado();

                      echo "
                      
                         <td>$id</td>
                         <td>$nit</td>
                         <td>$nombre</td>
                         <td>$apellido</td>
                         <td>$telefono</td>
                         

                      ";

                      $time = strtotime($fecha);
                      if(date('m-d')==date('m-d',$time)){
                        echo "<td><span class='badge bg-primary'>Cumpliendo años</span></td>";
                      }else{
                        echo "<td><span class='badge bg-warning'>No cumpliendo años</span></td>";
                      }

                      if($estado==1){
                        echo "<td><h4><span class='badge bg-success'>Activo</span></h4></td>";
                      }else{
                        echo "<td><h4><span class='badge bg-danger'>Inactivo</span></h4></td>";
                      }

                      echo "<td><a type='submit' href='cliente_editar.php?id=$id' class='btn btn-primary'>
                      <i class='fas fa-pen'></i> 
                      </a>";

                      if($estado==1){
                        echo"<a type='submit' class='btn btn-danger' id='btnEliminar' href='../crud/eliminarCliente.php?id=$id'>
                        <i class='fas fa-trash-alt'></i>
                        </a>"; 
                        }else{
                          
                          echo"<a type='submit' class='btn btn-warning' id='btnReactivar' href='../crud/reactivarCliente.php?id=$id'>
                        <i class='fa fa-arrow-left'></i>
                        </a>"; 
                        }

                        echo"<a type='submit' href='cliente_vista.php?id=$id'class='btn bg-gradient-success'>
                        <i class='fas fa-eye'></i> 
                        </a></td>";
                      

                      echo "</tr>";

                    }

                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                  <th>Nit</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Telefono</th>
                  <th>Mensaje</th>
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