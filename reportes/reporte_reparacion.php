<?php
    require('formato.php');

    include('../db/Conexion.php');
    $conexion = new Conexion();
    //Conectamos a la base de datos
    $conexion->conectar();
    $fechaActual = date('d-m-Y');
    $consulta = "SELECT a.id_personal, a.descripcion, a.estado, a.fecha_reporte, b.nombres, b.apellidos FROM reparacion as a inner join personal as b ON b.id_personal = a.id_personal WHERE a.estado=3 and a.fecha_reporte='" . $fechaActual . "'";
    $resultado = mysqli_query($conexion->db, $consulta);

    $tituloRep="Reporte de Reparaciones";
    // Creación del objeto de la clase heredada
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->Cell(198,0,utf8_decode($tituloRep),0,1,'C');
    $pdf->Ln(10);

    $pdf->SetFillColor(225, 225, 225);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(70,6,'Personal',1,0,'C',1);
    $pdf->Cell(70,6,'Descripcion',1,0,'C',1);
    $pdf->Cell(50,6,'Estado',1,1,'C',1);
    $pdf->SetFont('Arial','',12);

    while ($row=mysqli_fetch_array($resultado)) {
        $pdf->Cell(70,10,utf8_decode($row['nombres']." ".$row['apellidos']),0,0,'C');
        $pdf->Cell(70,10,utf8_decode($row['descripcion']), 0, 0, 'C');
        $obtencion = $row['estado'];
    
        if($obtencion==3){
            $pdf->Cell(50,10,utf8_decode('Atendida'), 0, 1, 'C');
        }
        

    } 
    $pdf->Output();
?>