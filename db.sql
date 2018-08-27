/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.26-MariaDB : Database - backup_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`backup_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `backup_db`;

/*Table structure for table `bc_type` */

DROP TABLE IF EXISTS `bc_type`;

CREATE TABLE `bc_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Time` time DEFAULT NULL,
  `Day` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `bc_type` */

insert  into `bc_type`(`ID`,`Time`,`Day`,`Date`) values 
(1,'10:00:00',NULL,NULL),
(2,NULL,NULL,NULL),
(3,NULL,NULL,NULL);

/*Table structure for table `db` */

DROP TABLE IF EXISTS `db`;

CREATE TABLE `db` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `InsertAt` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `db` */

insert  into `db`(`ID`,`Name`,`InsertAt`) values 
(1,'backup_db','2018-08-25 22:11:02'),
(2,'db_academic','2018-08-25 22:11:02'),
(3,'db_admission','2018-08-25 22:11:02'),
(4,'db_employees','2018-08-25 22:11:02'),
(5,'db_finance','2018-08-25 22:11:02'),
(6,'db_notifikasi','2018-08-25 22:11:02'),
(7,'db_reservation','2018-08-25 22:11:02'),
(8,'db_rs','2018-08-25 22:11:02'),
(9,'db_va','2018-08-25 22:11:02'),
(10,'information_schema','2018-08-25 22:11:02'),
(11,'markov','2018-08-25 22:11:02'),
(12,'mysql','2018-08-25 22:11:02'),
(13,'performance_schema','2018-08-25 22:11:02'),
(14,'phpmyadmin','2018-08-25 22:11:02'),
(15,'siak4','2018-08-25 22:11:02'),
(16,'ta_2014','2018-08-25 22:11:02'),
(17,'ta_2015','2018-08-25 22:11:02'),
(18,'ta_2016','2018-08-25 22:11:02'),
(19,'ta_2017','2018-08-25 22:11:02'),
(20,'ta_2018','2018-08-25 22:11:02'),
(21,'test','2018-08-25 22:11:02');

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DBID` int(11) NOT NULL,
  `InsertAt` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DBID` int(11) NOT NULL,
  `BCType` enum('1','2','3') NOT NULL,
  `Status` enum('0','1') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`ID`,`DBID`,`BCType`,`Status`) values 
(1,1,'1','1'),
(2,2,'1','1'),
(3,4,'1','1'),
(4,16,'1','1'),
(5,19,'1','0'),
(6,20,'1','1'),
(7,3,'1','1'),
(8,5,'1','1'),
(9,6,'1','1'),
(10,7,'1','1'),
(11,9,'1','1'),
(12,17,'1','1'),
(13,18,'1','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
