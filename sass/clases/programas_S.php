<?php
include "Conexion.php";

class ProgramasS extends Conexion {
    public function obtenerDatosProgramaS($idPS){
        $conexion= Conexion::conectar();
        $sql= "SELECT ps.idPS, ps.NoControl1, ps.idPrograma1, p.idPrograma, p.NombreP 
        FROM programaseleccionado AS ps INNER JOIN programa AS p
        ON ps.idPrograma1= p.idPrograma
        WHERE idPS= $idPS";
        $respuesta= mysqli_query($conexion, $sql);
        $programaS= mysqli_fetch_array($respuesta);
        $datos= array(
        'idPS' => $programaS['idPS'],
        'NoControl1' => $programaS['NoControl1'],
        'idPrograma1' => $programaS['idPrograma1']
            );
            return $datos;
    }
    public function actualizarProgramaS($datos){
        $conexion= Conexion::conectar();
        $sql= "UPDATE programaseleccionado SET
                                 idPrograma1 = ?
                                 WHERE idPS = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("ii", $datos['idPrograma1'],
                                        $datos['idPS']
                                    );
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
    public function eliminarSeleccion($datos){
        $conexion= Conexion::conectar();
        $sql= "DELETE FROM programaseleccionado WHERE NoControl1 = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("i", 
                                    $datos['NoControl1']
                                    );
        $respuesta = $query->execute();
        $query->close();
        $sql2 = "UPDATE alumno SET idRolFK = 2 WHERE NoControl = ?";
    $query2 = $conexion->prepare($sql2);
    $query2->bind_param("i", $datos['NoControl1']);
    $respuesta2 = $query2->execute();
    $query2->close();
        return $respuesta && $respuesta2;
    }

}



?>