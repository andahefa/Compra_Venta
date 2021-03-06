﻿# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-04-25 16:32:56
# Generator: MySQL-Front 6.0  (Build 2.20)



#
# Structure for table "categoria_articulo"
#

DROP TABLE IF EXISTS `categoria_articulo`;
CREATE TABLE `categoria_articulo` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

#
# Data for table "categoria_articulo"
#

INSERT INTO `categoria_articulo` VALUES (1,'Telefonia Celular'),(4,'Television'),(69,'prueba5'),(80,'prueba3');

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

INSERT INTO `clientes` VALUES (79205593,'Manuel','Hernandez',3207850643,'prueba'),(123456789,'Jhon','Muñozjjj',3214567654,'direccion de prueba'),(1020808853,'Anderson David','hernan',3125968644,'direccion prueba');


#
# Structure for table "estado_articulo"
#

DROP TABLE IF EXISTS `estado_articulo`;
CREATE TABLE `estado_articulo` (
  `id_estado_articulo` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "estado_articulo"
#

INSERT INTO `estado_articulo` VALUES (1,'En Bodega'),(2,'Sin Contrato');

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
  `id_cliente` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_articulo`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_estado_articulo` (`id_estado_articulo`),
  KEY `FK_articuloCliente` (`id_cliente`),
  CONSTRAINT `FK_articuloCliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`num_cedula`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_articulo` (`id_categoria`),
  CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`id_estado_articulo`) REFERENCES `estado_articulo` (`id_estado_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Data for table "articulo"
#

INSERT INTO `articulo` VALUES (1,1,1,'huawei','p8 lite','Articulo en buen estado.aaa',123456789),(2,1,1,'samsung','s3 mini','descripcion de prueba 2',1020808853),(16,4,1,'Samsung','aaa','prueba',1020808853),(17,1,1,'sdsdaaaa','sdsd','asasa',1020808853),(18,4,1,'LG1','I-776GH','Televisor con golpe en la pantalla actualizado',1020808853),(19,1,1,'samsung','s8 mini','celular en buen estado',1020808853),(20,1,1,'pajarito','pajarito2','de prueba',123456789),(21,4,1,'samsung','s-3456','televisor en buen estado',79205593),(22,1,1,'iphone x','de mentiras','robadosss',123456789),(23,4,2,'LG','lg-11111','deeded',79205593),(24,4,2,'9999999999999999','sfsfsf','sfsfsffs',79205593);

#
# Structure for table "estado_contrato"
#

DROP TABLE IF EXISTS `estado_contrato`;
CREATE TABLE `estado_contrato` (
  `id_estado` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
  `id_estado_contrato` int(25) NOT NULL,
  `valor_prestado` double NOT NULL,
  `fecha_prestamo` date NOT NULL,
  `valor_intereses` double NOT NULL,
  PRIMARY KEY (`id_contrato`),
  KEY `id_estado_contrato` (`id_estado_contrato`),
  CONSTRAINT `contratos_ibfk_2` FOREIGN KEY (`id_estado_contrato`) REFERENCES `estado_contrato` (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "contratos"
#


#
# Structure for table "abono_capital"
#

DROP TABLE IF EXISTS `abono_capital`;
CREATE TABLE `abono_capital` (
  `id_abono_capital` int(50) NOT NULL AUTO_INCREMENT,
  `id_contrato` int(50) NOT NULL,
  `fecha_abono` date NOT NULL,
  `valor_abono` double NOT NULL,
  PRIMARY KEY (`id_abono_capital`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `abono_capital_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id_contrato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "abono_capital"
#


#
# Structure for table "articulo_contrato"
#

DROP TABLE IF EXISTS `articulo_contrato`;
CREATE TABLE `articulo_contrato` (
  `id_articulo` int(25) NOT NULL,
  `id_contrato` int(25) NOT NULL,
  KEY `id_articulo` (`id_articulo`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `articulo_contrato_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`),
  CONSTRAINT `articulo_contrato_ibfk_2` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id_contrato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "articulo_contrato"
#


#
# Structure for table "pagos_intereses"
#

DROP TABLE IF EXISTS `pagos_intereses`;
CREATE TABLE `pagos_intereses` (
  `id_pago` int(50) NOT NULL AUTO_INCREMENT,
  `id_contrato` int(50) NOT NULL,
  `fecha_pago` date NOT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `pagos_intereses_ibfk_1` FOREIGN KEY (`id_contrato`) REFERENCES `contratos` (`id_contrato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "pagos_intereses"
#


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
