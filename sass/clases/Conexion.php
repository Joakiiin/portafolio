<?php

    class Conexion {
        public function conectar() {
            $servidor = "localhost";
            $usuario = "root";
            $password = "Adm1n15tr4D0r11!";
            $db = "sassf";
            $conexion = mysqli_connect($servidor, $usuario, $password, $db);

            return $conexion;
        }
    }
?>