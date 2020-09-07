/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.21 : Database - alimentadb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alimentadb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `alimentadb`;

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `commentary` text,
  `date` datetime DEFAULT NULL,
  `comment_answered_id` int DEFAULT NULL,
  `ingest_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `comment_answered_id` (`comment_answered_id`),
  KEY `ingest_id` (`ingest_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`comment_answered_id`) REFERENCES `comment` (`id`),
  CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`ingest_id`) REFERENCES `ingest` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `comment` */

insert  into `comment`(`id`,`user_id`,`commentary`,`date`,`comment_answered_id`,`ingest_id`) values 
(1,1,'Ara si jejej','2020-09-02 20:25:21',NULL,1),
(2,1,'Ara si jejej','2020-09-02 20:49:03',NULL,1),
(3,1,'Y otro va.','2020-09-02 20:49:16',NULL,1),
(4,1,'Y otro va.','2020-09-02 20:50:16',NULL,1),
(5,1,'Otro a ver.','2020-09-02 20:51:37',NULL,1),
(6,1,'Mm se repiten?¿','2020-09-02 20:54:02',NULL,1),
(7,1,'Mm se repiten?¿','2020-09-02 20:54:19',NULL,1),
(8,1,'Mm se repiten?¿','2020-09-02 20:54:31',NULL,1),
(9,1,'Ah no ;)','2020-09-02 20:55:23',NULL,1),
(10,1,'No se repite','2020-09-02 20:55:30',NULL,1),
(11,1,'1','2020-09-02 20:56:01',NULL,1),
(12,1,'1','2020-09-02 20:57:22',NULL,1),
(13,1,'1','2020-09-02 20:57:31',NULL,1),
(14,1,'2','2020-09-02 20:57:44',NULL,1),
(15,1,'3','2020-09-02 20:57:50',NULL,1),
(16,1,'4','2020-09-02 20:58:14',NULL,1),
(17,1,'4','2020-09-02 20:58:28',NULL,1),
(18,1,'5','2020-09-02 21:00:06',NULL,1),
(19,1,'6','2020-09-02 21:00:09',NULL,1),
(20,1,'7','2020-09-02 21:00:16',NULL,1),
(21,1,'8','2020-09-02 21:02:14',NULL,1),
(22,1,'8','2020-09-02 21:06:11',NULL,1),
(23,1,'9','2020-09-02 21:06:20',NULL,1),
(24,1,'10','2020-09-02 21:06:30',NULL,1),
(25,1,'eso','2020-09-02 21:26:57',NULL,1),
(26,1,'','2020-09-02 21:27:00',NULL,1),
(27,1,'','2020-09-02 21:27:03',NULL,1),
(28,1,'Va pero es el utlimo ee','2020-09-02 22:26:06',4,1),
(29,1,'Va pero es el utlimo ee','2020-09-02 22:32:53',4,1),
(30,1,'No se yo...','2020-09-02 22:33:39',2,1),
(31,1,'No se yo...','2020-09-02 22:33:46',2,1),
(32,1,'No se yo...','2020-09-02 22:34:20',2,1),
(33,1,'No se yo...','2020-09-02 22:34:45',2,1),
(34,1,'No se yo...','2020-09-02 22:34:58',2,1),
(35,1,'Numero uno','2020-09-03 10:05:59',NULL,2),
(36,1,'Numero uno','2020-09-03 10:06:01',NULL,2),
(37,1,'Numero uno','2020-09-03 10:07:43',NULL,2),
(38,1,'','2020-09-03 10:08:33',35,2),
(39,1,'','2020-09-03 10:08:42',35,2),
(40,1,'','2020-09-03 10:08:43',35,2),
(41,1,'','2020-09-03 10:08:44',35,2),
(42,1,'','2020-09-03 10:08:45',35,2),
(43,1,'','2020-09-03 10:08:45',35,2),
(44,1,'','2020-09-03 10:08:46',35,2),
(45,1,'','2020-09-03 10:12:21',35,2),
(47,1,'a','2020-09-03 10:15:43',NULL,3),
(49,1,'b','2020-09-03 10:18:40',NULL,3),
(50,1,'c','2020-09-03 10:20:11',NULL,3),
(51,1,'d','2020-09-03 10:27:17',50,3),
(52,1,'e','2020-09-03 10:33:08',51,3),
(53,1,'f','2020-09-03 14:00:21',52,3),
(54,1,'g','2020-09-03 14:00:58',53,3),
(55,2,'a','2020-09-03 22:35:58',NULL,6),
(56,2,'b','2020-09-03 22:40:56',55,6),
(57,2,'a','2020-09-03 22:57:29',NULL,7),
(58,2,'b','2020-09-03 22:59:18',NULL,7),
(59,2,'c','2020-09-03 23:13:49',NULL,7),
(60,2,'v','2020-09-03 23:13:53',NULL,7),
(61,2,'g','2020-09-03 23:14:26',NULL,7),
(62,2,'h','2020-09-03 23:17:47',NULL,7),
(63,2,'h','2020-09-03 23:21:24',NULL,7),
(64,2,'j','2020-09-03 23:21:33',59,7),
(65,2,'d','2020-09-03 23:21:59',NULL,7),
(66,2,'v','2020-09-03 23:31:13',NULL,6),
(67,2,'h','2020-09-03 23:32:02',NULL,6),
(68,2,'h','2020-09-03 23:35:49',NULL,6),
(69,2,'h','2020-09-03 23:35:50',NULL,6),
(70,2,'h','2020-09-03 23:35:51',NULL,6),
(71,2,'b','2020-09-03 23:35:59',NULL,7),
(72,2,'o','2020-09-03 23:36:06',NULL,7),
(73,2,'o','2020-09-03 23:40:20',NULL,7),
(74,2,'g','2020-09-03 23:40:27',NULL,7),
(75,2,'f','2020-09-03 23:41:02',NULL,7),
(76,2,'f','2020-09-03 23:45:42',NULL,7),
(77,2,'k','2020-09-03 23:45:49',NULL,7),
(78,2,'4','2020-09-03 23:47:12',NULL,7),
(79,2,'4','2020-09-03 23:48:32',NULL,7),
(80,2,'4','2020-09-03 23:48:34',NULL,7),
(81,2,'f','2020-09-03 23:52:58',NULL,7),
(82,2,'2','2020-09-03 23:53:13',NULL,7),
(83,2,'g','2020-09-03 23:56:03',57,7),
(84,2,'s','2020-09-03 23:57:41',NULL,7),
(85,2,'s','2020-09-03 23:57:49',NULL,7),
(86,2,'d','2020-09-03 23:58:20',57,7),
(87,2,'d','2020-09-03 23:58:26',55,6),
(88,2,'d','2020-09-04 00:00:47',NULL,6),
(89,2,'d','2020-09-04 00:01:29',NULL,6),
(90,2,'h','2020-09-04 00:01:36',57,7),
(91,2,'h','2020-09-04 00:03:04',57,7),
(92,2,'h','2020-09-04 00:03:06',57,7),
(93,2,'h','2020-09-04 00:03:09',57,7),
(94,2,'h','2020-09-04 00:03:10',57,7),
(95,2,'h','2020-09-04 00:03:11',57,7),
(96,2,'h','2020-09-04 00:03:14',NULL,7),
(97,2,'h','2020-09-04 00:03:18',NULL,7),
(98,2,'h','2020-09-04 00:03:19',NULL,7),
(99,2,'h','2020-09-04 00:03:20',NULL,7),
(100,2,'h','2020-09-04 00:03:21',NULL,7),
(101,2,'h','2020-09-04 00:03:23',NULL,7),
(102,2,'d','2020-09-04 00:07:35',55,6),
(103,2,'1','2020-09-04 00:07:42',55,6),
(104,2,'7','2020-09-04 00:09:49',66,6),
(105,2,'ya saes','2020-09-06 13:15:40',56,6),
(106,2,'ps no no se dime','2020-09-06 13:15:47',105,6),
(107,2,'joer na','2020-09-06 13:15:53',106,6),
(108,7,'mmm','2020-09-06 21:55:56',NULL,12);

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nombre` text,
  `kCal` int DEFAULT NULL,
  `hidratos` int DEFAULT NULL,
  `grasas` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `food` */

insert  into `food`(`id`,`Nombre`,`kCal`,`hidratos`,`grasas`) values 
(1,'Plátano',100,26,17);

/*Table structure for table `ingest` */

DROP TABLE IF EXISTS `ingest`;

CREATE TABLE `ingest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `food` text,
  `food_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `hora` text,
  `unidades` int DEFAULT NULL,
  `votes` int DEFAULT '0',
  `public` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `ingest_ibfk_1` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`),
  CONSTRAINT `ingest_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `ingest` */

insert  into `ingest`(`id`,`food`,`food_id`,`user_id`,`hora`,`unidades`,`votes`,`public`) values 
(1,'Plátano',1,2,'2',NULL,345,0),
(2,'Plátano',1,2,'2',3,74,0),
(3,'Plátano',1,1,'32',23,0,0),
(4,'Plátano',1,5,'1',2,0,0),
(5,'Plátano',1,1,'1',23,NULL,0),
(6,'Plátano',1,2,'5',6,453,0),
(7,'Plátano',1,2,'1',2,0,0),
(8,'Plátano',1,2,'2:01',1,4351,0),
(9,NULL,NULL,1,NULL,NULL,877,0),
(10,'Plátano',1,7,'13:02',11,0,0),
(11,'Plátano',1,7,'13:03',2,0,0),
(12,'Plátano',1,7,'1:00',2,0,1),
(13,'Plátano',1,7,'13:09',2,0,1),
(14,'Plátano',1,7,'13:09',3,0,1),
(15,'Plátano',1,7,'2:00',2,0,0),
(16,'Plátano',1,7,'1:02',2,0,1);

/*Table structure for table `sharedingest` */

DROP TABLE IF EXISTS `sharedingest`;

CREATE TABLE `sharedingest` (
  `user_id` int NOT NULL,
  `ingest_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`ingest_id`),
  KEY `FK_ingest` (`ingest_id`),
  KEY `FK_user` (`user_id`),
  CONSTRAINT `sharedingest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `sharedingest_ibfk_2` FOREIGN KEY (`ingest_id`) REFERENCES `ingest` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `sharedingest` */

insert  into `sharedingest`(`user_id`,`ingest_id`) values 
(1,3),
(1,5),
(1,6),
(9,16),
(10,16);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`password`) values 
(1,'admin','admin'),
(2,'demo','demo'),
(3,'sdadas','4297f44b13955235245b2497399d7a93'),
(4,'sdadaswsda','4297f44b13955235245b2497399d7a93'),
(5,'adsfadsfas','4297f44b13955235245b2497399d7a93'),
(6,'asdasdsa','4297f44b13955235245b2497399d7a93'),
(7,'admin','21232f297a57a5a743894a0e4a801fc3'),
(9,'Nadie',NULL),
(10,'skaitdan@gmail.com','Paellera1'),
(11,'demo@demo.demo','demo');

/*Table structure for table `voted_ingest` */

DROP TABLE IF EXISTS `voted_ingest`;

CREATE TABLE `voted_ingest` (
  `user_id` int NOT NULL,
  `ingest_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`ingest_id`),
  KEY `ingest_id` (`ingest_id`),
  CONSTRAINT `voted_ingest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `voted_ingest_ibfk_2` FOREIGN KEY (`ingest_id`) REFERENCES `ingest` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `voted_ingest` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
