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
                <h3 class="card-title">Editar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
              $servicio = new Servicio();

              $id = $_REQUEST['id'];
              $resultado = $servicio->buscarPorId($id);

              $tipo = $resultado->getNombre();
              $precio = $resultado->getPrecio();

              ?>
                <form role="form" method="post" action="../crud/editarPlan.php?id=<?php echo $id;?>">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tipo</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='tipo' value='$tipo' name='tipo' id='tipo'
                        minlength='1' maxlength='50' pattern='^[a-zA-Záéíóú ]{1,30}' required>"
                        ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Precio</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='Precio' value='$precio' name='precio' id='precio'
                        min='1'  pattern='^[0-9]+' required>"
                         ?>
                        </div>
                    </div>
                  </div>  
                  <div class="">
                  <input type="submit" class="btn btn-primary" value="Editar" name="btnEditar" id="btnEditar">
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
    $('#btnEditar').click(function() {

        var valid = this.form.checkValidity();
        if (valid) {
          alert('!Desea editar los datos');
   
        } else {
            alert('Debe de rellenar los campos o coincidir con el formato indicado');
        }

        var tipo = $('#tipo').val();
        var precio = $('#precio').val();
        

    });

});
</script>