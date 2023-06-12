-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-06-2023 a las 18:03:10
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sassf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `NoControl` int NOT NULL,
  `pass` varchar(8) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `ApellidoP` varchar(100) NOT NULL,
  `ApellidoM` varchar(100) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Creditos` int NOT NULL,
  `NoCarrera1` int NOT NULL,
  `NoSemestre1` int NOT NULL,
  `edad` int NOT NULL,
  `estatus` int DEFAULT '0',
  `idRolFK` int NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `idFile` int NOT NULL,
  `NoControlFi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bimestre`
--

CREATE TABLE `bimestre` (
  `idBimestre` int NOT NULL,
  `ClaveBim` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `NoCarrera` int NOT NULL,
  `clavec` varchar(10) NOT NULL,
  `Carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartacompromiso`
--

CREATE TABLE `cartacompromiso` (
  `idcartac` int NOT NULL,
  `NoControlCartaC` int DEFAULT NULL,
  `Day` varchar(3) NOT NULL,
  `Mes` varchar(30) NOT NULL,
  `Year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE `dependencia` (
  `idDependencia` int NOT NULL,
  `passw` varchar(10) NOT NULL,
  `NombreDep` varchar(100) NOT NULL,
  `TitularDep` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `correodep` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `estatus` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `idDomicilio` int NOT NULL,
  `codigoP` int NOT NULL,
  `estado` varchar(50) NOT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) NOT NULL,
  `colonia` varchar(300) NOT NULL,
  `calleNo` varchar(100) NOT NULL,
  `NoControlDom` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliosdep`
--

CREATE TABLE `domiciliosdep` (
  `idDomicilioDep` int NOT NULL,
  `codigoPDep` int NOT NULL,
  `estadoDep` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ciudadDep` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `municipioDep` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `coloniaDep` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `calleNoDep` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NoControlDomDep` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechainiciotermino`
--

CREATE TABLE `fechainiciotermino` (
  `idFechasIN` int NOT NULL,
  `fechasI` varchar(40) NOT NULL,
  `fechasT` varchar(40) NOT NULL,
  `fechasinicioB1` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fechasterminoB1` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fechasinicioB2` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fechasterminoB2` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fechasinicioB3` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `fechasterminoB3` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `NoControlIT` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int NOT NULL,
  `horarioI` varchar(40) NOT NULL,
  `horarioT` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioasignado`
--

CREATE TABLE `horarioasignado` (
  `idHorario2` int NOT NULL,
  `noControl2` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `idKardex` int NOT NULL,
  `NoControlKardex` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `idModalidad` int NOT NULL,
  `Modalidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `idPeriodo` int NOT NULL,
  `Clave` varchar(20) NOT NULL,
  `Periodo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodoasignado`
--

CREATE TABLE `periodoasignado` (
  `idRegPeriodo` int NOT NULL,
  `idPeriodo1` int NOT NULL,
  `NoControlP` int NOT NULL,
  `Year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plandetrabajo`
--

CREATE TABLE `plandetrabajo` (
  `idPlan` int NOT NULL,
  `NoControlPlan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idPrograma` int NOT NULL,
  `NombreP` varchar(200) NOT NULL,
  `Objetivo` varchar(200) NOT NULL,
  `idTipoAct1` int NOT NULL,
  `idModalidad1` int NOT NULL,
  `idDependencia1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaseleccionado`
--

CREATE TABLE `programaseleccionado` (
  `idPS` int NOT NULL,
  `idPrograma1` int NOT NULL,
  `NoControl1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportesbimestrales`
--

CREATE TABLE `reportesbimestrales` (
  `idrepB` int NOT NULL,
  `NoControlBim` int DEFAULT NULL,
  `idBim` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int NOT NULL,
  `rol` varchar(100) NOT NULL,
  `funciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `NoSemestre` int NOT NULL,
  `Semestre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_domicilio`
--

CREATE TABLE `tab_domicilio` (
  `id_domicilio` int NOT NULL,
  `calle` varchar(245) NOT NULL,
  `numero_exterior` varchar(245) NOT NULL,
  `numero_interior` varchar(245) DEFAULT NULL,
  `colonia` varchar(245) NOT NULL,
  `municipio` varchar(245) NOT NULL,
  `estado` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_persona`
--

CREATE TABLE `tab_persona` (
  `id_persona` int NOT NULL,
  `id_domicilio` int NOT NULL,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) NOT NULL,
  `nombre` varchar(245) NOT NULL,
  `edad` varchar(245) NOT NULL,
  `sexo` varchar(245) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(245) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_rol`
--

CREATE TABLE `tab_rol` (
  `id_rol` int NOT NULL,
  `rol` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_usuario`
--

CREATE TABLE `tab_usuario` (
  `id_usuario` int NOT NULL,
  `id_rol` int NOT NULL,
  `id_persona` int NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `password` varchar(256) NOT NULL,
  `estatus` int NOT NULL DEFAULT '0',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoactividad`
--

CREATE TABLE `tipoactividad` (
  `idTipoAct` int NOT NULL,
  `Actividad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`NoControl`),
  ADD UNIQUE KEY `NoControl` (`NoControl`),
  ADD KEY `fk_ac` (`NoCarrera1`),
  ADD KEY `fk_as` (`NoSemestre1`),
  ADD KEY `fk_AR` (`idRolFK`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`idFile`),
  ADD UNIQUE KEY `NoControlFi` (`NoControlFi`);

--
-- Indices de la tabla `bimestre`
--
ALTER TABLE `bimestre`
  ADD PRIMARY KEY (`idBimestre`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`NoCarrera`);

--
-- Indices de la tabla `cartacompromiso`
--
ALTER TABLE `cartacompromiso`
  ADD PRIMARY KEY (`idcartac`),
  ADD KEY `fk_ccal` (`NoControlCartaC`);

--
-- Indices de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  ADD PRIMARY KEY (`idDependencia`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`idDomicilio`),
  ADD KEY `fk_aldom` (`NoControlDom`);

--
-- Indices de la tabla `domiciliosdep`
--
ALTER TABLE `domiciliosdep`
  ADD PRIMARY KEY (`idDomicilioDep`),
  ADD KEY `fk_domdepen` (`NoControlDomDep`);

--
-- Indices de la tabla `fechainiciotermino`
--
ALTER TABLE `fechainiciotermino`
  ADD PRIMARY KEY (`idFechasIN`),
  ADD KEY `fk_fitAl` (`NoControlIT`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `horarioasignado`
--
ALTER TABLE `horarioasignado`
  ADD KEY `fk_hah` (`idHorario2`),
  ADD KEY `fk_haa` (`noControl2`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`idKardex`),
  ADD UNIQUE KEY `NoControlFi` (`NoControlKardex`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`idModalidad`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`idPeriodo`);

--
-- Indices de la tabla `periodoasignado`
--
ALTER TABLE `periodoasignado`
  ADD PRIMARY KEY (`idRegPeriodo`),
  ADD KEY `fk_PAA` (`NoControlP`),
  ADD KEY `fk_PAP` (`idPeriodo1`);

--
-- Indices de la tabla `plandetrabajo`
--
ALTER TABLE `plandetrabajo`
  ADD PRIMARY KEY (`idPlan`),
  ADD KEY `fk_plal` (`NoControlPlan`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idPrograma`),
  ADD KEY `fk_pd` (`idDependencia1`),
  ADD KEY `fk_pta` (`idTipoAct1`),
  ADD KEY `fk_pm` (`idModalidad1`);

--
-- Indices de la tabla `programaseleccionado`
--
ALTER TABLE `programaseleccionado`
  ADD PRIMARY KEY (`idPS`),
  ADD UNIQUE KEY `NoControl1` (`NoControl1`),
  ADD KEY `fk_psa` (`NoControl1`),
  ADD KEY `fk_psp` (`idPrograma1`);

--
-- Indices de la tabla `reportesbimestrales`
--
ALTER TABLE `reportesbimestrales`
  ADD PRIMARY KEY (`idrepB`),
  ADD KEY `fk_rebal` (`NoControlBim`),
  ADD KEY `fk_rebbim` (`idBim`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`NoSemestre`);

--
-- Indices de la tabla `tab_domicilio`
--
ALTER TABLE `tab_domicilio`
  ADD PRIMARY KEY (`id_domicilio`);

--
-- Indices de la tabla `tab_persona`
--
ALTER TABLE `tab_persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `fk_domicilio` (`id_domicilio`);

--
-- Indices de la tabla `tab_rol`
--
ALTER TABLE `tab_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_rol` (`id_rol`),
  ADD KEY `fk_persona` (`id_persona`);

--
-- Indices de la tabla `tipoactividad`
--
ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`idTipoAct`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `idFile` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bimestre`
--
ALTER TABLE `bimestre`
  MODIFY `idBimestre` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cartacompromiso`
--
ALTER TABLE `cartacompromiso`
  MODIFY `idcartac` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `idDomicilio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domiciliosdep`
--
ALTER TABLE `domiciliosdep`
  MODIFY `idDomicilioDep` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fechainiciotermino`
--
ALTER TABLE `fechainiciotermino`
  MODIFY `idFechasIN` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `idKardex` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `periodoasignado`
--
ALTER TABLE `periodoasignado`
  MODIFY `idRegPeriodo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plandetrabajo`
--
ALTER TABLE `plandetrabajo`
  MODIFY `idPlan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programaseleccionado`
--
ALTER TABLE `programaseleccionado`
  MODIFY `idPS` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportesbimestrales`
--
ALTER TABLE `reportesbimestrales`
  MODIFY `idrepB` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_domicilio`
--
ALTER TABLE `tab_domicilio`
  MODIFY `id_domicilio` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_persona`
--
ALTER TABLE `tab_persona`
  MODIFY `id_persona` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_rol`
--
ALTER TABLE `tab_rol`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tab_usuario`
--
ALTER TABLE `tab_usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_ac` FOREIGN KEY (`NoCarrera1`) REFERENCES `carrera` (`NoCarrera`),
  ADD CONSTRAINT `fk_AR` FOREIGN KEY (`idRolFK`) REFERENCES `roles` (`idRol`),
  ADD CONSTRAINT `fk_as` FOREIGN KEY (`NoSemestre1`) REFERENCES `semestre` (`NoSemestre`);

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `fk_afi` FOREIGN KEY (`NoControlFi`) REFERENCES `alumno` (`NoControl`);

--
-- Filtros para la tabla `cartacompromiso`
--
ALTER TABLE `cartacompromiso`
  ADD CONSTRAINT `fk_ccal` FOREIGN KEY (`NoControlCartaC`) REFERENCES `alumno` (`NoControl`);

--
-- Filtros para la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD CONSTRAINT `fk_aldom` FOREIGN KEY (`NoControlDom`) REFERENCES `alumno` (`NoControl`);

--
-- Filtros para la tabla `domiciliosdep`
--
ALTER TABLE `domiciliosdep`
  ADD CONSTRAINT `fk_domdepen` FOREIGN KEY (`NoControlDomDep`) REFERENCES `dependencia` (`idDependencia`);

--
-- Filtros para la tabla `fechainiciotermino`
--
ALTER TABLE `fechainiciotermino`
  ADD CONSTRAINT `fk_fitAl` FOREIGN KEY (`NoControlIT`) REFERENCES `alumno` (`NoControl`);

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `fk_karal` FOREIGN KEY (`NoControlKardex`) REFERENCES `alumno` (`NoControl`);

--
-- Filtros para la tabla `plandetrabajo`
--
ALTER TABLE `plandetrabajo`
  ADD CONSTRAINT `fk_plal` FOREIGN KEY (`NoControlPlan`) REFERENCES `alumno` (`NoControl`);

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `fk_pd` FOREIGN KEY (`idDependencia1`) REFERENCES `dependencia` (`idDependencia`),
  ADD CONSTRAINT `fk_pm` FOREIGN KEY (`idModalidad1`) REFERENCES `modalidad` (`idModalidad`),
  ADD CONSTRAINT `fk_pta` FOREIGN KEY (`idTipoAct1`) REFERENCES `tipoactividad` (`idTipoAct`);

--
-- Filtros para la tabla `programaseleccionado`
--
ALTER TABLE `programaseleccionado`
  ADD CONSTRAINT `fk_PSA` FOREIGN KEY (`idPrograma1`) REFERENCES `programa` (`idPrograma`),
  ADD CONSTRAINT `fk_pspr` FOREIGN KEY (`idPrograma1`) REFERENCES `programa` (`idPrograma`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reportesbimestrales`
--
ALTER TABLE `reportesbimestrales`
  ADD CONSTRAINT `fk_rebal` FOREIGN KEY (`NoControlBim`) REFERENCES `alumno` (`NoControl`),
  ADD CONSTRAINT `fk_rebbim` FOREIGN KEY (`idBim`) REFERENCES `bimestre` (`idBimestre`);

--
-- Filtros para la tabla `tab_persona`
--
ALTER TABLE `tab_persona`
  ADD CONSTRAINT `fk_domicilio` FOREIGN KEY (`id_domicilio`) REFERENCES `tab_domicilio` (`id_domicilio`);

--
-- Filtros para la tabla `tab_usuario`
--
ALTER TABLE `tab_usuario`
  ADD CONSTRAINT `fk_persona` FOREIGN KEY (`id_persona`) REFERENCES `tab_persona` (`id_persona`),
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `tab_rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
