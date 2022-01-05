
<?php
function limitarCadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
}


?>

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
    //$Fecha = $Rep->getFechaReporte();
    //$Hora = $Rep->getHora();
    $Servicio = $Rep->getServicio();
    

    //Asignamos zona horaria al servidor    
    date_default_timezone_set('America/Guatemala');
    //Año mes dia
    $Fecha = date('Y-m-d');
    //Obtenemos hora
    $hora = time();
    //Damos formato a la hora
    $Hora = date("H:i:s",$hora);



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
    
    if(strlen($Cliente)==0){
        echo "<script>location.reload();</script>";
    }

    $pdf->Cell(74,8,limitarCadena(utf8_decode($Cliente),35,"..."),'B',0,'L',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(22,8,'Direccion',0,0,'R',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(75,8,limitarCadena(utf8_decode($Direccion),35,"..."),'B',1,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(18,8,'Servicio',0,0,'L',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(74,8,limitarCadena(utf8_decode($Servicio),35,"..."),'B',0,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(22,8,'Tecnico',0,0,'R',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(75,8,limitarCadena(utf8_decode($Empleado),35,"..."),'B',1,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(27,8,'Descripcion',0,0,'L',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(90,8,limitarCadena(utf8_decode($Descripcion),50,"..."),'B',0,'C',0);

    $pdf->setFont('Arial', 'B',12);
    $pdf->Cell(20,8,'Fecha',0,0,'R',0);
    $pdf->setFont('Arial', '',11);
    $pdf->Cell(50,8,$Fecha.'  Hrs: '.$Hora,'B',0,'C',0);

    $pdf->Output();

?>