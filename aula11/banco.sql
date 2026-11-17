CREATE DATABASE IF NOT EXISTS barrefilmes;
USE barrefilmes;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    nascimento DATE NOT NULL,
    senha VARCHAR(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS pendente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_amigo INT NOT NULL,
    UNIQUE (id_usuario, id_amigo)
);

CREATE TABLE IF NOT EXISTS amigos (
    id_usuario INT NOT NULL,
    id_amigo INT NOT NULL,
    PRIMARY KEY (id_usuario, id_amigo)
);

CREATE TABLE IF NOT EXISTS filmes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    nome VARCHAR(150) NOT NULL,
    descricao VARCHAR(300) NOT NULL,
    foto VARCHAR(255) NOT NULL,
    link VARCHAR(300) NOT NULL,
    classificacao INT NOT NULL,
    nota_usuario INT NOT NULL
);

CREATE TABLE IF NOT EXISTS curtidas (
    id_usuario INT NOT NULL,
    id_filme INT NOT NULL,
    PRIMARY KEY (id_usuario, id_filme)
);

CREATE TABLE IF NOT EXISTS comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_filme INT NOT NULL,
    comentario VARCHAR(300) NOT NULL
);
