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
            <h1>Personal</h1>
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
               if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'existepersonal'){
              ?>
              <div class="alert alert-danger alert-dismissible col-sm-6">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  El personal ya se encuentra registrado.
                </div>
                <?php
               }
                ?>
                <form role="form" method="post" action="../crud/ingresarPersonal.php">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" placeholder="Nombre" name='nombres' id='nombres'
                        required minlength="1" maxlength="50" pattern="^[a-zA-Záéíóú ]{1,30}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" placeholder="Apellido" name='apellidos' id='apellidos'
                        required minlength="1" maxlength="50" pattern="^[a-zA-Záéíóú ]{1,30}">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telefono</label>
                        <input type="number" class="form-control" placeholder="Telefono" minlength="1" maxlength="8" pattern="^[0-9]+" required name='telefono' id='telefono'>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cargo</label>
                        <select class="form-control" name='cargo' id='cargo'>
                          <option>Técnico</option>
                          <option>Asistente</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                        <select class="form-control" name='genero' id='genero'>
                          <option>Masculino</option>
                          <option>Femenino</option>
                        </select>
                      </div>
                    </div> 
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" placeholder="Fecha de nacimiento" id='fechaNacimiento' name='fechaNacimiento'>
                      </div>
                    </div>
                    </div>  
                  <div class="">
                  <a> <input type="submit" class="btn btn-primary"  value='Guardar' href="" id='btnGuardar' name='btnGuardar'></a>
                  <a type="submit" class="btn btn-danger" href="personal.php">Regresar</a>
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
        var telefono = $('#telefono').val();
        var cargo = $('#cargo').val();
        var genero = $('#genero').val();
        var fecha = $('#fechaNacimiento').val();

    });

});
</script>

<script>var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("fechaNacimiento")[0].setAttribute('max', today);</script>

