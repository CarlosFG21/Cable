<?php
include("../clases/Personal.php");
include("../db/Conexion.php");

$idReactivar = $_REQUEST['id'];

$personal = new Personal();

$personal->desactivar($idReactivar);
header("Location: ../vistas/personal.php")
?>