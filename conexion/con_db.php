<?php
function conexion(){
	$conexion=mysqli_connect('localhost','root','TU_CONTRASEÑA','TU_BASE_DE_DATOS');
	return $conexion;
}
?>
