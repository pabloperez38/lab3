/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : feliciano

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-04-19 08:19:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Cocinas', '2023-12-04 18:44:11');
INSERT INTO `categorias` VALUES ('2', 'Accesorios', '2023-12-04 18:44:11');
INSERT INTO `categorias` VALUES ('3', 'Tablets', '2023-12-04 18:44:44');
INSERT INTO `categorias` VALUES ('4', 'Celulares', '2023-12-04 18:44:44');
INSERT INTO `categorias` VALUES ('5', 'Línea blanca', '2023-12-04 18:48:10');
INSERT INTO `categorias` VALUES ('6', 'Herramientras', '2024-04-09 17:46:10');

-- ----------------------------
-- Table structure for `estados`
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of estados
-- ----------------------------
INSERT INTO `estados` VALUES ('1', 'Inactivo', '2023-11-17 18:47:00');
INSERT INTO `estados` VALUES ('2', 'Activo', '2023-11-17 18:47:00');

-- ----------------------------
-- Table structure for `marcas`
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES ('1', 'Lenovo', '2023-11-17 18:42:50');
INSERT INTO `marcas` VALUES ('2', 'Genius', '2023-11-17 18:43:15');
INSERT INTO `marcas` VALUES ('3', 'Epson', '2023-12-04 18:48:51');
INSERT INTO `marcas` VALUES ('4', 'HP', '2023-12-04 18:48:51');
INSERT INTO `marcas` VALUES ('5', 'Philips', '2023-12-04 18:52:39');

-- ----------------------------
-- Table structure for `productos`
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `categoria_producto` int(11) NOT NULL,
  `imagen_producto` varchar(100) NOT NULL,
  `precio_producto` float NOT NULL,
  `estado_producto` int(11) NOT NULL,
  `marca_producto` int(11) NOT NULL,
  `fecha_creacion_producto` datetime NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('6', 'Cortadora de Cabello', '', '2', ' ../assets/imagenes/productos/1700312124.jpg', '25000', '1', '4', '2023-11-18 09:55:24');
INSERT INTO `productos` VALUES ('7', 'Depiladora', '', '2', ' ../assets/imagenes/productos/1700313110.jpg', '62350', '1', '2', '2023-11-18 10:11:50');
INSERT INTO `productos` VALUES ('8', 'Cocina Aurora Multigas', '', '1', ' ../assets/imagenes/productos/1700313207.jpg', '350000', '1', '1', '2023-11-18 10:13:27');
INSERT INTO `productos` VALUES ('9', 'Amoladora', '', '6', ' ../assets/imagenes/productos/1700313297.jpg', '65000', '1', '3', '2023-11-18 10:14:57');
INSERT INTO `productos` VALUES ('10', 'Secarropas', 'Acá va la descripción del producto', '5', ' ../assets/imagenes/productos/1701728134.jpg', '150000', '1', '5', '2023-12-04 19:15:34');
INSERT INTO `productos` VALUES ('11', 'Fabrica de pastas', 'Desc', '5', ' ../assets/imagenes/productos/1701729408.jpg', '25000', '1', '1', '2023-12-04 19:36:48');
INSERT INTO `productos` VALUES ('12', 'producto de prueba', '', '2', '', '2000', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('13', 'producto de prueba', '', '2', '', '2000', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('14', 'producto de prueba', '', '2', '', '2000', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('15', 'producto de prueba', '', '2', '', '2000', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('16', 'producto de prueba', '', '2', '', '2000', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('17', 'NUevo producto editado', '', '3', '', '101010', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('18', 'NUevo producto editado', '', '3', '', '101010', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('19', 'NUevo producto editado', '', '3', '', '120000', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('20', 'Cocina Aurora Multigas', '', '4', '', '150000', '1', '0', '0000-00-00 00:00:00');
INSERT INTO `productos` VALUES ('21', 'nuevo 18:52', '', '6', '', '151515000000', '1', '0', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrador');
INSERT INTO `roles` VALUES ('2', 'Vendedor');
INSERT INTO `roles` VALUES ('3', 'Empleado');

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(100) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `password_usuario` varchar(100) NOT NULL,
  `id_rol_usuario` int(11) NOT NULL,
  `estado_usuario` tinyint(4) NOT NULL,
  `fecha_creacion_usuario` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('2', 'Pablo Pérez', 'pablo.eluniversoweb@gmail.com', '$2a$07$hdgfamkdhdshsjhduaostuRJbInCi2roRtiizyDZAO.2DpAreNOyW', '2', '1', '2024-04-16 18:44:29');
