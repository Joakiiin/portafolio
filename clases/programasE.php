<?php
include "Conexion.php";

class ProgramasE extends Conexion {
    public function obtenerDatosProgramaE($idPrograma){
        $conexion= Conexion::conectar();
        $sql= "SELECT p.idPrograma, p.NombreP, p.Objetivo, p.idTipoAct1, 
        p.idModalidad1, p.idDependencia1, tp.Actividad, m.Modalidad
        FROM programa AS p
        INNER JOIN modalidad AS m ON m.idModalidad = p.idModalidad1
        INNER JOIN tipoactividad AS tp ON tp.idTipoAct = p.idTipoAct1
        WHERE idPrograma= $idPrograma";
        $respuesta= mysqli_query($conexion, $sql);
        $programa= mysqli_fetch_array($respuesta);
        $datos= array(
        'idPrograma' => $programa['idPrograma'],
        'NombreP' => $programa['NombreP'],
        'Objetivo' => $programa['Objetivo'],
        'idDependencia' => $programa['idDependencia1'],
        'idTipoAct' => $programa['Actividad'],
        'idModalidad' => $programa['Modalidad']
            );
            return $datos;
    }

    public function elegirPrograma($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO programaseleccionado (idPrograma1, NoControl1) 
        VALUES (?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("ii", $datos['idPrograma1'],
                                        $datos['NoControl1']
                                    );
        $respuesta = $query->execute();
        $query->close();
        $sql2 = "UPDATE alumno SET idRolFK = 3 WHERE NoControl = ?";
    $query2 = $conexion->prepare($sql2);
    $query2->bind_param("i", $datos['NoControl1']);
    $respuesta2 = $query2->execute();
    $query2->close();
        return $respuesta && $respuesta2;
    }

}


?>