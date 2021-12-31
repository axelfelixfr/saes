CREATE DATABASE saes;
USE saes;

CREATE TABLE perfil(
	id int auto_increment not null,
	name varchar(50) not null,
	CONSTRAINT pk_perfil PRIMARY KEY(id),
	CONSTRAINT uq_name UNIQUE(name)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO perfil VALUES(NULL, 'profesor');
INSERT INTO perfil VALUES(NULL, 'alumno');

CREATE TABLE usuario(
	id int auto_increment not null,
	email varchar(100) not null,
	password varchar(50) not null,
	clave_usuario varchar(13) not null,
	nombre varchar(80) not null,
	apellidos varchar(80) not null,
	perfil_name varchar(10) not null,
	plantel varchar(100) not null,
	curp varchar(18) not null,
	rfc varchar(13) not null,
	cartilla varchar(50),
	pasaporte varchar(50),
	sexo char(1) not null,
	nacimiento date not null,
	nacionalidad varchar(50) not null,
	entidad varchar(255) not null,
	KEY (id),
	CONSTRAINT pk_usuario PRIMARY KEY(clave_usuario),
	CONSTRAINT fk_usuario_perfil FOREIGN KEY(perfil_name) REFERENCES perfil(name),
	CONSTRAINT uq_usuario UNIQUE(clave_usuario),
	CONSTRAINT uq_email UNIQUE(email),
	CONSTRAINT uq_curp UNIQUE(curp),
	CONSTRAINT uq_rfc UNIQUE(rfc),
	CONSTRAINT uq_cartilla UNIQUE(cartilla),
	CONSTRAINT uq_pasaporte UNIQUE(pasaporte)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES(NULL, 'jalameda1829@alumno.ipn.mx', 'blacksea80', '2018500451', 'José Alejandro', 'Alameda Gomez', 'alumno', 'UPIICSA', 'AGJA000856HMCLMXA4', 'AGJA000856XA6', NULL, NULL, 'H', '1999-04-01', 'Mexicana', 'Estado de México');
INSERT INTO usuario VALUES(NULL, 'mramirez7805@profesor.ipn.mx', 'grass30', 'AUSR000578XA9', 'María Luna', 'Sanchez Ramírez', 'profesor', 'UPIICSA', 'AUSR000578MMCLMXA9', 'AUSR000578XA9', NULL, NULL, 'M', '1985-10-01', 'Mexicana', 'Ciudad de México');
-- NUEVOS:
INSERT INTO usuario VALUES (NULL, 'ngonzalez0120@alumno.ipn.mx', 'newpassword80', '2018600101', 'Noé Alejandro', 'González Pérez', 'alumno', 'UPIICSA', 'XXXXXXXXX999999999', 'XXXX999999', NULL, NULL, 'H', '1999-05-12', 'Mexicana', 'Oaxaca');


CREATE TABLE escolaridad(
	id int auto_increment not null,
	alumno_clave varchar(13) not null,
	escuela varchar(100) not null,
	entidad varchar(100) not null,
	promedio_secundaria float(2,2) default 0.00,
	promedio_superior float(2,2) default 0.00, 
	CONSTRAINT pk_escolaridad PRIMARY KEY(id),
	CONSTRAINT fk_escolaridad_alumno FOREIGN KEY(alumno_clave) REFERENCES usuario(clave_usuario)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO escolaridad (id, alumno_clave, escuela, entidad) VALUES(NULL, '2018500451', 'CBT Lic. Mario Colín Sánchez', 'Estado de México');

CREATE TABLE tutor(
	id int auto_increment not null,
	alumno_clave varchar(13) not null,
	nombre varchar(80) not null,
	rfc varchar(13) default 'XXXX999999',
	padre varchar(80) default 'Sin Especificar',
	madre varchar(80) default 'Sin Especificar',
	CONSTRAINT pk_tutor PRIMARY KEY(id),
	CONSTRAINT fk_tutor_alumno FOREIGN KEY(alumno_clave) REFERENCES usuario(clave_usuario)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO tutor (id, alumno_clave, nombre) VALUES(NULL, '2018500451', 'Alberto Alameda Ramírez');

CREATE TABLE direccion(
	id int auto_increment not null,
	usuario_clave varchar(13) not null,
	calle varchar(50) not null,
	num_ext varchar(50) not null,
	num_int varchar(50),
	colonia varchar(50) not null,
	codigo_postal int not null,
	estado varchar(100) not null,
	municipio varchar(100) not null,
	movil varchar(12),
	email varchar(100),
	tel_oficina varchar(14),
	labora char(2) default 'No',
	CONSTRAINT pk_direccion PRIMARY KEY(id),
	CONSTRAINT fk_direccion_usuario FOREIGN KEY(usuario_clave) REFERENCES usuario(clave_usuario)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO direccion (id, usuario_clave, calle, num_ext, colonia, codigo_postal, estado, municipio) VALUES(NULL, '2018500451', 'Norte 10', 'Lote 26', 'Miguel Hidalgo', 56519, 'Estado de México', 'Amatepec');
INSERT INTO direccion (id, usuario_clave, calle, num_ext, colonia, codigo_postal, estado, municipio, movil, email, tel_oficina) VALUES(NULL, 'AUSR000578XA9', 'Sur 12', 'Lote 02', 'Juventino Rosas', 56985, 'Ciudad de México', 'Iztacalco', '5561425742', 'marialuna@correo.com', '5530911507');

CREATE TABLE asignatura(
	id int auto_increment not null,
	profesor_clave varchar(13) not null,
	secuencia varchar(50) not null,
	materia_clave varchar(50) not null,
	descripcion varchar(50) not null,
	lunes varchar(50),
	martes varchar(50),
	miercoles varchar(50),
	jueves varchar(50),
	viernes varchar(50),
	sabado varchar(50),
	edificio varchar(10),
	salon varchar(10),
	plan_estudios int,
	carrera varchar(10),
	especialidad int,
	periodo_escolar int,
	KEY (id),
	CONSTRAINT pk_asignatura PRIMARY KEY(materia_clave, secuencia, profesor_clave),
	CONSTRAINT fk_asignatura_profesor FOREIGN KEY(profesor_clave) REFERENCES usuario(clave_usuario)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;
INSERT INTO asignatura VALUES (NULL, 'AUSR000578XA9', '3CM61', 'C305', 'Computación Ubicua',NULL, '08:30 - 10:00', NULL, '08:30 - 10:00', NULL, NULL, 'X', 'X', 06, 'C', 0, 20221);
INSERT INTO asignatura VALUES (NULL, 'AUSR000578XA9', '3CM40', 'C301', 'Redes y Conectividad', NULL, '10:00 - 11:30', NULL, '10:00 - 11:30', NULL, NULL, 'X', 'X', 06, 'C', 0, 20221);

CREATE TABLE inscripcion(
	id int auto_increment not null,
	alumno_clave varchar(13) not null,
	asignatura_clave varchar(50) not null,
	KEY (id),
	CONSTRAINT pk_inscripcion PRIMARY KEY(alumno_clave, asignatura_clave),
	CONSTRAINT fk_inscripcion_alumno FOREIGN KEY(alumno_clave) REFERENCES usuario(clave_usuario),
	CONSTRAINT fk_inscripcion_asignatura FOREIGN KEY(asignatura_clave) REFERENCES asignatura(materia_clave)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO inscripcion(id, alumno_clave, asignatura_clave) VALUES (NULL, '2018500451', 'C305');
INSERT INTO inscripcion(id, alumno_clave, asignatura_clave) VALUES (NULL, '2018500451', 'C301');
-- NUEVOS:
INSERT INTO inscripcion(id, alumno_clave, asignatura_clave) VALUES (NULL, '2018600101', 'C305');

-- TABLAS DE EVALUACION

CREATE TABLE evaluacion(
	id int auto_increment not null,
	clv_evaluacion varchar(50) not null,
	asignatura_clave varchar(50) not null,
	-- Si se trata de un primer, segundo o tercer o extraordinario
	ordinario varchar(50),
	fecha_aplicacion varchar(50),
	estatus_acta varchar(50),
	-- El estatus_completa es para saber si ha sido terminada la evaluación o sigue activa
	estatus_completa boolean, 
	KEY (id),
	CONSTRAINT pk_evaluacion PRIMARY KEY(clv_evaluacion),
	CONSTRAINT fk_evaluacion_asignatura FOREIGN KEY(asignatura_clave) REFERENCES asignatura(materia_clave)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;
INSERT INTO evaluacion(id, clv_evaluacion, asignatura_clave, ordinario, fecha_aplicacion, estatus_acta, estatus_completa) 
VALUES (NULL, 'primer_c305', 'C305', 'PRIMER ORDINARIO', '03-jun-2021', 'SIN REGISTRO', true);
INSERT INTO evaluacion(id, clv_evaluacion, asignatura_clave, ordinario, fecha_aplicacion, estatus_acta, estatus_completa) 
VALUES (NULL, 'segundo_c305','C305', 'SEGUNDO ORDINARIO', '20-oct-2021', 'SIN REGISTRO', true);
INSERT INTO evaluacion(id, clv_evaluacion, asignatura_clave, ordinario, fecha_aplicacion, estatus_acta, estatus_completa) 
VALUES (NULL, 'tercer_c305', 'C305', 'TERCER ORDINARIO', '04-ene-2022', 'SIN REGISTRO', false);
-- NUEVOS:
INSERT INTO evaluacion(id, clv_evaluacion, asignatura_clave, ordinario, fecha_aplicacion, estatus_acta, estatus_completa) 
VALUES (NULL, 'primer_C301', 'C301', 'PRIMER ORDINARIO', '03-jun-2021', 'SIN REGISTRO', true);
INSERT INTO evaluacion(id, clv_evaluacion, asignatura_clave, ordinario, fecha_aplicacion, estatus_acta, estatus_completa) 
VALUES (NULL, 'segundo_C301','C301', 'SEGUNDO ORDINARIO', '20-oct-2021', 'SIN REGISTRO', true);
INSERT INTO evaluacion(id, clv_evaluacion, asignatura_clave, ordinario, fecha_aplicacion, estatus_acta, estatus_completa) 
VALUES (NULL, 'tercer_C301', 'C301', 'TERCER ORDINARIO', '04-ene-2022', 'SIN REGISTRO', false);

CREATE TABLE calificacion_parcial(
	id int auto_increment not null,
	evaluacion_clave varchar(50) not null,
	asignatura_clave varchar(50) not null,
	alumno_clave varchar(13) not null,
	calificacion varchar(10),
	KEY (id),
	CONSTRAINT uq_calif_eval UNIQUE(evaluacion_clave, alumno_clave),
	CONSTRAINT pk_calificacion_parcial PRIMARY KEY(evaluacion_clave, alumno_clave),
	CONSTRAINT fk_calif_parcial_asignatura FOREIGN KEY(asignatura_clave) REFERENCES asignatura(materia_clave),
	CONSTRAINT fk_calif_parcial_evaluacion FOREIGN KEY(evaluacion_clave) REFERENCES evaluacion(clv_evaluacion),
	CONSTRAINT fk_calif_parcial_alumno FOREIGN KEY(alumno_clave) REFERENCES usuario(clave_usuario)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO calificacion_parcial VALUES(NULL, 'primer_c305', 'C305', '2018500451', '10');
INSERT INTO calificacion_parcial VALUES(NULL, 'segundo_c305', 'C305', '2018500451', '8');
INSERT INTO calificacion_parcial VALUES(NULL, 'tercer_c305', 'C305', '2018500451', NULL);
-- NUEVOS:
INSERT INTO calificacion_parcial VALUES(NULL, 'primer_c305', 'C305', '2018600101', '9');
INSERT INTO calificacion_parcial VALUES(NULL, 'segundo_c305', 'C305', '2018600101', '5');
INSERT INTO calificacion_parcial VALUES(NULL, 'tercer_c305', 'C305', '2018600101', NULL);
-- REDES:
INSERT INTO calificacion_parcial VALUES(NULL, 'primer_c301', 'C301', '2018500451', '5');
INSERT INTO calificacion_parcial VALUES(NULL, 'segundo_c301', 'C301', '2018500451', '7');
INSERT INTO calificacion_parcial VALUES(NULL, 'tercer_c301', 'C301', '2018500451', NULL);

-- INNER JOIN PARA PONER EN LA VISTA DE calificaciones.php
-- SELECT asig.secuencia, asig.descripcion, eval.ordinario, eval.asignatura_clave, eval.estatus_acta, eval.fecha_aplicacion, eval.estatus_completa FROM asignatura asig INNER JOIN evaluacion eval ON asig.materia_clave = eval.asignatura_clave WHERE eval.asignatura_clave = 'C305';

-- Evaluaciones/asignaturas por profesor (sentencia WHERE)
-- SELECT asig.secuencia, asig.profesor_clave, asig.descripcion, eval.clv_evaluacion, eval.ordinario, eval.asignatura_clave, eval.estatus_acta, eval.fecha_aplicacion, eval.estatus_completa FROM asignatura asig INNER JOIN evaluacion eval ON asig.materia_clave = eval.asignatura_clave WHERE asig.profesor_clave = 'AUSR000578XA9';

-- Horario de alumno
-- SELECT asig.secuencia, asig.descripcion, asig.lunes, asig.martes, asig.miercoles, asig.jueves, asig.viernes, asig.sabado, asig.carrera, asig.edificio, asig.salon, asig.especialidad, asig.periodo_escolar, asig.plan_estudios, insc.asignatura_clave, profe.nombre, profe.apellidos FROM asignatura asig INNER JOIN usuario profe ON asig.profesor_clave = profe.clave_usuario INNER JOIN inscripcion insc ON asig.materia_clave = insc.asignatura_clave WHERE insc.alumno_clave = '2018500451';

-- Calificacion_parcial
-- SELECT asig.secuencia, alumno.nombre, alumno.apellidos, asig.descripcion, asig.carrera, asig.periodo_escolar, semestre.alumno_clave, calif.calificacion, calif.evaluacion_clave FROM calificacion_semestre semestre INNER JOIN usuario alumno ON semestre.alumno_clave = alumno.clave_usuario INNER JOIN calificacion_parcial calif ON semestre.alumno_clave = calif.alumno_clave INNER JOIN asignatura asig ON semestre.asignatura_clave = asig.materia_clave WHERE asig.materia_clave = 'C305' AND calif.evaluacion_clave = 'tercer_c305';

-- Para evaluación de profesor
-- SELECT asig.secuencia, alumno.nombre, alumno.apellidos, asig.descripcion, asig.carrera, asig.periodo_escolar, asig.materia_clave, asig.profesor_clave, semestre.alumno_clave, calif.calificacion, calif.evaluacion_clave FROM calificacion_semestre semestre INNER JOIN usuario alumno ON semestre.alumno_clave = alumno.clave_usuario INNER JOIN calificacion_parcial calif ON semestre.alumno_clave = calif.alumno_clave INNER JOIN asignatura asig ON semestre.asignatura_clave = asig.materia_clave WHERE asig.materia_clave = 'C305' AND calif.evaluacion_clave = 'tercer_c305';

-- Calificacion_semestre
-- SELECT asig.secuencia, asig.descripcion, asig.carrera, asig.periodo_escolar, insc.asignatura_clave, calif.calificacion_primer, calif.calificacion_segundo, calif.calificacion_tercer FROM inscripcion insc INNER JOIN calificacion_semestre calif ON insc.alumno_clave = calif.alumno_clave INNER JOIN asignatura asig ON insc.asignatura_clave = asig.materia_clave WHERE insc.alumno_clave = '2018500451';

CREATE TABLE calificacion_semestre(
	id int auto_increment not null,
	alumno_clave varchar(13) not null,
	calificacion_primer varchar(10),
	calificacion_segundo varchar(10),
	calificacion_tercer varchar(10),
	asignatura_clave varchar(50) not null,
    KEY (id),
	CONSTRAINT uq_calif_eval UNIQUE(asignatura_clave, alumno_clave),
	CONSTRAINT pk_calificacion_semestre PRIMARY KEY(asignatura_clave, alumno_clave),
	CONSTRAINT fk_calificacion_asignatura FOREIGN KEY(asignatura_clave) REFERENCES asignatura(materia_clave),
	CONSTRAINT fk_calificacion_alumno FOREIGN KEY(alumno_clave) REFERENCES usuario(clave_usuario)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;


-- INSERT INTO calificacion_semestre VALUES(NULL, '2018500451', '10', '8', NULL, 'C305');
-- INSERT INTO calificacion_semestre VALUES(NULL, '2018500451', '7', '5', NULL, 'C301');
-- NUEVOS:
-- INSERT INTO calificacion_semestre VALUES(NULL, '2018600101', '9', '5', NULL, 'C305');

-- UPDATE para actualización de calificacion del semestre por alumno
-- UPDATE calificacion_semestre SET calificacion_tercer ='0' WHERE alumno_clave='2018500451' AND asignatura_clave='C305';

-- Consulta para ver calificaciones
-- SELECT asig.secuencia, asig.descripcion, asig.carrera, insc.alumno_clave, insc.asignatura_clave, calif.calificacion_primer, calif.calificacion_segundo, calif.calificacion_tercer FROM inscripcion insc INNER JOIN asignatura asig ON insc.asignatura_clave = asig.materia_clave INNER JOIN calificacion_semestre calif ON insc.alumno_clave = calif.alumno_clave AND insc.asignatura_clave = calif.asignatura_clave WHERE calif.alumno_clave = '2018500451';
