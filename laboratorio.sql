CREATE DATABASE laboratorio_final;

USE laboratorio_final;

CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);