<?php
include("../clases/Servicio.php");
include("../db/Conexion.php");

$servicio = new Servicio();

$id = $_REQUEST['id'];
$tipo = $_POST['tipo'];
$precio = $_POST['precio'];

if(isset($_POST["btnEditar"])){


    if($servicio->validarPlanEdiatr($tipo,$precio)==0){
    $servicio->editar($tipo,$precio,$id);

    //header("Location ../vistas/plan.php");
    header("Location: ../vistas/plan.php");

    }else{

        echo "<script>alert('¡El plan a editar ya existe!'); window.location.href='../vistas/plan_editar.php?id=$id';</script>";

    }

}


?>