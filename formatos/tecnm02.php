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
 $fechaI= $_POST['fechaIS'];
 $fechaT= $_POST['fechaTS'];
 $CP= $_POST['cpS'];
 $Estado= $_POST['estadoS'];
 $Municipio= $_POST['municipioS'];
 $Colonia= $_POST['coloniaS'];
 $Calle= $_POST['calleS'];
 $CPDep= $_POST['cpDep'];
 $EstadoDep= $_POST['estadoDep'];
 $MunicipioDep= $_POST['municipioDep'];
 $ColoniaDep= $_POST['coloniaDep'];
 $CalleDep= $_POST['calleDep'];
$CiudadTec= $_POST['ciudadTec'];
 $Dia= $_POST['diaF'];
 $Mes= $_POST['mesF'];
 $Year= $_POST['yearF'];
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
    // Número de página
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
$pdf->Cell(65,8,utf8_decode ('Código: TecNM-VI-PO-002-02'),1,1,'C',0);
$pdf->SetXY(35,25);
$pdf->Cell(93.8,12,'Referencia a la Norma ISO 9001:2015  8.1',1,1,'C',0);
$pdf->SetXY(129,23);
$pdf->Cell(65,7,utf8_decode ('revisión: 0'),1,1,'C',0);
$pdf->SetXY(129,30);
$pdf->Cell(65,7,utf8_decode('Página ').$pdf->PageNo().'/{nb}',1,1,'C',0);
$pdf->Ln(60);

//POSICION NOMBRE DE FORMATO
$pdf->SetXY(50,35);
//TITULO
$pdf->SetFont('Arial','B',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('DEPARTAMENTO DE GESTIÓN TECNOLÓGICA Y VINCULACIÓN '),90,90);

    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
$pdf->SetXY(70,45);
$pdf->Cell(50,4,utf8_decode('OFICINA DE  SERVICIO SOCIAL '),40,40);
//SALTO DE LINEA
$pdf->Ln(5);
    //SALTO DE LINEA //POSICION NOMBRE DE FORMATO
    $pdf->SetXY(60,55);
    $pdf->Cell(50,4,utf8_decode('CARTA COMPROMISO DE SERVICIO SOCIAL '),40,40);

    //leyenda//
    $pdf->SetXY(15,65);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('Con el fin de dar cumplimiento a lo establecido en la Ley Reglamentaria del Artículo 5° Constitucional relativo'),40,40);
$pdf->Cell(50,4,utf8_decode('al ejercicio de profesiones, el suscrito: '),40,40);

//datos//
//nombre
$pdf->SetXY(15,75);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('NOMBRE: ' .$Nombre.' ' .$ApellidoP.' '.$ApellidoM.' '),90,90);
//no de control 
$pdf->SetXY(99,75);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('No DE CONTROL: ' .$NoControl. ' '),90,90);
//DOMICILIO_Campo
$pdf->SetXY(15,85);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('DOMICILIO: '),90,90);
//DOMICILIO parte 1
$pdf->SetXY(36,85);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('' .$CP.', ' .$Estado.', ' .$Municipio.', '),90,90);
//Domicilio parte 2
$pdf->SetXY(36,89);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('colonia ' .$Colonia.', calle '.$Calle.' '),90,90);
//TEL 
$pdf->SetXY(15,96);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('TEL: ' .$Telefono. ' '),90,90);
//CARRERA
$pdf->SetXY(15,105);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('CARRERA: ' .$Carrera. ' '),90,90);
//SEMESTRE 
$pdf->SetXY(150,105);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('SEMESTRE: ' .$Semestre. ' '),90,90);
// DEPENDENCIA
$pdf->SetXY(15,115);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('DEPENDENCIA: ' .$Dependencia. ' '),90,90);
   //DOMICILIO DE LA DEPENDENCIA 
$pdf->SetXY(15,125);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('DOMICILIO DEPENDENCIA:'),90,90);
       //DOMICILIO DE LA DEPENDENCIA PARTE 2
$pdf->SetXY(62,125);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('' .$CPDep.', ' .$EstadoDep.', ' .$MunicipioDep.','),90,90);
           //DOMICILIO DE LA DEPENDENCIA PARTE 3
$pdf->SetXY(62,130);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('colonia ' .$ColoniaDep.', calle '.$CalleDep.' '),90,90);
  //RESPONSABLE DEL PROGRAMA
$pdf->SetXY(15,137);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('RESPONSABLE DEL PROGRAMA: ' .$Titular. ' '),90,90);
    //FECHA DE INICIO
$pdf->SetXY(15,145);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('FECHA DE INICIO: ' .$fechaI. ' '),90,90);
//FECHA DE TERMINACION  
$pdf->SetXY(105,145);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('FECHA DE TERMINACION: ' .$fechaT. ' '),90,90);   
    
 //leyenda 2 //
$pdf->SetXY(15,160);
 $pdf->SetFont('Arial','',10); //propiedades de la letra
$pdf->Cell(50,4,utf8_decode('Me comprometo a realizar el Servicio Social acatando el reglamento emitido por el Tecnologico Nacional de'),40,40);
$pdf->Cell(50,4,utf8_decode('México y llevarlo a cabo en el lugar y periodos manifestados, así como a participar con mis conocimientos e'),40,40);   
$pdf->Cell(50,4,utf8_decode('iniciativa en las actividades que desempeñe, procurando dar una imagen positiva del Instituto Tecnológico en'),40,40); 
$pdf->Cell(50,4,utf8_decode(' el organismo o dependencia oficial. De no hacerlo así, quedo enterado (a) de la cancelación respectiva,la cual'),40,40); 
$pdf->Cell(50,4,utf8_decode('procederá automáticamente.'),40,40);     

    //FECHA y UBICACION FINAL//
//en la ciudad de
    $pdf->SetXY(15,185);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('En la ciudad de:                     ' .$CiudadTec. ''),90,90);
    //del dia  
    $pdf->SetXY(105,185);
    $pdf->SetFont('Arial','',10); //propiedades de la letra
        $pdf->Cell(35,10,utf8_decode('del día:      ' .$Dia. '      del'),90,90); 
        $pdf->Line(43, 193, 105, 193);
        $pdf->Line(119, 193, 130, 193);
//del mes 
$pdf->SetXY(15,195);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('mes:                     ' .$Mes. ''),90,90); 

    //de
$pdf->SetXY(70,195);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('de:      ' .$Year. ''),90,90); 
    $pdf->Line(25, 203, 70, 203);
    $pdf->Line(77, 203, 95, 203);
        //firma//
//conformidad
$pdf->SetXY(92,225);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Conformidad:'),90,90);

//linea firma 
$pdf->SetXY(70,245);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('________________________________'),90,90);

//firma del alumno
$pdf->SetXY(90,255);
$pdf->SetFont('Arial','',10); //propiedades de la letra
    $pdf->Cell(35,10,utf8_decode('Firma del alumno'),90,90);
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Solicitud.pdf"');
        $pdf->Output('D','carta_compromiso.pdf');
      
        

?>