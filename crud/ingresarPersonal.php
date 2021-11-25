<?php

    include("../clases/Personal.php");
    include("../db/Conexion.php");
    
    if(isset($_POST['btnGuardar'])){

    $personal = new Personal();

    $nombres = $_POST['nombres'];
    $apellidos =$_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $cargo = $_POST['cargo'];
    $genero = $_POST['genero'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    
    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);


    $personal->guardar($nombres,$apellidos,$telefono,$cargo,$genero,$fechaNacimiento,$fecha,$horaReal);

    header("Location: ../vistas/personal.php");
        
  }

?>