<?php

    include("../clases/Usuario.php");

    if(isset($_POST["btnEditar"])){

    $usuario = new Usuario();
    
    $idEditar = $_REQUEST['id'];

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $nickname = $_POST['usuario'];
    $permiso = $_POST['permiso'];
    $contrasena = $_POST['contrasena'];

        
        $usuario->editar($nombre,$apellido,$permiso,$nickname,$contrasena,$idEditar);
        header("Location: ../vistas/usuario.php");
        

    }
?>