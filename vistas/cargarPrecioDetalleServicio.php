<?php
    include("../clases/Servicio.php");
    include("../db/Conexion.php");
    include("../clases/DetalleServicio.php");

    $idBuscar = $_REQUEST['id'];
    $detalleServicio = new DetalleServicio();
    $servicio = new Servicio();

    $resultadoDetalleServicio = $detalleServicio->buscarPorId($idBuscar);
    $idServicioBusqueda = $resultadoDetalleServicio->getIdServicio();
    $resultadoServicio = $servicio->buscarPorId($idServicioBusqueda);
    $precio = $resultadoServicio->getPrecio();

    echo "<script>document.getElementById('total').value = $precio;</script>";

?>