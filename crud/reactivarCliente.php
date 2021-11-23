<?php
include("../clases/Cliente.php");
include("../db/Conexion.php");

$cliente = new Cliente();

$idReactivar = $_REQUEST['id'];

$cliente->reactivar($idReactivar);

header("Location: ../vistas/cliente.php");

?>