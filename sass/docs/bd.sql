CREATE DATABASE sass;

USE sass;

CREATE TABLE tab_rol(
id_rol int(12) PRIMARY KEY NOT NULL AUTO_INCREMENT,
rol varchar(245) NOT NULL,
descripcion varchar(245)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO tab_rol VALUES (1,'admin','Tiene acceso total al sistema'),(2,'cliente','Tiene acceso restringido al sistema');

CREATE TABLE tab_domicilio(
id_domicilio int(12) PRIMARY KEY NOT NULL AUTO_INCREMENT,
calle varchar(245) NOT NULL,
numero_exterior varchar(245) NOT NULL,
numero_interior varchar(245),
colonia varchar(245) NOT NULL,
municipio varchar(245) NOT NULL,
estado varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tab_domicilio VALUES (1,'Morelos','193','s/n','Loma La Palma','Alcaldía Gustavo A. Madero','CDMX');
INSERT INTO tab_domicilio VALUES (2,'Calle 9','Lte 20, Mza 31','s/n','El olivo II','Tlalnepantla de Baz','Estado de México');

CREATE TABLE tab_persona(
id_persona int(12) PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_domicilio int(12) NOT NULL,
paterno varchar(245) NOT NULL,
materno varchar(245) NOT NULL,
nombre varchar(245) NOT NULL,
edad varchar(245) NOT NULL,
sexo varchar(245) NOT NULL,
telefono varchar(20) NOT NULL,
correo varchar(245) NOT NULL,
fecha_registro datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT fk_domicilio FOREIGN KEY (id_domicilio) REFERENCES tab_domicilio (id_domicilio) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tab_persona VALUES (1,1,'Ramirez','Sanchez','Andrea Lizzet','unknow','Femenino','5553231041','dir_gamadero2@tecnm.mx',current_timestamp());
INSERT INTO tab_persona VALUES (2,2,'Hernandez','Flores','Raul','28','Masculino','5591255147','l17251062@tlalnepantla.tecnm.mx',current_timestamp());

CREATE TABLE tab_carrera(
id_carrera int(12) PRIMARY KEY NOT NULL AUTO_INCREMENT,
carrera varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tab_carrera VALUES (1,'Ingeniería en Administración'),(2,'Ingeniería Industrial'),(3,'Arquitectura'),(4,'Ingeniería en Tecnologías de la Información y Comunicaciones'), (5,'Sin carrera');

CREATE TABLE tab_alumno(
id_alumno int(12) PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_carrera int(12) NOT NULL,
semestre int(2) NOT NULL,
creditos int(4) NOT NUll,
CONSTRAINT fk_carrera FOREIGN KEY (id_carrera) REFERENCES tab_carrera (id_carrera) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tab_alumno VALUES (1,5,1,1);
INSERT INTO tab_alumno VALUES (2,4,11,256);

CREATE TABLE tab_usuario(
id_usuario int(12) PRIMARY KEY NOT NULL AUTO_INCREMENT,
id_rol int(12) NOT NULL,
id_persona int(12) NOT NULL,
id_alumno int(12) NOT NULL,
usuario varchar(12) NOT NULL,
password varchar(256) NOT NULL,
estatus int(11) NOT NULL DEFAULT '0',
fecha_registro datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT fk_rol FOREIGN KEY (id_rol) REFERENCES tab_rol (id_rol) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT fk_persona FOREIGN KEY (id_persona) REFERENCES tab_persona (id_persona) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT fk_alumno FOREIGN KEY (id_alumno) REFERENCES tab_alumno (id_alumno) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tab_usuario VALUES (1,1,1,1,'andy','d033e22ae348aeb5660fc2140aec35850c4da997',1,current_timestamp());
INSERT INTO tab_usuario VALUES (2,2,2,2,'17251062','60ad5645d4cba00c0a7265165da3c459b32e2f9e',1,current_timestamp());