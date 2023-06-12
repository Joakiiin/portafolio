<?php
$conn = mysqli_connect("localhost", "root", "Adm1n15tr4D0r11!", "sassf");
$id = $_POST['NoControl'];
$query = "DELETE FROM alumno WHERE NoControl = '$id'";
mysqli_query($conn, $query);
?>
