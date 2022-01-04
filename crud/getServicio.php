<?php
    require('../db/Conexion.php');
    $conexion = new Conexion();
   
    $conexion->conectar();
    echo "entro a direccion";

    $id_direccion = $_POST['id_direccion'];

    /*$queryM = "SELECT id_direccion, nombre FROM direccion where id_cliente = '
    $id_servicio' ORDER BY nombre ASC   ";*/
    
    $queryM = "SELECT s.id_servicio, s.nombre FROM servicio s JOIN detalle_servicio ds ON s.id_servicio=ds.id_servicio JOIN direccion d ON ds.id_direccion=d.id_direccion WHERE d.id_direccion='
    $id_direccion' ORDER BY nombre ASC";
    $ejecutar = mysqli_query($conexion->db, $queryM);

    $html = "<option value='0'>Seleccione un servicio</option>";
    echo $html;

    while($row = mysqli_fetch_array($ejecutar)){
       echo $html = "<option value=".$row[0].">".$row[1]."</option>";
    }
?>