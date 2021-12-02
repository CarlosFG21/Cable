<?php

include("../clases/Reparacion.php");
include("../db/Conexion.php");

if(isset($_POST['btnGuardarR'])){

$reparacion = new Reparacion();

$direccion = $_POST['cbDireccion'];
$empleado = $_POST['cbEmpleado'];
$descripcion =  $_POST['descripcion'];

    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);

$reparacion->guardar($direccion,$empleado,$descripcion,$horaReal,$fecha);

header("Location: ../vistas/reparacion.php");


}


?>