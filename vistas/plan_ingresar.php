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
               if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'existeplan'){
              ?>
              <div class="alert alert-danger alert-dismissible col-sm-6">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alerta!</h5>
                  El plan ya existe.
                </div>
                <?php
               }
                ?>
                <form role="form" method="post" action="../crud/ingresarPlan.php">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tipo</label>
                        <input type="text" class="form-control" placeholder="Tipo" name="tipo" id="tipo"
                        pattern="^[a-zA-Záéíóú ]{1,30}" required minlength="1" maxlength="50" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Precio</label>
                        <input type="number" class="form-control" placeholder="Precio" name="precio" id="precio"
                        pattern="^[0-9]{1,30}" required minlength="1" maxlength="50">
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <input type="submit" class="btn btn-primary" value="Guardar" name="btnGuardar" id="btnGuardar">
                  <a type="submit" class="btn btn-danger" href="plan.php">Regresar</a>
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

        var nombre = $('#tipo').val();
        var apellido = $('#precio').val();
        

    });

});
</script>