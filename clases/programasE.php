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

    public function elegirPrograma($datos) {
        $conexion = Conexion::conectar();
    
        // Obtener número de lugares disponibles para el programa
        $idPrograma = $datos['idPrograma1'];
        $sqlLugares = "SELECT lugares FROM programa WHERE idPrograma = ?";
        $queryLugares = $conexion->prepare($sqlLugares);
        $queryLugares->bind_param("i", $idPrograma);
        $queryLugares->execute();
        $queryLugares->bind_result($lugaresDisponibles);
        $queryLugares->fetch();
        $queryLugares->close();
    
        // Contar el número de alumnos seleccionados para el programa
        $sqlContar = "SELECT COUNT(*) FROM programaseleccionado WHERE idPrograma1 = ?";
        $queryContar = $conexion->prepare($sqlContar);
        $queryContar->bind_param("i", $idPrograma);
        $queryContar->execute();
        $queryContar->bind_result($alumnosSeleccionados);
        $queryContar->fetch();
        $queryContar->close();
    
        // Verificar disponibilidad de lugares y realizar la inserción en la tabla programaseleccionado
        if ($alumnosSeleccionados < $lugaresDisponibles) {
            $sqlInsertar = "INSERT INTO programaseleccionado (idPrograma1, NoControl1) VALUES (?,?)";
            $queryInsertar = $conexion->prepare($sqlInsertar);
            $queryInsertar->bind_param("ii", $datos['idPrograma1'], $datos['NoControl1']);
            $respuestaInsertar = $queryInsertar->execute();
            $queryInsertar->close();
    
            // Actualizar el rol del alumno
            $sqlActualizarRol = "UPDATE alumno SET idRolFK = 3 WHERE NoControl = ?";
            $queryActualizarRol = $conexion->prepare($sqlActualizarRol);
            $queryActualizarRol->bind_param("i", $datos['NoControl1']);
            $respuestaActualizarRol = $queryActualizarRol->execute();
            $queryActualizarRol->close();
    
            // Retornar la respuesta combinada
            return $respuestaInsertar && $respuestaActualizarRol;
        } else {
            // Retornar falso si no hay lugares disponibles
            return false;
        }
    }
}    


?>
