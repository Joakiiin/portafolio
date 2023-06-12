<?php
 $NoControl=$_POST['nocontrol'];
 $Nombre=$_POST['nombres'];
 $ApellidoP=$_POST['app'];
 $ApellidoM=$_POST['apm'];
 $Carrera=$_POST['carrera'];
 $NombreP=$_POST['Programa'];
 $CiudadTec= $_POST['ciudadTec'];
 $Dia= $_POST['diaF'];
 $Mes= $_POST['mesF'];
 $Year= $_POST['yearF'];
 $Destinatario= $_POST['destinatario'];
 $NombreDep= $_POST['dependencia'];
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   // $this->Image('',10,8,33);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Movernos a la derecha
   // $this->Cell(80);
    // Título
   // $this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
   // $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); // añade pagina en blanco
$pdf->SetFont('Arial','',10); //propiedades de la letra
 //imagen: nombre de archivo, png o jpg, x-y de posicion y tamaño

//TABLAS
$pdf->SetXY(15,15);
$pdf->Cell(20,22, $pdf->Image('img/SGC.jpg', $pdf->GetX(), $pdf->GetY(),20,22),1);
$pdf->Cell(93.8,10,utf8_decode('Formato evaluación cualitativa del prestador Servicio Social'),1,0,'C',0);
$pdf->SetXY(129,15);
$pdf->Cell(65,8,utf8_decode ('Código: TecNM-VI-PO-002-03'),1,1,'C',0);
$pdf->SetXY(35,25);
$pdf->Cell(93.8,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
$pdf->SetXY(129,23);
$pdf->Cell(65,7,utf8_decode ('revisión: 0'),1,1,'C',0);
$pdf->SetXY(129,30);
$pdf->Cell(65,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
$pdf->Ln(60);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(110,45);
//DEPARTAMENTO
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('DEPARTAMENTO: Departamento de Gestión '),90,90);
    $pdf->SetXY(142,50);
    //DEPARTAMENTO
    $pdf->SetFont('Arial','B',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('Tecnologica y Vinculación'),90,90);
    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
    $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->SetXY(110,60);
$pdf->Cell(50,4,utf8_decode('No DE OFICIO:'),40,40);
//SALTO DE LINEA
$pdf->Ln(5);
    //SALTO DE LINEA //POSICION ASUNTO
    $pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->SetXY(110,70);
    $pdf->Cell(50,4,utf8_decode('ASUNTO: Carta de presentación. '),40,40);

    //CIUDAD Y FECHA
    //NOMBRE DE PERSONA QUE VA DIRIGIDO
    //NOMBRE DE LA DEPENDENCIA
    $pdf->SetXY(15,90);
$pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(15,10,utf8_decode(''.$CiudadTec.', '.$Dia.' de '.$Mes.' del '.$Year.''),90,90);
$pdf->Cell(15,10,utf8_decode(''.$Destinatario.''),90,90);
$pdf->Cell(15,10,utf8_decode(''.$NombreDep.''),90,90);

 //PRESENTE
 $pdf->SetXY(15,123);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(15,10,utf8_decode('P R E S E N T E'),90,90);

 //LEYENDA

$pdf->SetXY(15,145);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('Por este conducto, presentamos a sus finas atenciones al C. ' .$Nombre.' ' .$ApellidoP.' '.$ApellidoM.' con '),40,40);
$pdf->Cell(50,4,utf8_decode('número de control '.$NoControl.' , estudiante de la carrera de '.$Carrera.' '),40,40);   
$pdf->Cell(50,4,utf8_decode('quien desea realizar su Servicio Social en esa dependencia, cubriendo un total de 480 horas y máximo de 500'),40,40);
$pdf->Cell(50,4,utf8_decode('horas en el programa '.$NombreP.' en un periodo mínimo de seis meses y no'),40,40);  
$pdf->Cell(50,4,utf8_decode('mayor a dos años.'),40,40);  

 //LEYENDA 2

 $pdf->SetXY(15,175);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('Agradezco las atenciones se sirva brindar al portador de la presente.'),40,40);

      //firma//
//conformidad
$pdf->SetXY(85,225);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('A t e n t a m e n t e:'),90,90);

//linea firma 
$pdf->SetXY(70,245);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('________________________________'),90,90);

//firma del alumno
$pdf->SetXY(67,255);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('JEFE DEL DEPARTAMENTO DE GESTION '),90,90);
    $pdf->SetXY(75,259);
    $pdf->Cell(35,10,utf8_decode('TECNOLOGICA Y VINCULACION '),90,90);
    header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Carta_presentacion.pdf"');
$pdf->Output('D','Carta_presentacion.pdf');
?>