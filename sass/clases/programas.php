<?php
include "Conexion.php";

class Programas extends Conexion {
    public function agregarNuevoPrograma($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO programa (idPrograma, NombreP, Objetivo, idTipoAct1, idModalidad1, idDependencia1, Lugares) 
        VALUES (?,?,?,?,?,?,?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("issiiii",
                                        $datos['idPrograma'],
                                        $datos['NombreP'],
                                        $datos['Objetivo'], 
                                        $datos['idTipoAct'],
                                        $datos['idModalidad'],
                                        $datos['idDependencia'],
                                        $datos['Lugares']);
            $respuesta = $query->execute();
            return $respuesta;
    }
    public function asignarPrograma($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO programaseleccionado (idPrograma1, NoControl1) 
        VALUES (?,?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("ii",
                                        $datos['idProgramaS'],
                                        $datos['NoControlS']
                                    );
            $respuesta = $query->execute();
            return $respuesta;
    }
    public function obtenerDatosPrograma($idPrograma){
        $conexion= Conexion::conectar();
        $sql= "SELECT idPrograma, NombreP, Objetivo, idTipoAct1, idModalidad1, idDependencia1
        FROM programa
        WHERE idPrograma= $idPrograma";
        $respuesta= mysqli_query($conexion, $sql);
        $programa= mysqli_fetch_array($respuesta);
        $datos= array(
        'idPrograma' => $programa['idPrograma'],
        'NombreP' => $programa['NombreP'],
        'Objetivo' => $programa['Objetivo'],
        'idTipoAct' => $programa['idTipoAct1'],
        'idModalidad' => $programa['idModalidad1'],
        'idDependencia' => $programa['idDependencia1']
            );
            return $datos;
    }
    public function actualizarPrograma($datos){
        $conexion= Conexion::conectar();
        $sql= "UPDATE programa SET
                                 NombreP = ?,
                                 Objetivo = ?,
                                 idTipoAct1 = ?,
                                 idModalidad1 = ?,
                                 idDependencia1 = ?,
                                 Lugares= ?
                                 WHERE idPrograma = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("ssiiiii", $datos['NombreP'],
                                        $datos['Objetivo'],
                                        $datos['idTipoAct'],
                                        $datos['idModalidad'], 
                                        $datos['idDependencia'],
                                        $datos['Lugares'],
                                        $datos['idPrograma']
                                    );
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
    public function eliminarPrograma($datos){
        $conexion= Conexion::conectar();
        $sql2 = "DELETE FROM programa WHERE idPrograma = ?";
        $query2 = $conexion->prepare($sql2);
        $query2->bind_param("i", $datos['idPrograma']);
        $respuesta= $query2->execute();
        $query2->close();
        return $respuesta;
    }
}


?>
