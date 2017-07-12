/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 10.1.21-MariaDB : Database - hddhockey
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hddhockey` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hddhockey`;

/*Table structure for table `adminuser` */

DROP TABLE IF EXISTS `adminuser`;

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emailAdmin` varchar(200) NOT NULL,
  `passwordAdmin` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `adminuser` */

insert  into `adminuser`(`id`,`emailAdmin`,`passwordAdmin`) values (1,'pedrofmb@hotmail.com','123456');

/*Table structure for table `eventpage` */

DROP TABLE IF EXISTS `eventpage`;

CREATE TABLE `eventpage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `eventpage` */

insert  into `eventpage`(`id`,`pageName`) values (1,'July 22-23 2017'),(2,'August 5-6 2017');

/*Table structure for table `eventtype` */

DROP TABLE IF EXISTS `eventtype`;

CREATE TABLE `eventtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameType` varchar(500) DEFAULT NULL,
  `idPage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPage` (`idPage`),
  CONSTRAINT `eventtype_ibfk_1` FOREIGN KEY (`idPage`) REFERENCES `eventpage` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `eventtype` */

insert  into `eventtype`(`id`,`nameType`,`idPage`) values (1,'1999-2002',1),(2,'2003-2005',1),(3,'2006-2008',1),(4,'2006-2008',2),(5,'2006-2007',2),(6,'2003-2005',2);
--ALTER TABLE eventtype ADD CONSTRAINT `eventtype_ibfk_1` FOREIGN KEY ( `idPage` ) REFERENCES `eventpage` ( `id` ) 

/*Table structure for table `registration` */

DROP TABLE IF EXISTS `registration`;

CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registerDateTime` datetime NOT NULL,
  `playerName` varchar(700) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `teamLastPlayed` varchar(700) NOT NULL,
  `levelOfMostRecentTeam` varchar(300) NOT NULL,
  `guardianName1` varchar(700) NOT NULL,
  `guardianCellNumber1` varchar(200) NOT NULL,
  `guardianOtherNumber1` varchar(200) DEFAULT NULL,
  `guardianEmail1` varchar(300) NOT NULL,
  `guardianMailingAddress1` text NOT NULL,
  `guardianName2` varchar(700) DEFAULT NULL,
  `guardianCellNumber2` varchar(200) DEFAULT NULL,
  `guardianOtherNumber2` varchar(200) DEFAULT NULL,
  `guardianEmail2` varchar(300) DEFAULT NULL,
  `guardianMailingAddress2` text,
  `idEvent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEvent` (`idEvent`),
  CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`idEvent`) REFERENCES `eventtype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `registration` */

insert  into `registration`(`id`,`registerDateTime`,`playerName`,`dateOfBirth`,`teamLastPlayed`,`levelOfMostRecentTeam`,`guardianName1`,`guardianCellNumber1`,`guardianOtherNumber1`,`guardianEmail1`,`guardianMailingAddress1`,`guardianName2`,`guardianCellNumber2`,`guardianOtherNumber2`,`guardianEmail2`,`guardianMailingAddress2`,`idEvent`) values (1,'2017-06-22 15:41:38','erter','2017-06-22','ert','ert','ert','erter','erter','erte','erte ert eert erte','ertert','erter','terter','terter','erte ert erert erer',1),(2,'2017-06-22 15:44:28','erte','2017-06-22','ert','ert','ert','ert','ert','ert','Street: er, Town: ter, State: ter, Zip: te','ert','ert','ert','ert','Street: ert, Town: er, State: t, Zip: ert',1),(3,'2017-06-22 15:46:21','erte','2017-06-22','ert','ert','ert','ert','ert','ert','Street: er, Town: ter, State: ter, Zip: te','ert','ert','ert','ert','Street: ert, Town: er, State: t, Zip: ert',1),(4,'2017-06-22 15:49:35','erte','2017-06-22','erte','erte','ert','ert','ert','ert','Street: ert, Town: er, State: ter, Zip: tert','ert','ert','ert','ert','Street: ert, Town: ert, State: e, Zip: ert',1),(5,'2017-06-22 15:49:54','erte','2017-06-22','erte','erte','ert','ert','ert','ert','Street: ert, Town: er, State: ter, Zip: tert','ert','ert','ert','ert','Street: ert, Town: ert, State: e, Zip: ert',1),(6,'2017-06-22 15:54:27','sdfss','2017-06-22','3434','343','34','3434','34','343','Street: 343, Town: 34, State: 34, Zip: 343','3434','343','343','34','Street: 343, Town: 3434, State: 343, Zip: 343',1),(7,'2017-06-22 15:57:45','856544','2017-06-14','456567','556756','5675','5675','5567','567','Street: 556, Town: 756, State: 56, Zip: 56','56756','5675','567','556756','Street: 756, Town: 7567, State: 567, Zip: 567',1),(8,'2017-06-22 19:02:23','erter','2017-06-22','erte','erte','erte','erte','er','tert','Street: er, Town: ter, State: t, Zip: ert','ert','ert','er','ert','Street: ert, Town: er, State: ter, Zip: t',1),(9,'2017-06-23 14:56:37','jjjjj','2017-06-23','jjj','jjj','jjj','jjj','jjj','peter@gmail.com','Street: 777, Town: 676, State: jj, Zip: jj','','','','','Street: , Town: , State: , Zip: ',1),(10,'2017-06-23 14:57:44','jjjjj','2017-06-23','jjj','jjj','jjj','jjj','jjj','peter@gmail.com','Street: 777, Town: 676, State: jj, Zip: jj','','','','','Street: , Town: , State: , Zip: ',1),(11,'2017-06-23 14:58:33','jjjjj','2017-06-23','jjj','jjj','jjj','jjj','jjj','peter@gmail.com','Street: 777, Town: 676, State: jj, Zip: jj','','','','','Street: , Town: , State: , Zip: ',1),(12,'2017-06-23 14:59:08','gdfgdf','2017-06-23','dfgdfg','dfgdf','dfg','ddfg','dfgdf','claudio@gmail.com','Street: 234423, Town: 2342, State: 234, Zip: 324','','','','','Street: , Town: , State: , Zip: ',1),(13,'2017-06-23 15:00:15','gfghf','2017-06-23','34534','3453','3453','34534','345','carlo@gmail.com','Street: 34534, Town: 345, State: 334, Zip: 5','','','','','Street: , Town: , State: , Zip: ',1),(14,'2017-06-28 02:54:30','fabio alexandre','2017-06-28','mteasda','2434','343','4343','343','crlo@mail.com','Street: 23434, Town: 343, State: 343, Zip: 3434','','','','','Street: , Town: , State: , Zip: ',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
