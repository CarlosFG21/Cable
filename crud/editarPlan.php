<?php
include("../clases/Servicio.php");
include("../db/Conexion.php");

$servicio = new Servicio();

$id = $_REQUEST['id'];
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];

if(isset($_POST["btnEditar"])){

    $servicio->editar($tipo,$precio,$id);

    //header("Location ../vistas/plan.php");
    header("Location: ../vistas/plan.php");

}


?>