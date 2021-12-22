<?php
    
    include("../clases/Pago.php");
    include("../clases/Usuario.php");
    
    session_start();

    if(isset($_SESSION['pagoArray'])){
        
    $pagoArray = $_SESSION['pagoArray'];    
    
    if(sizeof($pagoArray)>0){

    $usuario = $_SESSION['usuario'];
    $idUsuario = $usuario->getIdUsuario();

    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);

    for($i=0;$i<sizeof($pagoArray);$i++){

  
    $idDetalleServicio = $pagoArray[$i]->getIdDetalleServicio();
    $total = $pagoArray[$i]->getTotal();
    $descripcion = $pagoArray[$i]->getDescripcion();
    $mes = $pagoArray[$i]->getMes();
    $anio = $pagoArray[$i]->getAnio();
    $tipoDocumento = $pagoArray[$i]->getTipoDocumento();
   
            $pago = new Pago();     

            $pago->guardar($idDetalleServicio,$idUsuario,$descripcion,$tipoDocumento,$mes,$anio,$total,$fecha,$horaReal);
    }
    
    //Limpiamos variable de sesión de pagos de la tabla

    if(isset($_SESSION['pagoArray'])){
        unset($_SESSION['pagoArray']);
    }

    header("Location: ../vistas/pago.php");
        }else{
            echo "<script>alert('¡No haz ingresado pagos!'); window.history.back ();</script>";
        }          
    }

?>