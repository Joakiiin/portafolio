<?php

    class Conexion {
        public function conectar() {
            $servidor = "localhost";
            $usuario = "root";
            $password = "TU_CONTRASEÑA";
            $db = "TU_BASE_DE_DATOS";
            $conexion = mysqli_connect($servidor, $usuario, $password, $db);

            return $conexion;
        }
    }
?>
