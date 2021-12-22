<?php

include ("layout/header.php");

?>
            
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
                
                
                include("../clases/Pago.php");
                include("../clases/Usuario.php");
                include("../clases/DetalleServicio.php");
                
                session_start();

                $pagoArray = array();

                if(isset($_SESSION['pagoArray'])){
                $pagoArray = $_SESSION['pagoArray'];
                }else{
                  $_SESSION['pagoArray'] = $pagoArray;
                }

                if(sizeof($pagoArray)>0){
                  //recargarTablaDatos($pagoArray);
                }

                
                
                if(isset($_POST['lista1'])){
            
                $idCliente = $_POST['lista2'];
                $usuario = $_SESSION['usuario'];
                $idUsuario = $usuario->getIdUsuario();
                $idDetalleServicio = $_POST['lista1'];
                $total = $_POST['total'];
                $descripcion = $_POST['descripcion'];
                $mes = $_POST['mes'];
                $anio = $_POST['anio'];
                $tipoDocumento = $_POST['tipo_documento'];
            
                //Asignamos zona horaria al servidor    
                date_default_timezone_set('America/Guatemala');
                //Año mes dia
                $fecha = date('Y-m-d');
                //Obtenemos hora
                $hora = time();
                //Damos formato a la hora
                $horaReal = date("H:i:s",$hora);
                       
            
                if($idDetalleServicio!=0){
                    
                    if($total>0){
                    
                        $pago = new Pago();
                        
                        if($pago->validarExistenciaPago($mes,$anio,$idDetalleServicio)==0){
            
                        //$pago->guardar($idDetalleServicio,$idUsuario,$descripcion,$mes,$anio,$total,$fecha,$horaReal);
                            
                            $validador=0;
                            //Si ya existe la variable de sesión de pagos de la tabla entonces la recorremos
                            if(isset($_SESSION['pagoArray'])){
                                
                                $pagoArray = $_SESSION['pagoArray'];
            
                            for($i=0;$i<sizeof($pagoArray);$i++){
                                if($pagoArray[$i]->getMes()==$mes && $pagoArray[$i]->getAnio()==$anio && $pagoArray[$i]->getIdDetalleServicio() == $idDetalleServicio){
                                    $validador=1;
                                }
                             }
                            }
            
                            if($validador==0){
                                $pagoIndex = new Pago();
            
                                $pagoIndex->setIdDetalleServicio($idDetalleServicio);
                                $pagoIndex->setIdUsuario($idUsuario);
                                $pagoIndex->setDescripcion($descripcion);
                                $pagoIndex->setMes($mes);
                                $pagoIndex->setAnio($anio);
                                $pagoIndex->setTotal($total);
                                $pagoIndex->setFecha($fecha);
                                $pagoIndex->setHora($horaReal);
                                $pagoIndex->setTipoDocumento($tipoDocumento);
                                //Añadimos
                                array_push($pagoArray,$pagoIndex);
            
                                $_SESSION['pagoArray'] = $pagoArray;


                                
                //---------Cargamos la tabla

                for($i=0; $i<sizeof($pagoArray);$i++){
                    echo "<tr>";
                    $detServicio = new DetalleServicio();
                    $idSearch = $pagoArray[$i]->getIdDetalleServicio();
                    $resDetServicio = $detServicio->buscarPorId($idSearch);

                    $nombreServicio = $resDetServicio->getNombreServicio();

                   
                    $mesPago = $pagoArray[$i]->getMes();
                    $anioPago = $pagoArray[$i]->getAnio();
                    $total = $pagoArray[$i]->getTotal();
                    $fechaPago = $pagoArray[$i]->getFecha();
                    
                    $corr = $i +1;
  
                    //Imprimimos datos
                    echo "
                      
                      <td>$corr</td>
                      <td>$nombreServicio</td>";
                      
                      
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
                      <td>$total</td>";
                    
                    echo "</tr>";
                  }


                            }else{
                                echo "<script>alert('El pago ya se encuentra en la tabla');</script>";
                                recargarTablaDatos($pagoArray);
                                
                            }
            
            
                        //header("Location: ../vistas/pago.php");
                        }else{
                            echo "<script>alert('El pago ya ha sido ingresado');</script>";
                            recargarTablaDatos($pagoArray);
                        }
            
                    }else{
                        echo "<script>alert('El total a pagar es inválido');</script>";
                        recargarTablaDatos($pagoArray);
                    
                    }
            
                }else{
                    echo "<script>alert('Selecciona un servicio corecto');</script>";
                    recargarTablaDatos($pagoArray);
                    
                }
            
            }else{
                echo "<script>alert('Debes seleccionar un cliente primero');</script>";
                recargarTablaDatos($pagoArray);
            }

                
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


<?php

include ("layout/librerias_sin_footer.php");

?>

<?php

            function recargarTablaDatos($pagoArray){
                
                //---------Cargamos la tabla

                for($i=0; $i<sizeof($pagoArray);$i++){
                    echo "<tr>";
                    $detServicio = new DetalleServicio();
                    $idSearch = $pagoArray[$i]->getIdDetalleServicio();
                    $resDetServicio = $detServicio->buscarPorId($idSearch);

                    $nombreServicio = $resDetServicio->getNombreServicio();

                   
                    $mesPago = $pagoArray[$i]->getMes();
                    $anioPago = $pagoArray[$i]->getAnio();
                    $total = $pagoArray[$i]->getTotal();
                    $fechaPago = $pagoArray[$i]->getFecha();
                    
                    $corr = $i +1;
  
                    //Imprimimos datos
                    echo "
                      
                      <td>$corr</td>
                      <td>$nombreServicio</td>";
                      
                      
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
                      <td>$total</td>";
                    
                    echo "</tr>";
                  }
            }

?>