<?php

    require('formato.php');
    require('../clases/Servicio.php');
    include('../db/Conexion.php');

    $tituloRep="Reporte de Plan";
    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    
    $pdf->Cell(198,0,utf8_decode($tituloRep),0,1,'C');
    $pdf->Ln(10);
    
    $pdf->SetFillColor(225, 225, 225);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15,6,'ID',1,0,'C',1);
    $pdf->Cell(95,6,'Tipo',1,0,'C',1);
    $pdf->Cell(40,6,'Precio',1,0,'C',1);
    $pdf->Cell(40,6,'Usuarios',1,1,'C',1);
    $pdf->SetFont('Arial','',12);

    $servicio = new Servicio();
    $servicioArray = $servicio->obtenerServicios();
    for($i=0; $i<sizeof($servicioArray); $i++){
        $id =  $servicioArray[$i]->getIdServicio();
        $tipo = $servicioArray[$i]->getNombre();
        $precio = $servicioArray[$i]->getPrecio();
        $estado = $servicioArray[$i]->getEstado();
        $clientes = $servicioArray[$i]->getClientes();

    	$pdf->Cell(15,10,$id,0,0,'C');
        $pdf->Cell(95,10,utf8_decode($tipo), 0, 0, 'C');
        $pdf->Cell(40,10,utf8_decode($precio), 0, 0, 'C');
        $pdf->Cell(40,10,utf8_decode($clientes), 0, 1, 'C');
    } 
    $pdf->Output();

?>