<?php

include("../clases/Cliente.php");
include("../db/Conexion.php");

$cliente = new Cliente();

$idcliente = $_REQUEST['id'];

$dpi = $_POST['dpi'];
$nit = $_POST['nit'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$fechan = $_POST['fecha'];

date_default_timezone_set('America/Guatemala');
$fecha = date('Y-m-d'); 
$hora = time();
$horaReal = date("H:i:s",$hora);

if(isset($_POST["btnEditar"])){

    $cliente->editar($nombre,$apellido,$dpi,$nit,$genero,$telefono,$fechan,$fecha,$horaReal,$idcliente);

    header("Location: ../vistas/cliente.php");


}


?>