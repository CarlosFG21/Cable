                  <?php
                    include("../clases/Cliente.php");
                    include("../db/Conexion.php");
                    include("../clases/DetalleServicio.php");
                   
                  ?>
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>IDENTIFICADOR</label>
                        <?php
                        
                        $idMostrar = $_REQUEST['id'];
                        echo "<input type='text' class='form-control' placeholder='$idMostrar'  disabled>";
                        ?>
                      </div>
                    </div>
                  
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>DPI</label>
                        <?php

                        $cliente = new Cliente();
                        $idvista = $_REQUEST['id'];
                        $resultado = $cliente->buscarPorId($idvista);

                        $dpi = $resultado->getDpi();
                        $nit = $resultado->getNit();
                        $nombre = $resultado->getNombres();
                        $apellido = $resultado->getApellidos();
                        $genero= $resultado->getGenero();
                        $telefono=$resultado->getTelefono();
                        $fecha=$resultado->getFechaNacimiento();

                       echo "<input type='text' class='form-control' placeholder='$dpi'  disabled>";
                      ?>
                        </div>
                    </div>  
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>NIT</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$nit'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nombres</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$nombre'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Apellidos</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$apellido'  disabled>";
                        ?>
                      </div>
                    </div>
                    
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Genero</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$genero'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Telefono</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$telefono'  disabled>";
                        ?>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <?php
                        echo "<input type='text' class='form-control' placeholder='$fecha'  disabled>";
                        ?>
                      </div>
                    </div>



                    
                    

                  