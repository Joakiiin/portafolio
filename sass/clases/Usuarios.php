<?php

    include "Conexion.php";

    class Usuarios extends Conexion {
        
        public function loginUsuario($usuario, $password) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM tab_usuario WHERE usuario = '$usuario' AND password = '$password'";

            $respuesta = mysqli_query($conexion, $sql);

            //Si es diferente de cero, quiere decir que retorna por lo menos un registro
            if (mysqli_num_rows($respuesta) > 0) {
                $datosUsuario = mysqli_fetch_array($respuesta);

                if ($datosUsuario['estatus'] == 1) {
                    $_SESSION['usuario']['nombre'] = $datosUsuario['usuario'];
                    $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
                    $_SESSION['usuario']['rol'] = $datosUsuario['id_rol'];

                    return 1;
                } else {
                    return 0;
                }

            } else {
                return 0;
            }
        }

        public function agregarNuevoUsuario($datos) {
            $conexion = Conexion::conectar();
            $idPersona = self::agregarPersona($datos);

            if ($idPersona > 0) {
                $sql = "INSERT INTO tab_usuario (id_rol,
                                                id_persona,
                                                id_alumno,
                                                usuario,
                                                password)
                        VALUES (?, ?, ?, ?, ?)";

                $query = $conexion->prepare($sql);

                $query->bind_param("iiiss", $datos['idRol'],
                                            $idPersona,
                                            $datos['idAlumno'],
                                            $datos['usuario'],
                                            $datos['password']);
                                                          
                $respuesta = $query->execute();

                
                return $respuesta;
            } else {
                return 0;
            }
            
        }

        public function agregarPersona($datos){
            $conexion = Conexion::conectar();
            $idDomicilio = self::agregarDomicilio($datos);

            $sql = "INSERT INTO tab_persona (id_domicilio,
                                                paterno,
                                                materno,
                                                nombre,
                                                edad,
                                                sexo,
                                                telefono,
                                                correo)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $query = $conexion->prepare($sql);

            $query->bind_param("isssssss", $idDomicilio,
                                        $datos['paterno'],
                                        $datos['materno'],
                                        $datos['nombre'],
                                        $datos['edad'],
                                        $datos['sexo'],
                                        $datos['telefono'],
                                        $datos['correo']);

            $respuesta = $query->execute();
            $carpeta= $datos['nombre'];
            $ruta= 'files/'.$carpeta.'/';
            if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
            $idPersona = mysqli_insert_id($conexion);
            $query->close();
            return $idPersona;
        }

        public function agregarDomicilio($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO tab_domicilio (calle,
                                                numero_exterior,
                                                numero_interior,
                                                colonia,
                                                municipio,
                                                estado)
                    VALUES (?, ?, ?, ?, ?, ?)";

            $query = $conexion->prepare($sql);

            $query->bind_param("ssssss", $datos['calle'],
                                        $datos['nExterior'],
                                        $datos['nInterior'],
                                        $datos['colonia'],
                                        $datos['municipio'],
                                        $datos['estado']);

            $respuesta = $query->execute();
            $idDomicilio = mysqli_insert_id($conexion);
            $query->close();
            return $idDomicilio;
        }

        public function obtenerDatosUsuario($idUsuario) {
            $conexion = Conexion::conectar();

            $sql = "SELECT 
                        usuarios.id_usuario AS idUsuario,
                        usuarios.usuario AS nombreUsuario,
                        usuarios.id_persona AS idPersona,
                        persona.id_domicilio AS idDomicilio,
                        persona.nombre AS nombrePersona,
                        persona.paterno AS paterno,
                        persona.materno AS materno,
                        persona.edad AS edad,
                        persona.sexo AS sexo,
                        persona.telefono AS telefono,
                        persona.correo AS correo,
                        domicilio.calle AS calle,
                        domicilio.numero_exterior AS nExterior,
                        domicilio.numero_interior AS nInterior,
                        domicilio.colonia AS colonia,
                        domicilio.municipio AS municipio,
                        domicilio.estado AS estado,
                        usuarios.fecha_registro AS fechaRegistro
                    FROM
                        tab_usuario AS usuarios
                            INNER JOIN
                        tab_persona AS persona ON usuarios.id_persona = persona.id_persona
                            INNER JOIN
                        tab_domicilio AS domicilio ON persona.id_domicilio = domicilio.id_domicilio
                            AND usuarios.id_usuario = '$idUsuario';";

            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);

            $datos = array(
                'idUsuario' => $usuario['idUsuario'],
                'nombreUsuario' => $usuario['nombreUsuario'],
                'idPersona' => $usuario['idPersona'],
                'idDomicilio' => $usuario['idDomicilio'],
                'nombrePersona' => $usuario['nombrePersona'],
                'paterno' => $usuario['paterno'],
                'materno' => $usuario['materno'],
                'edad' => $usuario['edad'],
                'sexo' => $usuario['sexo'],
                'telefono' => $usuario['telefono'],
                'correo' => $usuario['correo'],
                'calle' => $usuario['calle'],
                'nExterior' => $usuario['nExterior'],
                'nInterior' => $usuario['nInterior'],
                'colonia' => $usuario['colonia'],
                'municipio' => $usuario['municipio'],
                'fechaRegistro' => $usuario['fechaRegistro'],

            );

            return $datos;
        }

        public function obtenerIdPersona($idUsuario) {
            $conexion = Conexion::conectar();

            $sql = "SELECT persona.id_persona as idPersona 
                    FROM tab_usuario AS usuarios 
                    INNER JOIN tab_persona AS persona 
                    ON usuarios.id_persona = persona.id_persona 
                    AND usuarios.id_usuario = '$idUsuario' ";

            $respuesta = mysqli_query($conexion, $sql);
            $idPersona = mysqli_fetch_array($respuesta)['idPersona'];
            return $idPersona;
        }

        public function resetPassword($datos) {
            $conexion = Conexion::conectar();

            $sql = "UPDATE tab_usuario SET password = ? WHERE id_usuario = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param('si', $datos['password'],
                                    $datos['idUsuario']);
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }

        public function cambioEstatusUsuario($idUsuario, $estatus) {
            $conexion = Conexion::conectar();

            if ($estatus == 1) {
                $estatus = 0;
            } else {
                $estatus = 1;
            }
            
            $sql = "UPDATE tab_usuario 
                    SET estatus = ?
                    WHERE id_usuario = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estatus, $idUsuario);
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }

    }
?>