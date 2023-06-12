<?php
 $NoControl=$_POST['nocontrolS'];
 $Nombre=$_POST['NombreS'];
 $ApellidoP=$_POST['apellidoPS'];
 $ApellidoM=$_POST['apellidoMS'];
 $Carrera=$_POST['carreraS'];
 $Telefono= $_POST['telefonoS'];
 $Semestre= $_POST['semestreS'];
 $Dependencia= $_POST['dependenciaS'];
 $Titular= $_POST['tdependenciaS'];
 $NombreP=$_POST['nombrePS'];
 $CPDep= $_POST['cpDep'];
 $EstadoDep= $_POST['estadoDep'];
 $MunicipioDep= $_POST['municipioDep'];
 $ColoniaDep= $_POST['coloniaDep'];
 $CalleDep= $_POST['calleDep'];
 $Periodo= $_POST['periodoS'];
 $Year= $_POST['yearS'];
 $pregunta1= $_POST['pregunta1'];
 $pregunta2= $_POST['pregunta2'];
 $pregunta3= $_POST['pregunta3'];
 $pregunta4= $_POST['pregunta4'];
 $pregunta5= $_POST['pregunta5'];
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

}


// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); // añade pagina en blanco
$pdf->SetFont('Arial','',10); //propiedades de la letra
 //imagen: nombre de archivo, png o jpg, x-y de posicion y tamaño

//LOGOS//
$pdf->SetXY(20,15);
$pdf->Cell(100,100, $pdf->Image('img/encabezado.png', $pdf->GetX(), $pdf->GetY(),150,15),0);

//TITULO
$pdf->SetXY(17,45);
$pdf->SetFont('Arial','B',16); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN '),90,90);

    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
    $pdf->SetFont('Arial','B',18); //propiedades de la letra
$pdf->SetXY(35,75);
$pdf->Cell(50,4,utf8_decode('PLAN DE TRABAJO DE SERVICIO SOCIAL '),40,40);

//datos//
//nombre
$pdf->SetXY(15,85);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Nombre del prestador de servicio social: ' .$Nombre.' ' .$ApellidoP.' '.$ApellidoM.' '),90,90);
//no de contr
$pdf->SetXY(15,95);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('No de control: ' .$NoControl. ' '),90,90);
    //SEMESTRE 
    $pdf->SetXY(90,95);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('Semestre: ' .$Semestre. ' '),90,90);
    //CARRERA
$pdf->SetXY(15,105);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Carrera: ' .$Carrera. ' '),90,90);
//NOMBRE DEL PROGRAMA 
$pdf->SetXY(15,115);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Nombre del programa: ' .$NombreP. ''),90,90);
//DEPENDENCIA
$pdf->SetXY(15,125);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Dependencia: ' .$Dependencia. ' '),90,90);
// UBICACION
$pdf->SetXY(15,135);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Ubicación: '),90,90);
// UBICACION PArte 2
$pdf->SetXY(32,135);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('' .$CPDep.', ' .$EstadoDep.', ' .$MunicipioDep.', colonia' .$ColoniaDep.', calle '.$CalleDep.' '),90,90);
   //RESPONSABLE DEL PROGRAMA
$pdf->SetXY(15,145);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Responsable del programa: ' .$Titular. ' '),90,90);
  //PERIODO
$pdf->SetXY(15,155);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Periodo: ' .$Periodo. ' ' .$Year. ''),90,90);
    
    //LOGOS PIE DE PAGINA //
$pdf->SetXY(20,-40);
$pdf->Cell(100,100, $pdf->Image('img/piedefoto.png', $pdf->GetX(), $pdf->GetY(),170,20),0);

//segunda pagina//
//LOGOS//
$pdf->SetXY(20,15);
$pdf->Cell(100,100, $pdf->Image('img/encabezado.png', $pdf->GetX(), $pdf->GetY(),150,15),0);


//CUESTIONARIO//
//A)
$pdf->SetXY(15,40);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('a) Objetivo del programa en el que participará el alumno.'),90,90);
//TABLA DE RESPUESTA// 
$pdf->SetXY(15,50);
$pdf->SetFont('Arial','',9); //propiedades de la letra
$pdf->MultiCell(180,6,utf8_decode($pregunta1),1,'J',0);

 //B)
$pdf->SetXY(15,75);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('b) Descripción del programa en el que paeticipará el alumno.'),90,90);
//TABLA DE RESPUESTA// 
$pdf->SetXY(15,85);
$pdf->SetFont('Arial','',9); //propiedades de la letra
$pdf->MultiCell(180,6,utf8_decode($pregunta2),1,'J',0);

 //C)
$pdf->SetXY(15,110);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('c) Justificación de la participación del alumno.'),90,90);
 //TABLA DE RESPUESTA// 
  $pdf->SetXY(15,120);
  $pdf->SetFont('Arial','',9); //propiedades de la letra
  $pdf->MultiCell(180,6,utf8_decode($pregunta3),1,'J',0);
//D)
$pdf->SetXY(15,145);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('d) Sector de Población al que impactará tu srvicio social.'),90,90);
 //TABLA DE RESPUESTA// 
  $pdf->SetXY(15,155);
  $pdf->SetFont('Arial','',9); //propiedades de la letra
  $pdf->MultiCell(180,6,utf8_decode($pregunta4),1,'J',0);
//E)
$pdf->SetXY(15,180);
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('e) Cantidad de personas beneficiadas con tu Servicio Social.'),90,90);
 //TABLA DE RESPUESTA// 
  $pdf->SetXY(15,190);
  $pdf->SetFont('Arial','',9); //propiedades de la letra
  $pdf->MultiCell(180,6,utf8_decode($pregunta5),1,'J',0);

    //LOGOS PIE DE PAGINA //
    $pdf->SetXY(20,-30);
    $pdf->Cell(100,100, $pdf->Image('img/piedefoto.png', $pdf->GetX(), $pdf->GetY(),170,20),0);

//tercera pagina//
//LOGOS//
$pdf->SetXY(20,15);
$pdf->Cell(100,100, $pdf->Image('img/encabezado.png', $pdf->GetX(), $pdf->GetY(),150,15),0);

//CRONOGRAMA DE ACTIVIDADES//
$pdf->SetXY(30,40);
$pdf->SetFont('Arial','B',14); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('CRONOGRAMA DE ACTIVIDADES'),90,90);

//CRONOGRAMA DE ACTIVIDADES//
$pdf->SetXY(135,50);
$pdf->SetFont('Arial','',14); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('M E S E S'),90,90);

 //TABLA DE PERIODO//
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(80,10,utf8_decode('ACTIVIDADES'),1.0,'');
$pdf->Cell(15,10,utf8_decode(' ENE'),1.0,'');
$pdf->Cell(15,10,utf8_decode(' FEB'),1.0,'');
$pdf->Cell(18,10,utf8_decode(' MARZO'),1.0,'');
$pdf->Cell(15,10,utf8_decode(' ABRIL'),1.0,'');
$pdf->Cell(15,10,utf8_decode(' MAYO'),1.0,'');
$pdf->Cell(15,10,utf8_decode(' JUNIO'),1.0,'');
$pdf->Cell(15,10,utf8_decode(' JULIO'),1.0,'');
//COLUMNA DOS
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(80,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(18,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 //COLUMNA TRES
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(80,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(18,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 //COLUMNA CUATRO
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(80,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(18,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 //COLUMNA CINCO
 $pdf->Ln();
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->Cell(80,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(18,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');
 $pdf->Cell(15,15,utf8_decode(''),1.0,'');

 //FIRMAS//
 //firma del alumno
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->SetXY(20,145);
 $pdf->Cell(62,40,utf8_decode ('________________________'),90,90);
 $pdf->SetXY(20,150);
 $pdf->Cell(62,40,utf8_decode (' Nombre y firma del alumno'),90,90);

 //firma responsable del programa
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->SetXY(120,145);
$pdf->Cell(62,40,utf8_decode ('________________________'),90,90);
$pdf->SetXY(120,150);
$pdf->Cell(105,40,utf8_decode ('      Nombre, firma y sello'),90,90);
$pdf->SetXY(120,155);
$pdf->Cell(100,40,utf8_decode ('   Responsable del programa'),90,90);

 //firma de oficina de servicio social
 $pdf->SetFont('Arial','',10); //propiedades de la letra
 $pdf->SetXY(70,180);
 $pdf->Cell(62,40,utf8_decode ('________________________'),90,90);
 $pdf->SetXY(70,185);
 $pdf->Cell(62,40,utf8_decode ('   Oficina de Servicio Social'),90,90);

//LOGOS PIE DE PAGINA //
$pdf->SetXY(20,-40);
$pdf->Cell(100,100, $pdf->Image('img/piedefoto.png', $pdf->GetX(), $pdf->GetY(),170,20),0);
 header('Content-Type: application/pdf');
 header('Content-Disposition: attachment; filename="Solicitud.pdf"');
    $pdf->Output('D','plandetrabajo.pdf');
  
// 'D','plandetrabajo.pdf'

?>