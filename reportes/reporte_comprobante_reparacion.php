<?php
    include('../clases/Direccion.php');
    include('../clases/Cliente.php');
    include('../clases/Reparacion.php');
    include('../db/Conexion.php');
    require('formato.php');

    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();

    $Reparacion = new Reparacion();
    $id = $Reparacion->obtenerIdRep();
    $Rep = $Reparacion->buscarPorId($id);
    $Cliente = $Rep->getNombreCliente();
    $Direccion = $Rep->getNombreDireccion();
    $Empleado = $Rep->getNombrePersonal();
    $Descripcion = $Rep->getDescripcion();
    $Fecha = $Rep->getFechaReporte();
    $Hora = $Rep->getHora();
    $Servicio = $Rep->getServicio();
    
    $tituloRep="Comprobante de reparacion No. ".$id;

    // Creación del objeto de la clase heredada
    //$pdf = new PDF('P','mm',array(210,280));
    $pdf = new PDF('L','mm',array(210, 120));
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->Cell(198,0,utf8_decode($tituloRep),0,1,'C');
    $pdf->Ln(10);

    $pdf->SetFillColor(225, 225, 225);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(18,8,'Cliente',0,0,'L',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(74,8,$Cliente,'B',0,'L',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(22,8,'Direccion',0,0,'R',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(75,8,$Direccion,'B',1,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(18,8,'Servicio',0,0,'L',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(74,8,$Servicio,'B',0,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(22,8,'Tecnico',0,0,'R',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(75,8,$Empleado,'B',1,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(27,8,'Descripcion',0,0,'L',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(90,8,$Descripcion,'B',0,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(20,8,'Fecha',0,0,'R',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(50,8,$Fecha.'  Hrs: '.$Hora,'B',0,'C',0);

    $pdf->Output();

?>