<?php

include("../clases/Direccion.php");
include("../db/Conexion.php");

$id = $_POST['id'];
$direccion = $_POST['direccionM'];


date_default_timezone_set('America/Guatemala');
$fecha = date('Y-m-d'); 
$hora = time();
$horaReal = date("H:i:s",$hora);

$direccio =  new Direccion();

if(isset($_POST['btnGuardarD'])){

    $direccio->guardar($id,$direccion,$fecha,$horaReal);

    header("Location: ../vistas/detalle_servicio_ingresar.php?id=$id");

}


?>