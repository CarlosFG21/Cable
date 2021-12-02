<?php
include("../clases/Reparacion.php");
include("../db/Conexion.php");

$reparacion = new Reparacion();
$id = $_REQUEST['id'];

$reparacion->desactivar($id);
header("Location: ../vistas/reparacion.php");


?>