# Host: localhost  (Version: 5.6.24-log)
# Date: 2018-03-23 07:20:16
# Generator: MySQL-Front 5.3  (Build 4.128)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "categoria_articulo"
#

DROP TABLE IF EXISTS `categoria_articulo`;
CREATE TABLE `categoria_articulo` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "categoria_articulo"
#

INSERT INTO `categoria_articulo` VALUES (1,'Telefonia Celular'),(4,'Television');

#
# Structure for table "estado_articulo"
#

DROP TABLE IF EXISTS `estado_articulo`;
CREATE TABLE `estado_articulo` (
  `id_estado_articulo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "estado_articulo"
#

INSERT INTO `estado_articulo` VALUES (1,'En Bodega');

#
# Structure for table "articulo"
#

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE `articulo` (
  `id_articulo` int(30) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(10) NOT NULL,
  `id_estado_articulo` int(10) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_estado_articulo` (`id_estado_articulo`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_articulo` (`id_categoria`),
  CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`id_estado_articulo`) REFERENCES `estado_articulo` (`id_estado_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "articulo"
#

INSERT INTO `articulo` VALUES (1,1,1,'sdsdsd','fgdgdg','adada'),(2,1,1,'samsung','s3 mini','descripcion de prueba 2'),(3,4,1,'asasa','fsfsf','wewe'),(4,1,1,'samsung','s4 mini','descripcion wilson'),(5,4,1,'aaaaaaaaaaaa','qqqqqqqqqqq','33333333ffffffffff');

#
# Structure for table "estado_contrato"
#

DROP TABLE IF EXISTS `estado_contrato`;
CREATE TABLE `estado_contrato` (
  `id_estado` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "estado_contrato"
#


#
# Procedure "idCategoria"
#

DROP PROCEDURE IF EXISTS `idCategoria`;
CREATE PROCEDURE `idCategoria`(IN `idTipoProducto` VARCHAR(5))
BEGIN
select * from categoria_articulo where id_categoria = idTipoProducto;
END;

#
# Procedure "nombreEstado"
#

DROP PROCEDURE IF EXISTS `nombreEstado`;
CREATE PROCEDURE `nombreEstado`(IN `idestado` VARCHAR(5))
BEGIN
select * from estado_articulo where id_estado_articulo = idestado;
END;
