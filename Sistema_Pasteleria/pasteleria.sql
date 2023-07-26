/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - pasteleria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pasteleria` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `pasteleria`;

/*Table structure for table `tblbitacora` */

DROP TABLE IF EXISTS `tblbitacora`;

CREATE TABLE `tblbitacora` (
  `idHistorial` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(100) DEFAULT NULL,
  `accion` varchar(50) DEFAULT NULL,
  `objeto` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tabla` varchar(50) DEFAULT NULL,
  KEY `idHistorial` (`idHistorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblbitacora` */

LOCK TABLES `tblbitacora` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblcliente` */

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente` (
  `vchpassword` varchar(100) NOT NULL,
  `vchnombre` varchar(100) NOT NULL,
  `vchapaterno` varchar(100) NOT NULL,
  `vchamaterno` varchar(100) NOT NULL,
  `vchtelefono` varchar(10) NOT NULL,
  `vchUsuario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vchpassword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblcliente` */

LOCK TABLES `tblcliente` WRITE;

insert  into `tblcliente`(`vchpassword`,`vchnombre`,`vchapaterno`,`vchamaterno`,`vchtelefono`,`vchUsuario`) values ('',' juan','hernandez','martinez','7713491211','juan244'),('1','juan','Díaz','Hernández','7717491211',NULL),('11212',' eeeee','wwee','eeee','7713491211','ncnnc'),('123',' 123','hernandez','castro','7711067881','eduardo'),('1234',' nicolás','Díaz','Hernández','7713491211','nico123'),('12345',' juan','hernandez','martinez','7713491211','juan244'),('5555',' juan','hernandez','martinez','7713491211','juan244'),('ddw',' ddwd','dwdwd','dwdw','7713491211','jnjn'),('heder',' Heder','Aguado','Hernandez','7727372362','Heder'),('nico123','Nicolás','Diaz','Hernandez','7713491211','nico');

UNLOCK TABLES;

/*Table structure for table `tblcompradetalle` */

DROP TABLE IF EXISTS `tblcompradetalle`;

CREATE TABLE `tblcompradetalle` (
  `idCompraDetalle` int(11) DEFAULT NULL,
  `idCompra` int(11) DEFAULT NULL,
  `idIngrediente` int(11) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  KEY `tblcompradetalle` (`idCompra`),
  KEY `idIngrediente` (`idIngrediente`),
  CONSTRAINT `tblcompradetalle` FOREIGN KEY (`idCompra`) REFERENCES `tblcompras` (`idCompra`),
  CONSTRAINT `tblcompradetalle_ibfk_1` FOREIGN KEY (`idIngrediente`) REFERENCES `tblingredientes` (`idIngrediente`),
  CONSTRAINT `tblcompradetalle_ibfk_2` FOREIGN KEY (`idIngrediente`) REFERENCES `tblingredientes` (`idIngrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblcompradetalle` */

LOCK TABLES `tblcompradetalle` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblcompras` */

DROP TABLE IF EXISTS `tblcompras`;

CREATE TABLE `tblcompras` (
  `idCompra` int(11) NOT NULL AUTO_INCREMENT,
  `Total` int(11) DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `tblcompras` (`idProveedor`),
  CONSTRAINT `tblcompras` FOREIGN KEY (`idProveedor`) REFERENCES `tblproveedor` (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblcompras` */

LOCK TABLES `tblcompras` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbldetallepedido` */

DROP TABLE IF EXISTS `tbldetallepedido`;

CREATE TABLE `tbldetallepedido` (
  `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT,
  `idPedido` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetallePedido`),
  KEY `tbldetallepedido_ibfk_1` (`idPedido`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `tbldetallepedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `tblpedidos` (`idPedidos`),
  CONSTRAINT `tbldetallepedido_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `tblproducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbldetallepedido` */

LOCK TABLES `tbldetallepedido` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbldetalleventa` */

DROP TABLE IF EXISTS `tbldetalleventa`;

CREATE TABLE `tbldetalleventa` (
  `idcompra` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `Cantidad` int(100) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `idcliente` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `descuento` float NOT NULL,
  `PagoTotal` float DEFAULT NULL,
  PRIMARY KEY (`idcompra`),
  KEY `idproducto` (`idproducto`),
  KEY `idcliente` (`idcliente`),
  CONSTRAINT `tbldetalleventa_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `tblproducto` (`idproducto`),
  CONSTRAINT `tbldetalleventa_ibfk_2` FOREIGN KEY (`idcliente`) REFERENCES `tblcliente` (`vchpassword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbldetalleventa` */

LOCK TABLES `tbldetalleventa` WRITE;

UNLOCK TABLES;

/*Table structure for table `tbldireccion` */

DROP TABLE IF EXISTS `tbldireccion`;

CREATE TABLE `tbldireccion` (
  `iddireccion` int(11) NOT NULL AUTO_INCREMENT,
  `Localidad` varchar(100) DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL,
  PRIMARY KEY (`iddireccion`),
  KEY `idMunicipio` (`idMunicipio`),
  CONSTRAINT `tbldireccion_ibfk_1` FOREIGN KEY (`idMunicipio`) REFERENCES `tbmunicipio` (`idMunicipio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbldireccion` */

LOCK TABLES `tbldireccion` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblestado` */

DROP TABLE IF EXISTS `tblestado`;

CREATE TABLE `tblestado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `NombreEstado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblestado` */

LOCK TABLES `tblestado` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblingredientes` */

DROP TABLE IF EXISTS `tblingredientes`;

CREATE TABLE `tblingredientes` (
  `idIngrediente` int(11) NOT NULL AUTO_INCREMENT,
  `NombreIngre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idIngrediente`),
  CONSTRAINT `tblingredientes_ibfk_1` FOREIGN KEY (`idIngrediente`) REFERENCES `tblcompradetalle` (`idIngrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblingredientes` */

LOCK TABLES `tblingredientes` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblingrexproduct` */

DROP TABLE IF EXISTS `tblingrexproduct`;

CREATE TABLE `tblingrexproduct` (
  `idIP` int(11) NOT NULL AUTO_INCREMENT,
  `idIngrediente` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  PRIMARY KEY (`idIP`),
  KEY `idIngrediente` (`idIngrediente`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `tblingrexproduct_ibfk_1` FOREIGN KEY (`idIngrediente`) REFERENCES `tblingredientes` (`idIngrediente`),
  CONSTRAINT `tblingrexproduct_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `tblproducto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblingrexproduct` */

LOCK TABLES `tblingrexproduct` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblpedidos` */

DROP TABLE IF EXISTS `tblpedidos`;

CREATE TABLE `tblpedidos` (
  `idPedidos` int(11) NOT NULL AUTO_INCREMENT,
  `Total` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idDireccion` int(11) DEFAULT NULL,
  `CostoEnvio` float DEFAULT NULL,
  `TotalPago` float DEFAULT NULL,
  PRIMARY KEY (`idPedidos`),
  KEY `idDireccion` (`idDireccion`),
  CONSTRAINT `tblpedidos_ibfk_1` FOREIGN KEY (`idDireccion`) REFERENCES `tbldireccion` (`iddireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpedidos` */

LOCK TABLES `tblpedidos` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblproducto` */

DROP TABLE IF EXISTS `tblproducto`;

CREATE TABLE `tblproducto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `idSabor` int(11) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `tipo` (`tipo`),
  KEY `idSabor` (`idSabor`),
  CONSTRAINT `tblproducto_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tbltipopastel` (`idTipo`),
  CONSTRAINT `tblproducto_ibfk_2` FOREIGN KEY (`idSabor`) REFERENCES `tblsabor` (`idSabor`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblproducto` */

LOCK TABLES `tblproducto` WRITE;

insert  into `tblproducto`(`idProducto`,`Nombre`,`idSabor`,`Precio`,`imagen`,`tipo`,`descripcion`) values (59,'Mango',2,500,'descarga.jpg',4,NULL),(60,'Pastel de coco',6,600,'12.png',5,NULL),(61,'non',4,200,'descarga.png',5,NULL);

UNLOCK TABLES;

/*Table structure for table `tblproveedor` */

DROP TABLE IF EXISTS `tblproveedor`;

CREATE TABLE `tblproveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProveedor` varchar(150) NOT NULL,
  `APaterno` varchar(150) NOT NULL,
  `AMaterno` varchar(150) NOT NULL,
  `idDirreccion` int(11) NOT NULL,
  `Numero Tel` varchar(12) NOT NULL,
  `Email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblproveedor` */

LOCK TABLES `tblproveedor` WRITE;

UNLOCK TABLES;

/*Table structure for table `tblsabor` */

DROP TABLE IF EXISTS `tblsabor`;

CREATE TABLE `tblsabor` (
  `idSabor` int(11) NOT NULL AUTO_INCREMENT,
  `vchSabor` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idSabor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblsabor` */

LOCK TABLES `tblsabor` WRITE;

insert  into `tblsabor`(`idSabor`,`vchSabor`) values (1,'Durazno'),(2,'Vanilla'),(3,'Chocolate'),(4,'Pepino'),(5,'Yogur fresa'),(6,'Coco');

UNLOCK TABLES;

/*Table structure for table `tbltipopastel` */

DROP TABLE IF EXISTS `tbltipopastel`;

CREATE TABLE `tbltipopastel` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipo` varchar(150) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltipopastel` */

LOCK TABLES `tbltipopastel` WRITE;

insert  into `tbltipopastel`(`idTipo`,`NombreTipo`) values (4,'tres leches '),(5,'pan normal');

UNLOCK TABLES;

/*Table structure for table `tblusuario` */

DROP TABLE IF EXISTS `tblusuario`;

CREATE TABLE `tblusuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `vchpassword` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `vchpassword` (`vchpassword`),
  CONSTRAINT `tblusuario_ibfk_1` FOREIGN KEY (`vchpassword`) REFERENCES `tblcliente` (`vchpassword`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblusuario` */

LOCK TABLES `tblusuario` WRITE;

insert  into `tblusuario`(`idusuario`,`usuario`,`vchpassword`,`tipo`) values (1,'Nico','123','administrador'),(2,'Juan','123','usuario'),(9,'juan244','12345','usuario'),(10,'juan244','5555','usuario'),(11,'juan244','','cliente'),(12,'Heder','heder','cliente');

UNLOCK TABLES;

/*Table structure for table `tbmunicipio` */

DROP TABLE IF EXISTS `tbmunicipio`;

CREATE TABLE `tbmunicipio` (
  `idMunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `NombreMunicipio` varchar(100) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMunicipio`),
  KEY `idEstado` (`idEstado`),
  CONSTRAINT `tbmunicipio_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `tblestado` (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbmunicipio` */

LOCK TABLES `tbmunicipio` WRITE;

UNLOCK TABLES;

/* Trigger structure for table `tblcliente` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `trgRgstUsuario` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `trgRgstUsuario` AFTER INSERT ON `tblcliente` FOR EACH ROW begin
insert into `tblusuario`(`usuario`,`vchpassword`,tipo) value (new.`vchUsuario`,new.`vchpassword`,'cliente');
end */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
