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
	entidad varchar(255) not null,
	CONSTRAINT pk_usuario PRIMARY KEY(id),
	CONSTRAINT fk_usuario_perfil FOREIGN KEY(perfil_name) REFERENCES perfil(name),
	CONSTRAINT uq_usuario UNIQUE(clave_usuario),
	CONSTRAINT uq_email UNIQUE(email),
	CONSTRAINT uq_curp UNIQUE(curp),
	CONSTRAINT uq_rfc UNIQUE(rfc),
	CONSTRAINT uq_cartilla UNIQUE(cartilla),
	CONSTRAINT uq_pasaporte UNIQUE(pasaporte)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO usuario VALUES(NULL, 'jalameda1829@alumno.ipn.mx', 'blacksea80', '2018500451', 'José Alejandro', 'Alameda Gomez', 'alumno', 'UPIICSA', 'AGJA000856HMCLMXA4', 'AGJA000856XA6', NULL, NULL, 'H', '1999-04-01', 'Ciudad de México');
INSERT INTO usuario VALUES(NULL, 'mramirez7805@profesor.ipn.mx', 'grass30', 'AUSR000578XA9', 'María Luna', 'Sanchez Ramírez', 'profesor', 'UPIICSA', 'AUSR000578MMCLMXA9', 'AUSR000578XA9', NULL, NULL, 'M', '1985-10-01', 'Ciudad de México');


CREATE TABLE escolaridad(
	id int auto_increment not null,
	alumno_id int not null,
	escuela varchar(100) not null,
	entidad varchar(100) not null,
	promedio_secundaria float(2,2) not null,
	promedio_superior float(2,2) not null, 
	CONSTRAINT pk_escolaridad PRIMARY KEY(id),
	CONSTRAINT fk_escolaridad_alumno FOREIGN KEY(alumno_id) REFERENCES usuario(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

CREATE TABLE tutor(
	id int auto_increment not null,
	alumno_id int not null,
	nombre varchar(80) not null,
	rfc varchar(13) not null,
	padre varchar(80),
	madre varchar(80),
	CONSTRAINT pk_tutor PRIMARY KEY(id),
	CONSTRAINT fk_tutor_alumno FOREIGN KEY(alumno_id) REFERENCES usuario(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

CREATE TABLE direccion(
	id int auto_increment not null,
	usuario_id int not null,
	calle varchar(50) not null,
	num_ext varchar(50) not null,
	num_int varchar(50) not null,
	colonia varchar(50) not null,
	codigo_postal int not null,
	estado varchar(100) not null,
	municipio varchar(100) not null,
	telefono int,
	movil int,
	email varchar(100),
	tel_oficina int,
	CONSTRAINT pk_direccion PRIMARY KEY(id),
	CONSTRAINT fk_direccion_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;
