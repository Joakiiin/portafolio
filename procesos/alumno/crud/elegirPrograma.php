
<?php
$datos= array(
"idPrograma1" => $_POST['idPrograma'],
"NoControl1" => $_POST['NoControl'],
"Rol" => $_POST['rol']
);
include "../../../clases/programasE.php";
$Programas= new ProgramasE();

echo $Programas->elegirPrograma($datos);

?>