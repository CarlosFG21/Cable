<?php
    include("../clases/Personal.php");
    include("../db/Conexion.php");

    if(isset($_POST["btnEditar"])){

    $personal = new Personal();

    $idEditar = $_REQUEST['id'];

    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $cargo = $_POST['cargo'];
    $genero = $_POST['genero'];
    $fechaNacimiento = $_POST['fechaNacimiento'];

    $personal->editar($nombres,$apellidos,$telefono,$cargo,$genero,$fechaNacimiento,$idEditar);

    header("Location: ../vistas/personal.php");

    }


?>