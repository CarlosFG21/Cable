<?php
    //Incluimos la clase usuario
    include("../clases/Usuario.php");
    //Obtenemos los datos a travéz de POST
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $permiso = $_POST['permiso'];
    $contrasena = $_POST['contrasena'];
    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);
   
    //Instanciamos la clase usuario
    $us = new Usuario();
    //Validamos que el botón guardar sea el botón al que se le dió click
    if(isset($_POST["btnGuardar"])){

    if($us->validarNickname($usuario)==0){
        //Accedemos al método guardar de la clase y pasamos parámetros para crear usuario
        $us->guardar($nombre,$apellido,$permiso,$usuario,$contrasena,$fecha,$horaReal);
        //Redireccionamos a la vista de lista de usuarios
        header("Location: ../vistas/usuario.php");
    }

    else{
        //En caso de que el usuario ya exista mostramos un mensaje y redireccionamos a la ventana de ingresar.
        echo "<script>alert('El usuario ya existe'); window.location.href='../vistas/usuario_ingresar.php';</script>";
        //header("Location: ../vistas/usuario_ingresar.php");
    }

}  

?>