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
              <?php
               if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'existecliente'){
              ?>
              <div class="alert alert-danger alert-dismissible col-sm-6">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  El cliente ya existe.
                </div>
                <?php
               }
                ?>
                <form role="form" method="post" action="../crud/ingresarCliente.php">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>DPI</label>
                        <input type="text" class="form-control" placeholder="DPI" minlength="13" maxlength="13" pattern="^[a-zA-Záéíóú0-9 ]{1,30}" name="dpi" id="dpi" required>
                      </div>
                    </div>  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NIT</label>
                        <input type="text" class="form-control" placeholder="NIT" minlength="9" maxlength="9" pattern="^[a-zA-Záéíóú0-9 ]{1,30}" name="nit" id="nit" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombre" 
                        minlength="1"  maxlength="50" pattern="^[a-zA-Záéíóú ]{1,30}" name="nombre" id="nombre" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" placeholder="Apellido"
                        minlength="1"  maxlength="50" pattern="^[a-zA-Záéíóú ]{1,30}" name="apellido" id="apellido" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control" name="genero" id="genero">
                          <option>Masculino</option>
                          <option>Femenino</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="number" class="form-control" placeholder="Telefono" min="1" pattern="^[0-9]+" minlength="8" maxlength="8" name="telefono" id="telefono" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" placeholder="Fecha de nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" required>
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
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

<script type="text/javascript">
$(function() {
    $('#btnGuardar').click(function() {

        var valid = this.form.checkValidity();
        if (valid) {
          alert('!Desea guardar los datos');
   
        } else {
            alert('Debe de rellenar los campos o coincidir con el formato indicado');
        }

        var nombre = $('#nombres').val();
        var apellido = $('#apellidos').val();
        var dpi = $('#dpi').val();
        var nit = $('#nit').val();
        var genero = $('#genero').val();
        var fecha = $('#fechaNacimiento').val();

    });

});
</script>

<script>var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("fecha_nacimiento")[0].setAttribute('max', today);</script>