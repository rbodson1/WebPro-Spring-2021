CREATE DATABASE  IF NOT EXISTS airline2 
USE airline2;


DROP TABLE IF EXISTS `flights`;
CREATE TABLE `flights` (
  `f_no` varchar(20) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `f_src` varchar(20) NOT NULL,
  `f_dest` varchar(20) NOT NULL,
  PRIMARY KEY (`f_no`),
  KEY `fk_flights_1_idx` (`f_no`),
  KEY `index1` (`f_no`)
) 

LOCK TABLES `flights` WRITE;
INSERT INTO `flights` VALUES ('D432','Delta','New York','Los Angeles'),('D504','Delta','Atlanta','New York'),('SP501','Spirit','Los Angeles','New York'),('SW909','SouthWest','Denver','San Diego'),('U547','United','Chicago','Miami'),('UI873','United','Boston','Los Angeles');


DROP TABLE IF EXISTS `parking`;
CREATE TABLE `parking` (
  `spot_no` int(11) NOT NULL,
  `p_no` int(11) DEFAULT NULL,
  `vip` int(11) NOT NULL DEFAULT '0',
  `price` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`spot_no`),
  KEY `fk_parking_1_idx` (`p_no`),
  CONSTRAINT `fk_parking_1` FOREIGN KEY (`p_no`) REFERENCES `passenger` (`p_id`)
) ;


LOCK TABLES `parking` WRITE;
INSERT INTO `parking` VALUES (1,NULL,1,'30'),(2,NULL,1,'30'),(3,NULL,1,'30'),(4,NULL,1,'30'),(5,NULL,1,'30'),(6,NULL,0,'15'),(7,NULL,0,'15'),(8,NULL,0,'15'),(9,NULL,0,'15'),(10,NULL,0,'15'),(11,NULL,0,'15'),(12,NULL,0,'15'),(13,NULL,0,'15'),(14,NULL,0,'15'),(15,NULL,0,'15');
UNLOCK TABLES;

DROP TABLE IF EXISTS `passenger`;

CREATE TABLE `passenger` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `mno` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


LOCK TABLES `passenger` WRITE;
UNLOCK TABLES;



DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets` (
  `t_no` int(30) NOT NULL AUTO_INCREMENT,
  `p_id` int(30) NOT NULL,
  `f_no` varchar(20) NOT NULL,
  PRIMARY KEY (`t_no`),
  KEY `fk_tickets_1_idx` (`f_no`),
  KEY `fk_tickets_2_idx` (`p_id`),
  CONSTRAINT `fk_tickets_1` FOREIGN KEY (`f_no`) REFERENCES `flights` (`f_no`),
  CONSTRAINT `fk_tickets_2` FOREIGN KEY (`p_id`) REFERENCES `passenger` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19132 DEFAULT CHARSET=latin1;


LOCK TABLES `tickets` WRITE;
UNLOCK TABLES;