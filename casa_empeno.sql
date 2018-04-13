# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-04-13 10:43:59
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categoria_articulo"
#

DROP TABLE IF EXISTS `categoria_articulo`;
CREATE TABLE `categoria_articulo` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "categoria_articulo"
#

INSERT INTO `categoria_articulo` VALUES (1,'Telefonia Celular'),(4,'Television'),(69,'prueba5'),(74,'prueba3');

#
# Structure for table "clientes"
#

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `num_cedula` int(15) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` decimal(10,0) NOT NULL,
  `direccion_residencia` varchar(50) NOT NULL,
  PRIMARY KEY (`num_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "clientes"
#

INSERT INTO `clientes` VALUES (1020808853,'Anderson David','Hernandez Farias',3125968644,'direccion prueba');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "articulo"
#

INSERT INTO `articulo` VALUES (1,1,1,'sssss','jhoin es gay3','jhon es gay 3'),(2,1,1,'samsung','s3 mini','descripcion de prueba 2'),(3,4,1,'asasa','fsfsf','wewe'),(4,1,1,'samsung','s4 mini','descripcion wilson'),(5,4,1,'aaaaaaaaaaaa','qqqqqqqqqqq','33333333ffffffffff'),(6,69,1,'sdfsdsd','sdsdsdsd','sdsd');

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

INSERT INTO `estado_contrato` VALUES (1,'Abierto');

#
# Structure for table "contratos"
#

DROP TABLE IF EXISTS `contratos`;
CREATE TABLE `contratos` (
  `id_contrato` int(50) NOT NULL AUTO_INCREMENT,
  `num_cedula_cliente` int(15) NOT NULL,
  `id_estado_contrato` int(25) NOT NULL,
  `valor_prestado` double NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `valor_intereses` double NOT NULL,
  PRIMARY KEY (`id_contrato`),
  KEY `num_cedula_cliente` (`num_cedula_cliente`),
  KEY `id_estado_contrato` (`id_estado_contrato`),
  CONSTRAINT `contratos_ibfk_1` FOREIGN KEY (`num_cedula_cliente`) REFERENCES `clientes` (`num_cedula`),
  CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`id_estado_contrato`) REFERENCES `estado_contrato` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "contratos"
#

INSERT INTO `contratos` VALUES (1,1020808853,1,100000,'0000-00-00',40000);

#
# Procedure "estadoContrato"
#

DROP PROCEDURE IF EXISTS `estadoContrato`;
CREATE PROCEDURE `estadoContrato`(IN `idEstado` VARCHAR(5))
BEGIN
select * from estado_contrato where id_estado = idEstado;
END;

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
