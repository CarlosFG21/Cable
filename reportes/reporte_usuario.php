<?php
function limitarCadena($cadena, $limite, $sufijo){
	if(strlen($cadena) > $limite){
		return substr($cadena, 0, $limite) . $sufijo;
	}
	return $cadena;
}
?>

<?php
require('formato.php');
include('../clases/Usuario.php');

$tituloRep="Reporte usuarios";
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(198,0,utf8_decode($tituloRep),0,1,'C');
$pdf->Ln(10);

$pdf->SetFillColor(225, 225, 225);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->Cell(90,6,'Usuario',1,0,'C',1);
$pdf->Cell(40,6,'Nickname',1,0,'C',1);
$pdf->Cell(50,6,utf8_decode('Rol'),1,1,'C',1);
$pdf->SetFont('Arial','',12);

    $usuario = new Usuario();
    $usuarioArray = $usuario->obtenerUsuarios();
                
    for($i=0; $i<sizeof($usuarioArray);$i++){
        $id = $usuarioArray[$i]->getIdUsuario();
        $usuario = $usuarioArray[$i]->getNombre()." ".$usuarioArray[$i]->getApellido();
        $nick = $usuarioArray[$i]->getNickname();
        $permiso = $usuarioArray[$i]->getRol();
        $estado = $usuarioArray[$i]->getEstado();

        $pdf->Cell(10,10,$id,0,0,'C');
        $pdf->Cell(90,10,limitarCadena(utf8_decode($usuario),80,"..."), 0, 0, 'C');
        $pdf->Cell(40,10,limitarCadena(utf8_decode($nick),30,"..."), 0, 0, 'C');
        $pdf->Cell(50,10,limitarCadena($permiso,50,"..."), 0, 1, 'C');
    }
$pdf->Output();

?>