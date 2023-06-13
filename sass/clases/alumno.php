<?php
include "Conexion.php";

class Alumnos extends Conexion {
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
    public function agregarNuevoAlumno($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO alumno (NoControl, pass, Nombre, ApellidoP, ApellidoM, 
        Sexo, Telefono, Correo, Creditos, NoCarrera1, NoSemestre1, 
        edad) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("isssssisiiii",
                                        $datos['nocontrol'],
                                        $datos['pass'],
                                        $datos['nombre'], 
                                        $datos['paterno'],
                                        $datos['materno'],
                                        $datos['sexo'],
                                        $datos['telefono'],
                                        $datos['correo'],
                                        $datos['creditos'],
                                        $datos['carrera'],
                                        $datos['semestre'],
                                        $datos['edad']);
            $respuesta = $query->execute();
            $sql2= "INSERT INTO periodoasignado(idPeriodo1, NoControlP, Year)
            VALUES(?,?,?)";
            $query2= $conexion->prepare($sql2);
            $query2->bind_param("iis",
                                        $datos['idperiodo'],
                                        $datos['nocontrol'],
                                        $datos['year']);
            $respuesta2=$query2->execute();
            $sql_periodo = "SELECT Clave FROM periodo WHERE idPeriodo = " .$datos['idperiodo'];
            $query_periodo = mysqli_query($conexion, $sql_periodo);
            $row_periodo = mysqli_fetch_assoc($query_periodo);
            $periodo = $row_periodo['Clave'];
            $nombre_archivo = $datos['nombre_archivo'];
            $tipo = $datos['tipo'];
            $tamaño = $datos['tamaño'];
            $ruta_temporal = $datos['ruta_temporal'];
            $error= $datos['error'];
            $carpeta= $datos['nocontrol'];
            $year= $datos['year'];
            $ruta= 'files/'.$year.'_'.$periodo.'/'.$carpeta.'/KARDEX/';
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
    
    public function obtenerDatosAlumno($NoControl){
        $conexion= Conexion::conectar();
        $sql= "SELECT al.NoControl, al.Nombre, al.ApellidoP, al.ApellidoM, al.Sexo, 
        al.Telefono, al.Correo, al.edad, al.estatus, al.NoCarrera1, al.NoSemestre1, al.Creditos,
        ca.Carrera, se.Semestre, pe.idPeriodo, pa.Year
        FROM alumno AS 
        al INNER JOIN carrera AS ca ON al.NoCarrera1 = ca.NoCarrera
        INNER JOIN periodoasignado AS pa ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        INNER JOIN semestre AS se ON al.NoSemestre1 = se.NoSemestre AND al.NoControl = '$NoControl';";
        $respuesta= mysqli_query($conexion, $sql);
        $alumno= mysqli_fetch_array($respuesta);
        $datos= array(
        'NoControl' => $alumno['NoControl'],
        'ApellidoP' => $alumno['ApellidoP'],
        'ApellidoM' => $alumno['ApellidoM'],
        'Nombre' => $alumno['Nombre'],
        'Sexo' => $alumno['Sexo'],
        'Telefono' => $alumno['Telefono'],
        'Correo' => $alumno['Correo'], 
        'Carrera' => $alumno['NoCarrera1'],
        'Semestre' => $alumno['NoSemestre1'],
        'creditos' =>$alumno['Creditos'],
        'periodo' =>$alumno['idPeriodo'],
        'year' =>$alumno['Year'],
        'edad' => $alumno['edad']
            );
            return $datos;
    }
    public function obtenerDatosCarta($NoControl){
        $conexion= Conexion::conectar();
        $sql= "SELECT al.NoControl, al.Nombre, al.ApellidoP, al.ApellidoM, 
        ca.Carrera, p.NombreP, d.NombreDep, d.TitularDep
        FROM alumno AS 
        al INNER JOIN carrera AS ca ON al.NoCarrera1 = ca.NoCarrera
        INNER JOIN programaseleccionado AS ps ON al.NoControl = ps.NoControl1 
        INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1 
        INNER JOIN dependencia AS d ON d.idDependencia =p.idDependencia1
        WHERE al.NoControl= $NoControl";
        $respuesta= mysqli_query($conexion, $sql);
        $alumno= mysqli_fetch_array($respuesta);
        $datos= array(
        'Nombre' => $alumno['Nombre'],
        'ApellidoP' => $alumno['ApellidoP'],
        'ApellidoM' => $alumno['ApellidoM'],
        'CarreraN' => $alumno['Carrera'],
        'NombreDep' => $alumno['NombreDep'],
        'TitularDep' => $alumno['TitularDep'],
        'NombreP' => $alumno['NombreP']
            );
            return $datos;
    }
    public function obtenerDatosSolicitud($NoControl){
        $conexion= Conexion::conectar();
        $sql= "SELECT al.Nombre, al.ApellidoP, al.ApellidoM, 
        al.Telefono, al.Sexo, ca.Carrera, se.Semestre, d.NombreDep, d.TitularDep, 
        d.puesto, p.NombreP, p.idTipoAct1, tp.Actividad, m.modalidad, 
        pe.Periodo, pa.Year
        FROM alumno AS al 
        INNER JOIN carrera AS ca ON al.NoCarrera1 = ca.NoCarrera
        INNER JOIN programaseleccionado AS ps ON al.NoControl = ps.NoControl1 
        INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1 
        INNER JOIN dependencia AS d ON d.idDependencia =p.idDependencia1
        INNER JOIN modalidad AS m ON m.idModalidad = p.idModalidad1
        INNER JOIN tipoactividad AS tp ON tp.idTipoAct = p.idTipoAct1
        INNER JOIN semestre AS se ON se.NoSemestre = al.NoSemestre1
        INNER JOIN periodoasignado AS pa ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pa.idPeriodo1 = pe.idPeriodo
        WHERE al.NoControl = '$NoControl'";
        $respuesta= mysqli_query($conexion, $sql);
        $alumno= mysqli_fetch_array($respuesta);
        $datos= array(
        'ApellidoP' => $alumno['ApellidoP'],
        'ApellidoM' => $alumno['ApellidoM'],
        'Nombre' => $alumno['Nombre'],
        'Telefono' => $alumno['Telefono'],
        'Sexo' => $alumno['Sexo'],
        'Carrera' => $alumno['Carrera'],
        'Periodo' => $alumno['Periodo'],
        'Year' => $alumno['Year'],
        'Semestre' => $alumno['Semestre'],
        'TitularDep' => $alumno['TitularDep'],
        'Dependencia' => $alumno['NombreDep'],
        'Puesto' => $alumno['puesto'],
        'NombreP' => $alumno['NombreP'],
        'Modalidad' => $alumno['modalidad'],
        'Tipo' => $alumno['idTipoAct1']          );
            return $datos;
    }
    public function obtenerDatosCartaC($NoControl){
        $conexion= Conexion::conectar();
        $sql= "SELECT al.Nombre, al.ApellidoP, al.ApellidoM, 
        al.Telefono, al.Sexo, ca.Carrera, se.Semestre, d.NombreDep, d.TitularDep, 
        d.puesto, p.NombreP, tp.Actividad, m.modalidad, fe.fechasI, fe.fechasT, 
        dom.codigoP, dom.estado, dom.municipio, dom.colonia, dom.calleNo,
        domd.codigoPDep, domd.estadoDep, domd.municipioDep, domd.coloniaDep, domd.calleNoDep
        FROM alumno AS al 
        INNER JOIN carrera AS ca ON al.NoCarrera1 = ca.NoCarrera
        INNER JOIN programaseleccionado AS ps ON al.NoControl = ps.NoControl1 
        INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1 
        INNER JOIN dependencia AS d ON d.idDependencia =p.idDependencia1
        INNER JOIN modalidad AS m ON m.idModalidad = p.idModalidad1
        INNER JOIN tipoactividad AS tp ON tp.idTipoAct = p.idTipoAct1
        INNER JOIN semestre AS se ON se.NoSemestre = al.NoSemestre1
        INNER JOIN fechainiciotermino AS fe ON fe.NoControlIT = al.NoControl
        INNER JOIN domicilios AS dom ON dom.NoControlDom = al.NoControl
        INNER JOIN domiciliosdep AS domd ON domd.NoControlDomDep = d.idDependencia
        WHERE al.NoControl = $NoControl";
        $respuesta= mysqli_query($conexion, $sql);
        $alumno= mysqli_fetch_array($respuesta);
        $datos= array(
        'ApellidoP' => $alumno['ApellidoP'],
        'ApellidoM' => $alumno['ApellidoM'],
        'Nombre' => $alumno['Nombre'],
        'Telefono' => $alumno['Telefono'],
        'Carrera' => $alumno['Carrera'],
        'Semestre' => $alumno['Semestre'],
        'TitularDep' => $alumno['TitularDep'],
        'Dependencia' => $alumno['NombreDep'],
        'FechaI' => $alumno['fechasI'],
        'FechaT' => $alumno['fechasT'],
        'CodigoP' => $alumno['codigoP'],
        'Estado' => $alumno['estado'],
        'Municipio' => $alumno['municipio'],
        'Colonia' => $alumno['colonia'],
        'Calle' => $alumno['calleNo'],
        'CodigoPDep' => $alumno['codigoPDep'],
        'EstadoDep' => $alumno['estadoDep'],
        'MunicipioDep' => $alumno['municipioDep'],
        'ColoniaDep' => $alumno['coloniaDep'],
        'CalleDep' => $alumno['calleNoDep']
        );
            return $datos;
    }
    public function obtenerDatosAutoEvaluacion($NoControl){
        $conexion= Conexion::conectar();
        $sql= "SELECT al.Nombre, al.ApellidoP, al.ApellidoM, 
        p.NombreP, pe.periodo, d.NombreDep, d.TitularDep, d.puesto,
        fin.fechasI, fin.fechasT
        FROM alumno AS al 
        INNER JOIN programaseleccionado AS ps ON al.NoControl = ps.NoControl1 
        INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1
        INNER JOIN dependencia AS d ON d.idDependencia =p.idDependencia1
        INNER JOIN periodoasignado AS pa ON pa.NoControlP = al.NoControl
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        INNER JOIN fechainiciotermino AS fin ON fin.NoControlIT = al.NoControl
        WHERE al.NoControl = $NoControl";
        $respuesta= mysqli_query($conexion, $sql);
        $alumno= mysqli_fetch_array($respuesta);
        $datos= array(
        'ApellidoP' => $alumno['ApellidoP'],
        'ApellidoM' => $alumno['ApellidoM'],
        'Nombre' => $alumno['Nombre'],
        'Programa' => $alumno['NombreP'],
        'TitularDep' => $alumno['TitularDep'],
        'Dependencia' => $alumno['NombreDep'],
        'Puesto' => $alumno['puesto'],
        'fechaIA' => $alumno['fechasI'],
        'fechaTA' => $alumno['fechasT'],
        'Periodo' => $alumno['periodo']);
            return $datos;
    }
    public function obtenerDatosDependencia($NoControl){
        $conexion= Conexion::conectar();
        $sql= "SELECT d.NombreDep, d.TitularDep, d.puesto, d.correodep, d.contacto, 
        dirD.codigoPDep, dirD.estadoDep, dirD.municipioDep, dirD.coloniaDep, dirD.calleNoDep
        FROM alumno AS al 
        INNER JOIN programaseleccionado AS ps ON al.NoControl = ps.NoControl1 
        INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1
        INNER JOIN dependencia AS d ON d.idDependencia =p.idDependencia1
        INNER JOIN domiciliosdep AS dirD ON d.idDependencia =dirD.NoControlDomDep
        WHERE al.NoControl = $NoControl";
        $respuesta= mysqli_query($conexion, $sql);
        $alumno= mysqli_fetch_array($respuesta);
        $datos= array(
        'TitularDep' => $alumno['TitularDep'],
        'Dependencia' => $alumno['NombreDep'],
        'correodep' => $alumno['correodep'],
        'contactodep' => $alumno['contacto'],
        'Puesto' => $alumno['puesto']);
            return $datos;
    }
    public function obtenerDatosPlan($NoControl){
        $conexion= Conexion::conectar();
        $sql= "SELECT al.Nombre, al.ApellidoP, al.ApellidoM, 
        al.Telefono, al.Sexo, ca.Carrera, se.Semestre, d.NombreDep, d.TitularDep, 
        d.puesto, p.NombreP, tp.Actividad, m.modalidad, fe.fechasI, fe.fechasT,
        domd.codigoPDep, domd.estadoDep, domd.municipioDep, domd.coloniaDep, domd.calleNoDep,
        pe.Periodo, pa.Year
        FROM alumno AS al 
        INNER JOIN carrera AS ca ON al.NoCarrera1 = ca.NoCarrera
        INNER JOIN programaseleccionado AS ps ON al.NoControl = ps.NoControl1 
        INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1 
        INNER JOIN dependencia AS d ON d.idDependencia =p.idDependencia1
        INNER JOIN modalidad AS m ON m.idModalidad = p.idModalidad1
        INNER JOIN tipoactividad AS tp ON tp.idTipoAct = p.idTipoAct1
        INNER JOIN semestre AS se ON se.NoSemestre = al.NoSemestre1
        INNER JOIN fechainiciotermino AS fe ON fe.NoControlIT = al.NoControl
        INNER JOIN domiciliosdep AS domd ON domd.NoControlDomDep = d.idDependencia
        INNER JOIN periodoasignado AS pa ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pa.idPeriodo1 = pe.idPeriodo
        WHERE al.NoControl = $NoControl";
        $respuesta= mysqli_query($conexion, $sql);
        $alumno= mysqli_fetch_array($respuesta);
        $datos= array(
        'ApellidoP' => $alumno['ApellidoP'],
        'ApellidoM' => $alumno['ApellidoM'],
        'Nombre' => $alumno['Nombre'],
        'Telefono' => $alumno['Telefono'],
        'Carrera' => $alumno['Carrera'],
        'Semestre' => $alumno['Semestre'],
        'TitularDep' => $alumno['TitularDep'],
        'Dependencia' => $alumno['NombreDep'],
        'NombreP' => $alumno['NombreP'],
        'FechaI' => $alumno['fechasI'],
        'FechaT' => $alumno['fechasT'],
        'CodigoPDep' => $alumno['codigoPDep'],
        'EstadoDep' => $alumno['estadoDep'],
        'MunicipioDep' => $alumno['municipioDep'],
        'ColoniaDep' => $alumno['coloniaDep'],
        'CalleDep' => $alumno['calleNoDep'],
        'Periodo' => $alumno['Periodo'],
        'Year' => $alumno['Year']);
            return $datos;
    }
    public function actualizarAlumno($datos){
        $conexion= Conexion::conectar();
        $sql= "UPDATE alumno SET
                                 Nombre = ?,
                                 ApellidoP = ?,
                                 ApellidoM = ?,
                                 Sexo = ?,
                                 Telefono = ?,
                                 Correo = ?,
                                 NoCarrera1 = ?,
                                 NoSemestre1 = ?,
                                 edad = ?
                                 WHERE NoControl = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("ssssssiiii",
                                        $datos['nombre'], 
                                        $datos['paterno'],
                                        $datos['materno'],
                                        $datos['sexo'],
                                        $datos['telefono'],
                                        $datos['correo'],
                                        $datos['carrera'],
                                        $datos['semestre'],
                                        $datos['edad'],
                                        $datos['nocontrol'],
                                    );
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
    public function eliminarAlumno($datos){
        $conexion = Conexion::conectar();

        // Eliminar registros de la tabla programaseleccionado
        $sql1 = "DELETE FROM programaseleccionado WHERE NoControl1 = ?";
        $query1 = $conexion->prepare($sql1);
        $query1->bind_param("i", $datos['NoControl']);
        $query1->execute();
        $query1->close();
    
        // Eliminar registros de la tabla cartacompromiso
        $sql2 = "DELETE FROM cartacompromiso WHERE NoControlCartaC = ?";
        $query2 = $conexion->prepare($sql2);
        $query2->bind_param("i", $datos['NoControl']);
        $query2->execute();
        $query2->close();
    
        // Eliminar registros de la tabla fechainiciotermino
        $sql3 = "DELETE FROM fechainiciotermino WHERE NoControlIT = ?";
        $query3 = $conexion->prepare($sql3);
        $query3->bind_param("i", $datos['NoControl']);
        $query3->execute();
        $query3->close();
    
        // Eliminar registros de la tabla kardex
        $sql4 = "DELETE FROM kardex WHERE NoControlKardex = ?";
        $query4 = $conexion->prepare($sql4);
        $query4->bind_param("i", $datos['NoControl']);
        $query4->execute();
        $query4->close();
    
        // Eliminar registros de la tabla plandetrabajo
        $sql5 = "DELETE FROM plandetrabajo WHERE NoControlPlan = ?";
        $query5 = $conexion->prepare($sql5);
        $query5->bind_param("i", $datos['NoControl']);
        $query5->execute();
        $query5->close();
    
        // Eliminar registros de la tabla archivos
        $sql6 = "DELETE FROM archivos WHERE NoControlFi = ?";
        $query6 = $conexion->prepare($sql6);
        $query6->bind_param("i", $datos['NoControl']);
        $query6->execute();
        $query6->close();
    
        // Eliminar registros de la tabla domicilios
        $sql7 = "DELETE FROM domicilios WHERE NoControlDom = ?";
        $query7 = $conexion->prepare($sql7);
        $query7->bind_param("i", $datos['NoControl']);
        $query7->execute();
        $query7->close();
    
        // Eliminar registros de la tabla reportesbimestrales
        $sql8 = "DELETE FROM reportesbimestrales WHERE NoControlBim = ?";
        $query8 = $conexion->prepare($sql8);
        $query8->bind_param("i", $datos['NoControl']);
        $query8->execute();
        $query8->close();
    
        // Eliminar registros de la tabla periodoasignado
        $sql9 = "DELETE FROM periodoasignado WHERE NoControlP = ?";
        $query9 = $conexion->prepare($sql9);
        $query9->bind_param("i", $datos['NoControl']);
        $query9->execute();
        $query9->close();

        $sql10 = "DELETE FROM alumno WHERE NoControl = ?";
        $query10 = $conexion->prepare($sql10);
        $query10->bind_param("i", $datos['NoControl']);
        $query10->execute();
        $query10->close();
        return true;
    }
    public function actualizarPassword($datos){
        $conexion= Conexion::conectar();
        $sql="UPDATE alumno SET pass=? WHERE NoControl=?";
        $query= $conexion->prepare($sql);
        $query->bind_param("si", $datos['password'], $datos['nocontrol']);
        $respuesta= $query->execute();
        $query->close();
        return $respuesta;
    }

    public function cambioAlumno ($NoControl, $estatus){
        $conexion= Conexion::conectar();
        if ($estatus==1) {
            $estatus =0;
        } else {
            $estatus= 1;
        }
        $sql= "UPDATE alumno SET estatus= ? WHERE NoControl= ?";
        $query= $conexion->prepare($sql);
        $query->bind_param('ii', $estatus, $NoControl);
        $respuesta= $query->execute();
        $query->close();
        return $respuesta;
    }
    public function agregarFechasAlumno($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO fechainiciotermino (NoControlIT, fechasI, fechasT) VALUES (?,?,?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("iss",
                                        $datos['nocontrol'],
                                        $datos['fechaI'],
                                        $datos['fechaT']);
            $respuesta = $query->execute();
        $sql2= "INSERT INTO domicilios (codigoP, estado, ciudad, municipio, colonia, calleNo,
        NoControlDom) VALUES (?,?,?,?,?,?,?)";
        $query2 = $conexion->prepare($sql2);
        $query2->bind_param("isssssi",
                            $datos['codigoP'],
                            $datos['estado'],
                            $datos['ciudad'],
                            $datos['municipio'],
                            $datos['colonia'],
                            $datos['calle'],
                            $datos['nocontrol']);
        $respuesta2= $query2->execute();
            return $respuesta && $respuesta2;
    }
    public function registrasFechasITB($datos){
        $conexion= Conexion::conectar();
        $bimestre= $datos['bimestre'];
        $fechainicioB = 'fechasinicioB' . $bimestre;
        $fechaterminoB = 'fechasterminoB' . $bimestre;
        $Calificacion= 'Calificacion' . $bimestre;
        $sql= "UPDATE fechainiciotermino SET
                                           $fechainicioB = ?,
                                           $fechaterminoB = ? 
                                           WHERE NoControlIT = ?";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("ssi",
                                        $datos['fechaI'],
                                        $datos['fechaT'],
                                        $datos['nocontrol']);
            $respuesta = $query->execute();
            $sql2= "UPDATE reportes_calificacion SET 
                                        $Calificacion = ?
                                        WHERE NoControlCalificacion = ?";
                    $query2 = $conexion->prepare($sql2);
                    $query2->bind_param("ii",
                                        $datos['sumaPreguntas'],
                                        $datos['nocontrol']);
            $respuesta2 = $query2->execute();
            return $respuesta && $respuesta2;
    }
    public function agregarCompromisoAlumno($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO cartacompromiso (NoControlCartaC, Day, Mes, Year) VALUES (?,?,?,?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("isss",
                                        $datos['nocontrol'],
                                        $datos['Dia'],
                                        $datos['Mes'],
                                        $datos['Year']);
            $respuesta = $query->execute();
            return $respuesta;
    }
    public function agregarPlanAlumno($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO plandetrabajo (NoControlPlan) VALUES (?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("i",
                                        $datos['nocontrol']);
            $respuesta = $query->execute();
            return $respuesta;
    }
public function subirDocumentoExp($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO archivos (NoControlFi) VALUES (?)";
                    $query = $conexion->prepare($sql);
                    $query->bind_param("i",
                                        $datos['nocontrol']);
            $respuesta = $query->execute();
        $Carpeta= $datos['nocontrol'];
        $sql_periodo= "SELECT pa.Year, pe.Clave FROM periodoasignado AS pa
        INNER JOIN alumno AS al ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        WHERE al.NoControl = $Carpeta";
        $query_periodo= mysqli_query($conexion, $sql_periodo);
        $row_periodo = mysqli_fetch_assoc($query_periodo);
        $periodo = $row_periodo['Clave'];
        $year = $row_periodo['Year'];
        $ruta= 'files/'.$year.'_'.$periodo.'/'.$Carpeta.'/Expediente/';
        //Variables Archivo 1
        $nombre_archivo1 = $datos['nombre_archivo1'];
        $tipo1 = $datos['tipo1'];
        $tamaño1 = $datos['tamaño1'];
        $ruta_temporal1 = $datos['ruta_temporal1'];
        $error1= $datos['error1'];
        //Variables Archivo 2
        $nombre_archivo2 = $datos['nombre_archivo2'];
        $tipo2 = $datos['tipo2'];
        $tamaño2 = $datos['tamaño2'];
        $ruta_temporal2 = $datos['ruta_temporal2'];
        $error2= $datos['error2'];
        //Variables Archivo 3
        $nombre_archivo3 = $datos['nombre_archivo3'];
        $tipo3 = $datos['tipo3'];
        $tamaño3 = $datos['tamaño3'];
        $ruta_temporal3 = $datos['ruta_temporal3'];
        $error3= $datos['error3'];
        //Variables Archivo 4
        $nombre_archivo4 = $datos['nombre_archivo4'];
        $tipo4 = $datos['tipo4'];
        $tamaño4 = $datos['tamaño4'];
        $ruta_temporal4 = $datos['ruta_temporal4'];
        $error4= $datos['error4'];
        //Variables Archivo 5
        $nombre_archivo5 = $datos['nombre_archivo5'];
        $tipo5 = $datos['tipo5'];
        $tamaño5 = $datos['tamaño5'];
        $ruta_temporal5 = $datos['ruta_temporal5'];
        $error5= $datos['error5'];
        //Archivo 1
            if ($error1>0) {
	          echo "Error al cargar archivos";
            } else {
	          $permitidos= array("image/jpg","image/png","application/pdf");
	          $limite_kb= 500;
	          if (in_array($tipo1, $permitidos) && $tamaño1 <= $limite_kb * 1024) {
		       $archivo1= $ruta.$nombre_archivo1;
		       if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		       }
		       if (!file_exists($archivo1)) {
			$resultado1= @move_uploaded_file($ruta_temporal1, $archivo1);
			if ($resultado1) {
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
            if ($error2>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo2, $permitidos) && $tamaño2 <= $limite_kb * 1024) {
		$archivo2= $ruta.$nombre_archivo2;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo2)) {
			$resultado2= @move_uploaded_file($ruta_temporal2, $archivo2);
			if ($resultado2) {
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
            if ($error3>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo3, $permitidos) && $tamaño3 <= $limite_kb * 1024) {
		$archivo3= $ruta.$nombre_archivo3;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo3)) {
			$resultado3= @move_uploaded_file($ruta_temporal3, $archivo3);
			if ($resultado3) {
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
            if ($error4>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo4, $permitidos) && $tamaño4 <= $limite_kb * 1024) {
		$archivo4= $ruta.$nombre_archivo4;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo4)) {
			$resultado4= @move_uploaded_file($ruta_temporal4, $archivo4);
			if ($resultado4) {
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
            //Archivo 5
            if ($error5>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo5, $permitidos) && $tamaño5 <= $limite_kb * 1024) {
		$archivo5= $ruta.$nombre_archivo5;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo5)) {
			$resultado5= @move_uploaded_file($ruta_temporal5, $archivo5);
			if ($resultado5) {
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
        return $respuesta;
   }
public function subirDocumentoEv1($datos){
    $conexion= Conexion::conectar();
    $sql= "INSERT INTO reportesbimestrales (NoControlBim,idBim) VALUES (?,?)";
    $Bim1=1;
                    $query = $conexion->prepare($sql);
                    $query->bind_param("ii",
                                        $datos['nocontrol'],
                                        $Bim1);
            $respuesta = $query->execute();
    $Carpeta= $datos['nocontrol'];
    $sql_periodo= "SELECT pa.Year, pe.Clave FROM periodoasignado AS pa
    INNER JOIN alumno AS al ON al.NoControl = pa.NoControlP
    INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
    WHERE al.NoControl = $Carpeta";
    $query_periodo= mysqli_query($conexion, $sql_periodo);
    $row_periodo = mysqli_fetch_assoc($query_periodo);
    $periodo = $row_periodo['Clave'];
    $year = $row_periodo['Year'];
    $ruta= 'files/'.$year.'_'.$periodo.'/'.$Carpeta.'/Evaluaciones/Bimestre1/';
    //Variables Archivo 1
    $nombre_archivo1 = $datos['nombre_archivo1'];
    $tipo1 = $datos['tipo1'];
    $tamaño1 = $datos['tamaño1'];
    $ruta_temporal1 = $datos['ruta_temporal1'];
    $error1= $datos['error1'];
    //Variables Archivo 2
    $nombre_archivo2 = $datos['nombre_archivo2'];
    $tipo2 = $datos['tipo2'];
    $tamaño2 = $datos['tamaño2'];
    $ruta_temporal2 = $datos['ruta_temporal2'];
    $error2= $datos['error2'];
    //Variables Archivo 3
    $nombre_archivo3 = $datos['nombre_archivo3'];
    $tipo3 = $datos['tipo3'];
    $tamaño3 = $datos['tamaño3'];
    $ruta_temporal3 = $datos['ruta_temporal3'];
    $error3= $datos['error3'];
    //Variables Archivo 4
    $nombre_archivo4 = $datos['nombre_archivo4'];
    $tipo4 = $datos['tipo4'];
    $tamaño4 = $datos['tamaño4'];
    $ruta_temporal4 = $datos['ruta_temporal4'];
    $error4= $datos['error4'];
    //Archivo 1
        if ($error1>0) {
          echo "Error al cargar archivos";
        } else {
          $permitidos= array("image/jpg","image/png","application/pdf");
          $limite_kb= 500;
          if (in_array($tipo1, $permitidos) && $tamaño1 <= $limite_kb * 1024) {
           $archivo1= $ruta.$nombre_archivo1;
           if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
           }
           if (!file_exists($archivo1)) {
        $resultado1= @move_uploaded_file($ruta_temporal1, $archivo1);
        if ($resultado1) {
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
        if ($error2>0) {
         echo "Error al cargar archivos";
                 } else {
         $permitidos= array("image/jpg","image/png","application/pdf");
         $limite_kb= 500;
         if (in_array($tipo2, $permitidos) && $tamaño2 <= $limite_kb * 1024) {
    $archivo2= $ruta.$nombre_archivo2;
    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }
    if (!file_exists($archivo2)) {
        $resultado2= @move_uploaded_file($ruta_temporal2, $archivo2);
        if ($resultado2) {
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
        if ($error3>0) {
         echo "Error al cargar archivos";
        } else {
         $permitidos= array("image/jpg","image/png","application/pdf");
         $limite_kb= 500;
         if (in_array($tipo3, $permitidos) && $tamaño3 <= $limite_kb * 1024) {
    $archivo3= $ruta.$nombre_archivo3;
    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }
    if (!file_exists($archivo3)) {
        $resultado3= @move_uploaded_file($ruta_temporal3, $archivo3);
        if ($resultado3) {
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
        if ($error4>0) {
         echo "Error al cargar archivos";
        } else {
         $permitidos= array("image/jpg","image/png","application/pdf");
         $limite_kb= 500;
         if (in_array($tipo4, $permitidos) && $tamaño4 <= $limite_kb * 1024) {
    $archivo4= $ruta.$nombre_archivo4;
    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }
    if (!file_exists($archivo4)) {
        $resultado4= @move_uploaded_file($ruta_temporal4, $archivo4);
        if ($resultado4) {
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
    return 1;
 }
public function subirDocumentoEv2($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO reportesbimestrales (NoControlBim,idBim) VALUES (?,?)";
        $Bim2=2;
                        $query = $conexion->prepare($sql);
                        $query->bind_param("ii",
                                            $datos['nocontrol'],
                                            $Bim2);
                $respuesta = $query->execute();
        $Carpeta= $datos['nocontrol'];
        $sql_periodo= "SELECT pa.Year, pe.Clave FROM periodoasignado AS pa
        INNER JOIN alumno AS al ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        WHERE al.NoControl = $Carpeta";
        $query_periodo= mysqli_query($conexion, $sql_periodo);
        $row_periodo = mysqli_fetch_assoc($query_periodo);
        $periodo = $row_periodo['Clave'];
        $year = $row_periodo['Year'];
        $ruta= 'files/'.$year.'_'.$periodo.'/'.$Carpeta.'/Evaluaciones/Bimestre2/';
        //Variables Archivo 1
        $nombre_archivo1 = $datos['nombre_archivo1'];
        $tipo1 = $datos['tipo1'];
        $tamaño1 = $datos['tamaño1'];
        $ruta_temporal1 = $datos['ruta_temporal1'];
        $error1= $datos['error1'];
        //Variables Archivo 2
        $nombre_archivo2 = $datos['nombre_archivo2'];
        $tipo2 = $datos['tipo2'];
        $tamaño2 = $datos['tamaño2'];
        $ruta_temporal2 = $datos['ruta_temporal2'];
        $error2= $datos['error2'];
        //Variables Archivo 3
        $nombre_archivo3 = $datos['nombre_archivo3'];
        $tipo3 = $datos['tipo3'];
        $tamaño3 = $datos['tamaño3'];
        $ruta_temporal3 = $datos['ruta_temporal3'];
        $error3= $datos['error3'];
        //Variables Archivo 4
        $nombre_archivo4 = $datos['nombre_archivo4'];
        $tipo4 = $datos['tipo4'];
        $tamaño4 = $datos['tamaño4'];
        $ruta_temporal4 = $datos['ruta_temporal4'];
        $error4= $datos['error4'];
        //Archivo 1
            if ($error1>0) {
	          echo "Error al cargar archivos";
            } else {
	          $permitidos= array("image/jpg","image/png","application/pdf");
	          $limite_kb= 500;
	          if (in_array($tipo1, $permitidos) && $tamaño1 <= $limite_kb * 1024) {
		       $archivo1= $ruta.$nombre_archivo1;
		       if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		       }
		       if (!file_exists($archivo1)) {
			$resultado1= @move_uploaded_file($ruta_temporal1, $archivo1);
			if ($resultado1) {
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
            if ($error2>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo2, $permitidos) && $tamaño2 <= $limite_kb * 1024) {
		$archivo2= $ruta.$nombre_archivo2;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo2)) {
			$resultado2= @move_uploaded_file($ruta_temporal2, $archivo2);
			if ($resultado2) {
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
            if ($error3>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo3, $permitidos) && $tamaño3 <= $limite_kb * 1024) {
		$archivo3= $ruta.$nombre_archivo3;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo3)) {
			$resultado3= @move_uploaded_file($ruta_temporal3, $archivo3);
			if ($resultado3) {
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
            if ($error4>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo4, $permitidos) && $tamaño4 <= $limite_kb * 1024) {
		$archivo4= $ruta.$nombre_archivo4;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo4)) {
			$resultado4= @move_uploaded_file($ruta_temporal4, $archivo4);
			if ($resultado4) {
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
        return 1;
     }
public function subirDocumentoEv3($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO reportesbimestrales (NoControlBim,idBim) VALUES (?,?)";
        $Bim3=3;
                        $query = $conexion->prepare($sql);
                        $query->bind_param("ii",
                                            $datos['nocontrol'],
                                            $Bim3);
                $respuesta = $query->execute();
        $Carpeta= $datos['nocontrol'];
        $sql_periodo= "SELECT pa.Year, pe.Clave FROM periodoasignado AS pa
        INNER JOIN alumno AS al ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        WHERE al.NoControl = $Carpeta";
        $query_periodo= mysqli_query($conexion, $sql_periodo);
        $row_periodo = mysqli_fetch_assoc($query_periodo);
        $periodo = $row_periodo['Clave'];
        $year = $row_periodo['Year'];
        $ruta= 'files/'.$year.'_'.$periodo.'/'.$Carpeta.'/Evaluaciones/Bimestre3/';
        //Variables Archivo 1
        $nombre_archivo1 = $datos['nombre_archivo1'];
        $tipo1 = $datos['tipo1'];
        $tamaño1 = $datos['tamaño1'];
        $ruta_temporal1 = $datos['ruta_temporal1'];
        $error1= $datos['error1'];
        //Variables Archivo 2
        $nombre_archivo2 = $datos['nombre_archivo2'];
        $tipo2 = $datos['tipo2'];
        $tamaño2 = $datos['tamaño2'];
        $ruta_temporal2 = $datos['ruta_temporal2'];
        $error2= $datos['error2'];
        //Variables Archivo 3
        $nombre_archivo3 = $datos['nombre_archivo3'];
        $tipo3 = $datos['tipo3'];
        $tamaño3 = $datos['tamaño3'];
        $ruta_temporal3 = $datos['ruta_temporal3'];
        $error3= $datos['error3'];
        //Variables Archivo 4
        $nombre_archivo4 = $datos['nombre_archivo4'];
        $tipo4 = $datos['tipo4'];
        $tamaño4 = $datos['tamaño4'];
        $ruta_temporal4 = $datos['ruta_temporal4'];
        $error4= $datos['error4'];
        //Archivo 1
            if ($error1>0) {
	          echo "Error al cargar archivos";
            } else {
	          $permitidos= array("image/jpg","image/png","application/pdf");
	          $limite_kb= 500;
	          if (in_array($tipo1, $permitidos) && $tamaño1 <= $limite_kb * 1024) {
		       $archivo1= $ruta.$nombre_archivo1;
		       if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		       }
		       if (!file_exists($archivo1)) {
			$resultado1= @move_uploaded_file($ruta_temporal1, $archivo1);
			if ($resultado1) {
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
            if ($error2>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo2, $permitidos) && $tamaño2 <= $limite_kb * 1024) {
		$archivo2= $ruta.$nombre_archivo2;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo2)) {
			$resultado2= @move_uploaded_file($ruta_temporal2, $archivo2);
			if ($resultado2) {
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
            if ($error3>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo3, $permitidos) && $tamaño3 <= $limite_kb * 1024) {
		$archivo3= $ruta.$nombre_archivo3;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo3)) {
			$resultado3= @move_uploaded_file($ruta_temporal3, $archivo3);
			if ($resultado3) {
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
            if ($error4>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo4, $permitidos) && $tamaño4 <= $limite_kb * 1024) {
		$archivo4= $ruta.$nombre_archivo4;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo4)) {
			$resultado4= @move_uploaded_file($ruta_temporal4, $archivo4);
			if ($resultado4) {
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
        return 1;
     }
public function subirDocumentoEvF($datos){
        $conexion= Conexion::conectar();
        $sql= "INSERT INTO reportesbimestrales (NoControlBim,idBim) VALUES (?,?)";
        $Bim4=4;
                        $query = $conexion->prepare($sql);
                        $query->bind_param("ii",
                                            $datos['nocontrol'],
                                            $Bim4);
                $respuesta = $query->execute();
        $Carpeta= $datos['nocontrol'];
        $sql_periodo= "SELECT pa.Year, pe.Clave FROM periodoasignado AS pa
        INNER JOIN alumno AS al ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        WHERE al.NoControl = $Carpeta";
        $query_periodo= mysqli_query($conexion, $sql_periodo);
        $row_periodo = mysqli_fetch_assoc($query_periodo);
        $periodo = $row_periodo['Clave'];
        $year = $row_periodo['Year'];
        $ruta= 'files/'.$year.'_'.$periodo.'/'.$Carpeta.'/Evaluaciones/BimestreFinal/';
        //Variables Archivo 1
        $nombre_archivo1 = $datos['nombre_archivo1'];
        $tipo1 = $datos['tipo1'];
        $tamaño1 = $datos['tamaño1'];
        $ruta_temporal1 = $datos['ruta_temporal1'];
        $error1= $datos['error1'];
        //Variables Archivo 2
        $nombre_archivo2 = $datos['nombre_archivo2'];
        $tipo2 = $datos['tipo2'];
        $tamaño2 = $datos['tamaño2'];
        $ruta_temporal2 = $datos['ruta_temporal2'];
        $error2= $datos['error2'];
        //Variables Archivo 3
        $nombre_archivo3 = $datos['nombre_archivo3'];
        $tipo3 = $datos['tipo3'];
        $tamaño3 = $datos['tamaño3'];
        $ruta_temporal3 = $datos['ruta_temporal3'];
        $error3= $datos['error3'];
        //Variables Archivo 4
        $nombre_archivo4 = $datos['nombre_archivo4'];
        $tipo4 = $datos['tipo4'];
        $tamaño4 = $datos['tamaño4'];
        $ruta_temporal4 = $datos['ruta_temporal4'];
        $error4= $datos['error4'];
        //Archivo 1
            if ($error1>0) {
	          echo "Error al cargar archivos";
            } else {
	          $permitidos= array("image/jpg","image/png","application/pdf");
	          $limite_kb= 500;
	          if (in_array($tipo1, $permitidos) && $tamaño1 <= $limite_kb * 1024) {
		       $archivo1= $ruta.$nombre_archivo1;
		       if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		       }
		       if (!file_exists($archivo1)) {
			$resultado1= @move_uploaded_file($ruta_temporal1, $archivo1);
			if ($resultado1) {
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
            if ($error2>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo2, $permitidos) && $tamaño2 <= $limite_kb * 1024) {
		$archivo2= $ruta.$nombre_archivo2;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo2)) {
			$resultado2= @move_uploaded_file($ruta_temporal2, $archivo2);
			if ($resultado2) {
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
            if ($error3>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo3, $permitidos) && $tamaño3 <= $limite_kb * 1024) {
		$archivo3= $ruta.$nombre_archivo3;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo3)) {
			$resultado3= @move_uploaded_file($ruta_temporal3, $archivo3);
			if ($resultado3) {
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
            if ($error4>0) {
	echo "Error al cargar archivos";
            } else {
	$permitidos= array("image/jpg","image/png","application/pdf");
	$limite_kb= 500;
	if (in_array($tipo4, $permitidos) && $tamaño4 <= $limite_kb * 1024) {
		$archivo4= $ruta.$nombre_archivo4;
		if (!file_exists($ruta)) {
			mkdir($ruta, 0777, true);
		}
		if (!file_exists($archivo4)) {
			$resultado4= @move_uploaded_file($ruta_temporal4, $archivo4);
			if ($resultado4) {
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
        return 1;
     }
public function autorizarExpediente ($NoControl, $idRolFK){
    $conexion= Conexion::conectar();
    if ($idRolFK==4) {
        $idRolFK =3;
    } else {
        $idRolFK= 4;
    }
    $sql= "UPDATE alumno SET idRolFK= ? WHERE NoControl= ?";
    $query= $conexion->prepare($sql);
    $query->bind_param('ii', $idRolFK, $NoControl);
    $respuesta= $query->execute();
    $query->close();
    $idReporteCal = 1;
    $sql2= "INSERT INTO reportes_calificacion (NoControlCalificacion, idReporteCal) 
    VALUES (?,?)";
    $query2= $conexion->prepare($sql2);
    $query2->bind_param('ii', $NoControl, $idReporteCal);
    $respuesta2= $query2->execute();
    $query2->close();
    return $respuesta;
}
public function liberarServicio ($NoControl, $idRolFK){
    $conexion= Conexion::conectar();
    if ($idRolFK==5) {
        $idRolFK =4;
    } else {
        $idRolFK= 5;
    }
    $sql= "UPDATE alumno SET idRolFK= ? WHERE NoControl= ?";
    $query= $conexion->prepare($sql);
    $query->bind_param('ii', $idRolFK, $NoControl);
    $respuesta= $query->execute();
    $query->close();
    return $respuesta;
}
}


?>