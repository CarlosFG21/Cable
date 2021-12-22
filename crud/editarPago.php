<?php
    
    include("../clases/Pago.php");
    include("../clases/Usuario.php");
    
    
    if(isset($_POST['lista1'])){

    $idCliente = $_POST['lista2'];
    session_start();
    $usuario = $_SESSION['usuario'];
    $idUsuario = $usuario->getIdUsuario();
    $idDetalleServicio = $_POST['lista1'];
    $total = $_POST['total'];
    $descripcion = $_POST['descripcion'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $tipoDocumento = $_POST['tipo_documento'];

    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $horaReal = date("H:i:s",$hora);

    if($idDetalleServicio!=0){
        
        if($total>0){
        
            $pago = new Pago();
        
            $idEditar = $_REQUEST['id'];
            $pago->editar($idDetalleServicio,$idUsuario,$descripcion,$tipoDocumento,$mes,$anio,$total,$fecha,$horaReal,$idEditar);
            header("Location: ../vistas/pago.php");
            

        }else{
            echo "<script>alert('El total a pagar es inválido'); window.history.back ();</script>";
        
        }

    }else{
        echo "<script>alert('Selecciona un servicio corecto'); window.history.back ();</script>";
        
    }

}else{
    echo "<script>alert('Debes seleccionar un cliente primero'); window.history.back ();</script>";
}  


?>