<?php
    include("../clases/DetalleServicio.php");
    include("../db/Conexion.php");

?>
                
                
                <label>Servicio del cliente a pagar</label>
                        <select class="form-control selectServicios" id="lista1" name="lista1">
                          <option value="0">Seleccione el servicio</option>
                          <?php
                            $detalleServicio= new DetalleServicio();
                            $idCliente = $_REQUEST['id'];
                            $resultado = $detalleServicio->obtenerDetallesServiciosPorCliente($idCliente);

                            for($i=0; $i<sizeof($resultado);$i++){

                                $idServicio = $resultado[$i]->getIdDetalleServicio();
                                $nombre = $resultado[$i]->getNombreServicio();

                              echo "<option value='$idServicio'>$nombre</option>";
                            
                              
                            }

                            
                          ?>
                          
                        </select>


                        

                        <script>
    $(function () {
      //Initialize Select2 Elements
      $('.selectServicios').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });

    </script>

<script type="text/javascript">
    $(document).ready(function(){
    
        //Evento para notar cambio de datos del select

        $('#lista1').change(function(){
            alert("Ha cambiado de elección");
        });

    });
</script>


                     

                  

    