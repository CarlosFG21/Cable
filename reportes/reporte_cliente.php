<?php
    require('formato.php');

    include('../clases/Cliente.php');
    include('../clases/DetalleServicio.php');
    include('../db/Conexion.php');

    $client = new Cliente();
    $clientArray = $client->obtenerClientes();

    $detalleServicio = new DetalleServicio();

    $tituloRep="Reporte Clientes";
    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->Cell(198,0,utf8_decode($tituloRep),0,1,'C');
    $pdf->Ln(10);

    $pdf->SetFillColor(225, 225, 225);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,6,'ID',1,0,'C',1);
    $pdf->Cell(30,6,'NIT',1,0,'C',1);
    $pdf->Cell(85,6,'Cliente',1,0,'C',1);
    $pdf->Cell(30,6,'Telefono',1,0,'C',1);
    $pdf->Cell(25,6,utf8_decode('Servicios'),1,1,'C',1);
    $pdf->SetFont('Arial','',12);

    for($i=0; $i<sizeof($clientArray); $i++){
        $id = $clientArray[$i]->getIdCliente();
        $nit = $clientArray[$i]->getNit();
        $cliente = $clientArray[$i]->getNombres()." ".$clientArray[$i]->getApellidos();
        $telefono = $clientArray[$i]->getTelefono();
        $fecha = $clientArray[$i]->getFechaNacimiento(); 
        $estado = $clientArray[$i]->getEstado();
        //$servicios = $clientArray[$i]->getServicios();

        $servicioArray = $detalleServicio->obtenerDetallesServiciosPorCliente($id);
        $total=0;
        for($j=0; $j<sizeof($servicioArray); $j++){
            $total++;
        }
        $pdf->Cell(20,10,$id,0,0,'C');
        $pdf->Cell(30,10,$nit,0,0,'C');
        $pdf->Cell(85,10,utf8_decode($cliente), 0, 0, 'C');
        $pdf->Cell(30,10,$telefono, 0, 0, 'C');
        $pdf->Cell(25,10,$total, 0, 1, 'C');
    } 
    $pdf->Output();

?>