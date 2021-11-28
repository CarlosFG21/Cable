<?php

    include("../clases/DetalleServicio.php");
    include("../db/Conexion.php");
    $detalleServicio = new DetalleServicio();

    $idEliminar = $_REQUEST['id'];

    $detalleServicio->reactivar($idEliminar);

    header("Location: ../vistas/servicio.php");

?>