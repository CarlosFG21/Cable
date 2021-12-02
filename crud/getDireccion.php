<?php 
    require('../db/Conexion.php');
    $conexion = new Conexion();
   
    $conexion->conectar();
    echo "entro a direccion";

    $id_cliente = $_POST['id_cliente'];

    $queryM = "SELECT id_direccion, nombre FROM direccion where id_cliente = '
    $id_cliente' ORDER BY nombre ASC   ";

    $ejecutar = mysqli_query($conexion->db, $queryM);


    $html = "<option value='0'>Seleccione una direccion</option>";
    echo $html;

 

    while($row = mysqli_fetch_array($ejecutar)){
 
       echo $html = "<option value=".$row[0].">".$row[1]."</option>";

    }

?>