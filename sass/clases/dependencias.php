<?php
include "Conexion.php";

class Dependencias extends Conexion {
    public function loginAlumno($alumno, $password){
        $conexion= Conexion::conectar();
        $sql= "SELECT * FROM alumno WHERE NoControl= '$alumno' AND pass= '$password'";
        $respuesta= mysqli_query($conexion, $sql);
        if (mysqli_num_rows($respuesta) > 0){
            $datosAlumno= mysqli_fetch_array($respuesta);
            if ($datosAlumno['estatus'] == 1){
            $_SESSION['alumno']['nocontrol']= $datosAlumno['NoControl'];
            $_SESSION['alumno']['rol']= $datosAlumno['idRolFK'];
            return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function agregarNuevoDep($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO dependencia (idDependencia, passw, NombreDep, TitularDep, puesto) 
        VALUES (?,?,?,?,?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("issss",
                                        $datos['idDep'],
                                        $datos['passw'],
                                        $datos['nombreD'], 
                                        $datos['titularD'],
                                        $datos['puesto']);
            $respuesta = $query->execute();
            $sql2= "INSERT INTO domiciliosdep (codigoPDep, estadoDep, ciudadDep, 
            municipioDep,coloniaDep, calleNoDep, NoControlDomDep) 
            VALUES (?,?,?,?,?,?,?)";
                        $query2 = $conexion->prepare($sql2);
                        $query2->bind_param("isssssi",
                                            $datos['cp'],
                                            $datos['estado'],
                                            $datos['ciudad'], 
                                            $datos['municipio'],
                                            $datos['colonia'],
                                            $datos['calle'],
                                            $datos['idDep']);
                $respuesta2 = $query2->execute();
            $nombre_archivo = $datos['nombre_archivo'];
            $tipo = $datos['tipo'];
            $tamaño = $datos['tamaño'];
            $ruta_temporal = $datos['ruta_temporal'];
            $error= $datos['error'];
            $carpeta= $datos['idDep'];
            $ruta= 'files2/'.$carpeta.'/';
            if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
        if ($error>0) {
            echo "Error al cargar archivos";
        } else {
            $permitidos= array("image/jpg","image/png","application/pdf");
            $limite_kb= 500;
            if (in_array($tipo, $permitidos) && $tamaño <= $limite_kb * 1024) {
                $archivo= $ruta.$nombre_archivo;
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0777, true);
                }
                if (!file_exists($archivo)) {
                    $resultado= @move_uploaded_file($ruta_temporal, $archivo);
                    if ($resultado) {
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
            return $respuesta && $respuesta2;
    }

    public function obtenerDatosDependencia($idDependencia){
        $conexion= Conexion::conectar();
        $sql= "SELECT dep.idDependencia, dep.NombreDep, dep.TitularDep, dep.puesto, 
        ddep.codigoPDEP, ddep.estadoDep, ddep.ciudadDep, ddep.municipioDep, ddep.coloniaDep,
        ddep.calleNoDep
        FROM dependencia AS dep INNER JOIN domiciliosdep AS ddep ON 
        ddep.NoControlDomDep = dep.idDependencia
        WHERE idDependencia= $idDependencia";
        $respuesta= mysqli_query($conexion, $sql);
        $dependencia= mysqli_fetch_array($respuesta);
        $datos= array(
        'cp' => $dependencia['codigoPDEP'],
        'estado' => $dependencia['estadoDep'],
        'ciudad' => $dependencia['ciudadDep'],
        'municipio' => $dependencia['municipioDep'],
        'colonia' => $dependencia['coloniaDep'],
        'calle' => $dependencia['calleNoDep'],

        'idDependencia' => $dependencia['idDependencia'],
        'NombreDep' => $dependencia['NombreDep'],
        'TitularDep' => $dependencia['TitularDep'],
        'puesto' => $dependencia['puesto']
            );
            return $datos;
    }
    public function actualizarDep($datos){
        $conexion= Conexion::conectar();
        $sql= "UPDATE dependencia SET
                                 NombreDep = ?,
                                 TitularDep = ?,
                                 puesto = ?
                                 WHERE idDependencia = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("sssi", $datos['NombreDep'],
                                        $datos['TitularDep'],
                                        $datos['puesto'],
                                        $datos['idDependencia'] 
                                        
                                    );
        $respuesta = $query->execute();
        $query->close();
        $sql2= "UPDATE domiciliosDep SET
                                 codigoPDep = ?,
                                 estadoDep = ?,
                                 ciudadDep = ?,
                                 municipioDep = ?,
                                 coloniaDep = ?,
                                 calleNoDep = ?
                                 WHERE NoControlDomDep = ?";
        $query2 = $conexion->prepare($sql2);
        $query2->bind_param("isssssi", $datos['cp'],
                                        $datos['estado'],
                                        $datos['ciudad'],
                                        $datos['municipio'],
                                        $datos['colonia'],
                                        $datos['calle'],
                                        $datos['idDependencia']  
                                    );
        $respuesta2 = $query2->execute();
        $query2->close();
        return $respuesta && $respuesta2;
    }
    public function cambiarPassword($datos){
        $conexion= Conexion::conectar();
        $sql="UPDATE dependencia SET passw=? WHERE idDependencia=?";
        $query= $conexion->prepare($sql);
        $query->bind_param("si", $datos['passw'], $datos['idDependencia']);
        $respuesta= $query->execute();
        $query->close();
        return $respuesta;
    }

    public function cambioDependencia ($idDependencia, $estatus){
        $conexion= Conexion::conectar();
        if ($estatus==1) {
            $estatus =0;
        } else {
            $estatus= 1;
        }
        $sql= "UPDATE dependencia SET estatus= ? WHERE idDependencia= ?";
        $query= $conexion->prepare($sql);
        $query->bind_param('ii', $estatus, $idDependencia);
        $respuesta= $query->execute();
        $query->close();
        return $respuesta;
    }
    public function eliminarDependencia($datos){
        $conexion= Conexion::conectar();
        // Eliminar registros de la tabla programaseleccionado
        $sql1 = "DELETE FROM domiciliosdep WHERE NoControlDomDep = ?";
        $query1 = $conexion->prepare($sql1);
        $query1->bind_param("i", $datos['idDependencia']);
        $query1->execute();
        $query1->close();
    
        // Eliminar registros de la tabla cartacompromiso
        $sql2 = "DELETE FROM programa WHERE idDependencia1 = ?";
        $query2 = $conexion->prepare($sql2);
        $query2->bind_param("i", $datos['idDependencia']);
        $query2->execute();
        $query2->close();
    
        // Eliminar registros de la tabla fechainiciotermino
        $sql3 = "DELETE FROM dependencia WHERE idDependencia = ?";
        $query3 = $conexion->prepare($sql3);
        $query3->bind_param("i", $datos['idDependencia']);
        $query3->execute();
        $query3->close();

        return true;
    }
}


?>