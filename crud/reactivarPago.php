<?php
    include("../clases/Pago.php");
    include("../db/Conexion.php");

    $idReactivar = $_REQUEST['id'];

    $pago = new Pago();

    $pago->reactivar($idReactivar);

    header("Location: ../vistas/pago.php");


?>