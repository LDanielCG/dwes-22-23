DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    passwd VARCHAR(255),
    img VARCHAR(255),
    correo VARCHAR(255),
    descripcion TEXT
);

DROP TABLE IF EXISTS tokens;
CREATE TABLE tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    valor VARCHAR(255),
    expiracion DATETIME,
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);