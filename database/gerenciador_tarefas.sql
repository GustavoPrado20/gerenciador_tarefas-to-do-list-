CREATE DATABASE if NOT EXISTS gerenciador_tarefas;

CREATE TABLE if NOT EXISTS Users
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE if NOT EXISTS Tarefas
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_user INT NOT NULL,
    titulo VARCHAR(50) NOT NULL,
    descricao TEXT,
    status VARCHAR(12) NOT NULL,
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    data_limite DATETIME,

    FOREIGN KEY (id_user) REFERENCES Users (id)    
);