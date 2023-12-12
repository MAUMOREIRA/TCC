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
	 ('A Importância do Autoconhecimento na Saúde Mental','A saúde mental é um campo vasto e complexo que abrange não apenas a ausência de doenças mentais, mas também o estado de bem-estar psicológico e emocional. Dentro desse contexto, o autoconhecimento emerge como uma ferramenta crucial para promover e manter uma saúde mental sólida. Conhecer a si mesmo vai além da mera consciência de características superficiais; envolve uma exploração profunda de emoções, pensamentos, valores e experiências passadas.

O autoconhecimento permite que uma pessoa identifique padrões comportamentais, compreenda suas reações diante de desafios e reconheça sinais precoces de estresse, ansiedade ou depressão. Essa conscientização é fundamental para a adoção de estratégias preventivas e de autocuidado. Quando estamos sintonizados com nossas necessidades emocionais, tornamo-nos mais capazes de tomar decisões alinhadas com nossos valores, o que contribui para uma sensação de realização e propósito.

Além disso, o autoconhecimento facilita a construção de relacionamentos saudáveis. Ao compreender nossas próprias complexidades, tornamo-nos mais empáticos e compreensivos em relação aos outros. Isso cria conexões mais profundas e significativas, promovendo um ambiente social que apoia a saúde mental de todos os envolvidos.

Portanto, cultivar o autoconhecimento não é apenas uma jornada individual, mas também um investimento na construção de comunidades mais conscientes e solidárias. Ao compreendermos quem somos, podemos criar uma base sólida para enfrentar os desafios da vida, promovendo assim uma saúde mental robusta e duradoura.',1,'2023-11-19 11:01:38','2023-11-19 10:31:01','img/caminhadavida.jpg'),
	 ('A Resiliência como Pilar da Saúde Mental','Em meio às complexidades da vida, a resiliência emerge como uma qualidade fundamental para preservar e promover a saúde mental. A resiliência não implica na ausência de desafios, mas na capacidade de enfrentá-los, aprender com as experiências adversas e adaptar-se de maneira saudável. É um processo contínuo de crescimento pessoal e enfrentamento positivo diante das dificuldades.

Desenvolver a resiliência requer uma combinação de fatores, incluindo a busca por apoio social, o cultivo de pensamentos positivos e a prática regular de autorreflexão. O suporte social desempenha um papel crucial, pois compartilhar experiências com amigos, familiares ou profissionais pode fornecer perspectivas valiosas e fortalecer os laços emocionais.

Além disso, a resiliência envolve a capacidade de regular as emoções e manter uma visão otimista mesmo diante das adversidades. Isso não significa ignorar a dor ou o sofrimento, mas sim encontrar maneiras construtivas de lidar com esses sentimentos, transformando-os em oportunidades de crescimento pessoal.

Ao incorporar a resiliência em nossa vida cotidiana, construímos uma base sólida para enfrentar os altos e baixos inevitáveis da existência. Essa mentalidade resiliente não apenas fortalece a saúde mental individual, mas também contribui para a formação de comunidades mais adaptáveis e solidárias.',2,'2023-11-19 11:01:38','2023-11-19 10:31:02','img/amorproprio.jpeg'),
	 ('O Papel da Empatia na Saúde Mental Coletiva','A saúde mental não é um fenômeno isolado; ela está intrinsecamente ligada às interações humanas e à dinâmica das comunidades. Nesse contexto, a empatia surge como uma força poderosa na promoção de ambientes mais saudáveis e solidários. A empatia vai além da simples compreensão das emoções alheias; ela envolve a capacidade de se colocar no lugar do outro, compartilhando suas alegrias e dores.

Ao cultivar a empatia, criamos conexões mais profundas e genuínas. A escuta ativa, a compreensão das experiências alheias e a oferta de suporte emocional tornam-se práticas cotidianas, reduzindo o estigma em torno das questões de saúde mental. Quando as pessoas se sentem compreendidas e apoiadas, é mais provável que busquem ajuda quando necessário, promovendo a prevenção e o tratamento precoce de problemas mentais.

Além disso, a empatia estende-se à construção de sociedades mais inclusivas e justas. Ao reconhecer e respeitar as diferentes jornadas e desafios enfrentados por cada indivíduo, criamos um ambiente que valoriza a diversidade e promove a aceitação incondicional.

Portanto, a empatia não é apenas uma qualidade individual, mas uma força transformadora que molda a saúde mental coletiva. Ao incorporar a empatia em nossa cultura e interações diárias, construímos uma base sólida para a promoção do bem-estar emocional em níveis individuais e comunitários.',1,'2023-11-19 11:01:38','2023-11-19 10:31:03','img/centralpark.jpg');

INSERT INTO comentario (nota,comentario,usuario_id,post_id,data_criacao) VALUES
	 (4,'Comentatio 1',1,1,'2023-11-19 11:02:01'),
	 (3,'Comentatio 2',2,2,'2023-11-19 11:02:02'),
	 (1,'Comentatio 3',3,1,'2023-11-19 11:02:03'),
	 (4,'Comentatio 4',1,3,'2023-11-19 11:02:04'),
	 (3,'Comentatio 5',2,1,'2023-11-19 11:02:05');

INSERT INTO video (usuario_id,titulo,data_criacao,data_postagem,nome,link) VALUES
	 (1,'Video 1','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 1','https://www.youtube.com/embed/r6gA9fupXr4?si=NXFmPuQT4222bMgf'),
	 (2,'Video 2','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 2','https://www.youtube.com/embed/eagkZaQ8ImA?si=NSpKPIXApDojBGdI'),
	 (3,'Video 3','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 3','https://www.youtube.com/embed/UwyE_XIQ7DA?si=V6gmCJz-vXXyyhgu'),
	 (1,'Video 4','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 4','https://www.youtube.com/embed/8Z8eF4OppPQ?si=EbIDwfpceynX2KCA'),
	 (2,'Video 5','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 5','https://www.youtube.com/embed/bJBCDWOpmnE?si=BpH1uHwHPHoCZqyJ'),
	 (3,'Video 6','2023-11-19 10:35:00','2023-11-19 10:31:01','Video 6','https://www.youtube.com/embed/kuA2l7tXtE4?si=8AB20-7RjtD48Be2');
