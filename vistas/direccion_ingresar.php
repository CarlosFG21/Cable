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
            <h1>Direcciones</h1>
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
                <h3 class="card-title">Ingresar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Municipio</label>
                        <input type="text" class="form-control" placeholder="Gualan"
                        required autocomplete="off" onkeypress="return (event.charCode >= 65 && event.charCode <= 165)" min="1" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Direccion"
                        required autocomplete="off" onkeypress="return (event.charCode >= 65 && event.charCode <= 165)" min="1">
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <a type="submit" class="btn btn-primary" href="">Guardar</a>
                  <a type="submit" class="btn btn-danger" href="direccion.php">Regresar</a>
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