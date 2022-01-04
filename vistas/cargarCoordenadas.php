<?php

    include("../clases/Direccion.php");
    include("../db/Conexion.php");
    

        $direccion = new Direccion();
        $idDireccion = $_REQUEST['id'];
        $resDireccion = $direccion->buscarPorId($idDireccion);

        $latitud = $resDireccion->getLatitud();
        $longitud = $resDireccion->getLongitud();

        //echo "<script>document.getElementById('latitud').value = $latitud;</script>";
        //echo "<script>document.getElementById('longitud').value = $longitud;</script>";
        
 

    echo "<a type='submit' class='btn btn-danger' href='https://maps.google.com/?q=$latitud,$longitud' target='_blank'>Abrir en Google Maps</a>";
    echo "<br>";
    echo "<br>";
    echo "<div class='embed-responsive embed-responsive-16by9'>
    <iframe class='embed-responsive-item' src='http://maps.google.com/maps?q=$latitud,$longitud&z=15&output=embed' allowfullscreen></iframe>
  </div>";

?>