DROP TABLE usuarios;

CREATE TABLE usuarios(
    nombre varchar(25),
    apellidos varchar(25),
    numero int,
    contrasena varchar(255),
    fecha date,
    correo varchar(30),
    sexo varchar(20),
    curso varchar(20),
    estudios varchar(50),
    descripcion varchar(255)
);