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
  `descricao` varchar(600) NOT NULL,
  `data` datetime default current_timestamp
);

INSERT INTO `obra`(`usuario_obra_id`, `nome_obra`, `descricao`) VALUES (1,'meme', 'Meme mais recente');

CREATE TABLE `imagem` (
  `id` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `obra_imagem_id` int,
  `usuario_imagem_id` int,
  `arquivo` varchar(500) NOT NULL,
  `caminho` varchar(500) NOT NULL,
  `tamanho` float NOT NULL,
  `fecha` bigint(20) NOT NULL
);

ALTER TABLE `obra` ADD FOREIGN KEY (`usuario_obra_id`) REFERENCES `usuario` (`id`);
ALTER TABLE `imagem` ADD FOREIGN KEY (`obra_imagem_id`) REFERENCES `obra` (`id`);
ALTER TABLE `imagem` ADD FOREIGN KEY (`usuario_imagem_id`) REFERENCES `usuarios` (`id`);

