# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-04-22 16:25:57
# Generator: MySQL-Front 6.0  (Build 2.20)


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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "articulo"
#

INSERT INTO `articulo` VALUES (1,1,1,'huawei','p8 lite','Articulo en buen estado.aaa'),(2,1,1,'samsung','s3 mini','descripcion de prueba 2'),(16,4,1,'Samsung','aaa','prueba'),(17,1,1,'sdsdaaaa','sdsd','asasa'),(18,4,1,'LG1','I-776GH','Televisor con golpe en la pantalla actualizado'),(19,1,1,'samsung','s8 mini','celular en buen estado');

#
# Structure for table "categoria_articulo"
#

DROP TABLE IF EXISTS `categoria_articulo`;
CREATE TABLE `categoria_articulo` (
  `id_categoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

#
# Data for table "categoria_articulo"
#

INSERT INTO `categoria_articulo` VALUES (1,'Telefonia Celular'),(4,'Television'),(69,'prueba5');

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

INSERT INTO `clientes` VALUES (79205593,'Manuel','Hernandez',3207850643,'prueba'),(123456789,'Jhon','Muñoz',3214567654,'direccion de prueba'),(1020808853,'Anderson David','Hernandez Farias',3125968644,'direccion prueba');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "contratos"
#

INSERT INTO `contratos` VALUES (1,1020808853,1,23,'2018-04-27',12),(2,79205593,1,50000,'2018-04-12',50),(3,79205593,1,343434,'2018-04-13',34343434),(4,79205593,1,333333333,'2018-04-20',45),(5,123456789,1,2500000,'2018-04-28',40000),(6,123456789,1,50000,'2018-04-13',60000),(7,1020808853,1,50000,'2018-04-20',40);

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
