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
                    <th>Municipio</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Misc</td>
                    <td>IE Mobile</td>
                    <td>Windows Mobile 6</td>
                    <td> 
                    <a type="submit" class="btn btn-primary">
                    <i class="fas fa-pen"></i> 
                    </a>
                    <a type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> 
                    </a>
                    <a type="submit" class="btn bg-gradient-success">
                    <i class="fas fa-eye"></i> 
                    </a>
                  </td>
                  </tr>
                  <tr>
                    <td>Misc</td>
                    <td>PSP browser</td>
                    <td>PSP</td>
                    <td><a type="submit" href="usuario_editar.php" class="btn btn-primary">
                    <i class="fas fa-pen"></i> 
                    </a>
                    <a type="submit" href="usuario_eliminar.php"class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> 
                    </a>
                    <a type="submit" href="usuario_vista.php"class="btn bg-gradient-success">
                    <i class="fas fa-eye"></i> 
                    </a></td>
                  </tr>
                  <tr>
                    <td>Other browsers</td>
                    <td>All others</td>
                    <td>-</td>
                    <td><a type="submit" class="btn btn-primary">
                    <i class="fas fa-pen"></i> 
                    </a>
                    <a type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> 
                    </a>
                    <a type="submit" class="btn bg-gradient-success">
                    <i class="fas fa-eye"></i> 
                    </a></td>
                  </tr>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>ID</th>
                    <th>Municipio</th>
                    <th>Dirección</th>
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