<?php

include("../clases/Servicio.php");
include("../db/Conexion.php");

if(isset($_POST["btnGuardar"])){

$servicio = new Servicio();
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
date_default_timezone_set('America/Guatemala');
$fecha = date('Y-m-d'); 
$hora = time();
$horaReal = date("H:i:s",$hora);

if($servicio->validarPlan($tipo)==0){

$servicio->guardar($tipo,$precio,$fecha,$horaReal);

header("Location: ../vistas/plan.php");

}else{

    header("Location: ../vistas/plan_ingresar.php?mensaje=existeplan");

}

}


?>