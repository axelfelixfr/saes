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
	CONSTRAINT pk_usuario PRIMARY KEY(id),
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


CREATE TABLE escolaridad(
	id int auto_increment not null,
	alumno_id int not null,
	escuela varchar(100) not null,
	entidad varchar(100) not null,
	promedio_secundaria float(2,2) default 0.00,
	promedio_superior float(2,2) default 0.00, 
	CONSTRAINT pk_escolaridad PRIMARY KEY(id),
	CONSTRAINT fk_escolaridad_alumno FOREIGN KEY(alumno_id) REFERENCES usuario(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO escolaridad (id, alumno_id, escuela, entidad) VALUES(NULL, 1, 'CBT Lic. Mario Colín Sánchez', 'Estado de México');

CREATE TABLE tutor(
	id int auto_increment not null,
	alumno_id int not null,
	nombre varchar(80) not null,
	rfc varchar(13) default 'XXXX999999',
	padre varchar(80) default 'Sin Especificar',
	madre varchar(80) default 'Sin Especificar',
	CONSTRAINT pk_tutor PRIMARY KEY(id),
	CONSTRAINT fk_tutor_alumno FOREIGN KEY(alumno_id) REFERENCES usuario(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO tutor (id, alumno_id, nombre) VALUES(NULL, 1, 'Alberto Alameda Ramírez');

CREATE TABLE direccion(
	id int auto_increment not null,
	usuario_id int not null,
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
	CONSTRAINT fk_direccion_usuario FOREIGN KEY(usuario_id) REFERENCES usuario(id)
)ENGINE=InnoDb DEFAULT CHARSET=utf8mb4;

INSERT INTO direccion (id, usuario_id, calle, num_ext, colonia, codigo_postal, estado, municipio) VALUES(NULL, 1, 'Norte 10', 26, 'Miguel Hidalgo', 56519, 'Estado de México', 'Amatepec');