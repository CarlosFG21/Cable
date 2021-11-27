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
            
        <?php
            $idc = $_REQUEST['idCliente'];
            $cl = new Cliente();
            $rc = $cl->buscarPorId($idc);
            $name = $rc->getNombres();
            $lastName = $rc->getApellidos();
            echo "<h1>Editar servicio a cliente: <span class='badge bg-success'>$name $lastName</span></h1>";
        ?>
          
          
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
                <form role="form" method="post" action="../crud/ingresarDetalleServicio.php?id=<?php echo $idc; ?>">
                  <div class="row">
                    
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Seleccionar dirección de instalación</label>
                        <select class="form-control selectDirecciones" id="lista2" name="lista2">
                        
                        <?php
                        
                        //--------------OBTENEMOS LA DIRECCIÓN-----------------------
                        $di = new Direccion();

                        $idDir = $_REQUEST['idDireccion'];

                        $respuesta = $di->buscarPorId($idDir);

                        $nombreDire = $respuesta->getNombre();

                        echo "<option value='$idDir'>$nombreDire</option>";
                    

                        ?>
                        
                        
                          <?php
                            $direccion = new Direccion();
                            $idDirecciones = $_REQUEST['idCliente'];
                            $resultado = $direccion->obtenerDireccionesCliente($idDirecciones);

                            for($i=0; $i<sizeof($resultado);$i++){
                                $idDireccion = $resultado[$i]->getIdDireccion();
                                $nombreDireccion = $resultado[$i]->getNombre();
                                
                               if($idDir!=$idDireccion){
                                echo "<option value='$idDireccion'>$nombreDireccion</option>";
                               }
                            }

                            
                            
                          ?>
                          
                        </select>
                      </div>
                    </div>
                    
                  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Servicios</label>
                        <select class="form-control select2" id="lista1" name="lista1">
                          
                        <?php
                            $ser = new Servicio();
                            $idsr = $_REQUEST['idServicio'];
                            $resSer = $ser->buscarPorId($idsr);
                            $nomsr = $resSer->getNombre();

                            echo "<option value='$idsr'>$nomsr</option>";
                        
                        ?>
                        
                          <?php
                            $servicio = new Servicio();

                            $resultado = $servicio->obtenerServicios();

                            for($i=0; $i<sizeof($resultado);$i++){

                                $idServicio = $resultado[$i]->getIdServicio();
                                $nombre = $resultado[$i]->getNombre();
                              
                                if($idServicio !=$idsr){
                                echo "<option value='$idServicio'>$nombre</option>";
                              }
                            }

                            
                          ?>
                          
                        </select>
                      </div>
                    </div>

                    
                    <div id="inputPrecio">
                        <!--Aquí se cargará el precio del servicio según la selección-->
                    </div>
                    
                  </div>  
                  <div class="">
                  <input type="submit" value="Editar" class="btn btn-primary" name="btnEditar" id="btnEditar">
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

<script>
    $(function () {
      //Initialize Select2 Elements
      $('.selectDirecciones').select2()

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
            url:"cargarPrecioServicio.php?id=" + $ ('#lista1').val() ,
            //data:"id="+ $ ('#lista1').val(),
            success:function(r){
                $('#inputPrecio').html(r);
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