<?php

    include("../clases/DetalleServicio.php");
    include("../db/Conexion.php");

    if(isset($_POST['btnEditar'])){

        $idDireccion = $_POST['lista2'];
        $idServicio = $_POST['lista1'];
    
        $idDetalleServicio= $_REQUEST['id'];

        $detalleServicio = new DetalleServicio();

        $detalleServicio->editar($idDireccion,$idServicio,$idDetalleServicio);

        header("Location: ../vistas/servicio.php");


    
    }

?>