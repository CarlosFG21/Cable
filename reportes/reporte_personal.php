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

$tipoReporte = $_POST['tipoReporte'];
$tituloRep;

include('../db/Conexion.php');
$conexion = new Conexion();
//Conectamos a la base de datos
$conexion->conectar();

if ($tipoReporte==0) {
    //reporte del mes y año actual
    date_default_timezone_set('America/Guatemala');
    $fecha = date('m/Y');
    $consulta = "SELECT p.id_personal, concat(p.nombres,' ',p.apellidos) AS empleado, p.cargo, p.telefono, COUNT(r.id_personal) AS reparaciones, COUNT(r.id_reparacion)/DAY(LAST_DAY(fecha_reporte)) AS promedio FROM personal p JOIN reparacion r ON p.id_personal=r.id_personal WHERE p.estado=1 AND MONTH (r.fecha_reporte)=MONTH(NOW()) GROUP BY empleado";
    $tituloRep="Reporte de Personal - ".$fecha;
}
if ($tipoReporte==1) {
    //reporte de una fecha (mes/año) especifica
    $fechaR= strtotime($_POST['campfecha']);//tu variable
    $mes = strftime("%m",$fechaR);//extraemos el mes
    $año = strftime("%Y",$fechaR);//extraemos el año
    $consulta = "SELECT p.id_personal, concat(p.nombres,' ',p.apellidos) AS empleado, p.cargo, p.telefono, COUNT(r.id_personal) AS reparaciones, COUNT(r.id_reparacion)/DAY(LAST_DAY(fecha_reporte)) AS promedio FROM personal p JOIN reparacion r ON p.id_personal=r.id_personal WHERE p.estado=1 AND MONTH (r.fecha_reporte)=$mes AND YEAR(r.fecha_reporte)=$año GROUP BY empleado";
    $tituloRep="Reporte de Personal del - ".$mes."/".$año;
}
if ($tipoReporte==2) {
    //reporte de un empleado especifico
    $empleado = $_POST['SEmpleado'];
    $sql = "SELECT concat(nombres,' ',apellidos) AS empleado, cargo FROM personal WHERE Id_personal=$empleado";
    $res = mysqli_query($conexion->db, $sql);
    $fila = $res->fetch_assoc();
    $tituloRep="Reporte Empleado - ".utf8_decode($fila['empleado']);
    //$consulta = "SELECT concat(c.nombres,' ',c.apellidos) AS cliente, d.nombre, r.descripcion, r.fecha_reporte, p.id_personal, concat(p.nombres,' ',p.apellidos) AS empleado, p.cargo FROM personal p JOIN reparacion r ON p.id_personal=r.id_personal JOIN direccion d ON r.id_direccion=d.id_direccion JOIN cliente c ON d.id_cliente=c.id_cliente WHERE p.estado=1 AND r.estado=3 AND p.id_personal=$empleado";
    $consulta = "SELECT concat(c.nombres,' ',c.apellidos) AS cliente, d.nombre, r.descripcion, r.fecha_reporte, r.hora FROM reparacion r JOIN direccion d ON r.id_direccion=d.id_direccion JOIN cliente c ON d.id_cliente=c.id_cliente WHERE r.estado=3 AND r.id_personal=$empleado ORDER BY r.fecha_reporte ASC";
}
if ($tipoReporte==3) {
    //reporte general (todo)
    $consulta = "SELECT p.id_personal, concat(p.nombres,' ',p.apellidos) AS empleado, p.cargo, p.telefono, COUNT(r.id_personal) AS reparaciones, COUNT(r.id_reparacion)/DAY(LAST_DAY(fecha_reporte)) AS promedio FROM personal p JOIN reparacion r ON p.id_personal=r.id_personal WHERE p.estado=1 AND r.estado=3 GROUP BY empleado";
    $tituloRep="Reporte General";
}

$resultado = mysqli_query($conexion->db, $consulta);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(198,0,utf8_decode($tituloRep),0,1,'C');
$pdf->Ln(8);
//$pdf->setFillColor(232, 232, 232);
$pdf->SetFillColor(225, 225, 225);
$pdf->SetFont('Arial','B',11);

if ($tipoReporte==2) {
    $pdf->Cell(11,6,'Rep.',1,0,'C',1);
    $pdf->Cell(58,6,'Cliente',1,0,'C',1);
    $pdf->Cell(60,6,'Direccion',1,0,'C',1);
    $pdf->Cell(38,6,'Detalle',1,0,'C',1);
    $pdf->Cell(23,6,'Fecha',1,1,'C',1);
    $pdf->SetFont('Arial','',11);

    MostrarEmpleado($pdf, $resultado);
}else {
    $pdf->Cell(10,6,'ID',1,0,'C',1);
    $pdf->Cell(68,6,'Empleado',1,0,'C',1);
    $pdf->Cell(25,6,'Cargo',1,0,'C',1);
    $pdf->Cell(25,6,'Telefono',1,0,'C',1);
    $pdf->Cell(30,6,'Reparaciones',1,0,'C',1);
    $pdf->Cell(30,6,'Promedio',1,1,'C',1);
    $pdf->SetFont('Arial','',11);
    Mostrar($pdf, $resultado);
}

$pdf->Output();

function MostrarEmpleado($pdf, $resultado) {
    $rep=1;
    while ($row=mysqli_fetch_array($resultado)) {
        $pdf->Cell(11,7,$rep++, 0, 0, 'C');
        $pdf->Cell(58,7,limitarCadena($row[0],29, ".."), 0, 0, 'L');
        $pdf->Cell(60,7,limitarCadena($row[1],32, ".."), 0, 0, 'L');
        $pdf->Cell(38,7,limitarCadena($row[2],20, ".."), 0, 0, 'L');
        $pdf->Cell(23,7,$row[3], 0, 1, 'C');
    }
}

function Mostrar($pdf, $resultado) {
    while ($row=mysqli_fetch_array($resultado)) {
        $pdf->Cell(10,8,$row[0], 0, 0, 'C');
        $pdf->Cell(68,8,$row[1], 0, 0, 'C');
        $pdf->Cell(25,8,$row[2], 0, 0, 'C');
        $pdf->Cell(25,8,$row[3], 0, 0, 'C');
        $pdf->Cell(30,8,$row[4], 0, 0, 'C');
        $pdf->Cell(30,8,$row[5], 0, 1, 'C');
    }
}

?>
