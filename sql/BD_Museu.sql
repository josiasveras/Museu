CREATE DATABASE museu;
USE museu;

CREATE TABLE `usuarios`
(
  `id_usuario` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `idade` int(3) NOT NULL
);

CREATE TABLE `obras`
(
  `id_obra` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `fk_id_usuario` int,
  `nome_obra` varchar(50) NOT NULL,
  `descricao` varchar(600) NOT NULL,
  `data` datetime default current_timestamp,
    FOREIGN KEY(fk_id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);

CREATE TABLE imagens(
  `id_imagem` int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nome_imagem` varchar(40),
  `fk_id_obra` int,
    FOREIGN KEY(fk_id_obra) REFERENCES obras(id_obra) ON DELETE CASCADE
);

