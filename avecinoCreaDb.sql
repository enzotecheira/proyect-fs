DROP DATABASE IF EXISTS avecino;
CREATE SCHEMA avecino ;
USE avecino;
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `image` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuarios`));
INSERT INTO `avecino`.`usuarios` (`userName`, `email`, `password`, `name`,`image`) VALUES ('a', 'a@a.com', 'a', 'a','a');
