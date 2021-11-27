<?php
    include("../clases/Servicio.php");
    include("../db/Conexion.php");

    $servicio = new Servicio();
    $idBusqueda = $_REQUEST['id'];
    $resultado = $servicio->buscarPorId($idBusqueda);

    $precio = $resultado->getPrecio();

                   echo "<div class='col-sm-6'>
                      <!-- text input -->
                      <div class='form-group'>
                        <label>Precio</label>
                        <input type='text' class='form-control' placeholder='$precio' name='precio' id='precio'
                        required readonly>
                      </div>
                    </div>";


?>