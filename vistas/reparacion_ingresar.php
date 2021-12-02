

<?php

include ("layout/header.php");

?>

<title>Cablevision | Robles</title>

<?php

include ("layout/nav.php");

?>

<?php
  
$conexion = new Conexion();
//Conectamos a la base de datos
$conexion->conectar();

  $sql = "select id_cliente, CONCAT(nombres,' ',apellidos) FROM cliente ORDER BY nombres ASC";
  $ejecutar = mysqli_query($conexion->db, $sql);

  //cargar ultimo ID de direccion


?>

<?php
  
$conexion = new Conexion();
//Conectamos a la base de datos
$conexion->conectar();

  $sql2 = "select id_personal, CONCAT(nombres,' ',apellidos) FROM personal ORDER BY nombres ASC";
  $ejecutar2 = mysqli_query($conexion->db, $sql2);

  //cargar ultimo ID de direccion


?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ingresar Reparacion</h1>
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
                <form role="form" method="post" action="../crud/ingresarReparacion.php">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control select2" name="cbCliente" id="cbCliente">
                        <option value="" disabled="disabled" selected>Seleccione un cliente</option>
                        <?php
                         while($row = mysqli_fetch_array($ejecutar)){

        

                        ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                        <?php }  ?>
                        </select>
                      </div>
                    </div>  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Direccion</label>
                        <select class="form-control" name="cbDireccion" id="cbDireccion">
                          <option value="" disabled="disabled" selected>Seleccione una direccion</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Empleado</label>
                        <select class="form-control select2" name="cbEmpleado" id="cbEmpleado">
                        <option value="" disabled="disabled" selected>Seleccione un empleado</option>
                        <?php
                        while($row2 = mysqli_fetch_array($ejecutar2)){

                       ?>
                       <option value="<?php echo $row2[0]; ?>"><?php echo $row2[1]; ?></option>
                       <?php }  ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" placeholder="Descripcion" min="1" name="descripcion" id="descripcion" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                      <input id="txtId" type="hidden" name="txtId" type="text" class="form-control" placeholder="" value="0"  >
                      </div>
                    </div>
                  </div>  
                  <div class="">
                  <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardarR" id="btnGuardarR">
                  <a type="submit" class="btn btn-danger" href="reparacion.php">Regresar</a>
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

 <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });
    </script>

<script>
     $(document).ready(function(){
    $("#cbCliente").change(function () { 	

        document.getElementById("txtId").value = "";
   
        $("#cbCliente option:selected").each(function () {
            id_cliente = $(this).val();
            
            $.post("../crud/getDireccion.php", { id_cliente: id_cliente }, function(data){
                $("#cbDireccion").html(data);
            });            
        });
    })
});


</script>

<script>
     $(document).ready(function(){
    $("#cbDireccion").change(function () { 	

       var index =  document.getElementById("cbDireccion").selectedIndex;

        if (index == 0){
            document.getElementById("txtId").value = "";

        }

       
        	
       
    })
});


</script>

<script src="../js/evento.js"></script>

