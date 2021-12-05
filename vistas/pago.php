<?php

include ("layout/header.php");

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
            <h1>Pagos</h1>
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
              <a type="submit" class="btn btn-primary" href="pago_ingresar.php">Ingresar pago</a>
              <br>
              <br>
              <h4>Búsqueda</h4>
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
                        <label>Filtro de búsqueda</label>
                        <select class="form-control" name="filtro" id="filtro">
                          <option value="0">Todos los registros hasta la fecha</option>
                          <option value="1">Por cliente</option>
                          <option value="2">Por rango de fechas</option>
                          <option value="3">Por cliente y rango de fechas</option>
                        </select>
                      </div>
                    </div>

                    
              
              <input type="date" class="btn btn-warning" placeholder="Desde" name="desde" id="desde">
              <input type="date" class="btn btn-warning" placeholder="Hasta" name="hasta" id="hasta">
              
              <input type="button" class="btn btn-primary" value="Generar" id="btnGenerar" name="btnGenerar">
              
            
            </div>
            
              <!-- /.card-header -->
              <div id="tablaresultados"> 
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                 
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Cliente</th>
                    <th>Mes de pago</th>
                    <th>Año de pago</th>
                    <th>Total</th>
                    <th>Fecha de pago</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                <?php
                
                $pago = new Pago();
                $pagoArray = $pago->obtenerPagos();
                
                for($i=0; $i<sizeof($pagoArray);$i++){
                  echo "<tr>";

                  $idPago = $pagoArray[$i]->getIdPago();
                  $nombreServicio = $pagoArray[$i]->getNombreServicio();
                  $nombreCliente = $pagoArray[$i]->getNombreCliente();
                  $mesPago = $pagoArray[$i]->getMes();
                  $anioPago = $pagoArray[$i]->getAnio();
                  $total = $pagoArray[$i]->getTotal();
                  $fechaPago = $pagoArray[$i]->getFecha();
                  $estado = $pagoArray[$i]->getEstado();

                  //Imprimimos datos
                  echo "
                    
                    <td>$idPago</td>
                    <td>$nombreServicio</td>
                    <td>$nombreCliente</td>";
                    
                    if($mesPago==1){
                    echo "<td>Enero</td>";
                    }
                    if($mesPago==2){
                      echo "<td>Febrero</td>";
                    }
                    if($mesPago==3){
                      echo "<td>Marzo</td>";
                    }
                    if($mesPago==4){
                      echo "<td>Abril</td>";
                    }
                    if($mesPago==5){
                      echo "<td>Mayo</td>";
                    }
                    if($mesPago==6){
                      echo "<td>Junio</td>";
                    }
                    if($mesPago==7){
                      echo "<td>Julio</td>";
                    }
                    if($mesPago==8){
                      echo "<td>Agosto</td>";
                    }
                    if($mesPago==9){
                      echo "<td>Septiembre</td>";
                    }
                    if($mesPago==10){
                      echo "<td>Octubre</td>";
                    }
                    if($mesPago==11){
                      echo "<td>Noviembre</td>";
                    }
                    if($mesPago==12){
                      echo "<td>Diciembre</td>";
                    }
                   
                   
                    echo "<td>$anioPago</td>
                    <td>$total</td>
                    <td>$fechaPago</td>";
                    

                  //Imprimimos según estado
                 
                  if($estado==1){
                    echo "<td><h4><span class='badge bg-success'>Pagado</span></h4></td>";
                  }else{
                    echo "<td><h4><span class='badge bg-danger'>Anulado</span></h4></td>";
                  }

                  //Imprimimos botones
                  
                    echo "<td><a type='submit' href='pago_editar.php?id=$idPago' class='btn btn-primary'>
                    <i class='fas fa-pen'></i> 
                    </a>";

                    if($estado==1){
                    echo"<a type='submit' class='btn btn-danger' id='btnEliminarPago' href='../crud/eliminarPago.php?id=$idPago'>
                    <i class='fas fa-trash-alt'></i>
                    </a>"; 
                    }else{
                      //Imprimimo botón de reactivar
                      echo"<a type='submit' class='btn btn-warning' id='btnReactivarPago' href='../crud/reactivarPago.php?id=$idPago'>
                    <i class='fa fa-arrow-left'></i>
                    </a>"; 
                    }
                    echo"<a type='submit' href='pago_vista.php?id=$idPago'class='btn bg-gradient-success'>
                    <i class='fas fa-eye'></i> 
                    </a></td>";
                  
                  echo "</tr>";
                }
                  ?>


                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Cliente</th>
                    <th>Mes de pago</th>
                    <th>Año de pago</th>
                    <th>Total</th>
                    <th>Fecha de pago</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                 
                </table>
              </div>
              <!-- /.card-body -->
              </div> 
                <!--TABLA RESULTADOS DIV DINÁMICO-->
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

function filtrarPorCliente(){
    
   
    $.ajax({
        type:"POST",
        url:"busqueda_pago_cliente.php?id=" + $ ('#lista2').val() ,
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });

}

function filtrarPorFechas(){
  $.ajax({
        type:"POST",
        url:"busqueda_pago_fechas.php?fechaInicio=" + $ ('#desde').val() +"&fechaFin="+ $ ('#hasta').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });
}

function filtrarPorClienteFecha(){
  $.ajax({
        type:"POST",
        url:"busqueda_pago_cliente_fechas.php?fechaInicio=" + $ ('#desde').val() +"&fechaFin="+ $ ('#hasta').val() + "&idCliente=" + $ ('#lista2').val(),
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });
}

function mostrarTodos(){
  $.ajax({
        type:"POST",
        url:"busqueda_pago_todos.php",
        //data:"id="+ $ ('#lista1').val(),
        success:function(r){
            $('#tablaresultados').html(r);
        }
    
    });
}

</script>

<script type="text/javascript">
    $(document).ready(function(){
    
        //recargarLista();

        $('#btnGenerar').click(function(){
        //Llamamos a la función
        //alert("haz hecho click en el boton generar");
        var idCliente = document.getElementById('lista2').value;
        var fechaInicio = document.getElementById('desde').value;
        var fechaFin = document.getElementById('hasta').value;
        var filtro = document.getElementById('filtro').value;

       //------------------Mostrar todos------------------------------

       if(filtro==0){
         mostrarTodos();
       }
        
       //------------Filtro solo por cliente--------------------------
      if(filtro==1){
        
        if(idCliente!=0){
        
          filtrarPorCliente();
        
        }else{
          
          alert('Debes seleccionar un cliente primero');
          
        }
      }

      //------------Filtro por rango de fechas-------------------------

      if(filtro==2){
        
        if(fechaInicio !=""){
          if(fechaFin !=""){
             //Validamos si la fecha de inicio es menor o igual a la fecha final
             if(Date.parse(fechaInicio)<=Date.parse(fechaFin)){
                filtrarPorFechas();
             }else{
               alert("La fecha de inicio no puede ser mayor a la fecha final");
             }
          }else{
            alert("La fecha final no puede estar vacía");
          }
        }else{
          alert("La fecha de inicio no puede estar vacía");
        }
      }

      if(filtro==3){
        if(idCliente!=0){
        
          if(fechaInicio !=""){
          if(fechaFin !=""){
             //Validamos si la fecha de inicio es menor o igual a la fecha final
             if(Date.parse(fechaInicio)<=Date.parse(fechaFin)){
                filtrarPorClienteFecha();
             }else{
               alert("La fecha de inicio no puede ser mayor a la fecha final");
             }
          }else{
            alert("La fecha final no puede estar vacía");
          }
        }else{
          alert("La fecha de inicio no puede estar vacía");
        }
      
      }else{
        
        alert('Debes seleccionar un cliente primero');
        
      }
      }
        
        });

    });
</script>

<?php

include ("layout/footer.php");

?>