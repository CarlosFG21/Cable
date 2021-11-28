<?php

include ("layout/header.php");

?>

<title>Cablevision | Robles</title>


<?php

include ("layout/nav.php");

?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Servicios</h1>
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
                <h3 class="card-title">Buscar un cliente</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form">
                 
                <div class="row">
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Cliente</label>
                        <select class="form-control select2" id="lista1" name="lista1">
                          
                          <?php
                            $datosCliente = new Cliente();

                            $resultado = $datosCliente->obtenerClientes();

                            for($i=0; $i<sizeof($resultado);$i++){

                              $idConsultado = $resultado[$i]->getIdCliente();
                              $nombres = $resultado[$i]->getNombres();
                              $apellidos = $resultado[$i]->getApellidos();
                              $dpi = $resultado[$i]->getDpi();
                              //echo "<option value='$idConsultado'>$nombres". " " . $apellidos . "</option>";

                              echo "<option value='$idConsultado'>" ."[" . $dpi . "] " . "[". $nombres . " " . $apellidos . "]". "</option>";
                              
                            }

                            
                          ?>
                          
                        </select>
                      </div>
                    </div>  
                  
                  <div id="select2lista" class="row"> 
                  <!--Aquí se recargan los datos del cliente-->                    
                  
                            
                </div>
                  
                  </div> 
                  
                  <a type="submit" class="btn btn-danger" href="servicio.php">Regresar</a>
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

         
  <div id="serviciosCliente"> 
                  <!--Aquí se recargan los datos del cliente-->                    
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

    /*$( ".select2" ).change(function() {
     //Aquí cargamos el usuario
    });*/
    </script>

<script type="text/javascript">

    function recargarLista(){
        
        //------------Para cargar los datos del cliente seleccionado
        $.ajax({
            type:"POST",
            url:"cargarClienteServicio.php?id=" + $ ('#lista1').val() ,
            //data:"id="+ $ ('#lista1').val(),
            success:function(r){
                $('#select2lista').html(r);
            }
        
        });

        //Para cargar la tabla de los servicios contratados
        $.ajax({
            type:"POST",
            url:"cargarServiciosCliente.php?id=" + $ ('#lista1').val() ,
            //data:"id="+ $ ('#lista1').val(),
            success:function(r){
                $('#serviciosCliente').html(r);
            }
        
        });
    
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){
    
        //recargarLista();

        $('#lista1').change(function(){
         recargarLista();
        });

    });
</script>

