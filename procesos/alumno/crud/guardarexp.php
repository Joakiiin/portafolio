<?php

session_start();

$id_insert= $_SESSION['alumno']['nocontrol'];
//Archivo 1
if ($_FILES["file1"]["error"]>0) {
	echo "Error al cargar archivos";
} else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($_FILES["file1"]["type"], $permitidos) && $_FILES["file1"]["size"] <= $limite_kb * 1024) {
		$ruta= '../../../sass/procesos/usuarios/crud/files/'.$id_insert.'/Expediente/';
		$archivo= $ruta.$_FILES["file1"]["name"];
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo)) {
			$resultado= @move_uploaded_file($_FILES["file1"]["tmp_name"], $archivo);
			if ($resultado) {
				echo '<script>alert("Archivo guardado")</script>';
			} else {
				echo "Error al guardar archivo";
			} 
			
		}
		else {
			echo "Archivo ya existe";
		}
	} else {
		echo "Archivo no permitido o excede el tamaño";
	}
}
//Archivo 2
if ($_FILES["file2"]["error"]>0) {
	echo "Error al cargar archivos";
} else {
	
	if (in_array($_FILES["file2"]["type"], $permitidos) && $_FILES["file2"]["size"] <= $limite_kb * 1024) {
		$archivo2= $ruta.$_FILES["file2"]["name"];
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo2)) {
			$resultado2= @move_uploaded_file($_FILES["file2"]["tmp_name"], $archivo2);
			if ($resultado2) {
				echo '<script>alert("Archivo guardado")</script>';
			} else {
				echo "Error al guardar archivo";
			} 
			
		}
		else {
			echo "Archivo ya existe";
		}
	} else {
		echo "Archivo no permitido o excede el tamaño";
	}
}
//Archivo 3
if ($_FILES["file3"]["error"]>0) {
	echo "Error al cargar archivos";
} else {
	
	if (in_array($_FILES["file3"]["type"], $permitidos) && $_FILES["file3"]["size"] <= $limite_kb * 1024) {
		$archivo3= $ruta.$_FILES["file3"]["name"];
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo3)) {
			$resultado3= @move_uploaded_file($_FILES["file3"]["tmp_name"], $archivo3);
			if ($resultado3) {
				echo '<script>alert("Archivo guardado")</script>';
			} else {
				echo "Error al guardar archivo";
			} 
			
		}
		else {
			echo "Archivo ya existe";
		}
	} else {
		echo "Archivo no permitido o excede el tamaño";
	}
}
//Archivo 4
if ($_FILES["file4"]["error"]>0) {
	echo "Error al cargar archivos";
} else {
	
	if (in_array($_FILES["file4"]["type"], $permitidos) && $_FILES["file4"]["size"] <= $limite_kb * 1024) {
		$archivo4= $ruta.$_FILES["file4"]["name"];
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo4)) {
			$resultado4= @move_uploaded_file($_FILES["file4"]["tmp_name"], $archivo4);
			if ($resultado4) {
				echo '<script>alert("Archivo guardado")</script>';
			} else {
				echo "Error al guardar archivo";
			} 
			
		}
		else {
			echo "Archivo ya existe";
		}
	} else {
		echo "Archivo no permitido o excede el tamaño";
	}
}
return;
?>