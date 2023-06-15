<?php
$conn = mysqli_connect("localhost", "root", "CONTRASEÑA", "BD");
$id = $_POST['NoControl'];
$query = "DELETE FROM alumno WHERE NoControl = '$id'";
mysqli_query($conn, $query);
?>
