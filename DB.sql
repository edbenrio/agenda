CREATE TABLE usuario (
    id bigint(20) unsigned NOT NULL  AUTO_INCREMENT,
    nombre varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    contrasena varchar(50),
    rol varchar(12),
    PRIMARY KEY (id)
)  ENGINE=InnoDB;

CREATE TABLE pacientes (
    id bigint(20) unsigned NOT NULL  AUTO_INCREMENT,
    nombre varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    apellido varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    ci varchar(15) COLLATE utf8_unicode_ci NOT NULL,
    estado varchar(45) COLLATE utf8_unicode_ci NOT NULL,
    direccion varchar(200) COLLATE utf8_unicode_ci NOT NULL,
    ciudad varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    barrio varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    telefono varchar(40) NOT NULL,
    email varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (id)
)  ENGINE=InnoDB;

CREATE TABLE ficha(
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    enfermedades_base varchar (400),
    alergias varchar (400),
    observaciones longtext,
    PRIMARY KEY(id),
    id_paciente bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_paciente) REFERENCES pacientes(id)
		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE profesional (
    id bigint(20) unsigned NOT NULL  AUTO_INCREMENT,
    nombre varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    apellido varchar(50) COLLATE utf8_unicode_ci NOT NULL,
    estado varchar(45) COLLATE utf8_unicode_ci NOT NULL,
    correo varchar(45) COLLATE utf8_unicode_ci NOT NULL,
    telefono varchar(45) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (id),
    id_usuario bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_usuario) REFERENCES usuario(id)
)  ENGINE=InnoDB;

CREATE TABLE agenda (
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    id_profesional bigint(20) unsigned NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(id_profesional) REFERENCES profesional(id)
		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE sanatorio (
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    direccion varchar(100) NOT NULL,
    ciudad varchar(45) NOT NULL,
    barrio varchar(45) NOT NULL,
    telefono varchar(45) NOT NULL,
    celular varchar(45) NOT NULL,
    mail varchar(50) NOT NULL,
    PRIMARY KEY(id),
    id_agenda bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_agenda) REFERENCES agenda(id) 
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE fecha (
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    fecha DATE NOT NULL,
    PRIMARY KEY(id),
    id_sanatorio bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_sanatorio) REFERENCES sanatorio(id) 
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE horario (
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    desde TIME NOT NULL,
    hasta TIME NOT NULL,
    PRIMARY KEY(id),
    id_fecha bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_fecha) REFERENCES fecha(id) 
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE secretaria(
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    apellido varchar(50) NOT NULL,
    estado varchar(45) NOT NULL,
    PRIMARY KEY(id),
    id_agenda bigint(20) unsigned NOT NULL,
    FOREIGN KEY (id_agenda) REFERENCES agenda(id)
         ON DELETE CASCADE ON UPDATE CASCADE,
    id_profesional bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_profesional) REFERENCES profesional(id)
         ON DELETE CASCADE ON UPDATE CASCADE,
    id_usuario bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_usuario) REFERENCES usuario(id)
) ENGINE = InnoDB;

CREATE TABLE consulta(
    id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    duracion TIME NOT NULL,
    estado varchar(15) NOT NULL,
    PRIMARY KEY(id),
    id_profesional bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_profesional) REFERENCES profesional(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    id_paciente bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_paciente) REFERENCES pacientes(id)
		ON DELETE CASCADE ON UPDATE CASCADE,
    id_horario bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_horario) REFERENCES horario(id) 
        ON DELETE CASCADE ON UPDATE CASCADE,
    id_sanatorio bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_sanatorio) REFERENCES sanatorio(id) 
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE InnoDB;

CREATE TABLE tratamiento (
    id bigint(20) unsigned NOT NULL  AUTO_INCREMENT,
    descripcion longtext,
    PRIMARY KEY(id),
    id_profesional bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_profesional) REFERENCES profesional(id)
		ON DELETE CASCADE ON UPDATE CASCADE,
    id_consulta bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_consulta) REFERENCES consulta(id)
		ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE diagnostico (
    id bigint(20) unsigned NOT NULL  AUTO_INCREMENT,
    descripcion longtext,
    PRIMARY KEY(id),
    id_profesional bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_profesional) REFERENCES profesional(id)
		ON DELETE CASCADE ON UPDATE CASCADE,
    id_consulta bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_consulta) REFERENCES consulta(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

CREATE TABLE analisis (
    id bigint(20) unsigned NOT NULL  AUTO_INCREMENT,
    descripcion longtext,
    PRIMARY KEY(id),
    id_profesional bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_profesional) REFERENCES profesional(id)
		ON DELETE CASCADE ON UPDATE CASCADE,
    id_consulta bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_consulta) REFERENCES consulta(id)
        ON DELETE CASCADE ON UPDATE CASCADE

) ENGINE = InnoDB;

CREATE TABLE receta (
    id bigint(20) unsigned NOT NULL  AUTO_INCREMENT,
    descripcion longtext,
    PRIMARY KEY(id),
    id_profesional bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_profesional) REFERENCES profesional(id)
		ON DELETE CASCADE ON UPDATE CASCADE,
    id_consulta bigint(20) unsigned NOT NULL,
    FOREIGN KEY(id_consulta) REFERENCES consulta(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;

/* TODO: SE COMENTA PORQUE EL SERVER NO PERMITE VISTAS*/
/*CREATE VIEW vista_consultas AS (
  SELECT c.id as id_consulta, p.nombre, p.apellido, c.estado, f.fecha, h.desde, s.nombre as sanatorio FROM consulta AS c JOIN pacientes as p ON c.id_paciente = p.id JOIN sanatorio AS s ON s.id = c.id_sanatorio JOIN horario AS h ON h.id = c.id_horario JOIN fecha AS f ON f.id = h.id_fecha
)*/
