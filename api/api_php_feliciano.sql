/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : api_php_feliciano

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-28 13:57:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Café', 'cafe', '2024-02-28 01:39:25', '2024-02-28 01:39:25');
INSERT INTO `categorias` VALUES ('2', 'Hamburguesas', 'hamburguesa', '2024-02-28 01:39:25', '2024-02-28 01:39:25');
INSERT INTO `categorias` VALUES ('3', 'Pizzas', 'pizza', '2024-02-28 01:39:25', '2024-02-28 01:39:25');
INSERT INTO `categorias` VALUES ('4', 'Donas', 'dona', '2024-02-28 01:39:25', '2024-02-28 01:39:25');
INSERT INTO `categorias` VALUES ('5', 'Pasteles', 'pastel', '2024-02-28 01:39:25', '2024-02-28 01:39:25');
INSERT INTO `categorias` VALUES ('6', 'Galletas', 'galletas', '2024-02-28 01:39:25', '2024-02-28 01:39:25');

-- ----------------------------
-- Table structure for `productos`
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(255) NOT NULL,
  `imagen_producto` varchar(255) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT 1,
  `precio_producto` double NOT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `productos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', 'Café Caramel con Chocolate', 'cafe_01', '1', '59.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('2', 'Café Frio con Chocolate Grande', 'cafe_02', '1', '49.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('3', 'Latte Frio con Chocolate Grande', 'cafe_03', '1', '54.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('4', 'Latte Frio con Chocolate Grande', 'cafe_04', '1', '54.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('5', 'Malteada Fria con Chocolate Grande', 'cafe_05', '1', '54.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('6', 'Café Mocha Caliente Chico', 'cafe_06', '1', '39.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('7', 'Café Mocha Caliente Grande con Chocolate', 'cafe_07', '1', '59.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('8', 'Café Caliente Capuchino Grande', 'cafe_08', '1', '59.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('9', 'Café Mocha Caliente Mediano', 'cafe_09', '1', '49.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('10', 'Café Mocha Frio con Caramelo Mediano', 'cafe_10', '1', '49.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('11', 'Café Mocha Frio con Chocolate Mediano', 'cafe_11', '1', '49.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('12', 'Café Espresso', 'cafe_12', '1', '29.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('13', 'Café Capuchino Grande con Caramelo', 'cafe_13', '1', '59.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('14', 'Café Caramelo Grande', 'cafe_14', '1', '59.9', '1', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('15', 'Paquete de 3 donas de Chocolate', 'donas_01', '1', '39.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('16', 'Paquete de 3 donas Glaseadas', 'donas_02', '1', '39.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('17', 'Dona de Fresa', 'donas_03', '1', '19.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('18', 'Dona con Galleta de Chocolate', 'donas_04', '1', '19.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('19', 'Dona glass con Chispas Sabor Fresa', 'donas_05', '1', '19.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('20', 'Dona glass con Chocolate', 'donas_06', '1', '19.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('21', 'Dona de Chocolate con MÁS Chocolate', 'donas_07', '1', '19.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('22', 'Paquete de 3 donas de Chocolate', 'donas_08', '1', '39.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('23', 'Paquete de 3 donas con Vainilla y Chocolate', 'donas_09', '1', '39.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('24', 'Paquete de 6 Donas', 'donas_10', '1', '69.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('25', 'Paquete de 3 Variadas', 'donas_11', '1', '39.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('26', 'Dona Natural con Chocolate', 'donas_12', '1', '19.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('27', 'Paquete de 3 Donas de Chocolate con Chispas', 'donas_13', '1', '39.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('28', 'Dona Chocolate y Coco', 'donas_14', '1', '19.9', '4', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('29', 'Paquete Galletas de Chocolate', 'galletas_01', '1', '29.9', '6', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('30', 'Paquete Galletas de Chocolate y Avena', 'galletas_02', '1', '39.9', '6', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('31', 'Paquete de Muffins de Vainilla', 'galletas_03', '1', '39.9', '6', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('32', 'Paquete de 4 Galletas de Avena', 'galletas_04', '1', '24.9', '6', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('33', 'Galletas de Mantequilla Variadas', 'galletas_05', '1', '39.9', '6', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('34', 'Galletas de sabores frutales', 'galletas_06', '1', '39.9', '6', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('35', 'Hamburguesa Sencilla', 'hamburguesas_01', '1', '59.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('36', 'Hamburguesa de Pollo', 'hamburguesas_02', '1', '59.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('37', 'Hamburguesa de Pollo y Chili', 'hamburguesas_03', '1', '59.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('38', 'Hamburguesa Queso y Pepinos', 'hamburguesas_04', '1', '59.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('39', 'Hamburguesa Cuarto de Libra', 'hamburguesas_05', '1', '59.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('40', 'Hamburguesa Doble Queso', 'hamburguesas_06', '1', '69.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('41', 'Hot Dog Especial', 'hamburguesas_07', '1', '49.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('42', 'Paquete 2 Hot Dogs', 'hamburguesas_08', '1', '69.9', '2', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('43', '4 Rebanadas de Pay de Queso', 'pastel_01', '1', '69.9', '5', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('44', 'Waffle Especial', 'pastel_02', '1', '49.9', '5', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('45', 'Croissants De la casa', 'pastel_03', '1', '39.9', '5', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('46', 'Pay de Queso', 'pastel_04', '1', '19.9', '5', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('47', 'Pastel de Chocolate', 'pastel_05', '1', '29.9', '5', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('48', 'Rebanada Pastel de Chocolate', 'pastel_06', '1', '29.9', '5', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('49', 'Pizza Spicy con Doble Queso', 'pizzas_01', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('50', 'Pizza Jamón y Queso', 'pizzas_02', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('51', 'Pizza Doble Queso', 'pizzas_03', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('52', 'Pizza Especial de la Casa', 'pizzas_04', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('53', 'Pizza Chorizo', 'pizzas_05', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('54', 'Pizza Hawaiana', 'pizzas_06', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('55', 'Pizza Tocino', 'pizzas_07', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('56', 'Pizza Vegetales y Queso', 'pizzas_08', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('57', 'Pizza Pepperoni y Queso', 'pizzas_09', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('58', 'Pizza Aceitunas y Queso', 'pizzas_10', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
INSERT INTO `productos` VALUES ('59', 'Pizza Queso, Jamón y Champiñones', 'pizzas_11', '1', '69.9', '3', '2024-02-28 02:49:10', '2024-02-28 02:49:10');
