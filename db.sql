/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 10.1.30-MariaDB : Database - nuttawuth
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*Table structure for table `agents` */

DROP TABLE IF EXISTS `agents`;

CREATE TABLE `agents` (
  `agent_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `credit` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `commision` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '0',
  `org_id` int(11) DEFAULT NULL,
  KEY `agent_id` (`agent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `agents` */

/*Table structure for table `input_type` */

DROP TABLE IF EXISTS `input_type`;

CREATE TABLE `input_type` (
  `type_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `input_type` */

insert  into `input_type`(`type_id`,`type`) values 
('3H','Head'),
('3T','Tail'),
('3HT','Head Tail'),
('2T','Top'),
('2B','Bottom'),
('2TB','Top Bottom');

/*Table structure for table `inputs` */

DROP TABLE IF EXISTS `inputs`;

CREATE TABLE `inputs` (
  `input_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `org_id` int(11) NOT NULL,
  `period_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `page` int(11) DEFAULT NULL,
  `type_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `amount1` int(11) DEFAULT NULL,
  `operator` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount2` int(11) DEFAULT NULL,
  PRIMARY KEY (`input_id`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inputs` */

/*Table structure for table `latest_new_sent` */

DROP TABLE IF EXISTS `latest_new_sent`;

CREATE TABLE `latest_new_sent` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `sent` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `period_id` int(11) NOT NULL,
  `number_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `latest_new_sent` */

/*Table structure for table `number_type_default` */

DROP TABLE IF EXISTS `number_type_default`;

CREATE TABLE `number_type_default` (
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `digit` int(2) NOT NULL,
  `rate` int(5) NOT NULL,
  `default_limit` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `number_type_default` */

insert  into `number_type_default`(`type`,`digit`,`rate`,`default_limit`) values 
('Head',3,50,0),
('Tail',3,50,0),
('Head Special',3,10,0),
('Tail Special',3,10,0),
('Top',2,8,100),
('Bottom',2,8,100),
('Top Run',1,3,100),
('Bottom Run',1,3,100);

/*Table structure for table `number_type_orgs` */

DROP TABLE IF EXISTS `number_type_orgs`;

CREATE TABLE `number_type_orgs` (
  `number_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `digit` int(2) NOT NULL,
  `rate` int(5) NOT NULL,
  `default_limit` int(5) NOT NULL,
  `org_id` int(11) NOT NULL,
  PRIMARY KEY (`number_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `number_type_orgs` */

/*Table structure for table `organizations` */

DROP TABLE IF EXISTS `organizations`;

CREATE TABLE `organizations` (
  `org_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `org_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `seat` int(2) NOT NULL DEFAULT '3',
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `organizations` */

insert  into `organizations`(`org_id`,`org_name`,`active`,`seat`) values 
(1,'Bangkok',1,3);

/*Table structure for table `periods` */

DROP TABLE IF EXISTS `periods`;

CREATE TABLE `periods` (
  `period_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `period` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `top_result` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `bottom_result` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `total` float DEFAULT NULL,
  `net` float DEFAULT NULL,
  `pay` float DEFAULT NULL,
  `p_l` float DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `org_id` int(11) NOT NULL,
  PRIMARY KEY (`period_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `periods` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `org_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`username`,`email`,`password`,`role`,`active`,`org_id`) values 
(1,'lotus','lotus@gmail.com','admin','admin',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
