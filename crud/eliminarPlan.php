<?php

include("../clases/Servicio.php");
include("../db/Conexion.php");

$servicio = new Servicio();

$id = $_REQUEST['id'];

$servicio->desactivar($id);

header("Location: ../vistas/plan.php");


?>