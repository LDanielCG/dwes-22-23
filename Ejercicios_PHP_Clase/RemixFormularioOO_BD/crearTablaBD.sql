DROP TABLE usuarios;

CREATE TABLE usuarios(
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(25) NOT NULL,
    apellidos varchar(25) NOT NULL,
    numero int NOT NULL,
    contrasena varchar(255) NOT NULL,
    fecha date NOT NULL,
    correo varchar(30) NOT NULL,
    sexo varchar(20) NOT NULL,
    curso varchar(20) NOT NULL,
    estudios varchar(50) NOT NULL,
    descripcion varchar(255),
    PRIMARY KEY (id)
);