<?php

    include("../clases/Usuario.php");
    $usuario = new Usuario();

    $idEliminar = $_REQUEST['id'];

    $usuario->desactivar($idEliminar);

    header("Location: ../vistas/usuario.php");

?>