<?php

    include("../clases/Usuario.php");
    $usuario = new Usuario();

    $idReactivar = $_REQUEST['id'];

    $usuario->reactivar($idReactivar);

    header("Location: ../vistas/usuario.php");

?>