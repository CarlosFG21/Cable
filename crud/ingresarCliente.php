<?php


include ("../clases/Cliente.php");
include ("../clases/Usuario.php");

$dpi = $_POST['dpi'];
$nit = $_POST['nit'];
$nombre =$_POST['nombre'];
$apellido =$_POST['apellido'];
$genero=$_POST['genero'];
$telefono=$_POST['telefono'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];


date_default_timezone_set('America/Guatemala');
$fecha = date('Y-m-d'); 
$hora = time();
$horaReal = date("H:i:s",$hora);

session_start();
$usuario=$_SESSION['usuario'];
$id=$usuario->getIdUsuario();
$client =  new Cliente();

if(isset($_POST['btnGuardar'])){

    if($client->validarCliente($nombre,$apellido,$dpi,$nit)==0){

    $client->guardar($id,$nombre,$apellido,$dpi,$nit,$genero,$telefono,$fecha_nacimiento,$fecha,$horaReal);

    header("Location: ../vistas/cliente.php");

    }else{
        
        header("Location: ../vistas/cliente_ingresar.php?mensaje=existecliente");

    }

}


?>