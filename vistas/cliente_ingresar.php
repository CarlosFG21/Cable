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
                        <label>DPI</label>
                        <input type="number" class="form-control" placeholder="DPI" min="1" pattern="^[0-9]+">
                      </div>
                    </div>  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NIT</label>
                        <input type="number" class="form-control" placeholder="NIT" min="1" pattern="^[0-9]+">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombre" 
                        required autocomplete="off" onkeypress="return (event.charCode >= 65 && event.charCode <= 165)" min="1">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" placeholder="Apellido"
                        required autocomplete="off" onkeypress="return (event.charCode >= 65 && event.charCode <= 165)" min="1">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control">
                          <option>Masculino</option>
                          <option>Femenino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="number" class="form-control" placeholder="Telefono" min="1" pattern="^[0-9]+" minlength="8" maxlength="8" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" placeholder="Fecha de nacimiento">
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <a type="submit" class="btn btn-primary" href="">Guardar</a>
                  <a type="submit" class="btn btn-danger" href="cliente.php">Regresar</a>
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