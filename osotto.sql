-- MySQL dump 10.13  Distrib 5.6.21-70.1, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: osotto
-- ------------------------------------------------------
-- Server version	5.6.21-70.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer_address`
--

DROP TABLE IF EXISTS `customer_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `country` varchar(64) NOT NULL,
  `county` varchar(64) NOT NULL,
  `town` varchar(64) DEFAULT NULL,
  `postcode` varchar(10) CHARACTER SET latin1 NOT NULL,
  `address1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address2` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer_address_customerId_user_id` (`customerId`),
  CONSTRAINT `fk_customer_address_customerId_user_id` FOREIGN KEY (`customerId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_address`
--

LOCK TABLES `customer_address` WRITE;
/*!40000 ALTER TABLE `customer_address` DISABLE KEYS */;
INSERT INTO `customer_address` VALUES (1,1,'Bulgaria','Varna','Varna','9000','Vladislavovo bl 16',NULL),(2,2,'United Kingdom','',NULL,'','',NULL),(3,3,'UK','cardiff','Cardiff','cf14 5hr','34 mayflower av','llanishen'),(4,4,'UK','Worcs','Kidderminster','DY10 1UB','20 Yew Tree Rd',''),(5,5,'UK','Gwent','Ebbw Vale','NP23 5JG','59, The Rise','Beaufort'),(6,6,'UK','Gwent','EBBW VALE','NP23 5LZ','62 LILIAN GROVE',''),(7,7,'UK','gwent','abertillery','Np13 2En','91 woodland tec','abberbeeg'),(8,8,'UK',' West Midlands','Birmingham',' b347sw','67horne way','shard. end'),(9,9,'UK','Dyfed','Llanelli','SA15 3DA','44 Coleshill Terrace',''),(10,10,'UK','south yorkshire','doncaster','dn12az','65 elmfield road','hyde park'),(11,11,'UK','lincs','boston','pe216dt','4 muster roll lane',''),(12,12,'UK',' west midlands','Birmingham','b37 5by','45brickhill drive ','chelmsley wood'),(13,13,'UK','west midlands','Birmingham','b37 5by','45brickhill drive ','chelmsley wood'),(14,14,'UK','Herefordshire','leominster','hr6 8un','148a','ridgemoor rd'),(15,15,'UK','avon',' Bristol','bs106dn','21 gosforth rd',''),(16,16,'UK','wiltshire','swindon','sn15db','4 sheppard street',''),(17,17,'UK','west midlands','birmingham','b81pd','204 wright road',''),(18,18,'UK','Rhondda Cynon Taff','','CF371QJ','5 High Street',''),(19,19,'UK','south yorkshire','doncaster','dn110ru','13 memoir grove','new rossington'),(20,20,'UK','Herefordshire','Madley','HR2 9LX','Yew Tree Cottage','Brampton Road'),(21,21,'UK','wales','cwmbran','np44 3nj','prospect place','old cwmbran'),(22,22,'UK','Blaenau gwent','tredegar','np22 4as ','13','meadow crescent'),(23,23,'UK','Wiltshire','Swindon','SN3 2NJ','38 Banwell Avenue',''),(24,24,'UK','mid glamorgan','pontypridd','cf373ew','5','cribbyn ddu st ynysybwl'),(25,25,'UK','Herefordshire','Hereford','HR11EQ','39 Barrs Court Road',''),(26,26,'UK','worcestershire','kidderminster','dy10 2qn','371A  hurcott road',''),(27,27,'UK','Blaenau Gwent','Ebbw Vale','NP23 6PP','27 Pennant Street','NP23 6PP'),(28,28,'UK','Wesdt Midlands','Birmingham','B30 3DT','1697 Pershore Road','Kings Norton'),(29,29,'UK','Caerphilly','Blackwood','NP120AY','52 Penylan Road','Argoed'),(30,30,'UK','pontypridd','rhydyfelin','cf375dd','33 treharne flats','holly street'),(31,31,'UK',' glamogan',' merthyr','cf479se','flat 5 number 1 plane grove',''),(32,32,'UK','midglamogans','merthyr tydfil','cf479se','flat 5 number 1 plane grove',''),(33,33,'UK','UNITED KINGDOM ','BOSTON','PE21 0BF','22 BLACKSMITS GROVE BOSTON FISHTOFT',''),(34,34,'UK','blaenau gwent','ebbw vale','np236wn','12 willow close',''),(35,35,'UK','West Midlands','Walsall','WS2 9AJ','115 Dora Street',''),(36,36,'UK','Cardiff','Treorchy','CF42 5SY','9','Brynhenllan Blaenrhondda'),(37,37,'UK','west yorkshire','wakefield','wf1 5at','25 gordon street','agbrigg'),(38,38,'UK','Worcestershire','KIDDERMINSTER','DY10 2NB','22','Windsor Drive'),(39,39,'UK','birmingham','yardley','b83rz','113 cotterills road',''),(40,40,'UK','Gwent','Ebbw Vale','NP23 5LZ','62 Lilian Grove',''),(41,41,'UK','birmingham','yardley','b8 3rz','113 cotterills road',''),(42,42,'UK','South Yorkshire','Doncaster','DN2 4HF','41 Lichfield road','Wheatley'),(43,43,'UK','Bleauna Gwent','Ebbw Vale','NP235QW','74 Beaufort Hill','Beaufort'),(44,44,'UK','Gwent ','Ebbw Vale','Np23 6nt','4 Shakespeare crescent','hilltop '),(45,45,'UK','Leicestershire','Leicester','LE3 6RL','43','Piper Close'),(46,46,'UK','Carmarthenshire','Llanelli','sa152lb','4 llys-yr-orsaf',''),(47,47,'UK','South Yorkshire','Doncastef','DN7 5BL','flat 4 thorne road','stainforth'),(48,48,'UK','torfaen','cwmbran ','np44 4ny','10 Farlow walk ','St dials'),(49,49,'UK','west midlands','Birmingham','B322NP','30 Rilstone rd',''),(50,50,'UK','Fife','Glenrothes','KY74HS','I Duncan Road',''),(51,51,'UK','Gloucester','','Gl46ej','Flat 9,40 winnycroft lane ',''),(52,52,'UK','Merthyr Tydfil','Merthyr Tydfil','CF470TB','48 Aneurin Cresent','Twynyrodyn'),(53,53,'UK','Merthyr Tydfil','Merthyr Tydfil','CF470TB','48 Aneurin Cresent','Twynyrodyn'),(54,54,'UK','england','birmingham','B33 9PY','11 elmore road  ','stechford '),(55,55,'UK','Gwent','Newport','Np20 7xn','65','Wellend circle');
/*!40000 ALTER TABLE `customer_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_contact_details`
--

DROP TABLE IF EXISTS `customer_contact_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `other_number` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer_contact_details_customerId_user_id` (`customerId`),
  CONSTRAINT `fk_customer_contact_details_customerId_user_id` FOREIGN KEY (`customerId`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_contact_details`
--

LOCK TABLES `customer_contact_details` WRITE;
/*!40000 ALTER TABLE `customer_contact_details` DISABLE KEYS */;
INSERT INTO `customer_contact_details` VALUES (1,1,'p_pravchev@abv.bg',NULL,NULL),(2,2,'clive.dann@googlemail.com',NULL,NULL),(3,3,'test@clivedann.co.uk','07879335994',''),(4,4,'chrissie.simplysiritual@googlemail.com','07557146372','01562741580'),(5,5,'louise2688@gmail.com','07415745926','01495309715'),(6,6,'shanepowell1997@yahoo.co.uk','07964013434',''),(7,7,'wilson.hugh1@gmail.com','07510145653',''),(8,8,'parrymichael@gmx.com','07736391032','01212406440'),(9,9,'thewho.quadrophenia1@gmail.com','07589495637','01554228248'),(10,10,'liam.deans@hotmail.co.uk','07540454168','01302374612'),(11,11,'ewulka.b@gmail.com','',''),(12,12,'thompson-1988@hotmail.co.uk','07968103432','07503886310'),(13,13,'Charlotte925@gmail.com','07986543210','07503886310'),(14,14,'enrico422@aol.com','07851049112',''),(15,15,'juliejarvis67@yahoo.co.uk','07760736244',''),(16,16,'pinkylee.kd@gmail.com','07475757626',''),(17,17,'igor2603@azet.sk','07478485340',''),(18,18,'developer@nosco-systems.com','07889291036',''),(19,19,'markymarkabc123@talktalk.net','07810288318','01302618644'),(20,20,'hugh@tatetech.co.uk','07790779040','01981251396'),(21,21,'smithsrus2010@hotmail.com','07961576552','01633674294'),(22,22,'leannektl@gmail.com','01495723593','01495723593'),(23,23,'roland.hughes@hotmail.co.uk','07403593642',''),(24,24,'kevinmorrisliverpool@gmail.com','07977544445',''),(25,25,'sherriffstan@gmail.com','07708994799','01432343273'),(26,26,'gillrhoden9@gmail.com','07514608795',''),(27,27,'sebastian.sebol@o2.pl','07831052522',''),(28,28,'nancy.parton@sky.com','07975709266','01214582545'),(29,29,'waynecox51@gmail.com','07561198560',''),(30,30,'jessicamorgan351@gmail.com','07866996130','07944652242'),(31,31,'michael.oleary@mail.com','07950667769','01685556789'),(32,32,'bigmike18@email.com','07980667769','01685556789'),(33,33,'martynas96@inbox.lt','07438779292','07597270797'),(34,34,'shellberkin@hotmail.co.uk','07762937336',''),(35,35,'marc.elson@rocketmail.com','07855898080',''),(36,36,'lauz_007@hotmail.co.uk','07867368278',''),(37,37,'andyman691976@live.co.uk','07985683062',''),(38,38,'stevenw827@talktalk.net','07899843228','01562751722'),(39,39,'Jordanpike159@yahoo.com','07774647277',''),(40,40,'powelljoyce65@yahoo.co.uk','09764013434',''),(41,41,'Nicnacs247@hotmail.co.uk','07780010776',''),(42,42,'ingrid.ada@live.co.uk','07825595591',''),(43,43,'nichola-williams@hotmail.co.uk','07531085244',''),(44,44,'louboo11@live.com','07562573406','01495446302'),(45,45,'pbpeterb677@gmail.com','07787533973','01162313217'),(46,46,'jj52k12@gmail.com','07873577228',''),(47,47,'Kenneth.guardsman.wood4@googlemail.com','07769048330','01302215348'),(48,48,'taff27@hotmail.co.uk','07975867273','01633547493'),(49,49,'rudidani1704@hotmail.com','07878161011',''),(50,50,'hir_227548@hotmail.com','07982170831',''),(51,51,'Lorriechidders@gmail.com','07879131310',''),(52,52,'jlnorman555@gmail.com','07983214455','07983214455'),(53,53,'jonny.shepp06@gmail.com','07968920944','07968920944'),(54,54,'omarbrown25sye@gmail.co.uk','07591466115','01217839963'),(55,55,'Lori.redwood88@gmail.com','07795873828','');
/*!40000 ALTER TABLE `customer_contact_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(64) NOT NULL,
  `column` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `option`
--

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;
INSERT INTO `option` VALUES (1,'user','ageGroup','under 18 years old',NULL),(2,'user','ageGroup','over 18 years old',NULL);
/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdf`
--

DROP TABLE IF EXISTS `pdf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pdf_productId_product_id` (`productId`),
  CONSTRAINT `fk_pdf_productId_product_id` FOREIGN KEY (`productId`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdf`
--

LOCK TABLES `pdf` WRITE;
/*!40000 ALTER TABLE `pdf` DISABLE KEYS */;
INSERT INTO `pdf` VALUES (1,1,'/home/webserver/osotto.co.uk/application/views/Uploads/pdfs/9dd6236.08.12.00.pdf'),(2,2,'/home/webserver/osotto.co.uk/application/views/Uploads/pdfs/330ea53.pdf'),(3,3,'/home/webserver/osotto.co.uk/application/views/Uploads/pdfs\\8a3e949.pdf'),(4,4,'/home/webserver/osotto.co.uk/application/views/Uploads/pdfs/mh51.pdf'),(5,5,'/home/webserver/osotto.co.uk/application/views/Uploads/pdfs/6f2a9dc.08.14).pdf');
/*!40000 ALTER TABLE `pdf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_number` varchar(255) NOT NULL,
  `short_desc` varchar(128) DEFAULT NULL,
  `long_desc` text,
  `spec_brief` varchar(128) DEFAULT NULL,
  `spec_full` text,
  `name` varchar(64) NOT NULL,
  `catId` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `warranty` int(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'PM10','Top of the range 200W multimedia HiFi','- Bluetooth\r\n- Radio\r\n- FM Tuner\r\n- 2 x 15w RMS Passive speaker\r\n- Built-in 2.0 channel amplifier output: 15Wx2(4 RMS)\r\n- USB & SD Card slot\r\n- Compatible with PAL/NTSC/AUTO\r\n- Full function Remote Control\r\n- CD Ripping Optional','PM10 HiFi','- Bluetooth\r\n- Radio\r\n- FM Tuner\r\n- 2 x 15w RMS Passive speaker\r\n- Built-in 2.0 channel amplifier output: 15Wx2(4 RMS)\r\n- USB & SD Card slot\r\n- Compatible with PAL/NTSC/AUTO\r\n- Full function Remote Control\r\n- CD Ripping Optional','PM10 HiFi',3,1,NULL,0),(2,'123456ABC','It\'s, like, super duper awesome!','No word of a lie, it really is amazing!','Super Awesome',NULL,'Super Duper',3,0,NULL,0),(3,'0987654','Description is most important','Description  is used for this device','Specs',NULL,'Galaxy Tab',1,0,NULL,1),(4,'T42','Osotts\'s most popular tablet','Slim stylish and powerful. This user friendly tablet meets the needs of all the family.  ','Dual Core AW23 processor, 4 G memory expandable to 35G',NULL,'T42',1,1,NULL,1),(5,'MH51','','- DVD/ DVD±R/ DVD±RW/ VCD/ CD/ CD-R/ CD-RW/ MP3/MPEG4 Kodak Picture\r\n- FM tuner\r\n- 2 x 25w RMS Passive speaker\r\n- Built-in 2.0 channel amplifier output: 25Wx2(4 ? RMS)\r\n- USB & SD card slot\r\n- TV SYSTEM: PAL/NTSC/AUTO\r\n- Full function Remote Control\r\n- Cover CD MP3 to USB/SD\r\n- BLUETOOTH (Optional)\r\n- Composite Audio/ video /Y / U / V color difference output','',NULL,'MH51 HiFi',3,1,NULL,1);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `catImg` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (1,'Tablet','/home/webserver/osotto.co.uk/application/views/Uploads/262efc4.png'),(2,'Soundbar','/home/webserver/osotto.co.uk/application/views/Uploads/5dcb745.png'),(3,'Hifi','/home/webserver/osotto.co.uk/application/views/Uploads/8357b0a.png');
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_images_productId_product_id` (`productId`),
  CONSTRAINT `fk_product_images_productId_product_id` FOREIGN KEY (`productId`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (4,2,'/home/webserver/osotto.co.uk/application/views/Uploads/images/330ea53.jpg'),(6,3,'/home/webserver/osotto.co.uk/application/views/Uploads/images/8a3e949.jpg'),(10,4,'/home/webserver/osotto.co.uk/application/views/Uploads/images/8681a9f.jpg'),(11,4,'/home/webserver/osotto.co.uk/application/views/Uploads/images/abf3db0.jpg'),(12,4,'/home/webserver/osotto.co.uk/application/views/Uploads/images/030c978.jpg'),(13,4,'/home/webserver/osotto.co.uk/application/views/Uploads/images/53a709f.jpg'),(14,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/6743e1f.png'),(15,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/bcdde02.png'),(16,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/a963440.png'),(17,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/2a1cbca.png'),(18,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/b9dbb3d.png'),(19,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/e6aa579.png'),(20,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/8d60e4b.png'),(21,1,'/home/webserver/osotto.co.uk/application/views/Uploads/images/cec041b.png'),(23,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/5fde461.png'),(24,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/3247edb.png'),(25,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/8a27dac.png'),(26,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/c985de7.png'),(27,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/c1b4e57.png'),(28,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/5338cec.png'),(29,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/21f6cbf.png'),(30,5,'/home/webserver/osotto.co.uk/application/views/Uploads/images/4e5a0fd.png');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `MAC` varchar(12) CHARACTER SET latin1 DEFAULT NULL,
  `date_purchased` int(11) NOT NULL,
  `purchased_from` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  `dateRegistered` int(11) NOT NULL,
  `warranty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_registration_customerId_user_id` (`customerId`),
  KEY `fk_registration_productId_product_id` (`productId`),
  CONSTRAINT `fk_registration_customerId_user_id` FOREIGN KEY (`customerId`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_registration_productId_product_id` FOREIGN KEY (`productId`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (1,2,1,'24742674257','2472474',1411513200,'247247',0,NULL),(2,2,2,'24742674257','2472474',1411686000,'247247',0,NULL),(3,2,2,'24742674257','2472474',1409526000,'247247',0,NULL),(4,2,1,'4563753753635635','',1410908400,'tesco',0,NULL),(5,3,1,'35636','sffgsgg',1409612400,'tesco',1410414561,NULL),(6,4,4,'SS1YSZZPP57OU','',1412118000,'Cash Converters Kidderminster',1412166290,NULL),(7,5,3,'SS1YUZZEV1958','',1412031600,'Cash Generator',1412211422,NULL),(8,5,3,'SS1YUZZEV1958','',1412204400,'Cash Generator',1412211427,NULL),(9,6,4,'559644a3544ec930f08','08:d8:33:74:',1411167600,'Cash Generator Ebbw Vale',1412717577,NULL),(10,9,4,'959644a354437860808','08d8330d8c71',1412636400,'Cash Generator Llanelli',1413485698,NULL),(11,10,4,'c99644a3544be890a06','08:d8:33:58:',1413586800,'Cash Generator',1413708750,NULL),(12,11,4,'pu177126','',1414454400,'',1414501162,NULL),(13,16,4,'169394e3544e5740507','',1416268800,'cash generator ',1416312126,NULL),(14,17,4,'s060408150108','',1416182400,'cash generator birmingham',1416342712,NULL);
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0mhgomn7ljolq5tvfq4s8fjpk3',1421855803,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('1m9u5lp75plomv2mn2dprog9a0',1421860460,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('3updbhsqo9v91as5le3k5q7m10',1421857520,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('48uphm9ssp86oola519pml7nn7',1421855801,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('4bg5j8b0h1eb8r1sc1a4ub1r25',1421884825,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('68j55ljpaerg46tcbs5j5fs0s6',1421902244,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('81s6at8bvimttis9ggg6426lh5',1421855841,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('86p1l8f499oh290kr79t1b3420',1421855801,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('9ktat4111cd1kihkdm6agf7in6',1421913664,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('ahesal7sb9ms95rlg3a01v3t11',1421895271,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('anak6am97gbvajec098qtupf23',1421888321,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('bmo1023uig1875n42nqo1gpie4',1421857656,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('c4ldv4orgn672463vbfufkq1o0',1421855826,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('d1ch56jqs18rma9l4102nsold3',1421855829,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('dh956ui7fl4m0suu4gt4n0emc3',1421855013,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('e5p4p8a55jsjavjrbict4c4691',1421854522,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('f60td61thhobklv23n16cluk00',1421855841,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('fam88m9si4i7qdl60vab0dmaj5',1421867279,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('hd6rvionnvo2usrhearimtqjp1',1421902290,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('hqhnmvkdksvcsbl6lr0ot71l21',1421857961,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('i6im30ae29ce4insdamngsa227',1421857745,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('ihos5hqqqihqu7pcnq6d6d3t01',1421853707,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('j1s1t93hu42hpadfnsp2akrm73',1421855143,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('jl8qnbr6m885495gbajk8ob0h4',1421891922,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('jtluoheddokj3hqppviuk1rqh4',1421857553,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('l6e6dk1j4cd520bov5f9e5rvt4',1421854522,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('lcginuf2t64k9ttp49vto0d9a1',1421855171,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('nocr2of911qtcjl98074csoqn6',1421855182,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('npvtf5vjkksduagaqt7uo5kc16',1421877821,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('o3lpno9l3vdbtqmi1e6ejo1426',1421857553,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('o4mkcse0k5va3889bsa8nhjnb0',1421857520,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('oje19npdhkn6atvm0n86u4ot92',1421855801,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('okt4it4mahicf40kbsu32tpo53',1421855157,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('p48os1nm2n5jesre8j5nr4mhg3',1421855136,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('qgfotoqr5l8c9au7d9m9cjh705',1421872870,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('qr59ootuuvevsue32m82rbu3v2',1421855763,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('ra7gv3d77vpsg015nelg126bs0',1421850398,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('ss5en1i5ckk7594mlmpmg4sr01',1421881215,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('tv58nqgk8fi23f6rqfdu9a3mq1',1421888321,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('ueetold1g4iccq29u3gc85gt62',1421874302,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('urt7i6r1aj92cs76n77ci8sq80',1421857520,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}'),('vl353t01isur1c2fjvtb25oct0',1421857530,'a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flash.logout|s:184:\"You have been logged out because an attempted security breach has been detected. If this happens again please contact an administrator, as someone may be trying to access your account.\";a3aa6fd38de3e562be2378dc012a1951Yii.CWebUser.flashcounters|a:1:{s:6:\"logout\";i:0;}');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) DEFAULT NULL,
  `firstname` varchar(36) NOT NULL,
  `middlename` varchar(36) DEFAULT NULL,
  `lastname` varchar(36) NOT NULL,
  `ageGroup` int(11) NOT NULL,
  `username` varchar(36) NOT NULL,
  `password` varchar(64) NOT NULL,
  `created` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `priv` int(11) NOT NULL COMMENT 'Level used to determine permissions and privileges',
  `optIn` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_ageGroup_option_id` (`ageGroup`),
  CONSTRAINT `fk_user_ageGroup_option_id` FOREIGN KEY (`ageGroup`) REFERENCES `option` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,'Pavel',NULL,'Pravchev',2,'pravchev','$2a$13$pOgC5a.aMZUqPxjBMAbsQOXAhk8dAU5FXGmP2JdrCIEhqBjUKrHB2',1405591050,1,100,NULL),(2,1,'Clive',NULL,'Dann',2,'clive','$2a$13$aDo41PHMvuRZ9nhzmcI9TuZcqQs5d/0x979unrNQbsomD.gI3xOfK',1405591050,1,100,NULL),(3,1,'test','test','test',2,'test42','$2a$13$c.Kr/uQR1wRR2MUpwTQ62.I5DgqNdHUST0/kknbUX0yFMhOwZKsN6',1410414510,1,10,1),(4,1,'Christine','Victoria','Ritchie',2,'ChrissieVR','$2a$13$gyX/HKV.7QlHDN9KURCKLORC4EcH1JQ.WoWBrqNltYm5UnQlP.iTq',1412166208,1,10,1),(5,1,'Toni','Louise','Williams',2,'Ambeth123','$2a$13$hS8KX2TVGwaIJRQ8VLVrOOSJ9nvKvHzAod1YJpnp2NI48TalzWTyS',1412210831,1,10,1),(6,1,'Shane','Anthony Paul','Powell',1,'Shane Powell','$2a$13$fY2l/Q.DGTmhwjDKDZ7OwuQ5F9gzLPqfxMgy553rP.5wwE6zOBQMK',1412717301,1,10,1),(7,1,'Hugh','Alexander','Wilson',2,'hughwilson','$2a$13$TFZ49vSF5L38mYNtpXoANOkBjRb5lvp7dF/i8NNKY1mYUN5cka4r.',1412804460,1,10,0),(8,1,'Michael',NULL,' parry',2,'parrymick','$2a$13$Cn05cbXlNBbYbX1DGcXQxuSoSFZJjmJWRx7Y9BUeouGvsf8mz6.x.',1413375511,1,10,1),(9,1,'Darren','Peter','Moore',2,'Dazza42','$2a$13$uTlIrHjh0gaN1p2HAEAS0OkjNiU.VCThDYsJ.k77P1h69mCvwo7vC',1413485109,1,10,1),(10,1,'liam','robert','deans',1,'liamrdeans','$2a$13$va9Tq4Sv.s4znohfSmGW9OKdHe8GGKsYaDaQhV/Rmlg8aFkVwPZxy',1413708562,1,10,1),(11,1,'ewa',NULL,'brylinska',2,'ewulka','$2a$13$ivbQ12DQxCY1i.sn1FzBl./1XYbesuyXoEqsSiABO7eRQZJ7MDxai',1414500859,1,10,1),(12,1,'Charlotte',' Margaret',' Thompson',2,'chatter','$2a$13$/Of/EcDU3Yi2wuFDwAvbYu41dneCUbVUjKiO4z6/TtPkfWYkPWovC',1414687954,1,10,1),(13,1,'Charlotte','Margaret','thompson',2,'Charlotte','$2a$13$vgq3i0ACJNUwWnFoPwYFg.V7BXPQ/ypw3EkL1kt90tvF25T2p.lz.',1414688519,1,10,1),(14,1,'enrico',NULL,'grandinetti',2,'enrico422','$2a$13$J2cRtrQWL59A.4Z6/Ntd1eG6s9lyL2Qhh9cJpI2/5f.uhSHN/pB1.',1414964689,1,10,1),(15,1,'Natasha',' kelly','Jarvis',2,'madamemissy','$2a$13$2HMKMjGsl9OxdxPWZVoki.lUjs.SBD2.ALoXZZu4YCK0nb/xU6J2S',1415096789,1,10,1),(16,1,'Kayleigh','marie','Dixon',2,'pinkylee','$2a$13$v7hhKgFFJ8HiHXWSGxeni.nxjrZDM.q7dmF3k7iDluM4k8ug2mKi6',1416311849,1,10,0),(17,1,'vladimir',NULL,'zima',2,'vladimirzima','$2a$13$s8xZhe1ynFz7dkw1OEPzo.mi3k1pLvJlbJln0elcbBMQv2rBIGdoW',1416342610,1,10,0),(18,1,'Master',NULL,'Admin',2,'Master','$2a$13$49b190aA17Oxf6Hd8XFlE.eKzbEk8pfJYpqOK/Ry5qB/EvN4nGUEm',1416411202,1,100,NULL),(19,1,'mark',NULL,'edwards',2,'markymark','$2a$13$dusHd7FF1FbZjY/tUxSmm.tusYIzsX9kNBKnw77CFBaUsr1rk5qnq',1416687565,1,10,NULL),(20,1,'Hugh',NULL,'Tate',2,'DrHugh','$2a$13$HmSaVGiQiT36yJQVOKDFu.UvNtKwTIIZQnWVu751wCIv/9TKDHkoi',1416832503,1,10,NULL),(21,1,'lewis','matthew','smith',1,'lewis','$2a$13$GkGBPZyLdo1KkLLhb2FkLuz5hbTb8b88yxOrdwNigUvhfZ3FP2Eam',1416862365,1,10,NULL),(22,1,'leanne',NULL,'titley',2,'ltitleygb','$2a$13$x7C6nYXYxDjc/xoSvMrkWejOpKV4/U90ABvlihAaqgdWhcGzXV/qi',1417186800,1,10,NULL),(23,1,'Roland','David','Hughes',2,'rolyratty82','$2a$13$SAeQ7fEsPRQk56oowMDSjujpbdjYouiy0QvJzp9p4NW.hiBlGEtlm',1417191647,1,10,NULL),(24,1,'kevin','robert','morris',2,'vinney49','$2a$13$15zh/U4nF2v0og/TeDT2HOB1Lxs8gKKqUkoCDnDFm..dxSjfGRD8a',1417205558,1,10,NULL),(25,1,'Nigel','David','Sherriff',2,'stann','$2a$13$CjZv68gDbdqnrcqs96GwLuS6RjFm47vSEvNQl7KItJv401vS0jdX.',1418028488,1,10,NULL),(26,1,'gillian','jayne','rhoden',2,'gill1968','$2a$13$3a6LcguuyoGON8Q6EUi3MeIUoHO4pLSkKIO7SZSQo1h3dLud/NLqm',1418303653,1,10,NULL),(27,1,'Sebastian','Jan','Dziel',2,'sebastiansebolseeb','$2a$13$LXkEo3.B6SW71SKiybLPaeYKgiTDRxkdtNHW.Zrrg54JvPIE2iY4y',1418407486,1,10,NULL),(28,1,'Leonard','James ','Jones',2,'leonardJ','$2a$13$yi1smO/ANMQqk/Eo4GPh8OIHWBvF93/RhjZOlaAN3nZ6wkd1cgiTi',1418491847,1,10,NULL),(29,1,'wayne',NULL,'cox',2,'coxydonk','$2a$13$PsZS6QqEy7E/DnXIXWbg9e.JIWHlbLmi9TGtUTEOtZ1e9V8kpPtL6',1418717563,1,10,NULL),(30,1,'jessica','louise','morgan',1,'jessicamorgan','$2a$13$.2a3tGF9A4ZeT7c439OP0eVCbQahi0sdS2PwxKP4oIJlar95BVEIG',1419203039,1,10,NULL),(31,1,'Michael',NULL,'O\'Leary',2,'bigmike','$2a$13$TVfiKim0K/1UYhtggscTNOAzT.OLZYBl.FfrazlunPT2Ta.MDpue6',1419296400,1,10,NULL),(32,1,'michael',' aaron',' oleary',2,'oleary 2014','$2a$13$Y4fY4/Xc1Qh/aW1yVifOse129Ww/a0ftDUUNbvzKjWV5H8m5PgZKu',1419297202,1,10,NULL),(33,1,'Martynas',NULL,'Zemaitis',2,'Martynas','$2a$13$.DIZbZ3B20qV2OkUnkhmTu0Ju9EtBIJq048htnR/0Qwlxv09yTH/K',1419507799,1,10,NULL),(34,1,'michelle',NULL,'lewis',2,'dimples','$2a$13$50nOK4CgmlAdpS4P7ALzdOhcgCr7Jt6K9ESqYk11HCwnVytKX2kBm',1419533121,1,10,NULL),(35,1,'Marc',NULL,'Elson',2,'marc182','$2a$13$iZnaWo.ihby03TW0pIAJLukbkeRhD45DE4/tGxaYbCEP/WAIgd0ES',1419538790,1,10,NULL),(36,1,'laura',NULL,'jones',2,'laura','$2a$13$ZubZ2wKjeC0ONCRbZEu/iO7uFupSvN6N0vTTDW0akndYc/uRuERBu',1419600058,1,10,NULL),(37,1,'andy','james','pick',2,'andypick','$2a$13$/Xik1IOZBpNUdT195wkC8.jk.UbnpNTeWqt2BGUhnXa/i/D.eMLJ2',1419606480,1,10,NULL),(38,1,'Shayne','Bernard John','Walker',1,'Shayne965','$2a$13$O2lddwTV3xTqrl/htbkSROF4/vE4tO9sc6Qhep4S6rF1wMsntpE26',1419691372,1,10,NULL),(39,1,'Jordan',NULL,'Pike',2,'Jordanpike ','$2a$13$0CE9.EAICKd3H8tTqspu4ugfPMq1dydKgJZJy7ESTku52wA0s4/5G',1419697728,1,10,NULL),(40,1,'Joyce','Elaine','Powell',2,'Joyce Powell','$2a$13$JUvXVTBpRWsvrh8PZK8i8OuVxv3KuHxyV7mSlEV.ftrCGcrbdWQry',1419730522,1,10,NULL),(41,1,'jordan',NULL,'Pike',2,'Jordan30','$2a$13$Jv2Twi9xFXa8/FTjopMyo.tyvU3wyDXWAfvs5uzz0VRdq.YiT1bZ.',1419779533,1,10,NULL),(42,1,'Ingrid',NULL,'Bila',2,'Ingrid','$2a$13$EGTf0EDEQRjQIFfeG3f4eea7hVTgnG683RFEZuJBuefabzZqAeXhy',1419794270,1,10,NULL),(43,1,'Ella-louise','lorna kaylee','humphreys',1,'Ella-Louise Humphreys','$2a$13$.VHZOK0KuFykug54PWtp6OsZBzywQPYpZWNZE/ermFrnGXW1sAwbO',1419844124,1,10,NULL),(44,1,'Joanne ','Louise ','Cooper ',2,'jotillyslove14.jc','$2a$13$zpKwjufNjdPAzzfefXCMc./8ANk5lxCZ1hsvEs6sPdxB4kQvsp3F.',1420018562,1,10,NULL),(45,1,'Peter','John','Blastock',2,'Peterb160','$2a$13$svSYj7DFzpqhpVUJIDumte959Ix83GMrEQPNoDUjgcq879y4pu2pa',1420035870,1,10,NULL),(46,1,'Jonathan',NULL,'palthorpe',2,'jj5555','$2a$13$iWBrjPAiHhQMuW5GETHaWOE/WgEXF1/iKtNWXLvI3btE8/POsTuhG',1420137930,1,10,NULL),(47,1,'Kenneth','Edward','Wood',2,'coldstreamer','$2a$13$nn8dx/1A5kbwon3Vbs0RY.HMciYVMQbfcv1NAC8eiFQSbJfFtvS0S',1420196263,1,10,NULL),(48,1,'james',NULL,'tutton',2,'taff27','$2a$13$oErGZtteS.JIIoODkGuzx.L/5bXjmVKO9Eb3cFUsqTIiQHACoOceK',1420291357,1,10,NULL),(49,1,'Rudi',NULL,'Dani',2,'Rudi1704','$2a$13$iE/B/CbJ5y76o1UWUC3AnORKBkidZZ/3xVxDq.vW9LnL/I4Zt91qK',1420318927,1,10,NULL),(50,1,'John',NULL,'Carkit',2,'John 51','$2a$13$qTRhmDhFnt4bJDnIOXmwQOJvluXVOpc/DGX/lzq5NmKBgTvMRxex2',1420985683,1,10,NULL),(51,1,'Lorraine','Ann','Chidlow',2,'Lorriechidders@gmail.com','$2a$13$vL5gXGZsrju0JsCB66UvsOdTDiLNR0.ZCdyVFqD2pDthE5hDaV5.G',1421199432,1,10,NULL),(52,1,'Jonathon','Bryan','Sheppard',2,'Jonny Sheppard','$2a$13$4RxDsgUpBFNPcEBaTARweeX3PPiRR3aBMuq3mS9XXzGM7.tITmBdm',1421286297,1,10,NULL),(53,1,'Jonathon','Bryan','Sheppard',2,'Jonny Shepp2015','$2a$13$9mjpTmvewCoKkQSNSV0rDe3W/o8GfZshn0ISlo1m8wGG4xes924qK',1421286445,1,10,NULL),(54,1,'stacian',NULL,'roper',2,'omarbrown25sye@gmail.co.uk','$2a$13$pqkilMYkdAh0a0g0HOxdIepfGeu9H7rk1iJTxOLkSrmstbW4/1PJO',1421343533,1,10,NULL),(55,1,'Lori',NULL,'Redwood',2,'Lozielou','$2a$13$uTsPq9ijTsh3I8cvhPo/S./JNba2tk.ym9t0biI47NuapStFd2pEC',1421692579,1,10,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-21 14:03:35
