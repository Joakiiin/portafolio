<?php
	include 'tecnm01.php';
	require 'Conexion.php';
    $idUsuario = $_POST['idUsuario'];
	
    $pdf = new PDF('P','mm','A4');
	$pdf->AliasNbPages();
    $pdf->SetAutoPageBreak(true,25);

    $query = "SELECT 
                    id_persona AS idUsuario, 
                    paterno as paterno,
                    materno as materno,
                    nombres as nombre
                FROM
                    tab_persona;";

    $resultado = mysqli_query($Conexion, $query);      
    while($mostrar=mysqli_fetch_array($resultado))
{
        $pdf->SetXY(55,70);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(70,5,"  ".utf8_decode($mostrar['paterno']).'   '.utf8_decode($mostrar['materno']) .'     '.utf8_decode($mostrar['nombre']),0,0,'C');
   
	}
	$pdf->Output();
?>