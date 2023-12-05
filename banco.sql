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
    link_imagem text not null,
    PRIMARY KEY (id),
    CONSTRAINT uk_usuario_email UNIQUE KEY (email)
);

CREATE TABLE post(
    id int NOT NULL AUTO_INCREMENT,
    titulo varchar(255) NOT NULL,
    texto text NOT NULL,
    usuario_id int NOT NULL,
    data_criacao datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    data_postagem datetime NOT NULL,
    link_imagem text not null,
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
    nome varchar(100) NOT NULL,
    link varchar(255) NOT NULL,
    PRIMARY KEY (id),    
    CONSTRAINT fk_video_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id)
);



INSERT INTO usuario (nome,email,senha,data_criacao,ativo) VALUES
	 ('User 1','user@1.com','1234','2023-11-19 10:31:01',1),
	 ('User 2','user@2.com','1234','2023-11-19 10:31:01',1),
	 ('User 3','user@3.com','1234','2023-11-19 10:31:01',1);

INSERT INTO post (titulo,texto,usuario_id,data_criacao,data_postagem,link_imagem) VALUES
	 ('Post 1','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',1,'2023-11-19 11:01:38','2023-11-19 10:31:01','img/pic-1.png'),
	 ('Post 2','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',2,'2023-11-19 11:01:38','2023-11-19 10:31:02','img/pic-1.png'),
	 ('Post 3','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',1,'2023-11-19 11:01:38','2023-11-19 10:31:03','img/pic-1.png');

INSERT INTO comentario (nota,comentario,usuario_id,post_id,data_criacao) VALUES
	 (4,'Comentatio 1',1,1,'2023-11-19 11:02:01'),
	 (3,'Comentatio 2',2,2,'2023-11-19 11:02:02'),
	 (1,'Comentatio 3',3,1,'2023-11-19 11:02:03'),
	 (4,'Comentatio 4',1,3,'2023-11-19 11:02:04'),
	 (3,'Comentatio 5',2,1,'2023-11-19 11:02:05');

INSERT INTO video (usuario_id,titulo,data_criacao,data_postagem,nome,link) VALUES
	 (1,'Video 1','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 1','https://www.youtube.com/embed/CzeItjhFpSQ?si=P1_HyXF7jIVQV9hf'),
	 (2,'Video 2','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 2','https://www.youtube.com/embed/CzeItjhFpSQ?si=P1_HyXF7jIVQV9hf'),
	 (3,'Video 3','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 3','https://www.youtube.com/embed/CzeItjhFpSQ?si=P1_HyXF7jIVQV9hf'),
	 (1,'Video 4','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 4','https://www.youtube.com/embed/CzeItjhFpSQ?si=P1_HyXF7jIVQV9hf'),
	 (2,'Video 5','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 5','https://www.youtube.com/embed/CzeItjhFpSQ?si=P1_HyXF7jIVQV9hf'),
	 (3,'Video 6','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 6','https://www.youtube.com/embed/CzeItjhFpSQ?si=P1_HyXF7jIVQV9hf');
