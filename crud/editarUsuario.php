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

        
       if($usuario->validarUsuarioEditar($nombre,$apellido,$permiso,$contrasena)==0){
        $usuario->editar($nombre,$apellido,$permiso,$nickname,$contrasena,$idEditar);
        header("Location: ../vistas/usuario.php");
       }else{

        echo "<script>alert('¡El usuario a editar ya existe!'); window.location.href='../vistas/usuario_editar.php?id=$idEditar';</script>";
      

       }
        

    }
?>