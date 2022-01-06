<?php

include ("layout/header.php");
//Reiniciamos variable de sesión de pago
if(isset($_SESSION['pagoArray'])){
  unset($_SESSION['pagoArray']);
}

?>
  <title>Cablevisión | Robles</title>
  <!-- Tell the browser to be responsive to screen width -->
 
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
                <h3 class="card-title">Ingresar pago</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="post" action="#" id="form">
                  <div class="row">
                    
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Buscar y seleccionar cliente</label>
                        <select class="form-control selectCliente" id="lista2" name="lista2">
                        <option value="0">Seleccionar cliente</option>
                          <?php
                            $cliente = new Cliente();
            
                            $resultado = $cliente->obtenerClientes();

                            for($i=0; $i<sizeof($resultado);$i++){
                                $idCliente = $resultado[$i]->getIdCliente();
                                $dpiCliente = $resultado[$i]->getDpi();
                                $nombreCliente = "[" . $dpiCliente . "] " . "[" . $resultado[$i]->getNombres() . " " . $resultado[$i]->getApellidos() . "]";

                                echo "<option value='$idCliente'>$nombreCliente</option>";
                            }

                            
                            
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    
                  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <div id="camposDesplegados">
                        <!--Aquí se cargarán los campos a rellenar-->
                        
                        
                       </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Costo del servicio (Q)</label>
                        <input type="number" step="0.01" class="form-control" placeholder="Costo del servicio (Q)" name="total" id="total"
                         min="1">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" class="form-control" placeholder="Descripción" name="descripcion" id="descripcion"
                         min="1">
                      </div>
                    </div>


                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Mes de pago</label>
                        <select class="form-control" name="mes" id="mes">
                          <option value="1">Enero</option>
                          <option value="2">Febrero</option>
                          <option value="3">Marzo</option>
                          <option value="4">Abril</option>
                          <option value="5">Mayo</option>
                          <option value="6">Junio</option>
                          <option value="7">Julio</option>
                          <option value="8">Agosto</option>
                          <option value="9">Septiembre</option>
                          <option value="10">Octubre</option>
                          <option value="11">Noviembre</option>
                          <option value="12">Diciembre</option>
                        </select>
                      </div>
                    </div>

                   <?php
                    $Date = date("d-m-Y");  
                    $year = date("Y");


                    echo "<div class='col-sm-6'>
                    
                    <div class='form-group'>
                      <label>Seleccione el año de pago</label>
                      <select class='form-control' name='anio' id='anio'>";
                      

                        for($i=$year;$i>=1990;$i--) { 
                          echo "<option value='".$i."'>".$i."</option>";
                        }
                        
                    echo "</select>";
                    echo "</div>";
                    echo "</div>";


                   ?>

                  </div>  

                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Tipo de documento</label>
                        <select class="form-control" name="tipo_documento" id="tipo_documento">
                          <option>Factura</option>
                          <option>Recibo</option>
                        </select>
                      </div>
                    </div>

                  <div class="">
                  <a type="submit" class="btn btn-danger" href="pago.php">Regresar</a>
                 <input type="button" value="Agregar detalle de pago" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
                  <input type="submit" value="Ingresar pago" class="btn btn-primary" name="btnPago" id="btnPago" onclick="window.open('../crud/ingresarPago.php')">
                  
                 
                 
                  
                </div>     
                </form>
              </div>
             
             
              <div id ="divTablaPagos">

              

                        <!-- /.card-header -->
              <div id="tablaresultados"> 
              
             
              <div class="card-body">
             
              
                <table id="example1" class="table table-bordered table-striped">
                 
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Servicio</th>
                    <th>Mes de pago</th>
                    <th>Año de pago</th>
                    <th>Total</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                  <?php
                    echo "<tr>";
                    echo "</tr>";
                  
                  ?>


                </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Servicio</th>
                    <th>Mes de pago</th>
                    <th>Año de pago</th>
                    <th>Total</th>
                   
                    
                  </tr>
                  </tfoot>
                 
                </table>
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
      $('.selectCliente').select2()

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
        
       
        $.ajax({
            type:"POST",
            url:"cargarCamposIngresarPago.php?id=" + $ ('#lista2').val() ,
            //data:"id="+ $ ('#lista1').val(),
            success:function(r){
                $('#camposDesplegados').html(r);
            }
        
        });
    
    }

    //----------------Función para agregar pagos a tabla

    function agregarPagoTabla(){
        
        $.ajax({
            type:"POST",
            url:"agregarPagoTabla.php",
            data:$("#form").serialize(),
            success:function(r){
                $('#divTablaPagos').html(r);
            }
        
        });
    
    }

</script>

<script type="text/javascript">
    $(document).ready(function(){
    
        //recargarLista();

        $('#lista2').change(function(){
         recargarLista();
         var Table = document.getElementById("example1");
         Table.innerHTML = "";
        });

        $('#btnGuardar').click(function(){

          agregarPagoTabla();

        });

       

    });
</script>

