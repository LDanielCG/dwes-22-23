DROP TABLE usuarios_foro;

CREATE TABLE usuarios_foro(
    id_user int NOT NULL AUTO_INCREMENT,
    username varchar(25) NOT NULL,
    correo varchar(30) NOT NULL,
    contrasena varchar(255) NOT NULL,
    PRIMARY KEY (id_user)
);

DROP TABLE mensajes_foro;

CREATE TABLE mensajes_foro(
    id_msg int NOT NULL AUTO_INCREMENT,
    id_user int NOT NULL REFERENCES usuarios_foro(id_user),
    fecha_hora int NOT NULL,
    cuerpoMensaje varchar(128) NOT NULL,
    PRIMARY KEY (id_msg,id_user)
);

DROP TABLE respuestas_foro;

CREATE TABLE respuestas_foro(
    id_respuesta int NOT NULL AUTO_INCREMENT,
    id_msg int NOT NULL REFERENCES mensajes_foro(id_msg),
    id_user int NOT NULL REFERENCES usuarios_foro(id_user),
    fecha_hora int NOT NULL,
    cuerpoRespuesta varchar(128) NOT NULL,
    PRIMARY KEY (id_respuesta,id_msg,id_user)
);


-- Contraseña: 1234

INSERT INTO usuarios_foro (username, correo, contrasena) VALUES (
  'danieh', 'danieh@mail.es', '$2y$10$2IBLoO9c2NqscjxBqKSZhe0KUTs8FeCQpXi.H4S5N8qK2GbMAQX0a'
);