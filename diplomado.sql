/*
SQLyog Ultimate v8.61 
MySQL - 5.5.5-10.4.6-MariaDB : Database - diplomadoreinamadre
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`diplomadoreinamadre` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `diplomadoreinamadre`;

/*Table structure for table `atencion_medica` */

DROP TABLE IF EXISTS `atencion_medica`;

CREATE TABLE `atencion_medica` (
  `id_atencion_medica` int(11) NOT NULL AUTO_INCREMENT,
  `edad_inicio_menstruacion` date DEFAULT NULL,
  `metodos_planificacion` varchar(20) DEFAULT NULL,
  `edad_inicio_vida_sexual` int(11) DEFAULT NULL,
  `parejas_sexuales` int(11) DEFAULT NULL,
  `gestas` int(11) DEFAULT NULL,
  `para` int(11) DEFAULT NULL,
  `cesareas` int(11) DEFAULT NULL,
  `abortos` int(11) DEFAULT NULL,
  `fecha_ultima_regla` date DEFAULT NULL,
  `fecha_ultimo_papanicolau` date DEFAULT NULL,
  `antecedentes_tratamiento` varchar(100) DEFAULT NULL,
  `atecedentes_lesion` varchar(100) DEFAULT NULL,
  `caul_metodo_planificacion` varchar(20) DEFAULT NULL,
  `hallazgos` varchar(100) DEFAULT NULL,
  `biopsia` int(11) DEFAULT NULL COMMENT '0 no 1 si',
  `colposcopia` int(11) DEFAULT NULL COMMENT '0 no 1 si',
  `papanicolau` int(11) DEFAULT NULL COMMENT '0 no 1 si',
  `id_usu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_atencion_medica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `atencion_medica` */

/*Table structure for table `bitacora_ingreso` */

DROP TABLE IF EXISTS `bitacora_ingreso`;

CREATE TABLE `bitacora_ingreso` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `id_u` int(11) DEFAULT NULL,
  `fecha_ingreso` datetime DEFAULT NULL,
  `accion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

/*Data for the table `bitacora_ingreso` */

insert  into `bitacora_ingreso`(`id_bitacora`,`id_u`,`fecha_ingreso`,`accion`) values (1,2,'2019-08-29 16:12:36',NULL),(2,2,'2019-08-29 16:12:36',NULL),(3,2,'2019-08-29 16:12:40','cerro la session'),(4,1,'2019-08-29 16:12:44',NULL),(5,1,'2019-08-29 16:12:44',NULL),(6,1,'2019-08-29 16:14:48','cerro la session'),(7,1,'2019-08-29 16:15:27',NULL),(8,1,'2019-08-29 16:15:27',NULL),(9,1,'2019-08-29 16:15:35','cerro la session'),(10,2,'2019-08-29 16:15:39',NULL),(11,2,'2019-08-29 16:15:39',NULL),(12,2,'2019-08-29 16:24:18','cerro la session'),(13,1,'2019-08-29 16:24:21',NULL),(14,1,'2019-08-29 16:24:21',NULL),(15,1,'2019-08-29 16:24:23','cerro la session'),(16,1,'2019-08-29 16:24:26',NULL),(17,1,'2019-08-29 16:24:26',NULL),(18,1,'2019-08-29 16:24:29','cerro la session'),(19,2,'2019-08-29 16:24:32',NULL),(20,2,'2019-08-29 16:24:32',NULL),(21,2,'2019-08-29 16:24:47','cerro la session'),(22,1,'2019-08-29 16:24:50',NULL),(23,1,'2019-08-29 16:24:50',NULL),(24,1,'2019-08-29 16:25:18','cerro la session'),(25,2,'2019-08-29 16:25:22',NULL),(26,2,'2019-08-29 16:25:22',NULL),(27,2,'2019-08-29 16:25:29','cerro la session'),(28,1,'2019-08-29 16:25:31',NULL),(29,1,'2019-08-29 16:25:31',NULL),(30,1,'2019-08-29 16:26:01','cerro la session'),(31,2,'2019-08-29 16:26:05',NULL),(32,2,'2019-08-29 16:26:05',NULL),(33,2,'2019-08-29 16:26:59','cerro la session'),(34,1,'2019-08-29 16:27:02',NULL),(35,1,'2019-08-29 16:27:02',NULL),(36,1,'2019-08-29 16:27:19','cerro la session'),(37,2,'2019-08-29 16:27:22',NULL),(38,2,'2019-08-29 16:27:22',NULL),(39,2,'2019-08-29 16:28:26','cerro la session'),(40,1,'2019-08-29 16:28:46',NULL),(41,1,'2019-08-29 16:28:46',NULL),(42,1,'2019-08-29 16:28:47','cerro la session'),(43,2,'2019-08-29 16:28:50',NULL),(44,2,'2019-08-29 16:28:50',NULL),(45,2,'2019-08-29 16:31:00','cerro la session'),(46,1,'2019-08-29 16:31:03',NULL),(47,1,'2019-08-29 16:31:03',NULL),(48,1,'2019-08-29 16:31:48','cerro la session'),(49,1,'2019-08-29 16:32:16',NULL),(50,1,'2019-08-29 16:32:16',NULL),(51,1,'2019-08-29 16:32:19','cerro la session'),(52,2,'2019-08-29 16:32:22',NULL),(53,2,'2019-08-29 16:32:22',NULL),(54,2,'2019-08-29 16:38:45','cerro la session'),(55,1,'2019-08-29 16:46:43',NULL),(56,1,'2019-08-29 16:46:43',NULL),(57,1,'2019-08-29 16:47:14','cerro la session'),(58,2,'2019-08-29 16:47:17',NULL),(59,2,'2019-08-29 16:47:17',NULL),(60,2,'2019-08-29 16:47:25','cerro la session'),(61,1,'2019-08-29 16:47:27',NULL),(62,1,'2019-08-29 16:47:27',NULL),(63,1,'2019-08-29 16:53:31','cerro la session'),(64,1,'2019-08-29 16:54:04',NULL),(65,1,'2019-08-29 16:54:04',NULL),(66,1,'2019-08-29 16:54:11','cerro la session'),(67,1,'2019-08-29 16:54:23',NULL),(68,1,'2019-08-29 16:54:23',NULL),(69,1,'2019-08-29 16:54:41','cerro la session'),(70,2,'2019-08-29 16:54:44',NULL),(71,2,'2019-08-29 16:54:44',NULL),(72,2,'2019-08-29 16:55:05','cerro la session'),(73,1,'2019-08-29 16:55:09',NULL),(74,1,'2019-08-29 16:55:09',NULL),(75,1,'2019-08-29 16:57:01','cerro la session'),(76,1,'2019-08-29 16:58:47',NULL),(77,1,'2019-08-29 16:58:47',NULL),(78,1,'2019-08-30 09:08:52','cerro la session'),(79,1,'2019-08-30 09:08:55',NULL),(80,1,'2019-08-30 09:08:55',NULL),(81,1,'2019-08-30 09:18:36',NULL),(82,1,'2019-08-30 09:18:36',NULL),(83,1,'2019-08-30 10:49:06',NULL),(84,1,'2019-08-30 10:49:06',NULL),(85,1,'2019-08-30 10:49:13','cerro la session'),(86,1,'2019-08-30 10:49:30',NULL),(87,1,'2019-08-30 10:49:30',NULL),(88,1,'2019-08-30 10:49:46',NULL),(89,1,'2019-08-30 10:49:46',NULL),(90,1,'2019-08-30 10:49:47','cerro la session'),(91,1,'2019-08-30 10:50:24',NULL),(92,1,'2019-08-30 10:50:24',NULL),(93,1,'2019-08-30 10:50:33',NULL),(94,1,'2019-08-30 10:50:33',NULL),(95,1,'2019-08-30 10:50:40','cerro la session'),(96,1,'2019-08-30 10:51:17',NULL),(97,1,'2019-08-30 10:51:17',NULL),(98,1,'2019-08-30 10:52:21','cerro la session'),(99,2,'2019-08-30 10:52:29',NULL),(100,2,'2019-08-30 10:52:29',NULL),(101,2,'2019-08-30 10:52:30',NULL),(102,2,'2019-08-30 10:52:30',NULL),(103,2,'2019-08-30 10:52:34','cerro la session'),(104,1,'2019-08-30 10:52:38',NULL),(105,1,'2019-08-30 10:52:38',NULL),(106,1,'2019-08-30 10:52:48',NULL),(107,1,'2019-08-30 10:52:48',NULL),(108,1,'2019-08-30 10:52:49','cerro la session'),(109,1,'2019-08-30 11:33:18','cerro la session'),(110,1,'2019-08-30 11:33:23',NULL),(111,1,'2019-08-30 11:33:23',NULL),(112,1,'2019-08-30 11:33:42',NULL),(113,1,'2019-08-30 11:33:42',NULL),(114,1,'2019-08-30 11:33:50','cerro la session'),(115,1,'2019-08-30 11:33:51','cerro la session'),(116,1,'2019-08-30 11:34:13',NULL),(117,1,'2019-08-30 11:34:13',NULL),(118,1,'2019-08-30 11:48:32','cerro la session'),(119,1,'2019-08-30 11:48:37',NULL),(120,1,'2019-08-30 11:48:37',NULL),(121,2,'2019-08-30 11:50:19',NULL),(122,2,'2019-08-30 11:50:19',NULL),(123,2,'2019-08-30 11:50:38','cerro la session'),(124,2,'2019-08-30 11:50:44',NULL),(125,2,'2019-08-30 11:50:44',NULL),(126,1,'2019-08-30 11:52:11',NULL),(127,1,'2019-08-30 11:52:11',NULL),(128,1,'2019-08-30 11:52:13','cerro la session'),(129,2,'2019-08-30 11:52:32',NULL),(130,2,'2019-08-30 11:52:32',NULL),(131,2,'2019-08-30 11:55:13','cerro la session'),(132,1,'2019-08-30 11:56:25',NULL),(133,1,'2019-08-30 11:56:25',NULL),(134,1,'2019-08-30 12:22:50','cerro la session'),(135,1,'2019-08-30 12:23:00',NULL),(136,1,'2019-08-30 12:23:00',NULL),(137,1,'2019-08-30 12:23:11',NULL),(138,1,'2019-08-30 12:23:11',NULL),(139,1,'2019-08-30 12:23:58',NULL),(140,1,'2019-08-30 12:23:58',NULL),(141,1,'2019-08-30 12:41:03','cerro la session'),(142,1,'2019-08-30 12:42:48',NULL),(143,1,'2019-08-30 12:42:48',NULL),(144,1,'2019-08-30 12:44:16','cerro la session'),(145,1,'2019-08-30 12:44:31',NULL),(146,1,'2019-08-30 12:44:31',NULL),(147,1,'2019-08-30 13:43:27','cerro la session'),(148,2,'2019-08-30 13:44:02',NULL),(149,2,'2019-08-30 13:44:02',NULL),(150,2,'2019-08-30 13:44:21','cerro la session'),(151,1,'2019-08-30 13:45:00',NULL),(152,1,'2019-08-30 13:45:00',NULL),(153,1,'2019-08-30 13:45:54','cerro la session'),(154,1,'2019-08-30 13:45:57',NULL),(155,1,'2019-08-30 13:45:57',NULL),(156,1,'2019-08-30 13:46:41','cerro la session'),(157,1,'2019-08-30 13:46:44',NULL),(158,1,'2019-08-30 13:46:44',NULL),(159,1,'2019-08-30 14:02:06','cerro la session'),(160,1,'2019-08-30 14:02:08',NULL),(161,1,'2019-08-30 14:02:08',NULL);

/*Table structure for table `paciente` */

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_paciente` varchar(50) DEFAULT NULL COMMENT 'nombre del paciente',
  `apellidos_paciente` varchar(50) DEFAULT NULL,
  `edad_paciente` int(11) DEFAULT NULL COMMENT 'edad del paciente',
  `estado_civil` varchar(20) DEFAULT NULL COMMENT 'combo de estado civil',
  `direccion_paciente` varchar(100) DEFAULT NULL COMMENT 'direccion del paciente',
  `municipio_paciente` varchar(50) DEFAULT NULL COMMENT 'municipio del paciente',
  `codigo_postal` varchar(20) DEFAULT NULL COMMENT 'codigo postal del paciente',
  `ingreso_mensual` varchar(20) DEFAULT NULL COMMENT 'combo desplegable',
  `escolaridad_paciente` varchar(20) DEFAULT NULL COMMENT 'combo desplegable',
  `apoyo_gubernamental_paciente` varchar(2) DEFAULT NULL COMMENT 'si o no ',
  `razon_apoyo_paciente` varchar(50) DEFAULT NULL COMMENT 'el porque si tiene',
  `nombre_familiar_paciente` varchar(50) DEFAULT NULL,
  `telefono_familiar_paciente` varchar(11) DEFAULT NULL,
  `celular_familiar_paciente` varchar(11) DEFAULT NULL,
  `nombre_contacto_paciente` varchar(50) DEFAULT NULL,
  `telefono_contacto_paciente` varchar(20) DEFAULT NULL,
  `celular_contacto_paciente` varchar(20) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paciente` */

/*Table structure for table `tipo_seguro` */

DROP TABLE IF EXISTS `tipo_seguro`;

CREATE TABLE `tipo_seguro` (
  `id_tipo_seguro_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_seguro` varchar(20) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_seguro_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_seguro` */

insert  into `tipo_seguro`(`id_tipo_seguro_paciente`,`nombre_tipo_seguro`,`id_paciente`) values (1,'imss',1),(2,'isste',1);

/*Table structure for table `usu_me` */

DROP TABLE IF EXISTS `usu_me`;

CREATE TABLE `usu_me` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `apellidos_usuario` varchar(50) DEFAULT NULL,
  `contra` varchar(50) DEFAULT NULL,
  `archivo` varchar(50) DEFAULT NULL,
  `ruta` varchar(50) DEFAULT NULL,
  `nick` varchar(10) DEFAULT NULL,
  `activo` varchar(2) DEFAULT NULL,
  `correo_general` varchar(50) DEFAULT NULL,
  `edad` varchar(3) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `fecha_cambio_contra` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usu_me` */

insert  into `usu_me`(`id_usuario`,`nombre_usuario`,`apellidos_usuario`,`contra`,`archivo`,`ruta`,`nick`,`activo`,`correo_general`,`edad`,`fecha_nac`,`rol`,`accion`,`fecha_cambio_contra`) values (1,'joel','espinosa sanchez','202cb962ac59075b964b07152d234b70',NULL,'../img/user/21312312.png',NULL,'si','al221310531@gmail.com',NULL,NULL,'Medico','cambio contra','2019-08-30 11:48:45'),(2,'liliana','rosales robles','3d603c7c93fb63c7db2b1d99b1998bb6',NULL,'',NULL,'si','al221410612@gmail.com',NULL,NULL,'Enfemera','cambio contra','2019-08-30 11:51:42');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
