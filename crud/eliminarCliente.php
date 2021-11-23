<?php

include("../clases/Cliente.php");
include("../db/Conexion.php");

$cliente = new Cliente();

$idEliminar = $_REQUEST['id'];

$cliente->desactivar($idEliminar);

header("Location: ../vistas/cliente.php");


?>