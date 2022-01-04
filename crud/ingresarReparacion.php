<?php

include("../clases/Reparacion.php");
include("../db/Conexion.php");
    

if(isset($_POST['btnGuardarR'])){

    $reparacion = new Reparacion();

    $direccion = $_POST['cbDireccion'];
    $empleado = $_POST['cbEmpleado'];
    $descripcion =  $_POST['descripcion'];
    $servicio = $_POST['cbServicio'];
    $estado=1;

    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);

    if($reparacion->validarReparacion($direccion,$estado)==0){
    
        $reparacion->guardar($direccion,$empleado,$servicio,$descripcion,$horaReal,$fecha);
        header("Location: ../vistas/reparacion.php");
        
    }else{
    header("Location: ../vistas/reparacion_ingresar.php?mensaje=existereparacion");
    }
}
?>