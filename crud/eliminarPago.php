<?php
    include("../clases/Pago.php");
    include("../db/Conexion.php");

    $idEliminar = $_REQUEST['id'];

    $pago = new Pago();

    $pago->desactivar($idEliminar);

    header("Location: ../vistas/pago.php");


?>