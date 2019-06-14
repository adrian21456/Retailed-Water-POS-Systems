/*
SQLyog Ultimate v11.5 (32 bit)
MySQL - 5.6.21 : Database - dbhanz_restaurant
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbhanz_restaurant` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dbhanz_restaurant`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`category`) values (34,'Finger foods'),(35,'Dessert'),(36,'Add On'),(37,'Hamburgers '),(39,'Sandwich'),(40,'Softdrinks');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `customers` */

insert  into `customers`(`id`,`name`,`contact`,`address`,`note`) values (3,'Walk-In','1234551','Catbalogan, Samar','for Walk-in Accounts');

/*Table structure for table `holdlog` */

DROP TABLE IF EXISTS `holdlog`;

CREATE TABLE `holdlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(50) NOT NULL,
  `qty` int(50) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `holdlog` */

/*Table structure for table `ingredienthistory` */

DROP TABLE IF EXISTS `ingredienthistory`;

CREATE TABLE `ingredienthistory` (
  `inghistid` int(11) NOT NULL AUTO_INCREMENT,
  `ingid` int(11) DEFAULT NULL,
  `ingqty` int(11) DEFAULT NULL,
  `ingdate` date DEFAULT NULL,
  `purchaseprice` double DEFAULT NULL,
  `retailprice` double DEFAULT NULL,
  PRIMARY KEY (`inghistid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `ingredienthistory` */

/*Table structure for table `ingredients` */

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `retailprice` double DEFAULT NULL,
  `purchaseprice` double DEFAULT NULL COMMENT 'purchase price',
  `type` varchar(255) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `reorderlevel` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `ingredients` */

insert  into `ingredients`(`id`,`name`,`retailprice`,`purchaseprice`,`type`,`quantity`,`description`,`reorderlevel`) values (17,'Da Boss Pattie',1,1,'Unit',6,'Da Boss Pattie',5),(18,'Yolo Pattie',1,1,'Unit',1,'Yolo Pattie',5),(19,'Buns (regular)',1,1,'Unit',1,'Buns (regular)',5),(20,'Buns (Big)',1,1,'Unit',1,'Buns (Big)',5),(21,'Hotdog King size',1,1,'Unit',0,'1',5),(22,'Sweet Corn',1,1,'Unit',1,'Sweet Corn',5),(23,'Buns (hotdog)',1,1,'Unit',1,'Buns (hotdog)',5),(24,'Potato fries',1,1,'Unit',1,'Potato fries',5),(25,'Potato',1,1,'Unit',1,'Potato',5),(26,'Coffe Jelly',1,1,'Unit',1,'Coffe Jelly',5),(27,'Choco Jelly',1,1,'Unit',1,'Choco Jelly',5),(28,'Shanghai Rolls',1,1,'Unit',1,'Shanghai Rolls',5),(29,'FishBalls',1,1,'Unit',1,'FishBalls',5),(30,'Kikiam',1,1,'Unit',1,'Kikiam',5),(31,'Squid Balls',1,1,'Unit',1,'squid balls',5),(32,'Tempura',1,1,'Unit',1,'Tempura\r\n',5),(33,'Bacon',1,1,'Unit',1,'Bacon Strips',5),(34,'Twin Patties',1,1,'Unit',1,'Twin Patties',5),(35,'Slice Cheese',1,1,'Unit',1,'Cheese',5),(36,'Egg',1,1,'Unit',1,'Egg',5),(37,'Ham Sliced',1,1,'Unit',1,'Ham Sliced',5),(40,'Kikiam',1,1,'Unit',153,'Kikiam',5);

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `retailprice` double NOT NULL COMMENT 'Retail price',
  `category` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `purchaseprice` double DEFAULT NULL,
  `tax` tinyint(4) DEFAULT NULL,
  `reorderlevel` tinyint(4) DEFAULT NULL,
  `quantitytodeduct` tinyint(4) NOT NULL,
  `hasingredient` varchar(10) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `items` */

insert  into `items`(`id`,`name`,`description`,`quantity`,`retailprice`,`category`,`location`,`supplier`,`code`,`purchaseprice`,`tax`,`reorderlevel`,`quantitytodeduct`,`hasingredient`,`img`) values (30,'Potato Turnado','Potato Turnado',0,1,'finger foods','Others','Others','1',1,0,100,0,'checked','images/7.jpg'),(32,'Cheese Sticks','Cheese Sticks',0,1,'finger foods','Others','Others','1',1,1,100,0,'checked','images/8.jpg'),(33,'Sweet Corn','Sweet Corn',0,1,'Dessert','Others','Others','1',1,1,100,0,'checked','images/9.jpg'),(34,'Choco Jelly','Choco Jelly',0,1,'Dessert','Others','Others','1',1,1,100,0,'checked','images/10.jpg'),(35,'Coffee Jelly','Coffee Jelly',0,1,'Dessert','Others','Others','1',1,1,100,0,'checked','images/11.jpg'),(36,'Shanghai Rolls','Shanghai Rolls',0,1,'finger foods','Others','Others','1',1,1,100,0,'checked','images/12.jpg'),(37,'Quek Quek','Quek Quek',0,1,'finger foods','Others','Others','1',1,1,100,0,'checked','images/13.jpg'),(38,'SIOMAI','SIOMAI',0,1,'finger foods','Others','Others','1',1,0,100,0,'checked','images/14.jpg'),(39,'Da Boss Burger','Da Boss Burger',0,1,'Hamburgers ','Others','Others','1',1,0,100,0,'checked','images/15.jpg'),(40,'Double Stk Burger','Double Stack Burger',0,1,'Finger foods','Others','Others','1',1,0,100,0,'checked','images/16.jpg'),(41,'Yolo Burger','Yolo Burger',0,1,'Hamburgers ','Others','Others','1',1,1,100,0,'checked','images/17.jpg'),(42,'Twin Burger','Twin Burger',0,1,'Hamburgers ','Others','Others','1',1,1,100,0,'checked','images/18.jpg'),(43,'Tostham Sandwch','Toasted Ham Sandwich',0,1,'Finger foods','Others','Others','1',1,0,100,0,'checked','images/19.jpg'),(44,'Hotdog Sandwich','Hotdog Sandwich',0,1,'Sandwich','Others','Others','1',1,1,100,0,'checked','images/20.jpg'),(45,'Hotdog on Stick','Hotdog on Stick',0,1,'Sandwich','Others','Others','1',1,1,100,0,'checked','images/21.jpg'),(46,'Kikiam','Kikiam',1,100,'Finger foods','Others','Others','1',50,1,1,0,'checked','images/5.jpg'),(47,'Potato Fries','Potato Fries',1,20,'Finger foods','Others','Others','1',10,1,1,0,'checked','images/6.jpg');

/*Table structure for table `itemshistory` */

DROP TABLE IF EXISTS `itemshistory`;

CREATE TABLE `itemshistory` (
  `itemhisid` int(11) NOT NULL AUTO_INCREMENT,
  `itemsid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `purchaseprice` double DEFAULT NULL,
  `retailprice` double DEFAULT NULL,
  `historydate` date DEFAULT NULL,
  `totalpp` double NOT NULL,
  `totalrp` double NOT NULL,
  PRIMARY KEY (`itemhisid`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

/*Data for the table `itemshistory` */

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `location` */

insert  into `location`(`id`,`location`) values (7,'Others');

/*Table structure for table `macaddress` */

DROP TABLE IF EXISTS `macaddress`;

CREATE TABLE `macaddress` (
  `mac` varchar(255) DEFAULT NULL,
  `macdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `macaddress` */

insert  into `macaddress`(`mac`,`macdate`) values ('F4-6D-04-DC-65-41','2016-06-22');

/*Table structure for table `qty_upd_history` */

DROP TABLE IF EXISTS `qty_upd_history`;

CREATE TABLE `qty_upd_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ing_id` int(11) DEFAULT NULL,
  `qty_current` int(11) DEFAULT NULL,
  `qty_added` int(11) DEFAULT NULL,
  `hist_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `qty_upd_history` */

/*Table structure for table `reciept_temp` */

DROP TABLE IF EXISTS `reciept_temp`;

CREATE TABLE `reciept_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(50) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `customer` varchar(50) DEFAULT NULL,
  `paidby` varchar(50) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `amountpaid` double DEFAULT NULL,
  `previous_bal` double DEFAULT NULL,
  `remaining_bal` double DEFAULT NULL,
  `unit_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reciept_temp` */

/*Table structure for table `recipe` */

DROP TABLE IF EXISTS `recipe`;

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(10) NOT NULL,
  `itemid` int(10) NOT NULL,
  `ingredientid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `recipe` */

insert  into `recipe`(`id`,`quantity`,`itemid`,`ingredientid`) values (3,2,59,1),(5,2,60,3),(6,2,60,2),(7,1,59,2),(13,5,29,39),(14,5,28,38),(15,3,28,40);

/*Table structure for table `saleslog` */

DROP TABLE IF EXISTS `saleslog`;

CREATE TABLE `saleslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total` double NOT NULL,
  `disc` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `saleslog` */

/*Table structure for table `salestranslog` */

DROP TABLE IF EXISTS `salestranslog`;

CREATE TABLE `salestranslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sdate` date DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `total` double(255,0) DEFAULT NULL,
  `tax` double(255,0) DEFAULT NULL,
  `discount` double(255,0) DEFAULT NULL,
  `grandtotal` double(255,0) DEFAULT NULL,
  `paidby` varchar(255) DEFAULT NULL,
  `amountpaid` double(255,0) DEFAULT NULL,
  `change_amt` double(255,0) DEFAULT NULL,
  `date_where` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `salestranslog` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`supplier`,`address`,`contact`) values (4,'Others','others','123456');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` int(15) NOT NULL,
  `role` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`password`,`first_name`,`last_name`,`middle_name`,`address`,`mobile`,`role`) values (2,'user@user.com','user','user','user','','',0,'user'),(6,'admin@admin.com','admin','admin','admin','admin','admin',12345,'admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
