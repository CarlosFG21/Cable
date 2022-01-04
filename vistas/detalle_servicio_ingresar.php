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
            $idc = $_REQUEST['id'];
            $cl = new Cliente();
            $rc = $cl->buscarPorId($idc);
            $name = $rc->getNombres();
            $lastName = $rc->getApellidos();
            echo "<h1>Agregar servicio a cliente: <span class='badge bg-success'>$name $lastName</span></h1>";
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
                          <option value="0">Seleccione dirección</option>
                            <?php
                              $direccion = new Direccion();
                              $idDirecciones = $_REQUEST['id'];
                              $resultado = $direccion->obtenerDireccionesCliente($idDirecciones);

                             
                             
                              for($i=0; $i<sizeof($resultado);$i++){
                                $idDireccion = $resultado[$i]->getIdDireccion();
                                $nombreDireccion = $resultado[$i]->getNombre();

                                echo "<option value='$idDireccion'>$nombreDireccion</option>";
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
                          <option value="0">Seleccione servicio</option>
                          <?php
                            $servicio = new Servicio();

                            $resultado = $servicio->obtenerServicios();

                            for($i=0; $i<sizeof($resultado);$i++){

                                $idServicio = $resultado[$i]->getIdServicio();
                                $nombre = $resultado[$i]->getNombre();

                              echo "<option value='$idServicio'>$nombre</option>";
                              
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
                    <input type="submit" value="Guardar" class="btn btn-primary" name="btnGuardar" id="btnGuardar">
                    <a type="submit" class="btn btn-danger" href="servicio.php">Regresar</a>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ingresarModal" name="btnAgregar" id="btnAgregar" data-whatever="@mdo">Agregar
                    </button>
                  </div>     
                </form>

                <!--llamo al modal-->
                <?php include("modal-direccion-ingresar.php"); ?>

              </div>
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
      <div class="card">
  <div class="card-header">
    Ubicación en el mapa
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>¡La ubicación GPS presentada a continuación puede variar su precisión en intérvalos de 1 a 10 metros!.</p>
      <div id="mapa">
                            
      </div>
     
      <div id="coordenadas">
            

      </div>   

       </blockquote>
  </div>
</div>
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


<script>
  
function recargarMapa() {

  $.ajax({
            type:"POST",
            url:"cargarCoordenadas.php?id=" + $ ('#lista2').val() ,
            //data:"id="+ $ ('#lista1').val(),
            success:function(r){
                $('#coordenadas').html(r);
            }
        
        });

 var latitud;
 var longitud;

latitud = document.getElementById('longitud').value;
longitud = document.getElementById('longitud').value;



var mapOptions = {
center: new google.maps.LatLng(latitud, longitud),
zoom: 10,
mapTypeId: google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);

marcador = new google.maps.Marker({
    map: map,
    draggable: true,
    animation: google.maps.Animation.DROP,
    position: {
      lat: latitud,
      lng: longitud
    }
  });

//document.getElementById("mapa").style.height="400px";
//document.getElementById("mapa").style.width="100%";
}		
</script>

<script type="text/javascript">
    $(document).ready(function(){
    
        //recargarLista();

        $('#lista2').change(function(){

          recargarMapa();
         
        });

    });
</script>




