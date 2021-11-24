<?php

include("../clases/Servicio.php");

$servicio = new Servicio();

$tipo = $_POST['tipo'];
$precio = $_POST['precio'];
date_default_timezone_set('America/Guatemala');
$fecha = date('Y-m-d'); 
$hora = time();
$horaReal = date("H:i:s",$hora);

if(isset($_POST["btnGuardar"])){

     $servicio->guardar($tipo,$precio,$fecha,$horaReal);

     header("Location: ../vistas/plan.php");

}




?>