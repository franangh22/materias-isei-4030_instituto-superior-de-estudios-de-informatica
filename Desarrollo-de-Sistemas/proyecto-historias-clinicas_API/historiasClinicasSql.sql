/*
SQLyog Ultimate v12.09 (32 bit)
MySQL - 10.3.39-MariaDB-0+deb10u1 : Database - historias-clinicas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`historias-clinicas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `historias-clinicas`;

/*Table structure for table `eventohistoriaclinica` */

DROP TABLE IF EXISTS `eventohistoriaclinica`;

CREATE TABLE `eventohistoriaclinica` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `PacienteId` bigint(20) NOT NULL,
  `FechaAlta` text DEFAULT NULL,
  `Observaciones` text DEFAULT NULL,
  `NombreEstudio` text DEFAULT NULL,
  `Diagnostico` text DEFAULT NULL,
  `PatologiaATratar` text DEFAULT NULL,
  `Medicamentos` text DEFAULT NULL,
  `TipoEventoId` bigint(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `eventohistoriaclinica` */

insert  into `eventohistoriaclinica`(`Id`,`PacienteId`,`FechaAlta`,`Observaciones`,`NombreEstudio`,`Diagnostico`,`PatologiaATratar`,`Medicamentos`,`TipoEventoId`) values (1,1,'1111/NovNov/23232323','Soy una observacion','Test','Buggeado','Ni idea','Debbugear',1),(2,1,'11/Nov/2323','Soy una observacion','Test','Buggeado','Ni idea','Debbugear',1),(3,2,'10/11/2023','Hola','Tomografia','Lesion','Esguinze','Ibuprofeno',3),(4,2,'18/Nov/23','vagancia','vaguitis','cansancio','narcolepsia','coca-cola',2),(5,7,'18/Nov/23','vagancia','vaguitis','cansancio','narcolepsia','coca-cola',2),(6,7,'18/Nov/23','vagancia','vaguitis','cansancio','narcolepsia','coca-cola',3),(7,7,'18/Nov/23','vagancia','vaguitis','cansancio','narcolepsia','coca-cola',4);

/*Table structure for table `obrasocial` */

DROP TABLE IF EXISTS `obrasocial`;

CREATE TABLE `obrasocial` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` text DEFAULT NULL,
  `Eliminado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `obrasocial` */

insert  into `obrasocial`(`Id`,`Descripcion`,`Eliminado`) values (1,'Swiss Medical',1),(2,'Previnca',1),(3,'IAPOS',1),(4,'OSDE',1),(5,'OSECAC',0),(6,'ESENCIAL',0),(7,NULL,0),(8,'PAMI',1),(9,'RosMed',0),(10,'Ros',0);

/*Table structure for table `paciente` */

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Nombre` text DEFAULT NULL,
  `Apellido` text DEFAULT NULL,
  `Dni` bigint(20) DEFAULT NULL,
  `Email` text DEFAULT NULL,
  `Clave` text DEFAULT NULL,
  `GrupoSanguineo` text DEFAULT NULL,
  `ObraSocialId` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `paciente` */

insert  into `paciente`(`Id`,`Nombre`,`Apellido`,`Dni`,`Email`,`Clave`,`GrupoSanguineo`,`ObraSocialId`) values (1,'Lisandro','Quintana',23074022,'alumno@alumno.com','1234','A+',NULL),(2,'Walter','Chaui',39663133,'sdasdasd@asdasda.com','2222','B+',NULL),(3,'Flor','Farru',4012121,'fgfd@hjfdshf.com',NULL,'0+',NULL),(4,'Pepe','Pepito',1122233,'pepe@test.ts',NULL,'B +',NULL),(5,'Pepe','Pepito',1122233,'pepe@test.ts',NULL,'B +',NULL),(6,'Pepe','Pepito',1122233,'pepe@test.ts',NULL,'B +',NULL),(7,'Pepe','Pepito',1122233,'pepe@test.ts',NULL,'B +',2);

/*Table structure for table `tipoeventohistoriaclinica` */

DROP TABLE IF EXISTS `tipoeventohistoriaclinica`;

CREATE TABLE `tipoeventohistoriaclinica` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Descripcion` text DEFAULT NULL,
  `Eliminado` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tipoeventohistoriaclinica` */

insert  into `tipoeventohistoriaclinica`(`Id`,`Descripcion`,`Eliminado`) values (1,'Estudio',0),(2,'Consulta medica',0),(3,'Tratamiento',0),(4,'Receta',0),(5,'Patologia',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
