<?php

if (isset($_GET['d_codigo'])) {
  $d_codigo = $_GET['d_codigo'];
  $datos = json_decode(file_get_contents("http://localhost/MEXICO/estados.php?d_codigo=$d_codigo"), true);
  if ($datos) {
    // Si se encontraron datos para el paciente, devolverlos en formato JSON
    echo json_encode($datos);
  } else {
    // Si no se encontraron datos para el paciente, devolver un mensaje de error en formato JSON
    echo json_encode(['error' => "No se encontraron datos para el paciente con ID $d_codigo"]);
  }
}
?>