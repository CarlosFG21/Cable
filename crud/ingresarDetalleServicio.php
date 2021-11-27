<?php

    include("../clases/DetalleServicio.php");
    include("../db/Conexion.php");

    if(isset($_POST['btnGuardar'])){

        $idDireccion = $_POST['lista2'];
        $idServicio = $_POST['lista1'];
    
        $idCliente = $_REQUEST['id'];

        if($idDireccion!=0 && $idServicio!=0){

        date_default_timezone_set('America/Guatemala');
        $fecha = date('Y-m-d'); 
        $hora = time();
        $horaReal = date("H:i:s",$hora);


        $detalleServicio = new DetalleServicio();

        $detalleServicio->guardar($idDireccion,$idServicio,$fecha,$horaReal);

        header("Location: ../vistas/servicio.php");

        }else{
            echo "<script>alert('Verifica la información'); window.location='../vistas/detalle_servicio_ingresar.php?id=$idCliente';</script>";  
   
        }
    }

?>