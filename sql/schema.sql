CREATE TABLE IF NOT EXISTS usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    correo VARCHAR(255),
    password VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS contactos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255),
    numero VARCHAR(255),
    usuario_id INT,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
