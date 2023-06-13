<?php
  // Conectar a la base de datos
  $conn = mysqli_connect('localhost', 'root', 'CONTRASEÑA', 'BASE_DE_DATOS');
  
  // Consultar todos los usuarios en la base de datos
  $query = 'SELECT usuario FROM tab_usuario';
  $result = mysqli_query($conn, $query);
  
  // Mostrar una tabla HTML para los usuarios y sus archivos
  echo '<table border="1">';
  echo '<tr>';
  echo '<th>Nombre de usuario</th>';
  echo '<th>Archivos</th>';
  echo '</tr>';
  
  // Recorrer los usuarios en la base de datos
  while ($row = mysqli_fetch_array($result)) {
    $username = $row['usuario'];
    $user_dir = '../../procesos/usuarios/crud/files/'. $username.'/';
    
    // Mostrar nombre de usuario
    echo '<tr>';
    echo '<td>' . $username . '</td>';
    
    // Mostrar archivos del usuario
    echo '<td>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Nombre de archivo</th>';
    echo '<th>Tamaño</th>';
    echo '</tr>';
    
    // Abrir la carpeta del usuario
    $dir = opendir($user_dir);
    
    // Recorrer los archivos en la carpeta
    while (($file = readdir($dir)) !== false) {
      if ($file == '.' || $file == '..') {
        continue;
      }
      
      // Mostrar información de archivo
      $file_path = $user_dir . '/' . $file;
      echo '<tr>';
      echo '<td>' . $file . '</td>';
      echo '<td>' . filesize($file_path) . ' bytes</td>';
      echo '</tr>';
    }
    
    // Cerrar la carpeta
    closedir($dir);
    
    echo '</table>';
    echo '</td>';
    echo '</tr>';
  }
  
  echo '</table>';
  
  // Cerrar la conexión a la base de datos
  mysqli_close($conn);
?>
