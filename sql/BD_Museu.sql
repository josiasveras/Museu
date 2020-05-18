CREATE DATABASE Museu;
USE Museu;

CREATE TABLE `usuario`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `dt_nasc` date NOT NULL,
  `genero` varchar(2) NOT NULL,
  `estado` varchar(2) NOT NULL
);

INSERT INTO `usuario`(`nome`, `email`, `senha`, `dt_nasc`, `genero`, `estado`) VALUES ('Jorzias Veras','jorzias_veras@colabora.com.br',(md5(123)),'1991-01-28','M','SP');

CREATE TABLE `obra`
(
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `usuario_obra_id` int,
  `nome_obra` varchar(50) NOT NULL,
  `foto_obra` blob NULL,
  `descricao` varchar(600) NOT NULL,
  `data` datetime default current_timestamp
);

INSERT INTO `obra`(`usuario_obra_id`, `nome_obra`, `descricao`) VALUES (1,'meme', 'Meme mais recente');

ALTER TABLE `obra` ADD FOREIGN KEY (`usuario_obra_id`) REFERENCES `usuario` (`id`);