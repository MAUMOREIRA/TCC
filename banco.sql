DROP DATABASE IF EXISTS psyque;
CREATE DATABASE psyque;
USE psyque;

CREATE TABLE usuario (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    email varchar(255) NOT NULL,
    senha varchar(60) NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    ativo tinyint NOT NULL DEFAULT '0',
    PRIMARY KEY (id)    
);

CREATE TABLE post(
    id int NOT NULL AUTO_INCREMENT,
    titulo varchar(255) NOT NULL,
    texto text NOT NULL,
    usuario_id int NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_postagem datetime NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_post_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id)

);

CREATE TABLE comentario(
    id int NOT NULL AUTO_INCREMENT,
    nota int NOT NULL,
    comentario varchar(255) NOT NULL,
    usuario_id int NOT NULL,
    post_id int NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT fk_comentario_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id),
    CONSTRAINT fk_comentario_post FOREIGN KEY (post_id) REFERENCES post (id)
);

CREATE TABLE video(
    id int NOT NULL AUTO_INCREMENT,
    usuario_id int NOT NULL,
    titulo varchar(255) NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_postagem datetime NOT NULL,
    nome_video varchar(100) NOT NULL,
    PRIMARY KEY (id),    
    CONSTRAINT fk_video_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id)

);

CREATE TABLE podcast(
    id int NOT NULL AUTO_INCREMENT,
    titulo varchar(255) NOT NULL,
    usuario_id int NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_postagem datetime NOT NULL,
    nome_ varchar(100) NOT NULL,
    PRIMARY KEY (id),  
    CONSTRAINT fk_podcast_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id)

);