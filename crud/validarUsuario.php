<?php

    include("../clases/Usuario.php");

    $usuario = new Usuario();
    $user = $_POST['nickname'];
    $pass = $_POST['contrasena'];

    $validador = $usuario->validarUsuario($user,$pass);

    if($validador==1){
        header("Location: ../vistas/index.php");
    }else{
        echo "<script>alert('¡Usuario incorrecto!'); window.location.href='../vistas/login.php';</script>";
        //header("Location: ../vistas/login.php?mensaje=usuario");
    }
?>