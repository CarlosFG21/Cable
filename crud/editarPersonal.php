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

    if($personal->validarPersonal($nombres,$apellidos)==0){

    $personal->editar($nombres,$apellidos,$telefono,$cargo,$genero,$fechaNacimiento,$idEditar);

    header("Location: ../vistas/personal.php");

    }else{

        echo "<script>alert('¡El emplado a editar ya existe!'); window.location.href='../vistas/personal_editar.php?id=$idEditar';</script>";

    }

    }


?>