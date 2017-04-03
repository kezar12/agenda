/*
Navicat MySQL Data Transfer

Source Server         : mylocal
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : agenda

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-04-03 08:39:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contacto
-- ----------------------------
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono1` int(11) DEFAULT NULL,
  `telefono2` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contacto
-- ----------------------------
INSERT INTO `contacto` VALUES ('1', 'julio cesar vasquez hernandez', '8167281', '2147483647', 'cesarvasquez12@hotmail.com', 'calle 11', '1');
INSERT INTO `contacto` VALUES ('2', 'cesar vasquez hernandez', '22987651', '0', 'cesar@hotmail.com', 'calle 12', '1');
INSERT INTO `contacto` VALUES ('3', '1111', '1111', '111', '111111@hotmail.com', '111', '0');
INSERT INTO `contacto` VALUES ('4', 'mario vasquez hernandez', '1234567', '6543216', 'mario@gmail.com', 'calle 13', '1');
INSERT INTO `contacto` VALUES ('5', 'gfgh', '1111111565', '111111111', 'cesarvasquez12@hotmail.com', '111111111', '0');

-- ----------------------------
-- Procedure structure for eliminar
-- ----------------------------
DROP PROCEDURE IF EXISTS `eliminar`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar`(IN _id int(11), _estado int (11))
BEGIN
UPDATE  contacto SET estado = _estado WHERE id = _id ;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for listar
-- ----------------------------
DROP PROCEDURE IF EXISTS `listar`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `listar`()
BEGIN
select * from contacto where contacto.estado=1;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for modificar
-- ----------------------------
DROP PROCEDURE IF EXISTS `modificar`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `modificar`(IN _id int(11), _nombre varchar(255), _telefono1 int(11), _telefono2 int(11), _email varchar(255), _direccion varchar(255))
BEGIN
UPDATE contacto SET nombre=_nombre, telefono1=_telefono1, telefono2=_telefono2, email=_email, direccion=_direccion   WHERE id=_id;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for registrar
-- ----------------------------
DROP PROCEDURE IF EXISTS `registrar`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar`(IN _nombre varchar(255), _telefono1 int(11), _telefono2 int(11), _email varchar(255), _direccion varchar(255), _estado int (11))
BEGIN
INSERT INTO contacto (nombre, telefono1, telefono2, email, direccion,estado) VALUES (_nombre, _telefono1, _telefono2, _email, _direccion, _estado);
END
;;
DELIMITER ;
