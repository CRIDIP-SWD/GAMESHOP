-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gameshop
-- ------------------------------------------------------
-- Server version	5.5.46-0+deb7u1

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
-- Current Database: `gameshop`
--


--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `designation_cat` varchar(255) NOT NULL,
  `images_cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'PS4','ps4'),(2,'PS3','ps3'),(3,'PS VITA','psvita'),(4,'XBOX ONE','xboxone'),(5,'XBOX 360','xbox360'),(6,'WII U','wiiu'),(7,'NINTENDO 3DS','nin3ds');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `idclient` int(13) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `pseudo_psn` varchar(255) NOT NULL,
  `pass_psn` varchar(255) NOT NULL,
  `pseudo_xbox` varchar(255) NOT NULL,
  `pseudo_nintendo` varchar(255) NOT NULL,
  `pseudo_steam` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  PRIMARY KEY (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'mmockelyn@gmail.com','25d95d7979a1542d581f79867ceb9175112272e2','MOCKELYN','Maxime','','','','','','');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_adresse_fact`
--

DROP TABLE IF EXISTS `client_adresse_fact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_adresse_fact` (
  `idadresse` int(13) NOT NULL AUTO_INCREMENT,
  `idclient` int(13) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` int(13) NOT NULL,
  `default` int(1) NOT NULL,
  PRIMARY KEY (`idadresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_adresse_fact`
--

LOCK TABLES `client_adresse_fact` WRITE;
/*!40000 ALTER TABLE `client_adresse_fact` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_adresse_fact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_adresse_liv`
--

DROP TABLE IF EXISTS `client_adresse_liv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_adresse_liv` (
  `idadresse` int(13) NOT NULL AUTO_INCREMENT,
  `idclient` int(13) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` int(13) NOT NULL,
  `default` int(1) NOT NULL,
  PRIMARY KEY (`idadresse`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_adresse_liv`
--

LOCK TABLES `client_adresse_liv` WRITE;
/*!40000 ALTER TABLE `client_adresse_liv` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_adresse_liv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_newsletter`
--

DROP TABLE IF EXISTS `client_newsletter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_newsletter` (
  `idcltnewsletter` int(13) NOT NULL AUTO_INCREMENT,
  `idclient` int(13) NOT NULL,
  `newsletter` int(1) NOT NULL,
  PRIMARY KEY (`idcltnewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_newsletter`
--

LOCK TABLES `client_newsletter` WRITE;
/*!40000 ALTER TABLE `client_newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_newsletter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_reservation`
--

DROP TABLE IF EXISTS `client_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_reservation` (
  `idreservation` int(13) NOT NULL AUTO_INCREMENT,
  `num_reservation` varchar(255) NOT NULL,
  `idclient` varchar(255) NOT NULL,
  `etat_reservation` int(1) NOT NULL,
  PRIMARY KEY (`idreservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_reservation`
--

LOCK TABLES `client_reservation` WRITE;
/*!40000 ALTER TABLE `client_reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_reservation_article`
--

DROP TABLE IF EXISTS `client_reservation_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_reservation_article` (
  `idreservationarticle` int(13) NOT NULL AUTO_INCREMENT,
  `num_reservation` varchar(255) NOT NULL,
  `idarticle` int(13) NOT NULL,
  `date_disponible` varchar(255) NOT NULL,
  PRIMARY KEY (`idreservationarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_reservation_article`
--

LOCK TABLES `client_reservation_article` WRITE;
/*!40000 ALTER TABLE `client_reservation_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `client_reservation_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande` (
  `idcommande` int(13) NOT NULL AUTO_INCREMENT,
  `num_commande` varchar(255) NOT NULL,
  `date_commande` varchar(255) NOT NULL,
  `idclient` int(13) NOT NULL,
  `total_commande` varchar(255) NOT NULL,
  `date_livraison` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `statut` int(1) NOT NULL,
  `adresse_fact` varchar(255) NOT NULL,
  `adresse_liv` varchar(255) NOT NULL,
  `methode_livraison` varchar(255) NOT NULL COMMENT 'liaison: config_livraison',
  `methode_paiement` varchar(255) NOT NULL,
  `prix_envoie` varchar(255) NOT NULL,
  PRIMARY KEY (`idcommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande`
--

LOCK TABLES `commande` WRITE;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande_article`
--

DROP TABLE IF EXISTS `commande_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande_article` (
  `idcommandearticle` int(13) NOT NULL AUTO_INCREMENT,
  `num_commande` varchar(255) NOT NULL,
  `idarticle` int(13) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `total_article_commande` varchar(255) NOT NULL,
  PRIMARY KEY (`idcommandearticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande_article`
--

LOCK TABLES `commande_article` WRITE;
/*!40000 ALTER TABLE `commande_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commande_reglement`
--

DROP TABLE IF EXISTS `commande_reglement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commande_reglement` (
  `direglement` int(13) NOT NULL AUTO_INCREMENT,
  `num_commande` varchar(255) NOT NULL,
  `mode_reglement` varchar(255) NOT NULL,
  `date_reglement` varchar(255) NOT NULL,
  `ref_reglement` varchar(255) NOT NULL,
  `montant_reglement` varchar(255) NOT NULL,
  `etat_reglement` int(1) NOT NULL,
  PRIMARY KEY (`direglement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commande_reglement`
--

LOCK TABLES `commande_reglement` WRITE;
/*!40000 ALTER TABLE `commande_reglement` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande_reglement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` longtext NOT NULL,
  `tag_produit` varchar(255) NOT NULL,
  `date_sortie` varchar(255) NOT NULL,
  `prix_vente` varchar(255) NOT NULL,
  `revenue_point` varchar(255) NOT NULL,
  `cout_point` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `stock` int(13) NOT NULL,
  `statut_global` int(1) NOT NULL COMMENT '1: Courant / 2: Précommande / 3: Promotion / 4: Nouveauté',
  `statut_stock` int(1) NOT NULL COMMENT '0: rupture / 1: Réassort / 2: OK / 3: Précommande',
  `date_reassort` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES (1,'PS4TWOMTLO','This War Of Mine The Little Ones','Les histoires de jeunes enfants viennent s\'ajouter au m&eacute;lange de survie et de gestion des personnes et des ressources ','<p>Le cycle des jours et des nuits r&eacute;git le rythme du jeu. Pendant la journ&eacute;e, les tireurs d\'&eacute;lite embusqu&eacute;s vous emp&ecirc;chent de quitter votre refuge. Autrement dit, il vous faut prendre soin d\'un groupe de civils et entretenir votre cachette en fabriquant ce qu\'il faut pour survivre pendant la guerre.</p>\r\n\r\n<p>Pendant la nuit, les joueurs pourront choisir une personne pour partir explorer diff&eacute;rents lieux &agrave; la recherche d\'objets pouvant aider le groupe &agrave; rester en vie. Essayez de prot&eacute;ger tout le monde ou faites des sacrifices pour survivre &agrave; cette &eacute;preuve. Pendant la guerre, oubliez les bonnes et mauvaises d&eacute;cisions, seule la survie compte.</p>\r\n\r\n<div style=\"font-size: 15px; font-weight: bold;\">Principales caract&eacute;ristiques :</div>\r\n<ul>\r\n	<li>Inspir&eacute; d\'&eacute;v&eacute;nements r&eacute;els, sombres, r&eacute;alistes et marquants.</li>\r\n	<li>Dirigez un groupe de civils et aidez-les &agrave; survivre &agrave; la guerre - vos choix affectent chacun d’entre eux.</li>\r\n	<li>Fabriquez des objets : armes, alcool, lits, r&eacute;chauds, jouets et plus.</li>\r\n	<li>Prenez des d&eacute;cisions impitoyables et &agrave; fort impact &eacute;motionnel sur des questions de vie ou de mort. La meilleure d&eacute;cision &agrave; prendre sera parfois aussi la plus difficile.</li>\r\n	<li>Choisissez de jouer avec des personnages et un monde al&eacute;atoires &agrave; chaque nouvelle partie, suivez des sc&eacute;narios pr&eacute;d&eacute;finis ou cr&eacute;ez vos propres sc&eacute;narios et personnages si vous le souhaitez !</li>\r\n	<li>Une esth&eacute;tique stylis&eacute;e fa&ccedil;on charbon pour renforcer l\'atmosph&egrave;re lugubre de la vie r&eacute;elle en temps de guerre.</li>\r\n	<li>Contient l\'exp&eacute;rience du jeu original PLUS le contenu exclusif des jeunes survivants et tout le contenu (DLC) pr&eacute;c&eacute;demment publi&eacute; suite &agrave; la sortie sur PC.</li>\r\n	<li>Des commandes optimis&eacute;es pour les consoles : vous avez maintenant directement le contrôle des survivants.</li>\r\n</ul>\r\n\r\n<p><strong>This War Of Mine: The Little Ones</strong> offre une exp&eacute;rience de la guerre d\'un r&eacute;alisme lugubre, dramatique et suscitant souvent la r&eacute;flexion. Vivez la guerre non pas du point de vue d\'un soldat d\'&eacute;lite, mais plutôt de celui d\'un groupe de civils faisant son possible pour survivre. Confront&eacute;s au manque de nourriture, &agrave; un stock m&eacute;dical limit&eacute; voire &eacute;puis&eacute; et &agrave; la menace constante des dangers environnants, les joueurs devront prendre des d&eacute;cisions vitales pour tenir ne serait-ce qu’un jour de plus.</p>\r\n','','1454025600','29.90','299','1495','twomtlo',0,2,3,''),(2,'PS4NUNS4','Naruto Ultimate Ninja Storm 4','Le studio japonais CyberConnect2, grand fan de l\'anime, a cr&eacute;&eacute; le jeu Naruto et d&eacute;velopp&eacute; exclusivement pour la nouvelle g&eacute;n&eacute;ration de consoles. ','<p>Le studio japonais CyberConnect2, grand fan de l\'anime, a cr&eacute;&eacute; le jeu Naruto et d&eacute;velopp&eacute; exclusivement pour la nouvelle g&eacute;n&eacute;ration de consoles,</p>\r\n\r\n<p><strong>Naruto Shippuden : Ultimate Ninja Storm 4</strong> propose comme toujours des combats nerveux. Gr&acirc;ce au mode multijoueur en duel, vous pourrez d&eacute;fier des joueurs en ligne &agrave; l\'autre bout du monde ou affronter vos amis hors ligne pour devenir le ninja ultime.</p>\r\n\r\n<p>Enfin, l\'&eacute;diteur Bandai Namco Entertainment a pr&eacute;vu d\'int&eacute;grer son nouveau jeu &agrave; sa d&eacute;sormais c&eacute;l&egrave;bre Storm League.</p>\r\n','','1454630400','64.90','649','3245','',0,2,3,'');
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits_bonus`
--

DROP TABLE IF EXISTS `produits_bonus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `designation_bonus` varchar(255) NOT NULL,
  `images_bonus` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits_bonus`
--

LOCK TABLES `produits_bonus` WRITE;
/*!40000 ALTER TABLE `produits_bonus` DISABLE KEYS */;
INSERT INTO `produits_bonus` VALUES (1,'PS4NUNS4','Metal Plate Naruto','PS4NUNS4_MPN'),(2,'PS4NUNS4','Livre Inside Naruto Exclusif','PS4NUNS4_LINE'),(3,'PS4NUNS4','Acc&egrave;s Anticip&eacute; personnages et costumes ! ','PS4NUNS4_AAPC');
/*!40000 ALTER TABLE `produits_bonus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits_caracteristique`
--

DROP TABLE IF EXISTS `produits_caracteristique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits_caracteristique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `editeur` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `multijoueur` varchar(1) NOT NULL,
  `internet` varchar(1) NOT NULL,
  `option` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `cap_hdd` varchar(255) NOT NULL,
  `eth` varchar(1) NOT NULL,
  `wifi` varchar(1) NOT NULL,
  `nb_usb` varchar(255) NOT NULL,
  `compatibilite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits_caracteristique`
--

LOCK TABLES `produits_caracteristique` WRITE;
/*!40000 ALTER TABLE `produits_caracteristique` DISABLE KEYS */;
INSERT INTO `produits_caracteristique` VALUES (1,'PS4TWOMTLO','KOCH MEDIA','Action / Aventure','0','0','','','','0','0','',''),(2,'PS4NSUNS4','BANDAI NAMCO GAMES','Combat','1','1','PlayStation Plus','','','','','','');
/*!40000 ALTER TABLE `produits_caracteristique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits_categorie`
--

DROP TABLE IF EXISTS `produits_categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `idcategorie` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits_categorie`
--

LOCK TABLES `produits_categorie` WRITE;
/*!40000 ALTER TABLE `produits_categorie` DISABLE KEYS */;
INSERT INTO `produits_categorie` VALUES (1,'PS4TWOMTLO',1),(2,'PS4NUNS4',1);
/*!40000 ALTER TABLE `produits_categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits_images`
--

DROP TABLE IF EXISTS `produits_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits_images`
--

LOCK TABLES `produits_images` WRITE;
/*!40000 ALTER TABLE `produits_images` DISABLE KEYS */;
INSERT INTO `produits_images` VALUES (1,'PS4TWOMTLO','PS4TWOMTLO_1'),(2,'PS4TWOMTLO','PS4TWOMTLO_2'),(3,'PS4TWOMTLO','PS4TWOMTLO_3'),(4,'PS4TWOMTLO','PS4TWOMTLO_4'),(5,'PS4TWOMTLO','PS4TWOMTLO_5'),(6,'PS4TWOMTLO','PS4TWOMTLO_6'),(7,'PS4TWOMTLO','PS4TWOMTLO_7'),(8,'PS4TWOMTLO','PS4TWOMTLO_8'),(9,'PS4NUNS4','PS4NUNS4_1'),(10,'PS4NUNS4','PS4NUNS4_2'),(11,'PS4NUNS4','PS4NUNS4_3'),(12,'PS4NUNS4','PS4NUNS4_4'),(13,'PS4NUNS4','PS4NUNS4_5'),(14,'PS4NUNS4','PS4NUNS4_6'),(15,'PS4NUNS4','PS4NUNS4_7'),(16,'PS4NUNS4','PS4NUNS4_8'),(17,'PS4NUNS4','PS4NUNS4_9'),(18,'PS4NUNS4','PS4NUNS4_10'),(19,'PS4NUNS4','PS4NUNS4_11');
/*!40000 ALTER TABLE `produits_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits_promotion`
--

DROP TABLE IF EXISTS `produits_promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits_promotion` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `new_price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits_promotion`
--

LOCK TABLES `produits_promotion` WRITE;
/*!40000 ALTER TABLE `produits_promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `produits_promotion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits_subcategorie`
--

DROP TABLE IF EXISTS `produits_subcategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits_subcategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `idsubcategorie` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits_subcategorie`
--

LOCK TABLES `produits_subcategorie` WRITE;
/*!40000 ALTER TABLE `produits_subcategorie` DISABLE KEYS */;
INSERT INTO `produits_subcategorie` VALUES (1,'PS4TWOMTLO',1),(2,'PS4NUNS4',1);
/*!40000 ALTER TABLE `produits_subcategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits_videos`
--

DROP TABLE IF EXISTS `produits_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `video` longtext NOT NULL,
  `images_video` varchar(255) NOT NULL,
  `title_video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits_videos`
--

LOCK TABLES `produits_videos` WRITE;
/*!40000 ALTER TABLE `produits_videos` DISABLE KEYS */;
INSERT INTO `produits_videos` VALUES (1,'PS4NUNS4','http://video1.cedemo.com/vdo/eb19835ba1c94c65002e8806a9a702e9/5699792b/51586/51586_3000.mp4','',''),(2,'PS4NUNS4','http://video1.cedemo.com/vdo/0d9fc1c8078bf1107614fab83d82ac7b/5699805a/51313/51313_3000.mp4','','');
/*!40000 ALTER TABLE `produits_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_livraison`
--

DROP TABLE IF EXISTS `shop_livraison`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_livraison` (
  `idlivraison` int(13) NOT NULL AUTO_INCREMENT,
  `transporteur` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `jour_liv` varchar(255) NOT NULL,
  PRIMARY KEY (`idlivraison`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_livraison`
--

LOCK TABLES `shop_livraison` WRITE;
/*!40000 ALTER TABLE `shop_livraison` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_livraison` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_vourcher`
--

DROP TABLE IF EXISTS `shop_vourcher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_vourcher` (
  `idvourcher` int(13) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `client` int(1) NOT NULL,
  `idclient` int(13) NOT NULL,
  `percent_rem` varchar(255) NOT NULL,
  `perempsion` varchar(255) NOT NULL,
  PRIMARY KEY (`idvourcher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_vourcher`
--

LOCK TABLES `shop_vourcher` WRITE;
/*!40000 ALTER TABLE `shop_vourcher` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_vourcher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_maintenance`
--

DROP TABLE IF EXISTS `site_maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_maintenance` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `pourquoi` varchar(255) NOT NULL,
  `temps` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_maintenance`
--

LOCK TABLES `site_maintenance` WRITE;
/*!40000 ALTER TABLE `site_maintenance` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategorie`
--

DROP TABLE IF EXISTS `subcategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategorie` int(13) NOT NULL,
  `designation_subcat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategorie`
--

LOCK TABLES `subcategorie` WRITE;
/*!40000 ALTER TABLE `subcategorie` DISABLE KEYS */;
INSERT INTO `subcategorie` VALUES (1,1,'JEUX'),(2,1,'CONSOLES'),(3,1,'ACCESSOIRES'),(4,1,'PLAYSTATION NETWORK'),(5,2,'JEUX'),(6,2,'CONSOLES'),(7,2,'ACCESSOIRES'),(8,2,'PLAYSTATION NETWORK'),(9,3,'JEUX'),(10,3,'CONSOLES'),(11,3,'ACCESSOIRES'),(12,3,'PLAYSTATION NETWORK'),(13,4,'JEUX'),(14,4,'CONSOLES'),(15,4,'ACCESSOIRES'),(16,4,'XBOX LIVE'),(17,5,'JEUX'),(18,5,'CONSOLES'),(19,5,'ACCESSOIRES'),(20,5,'XBOX LIVE'),(21,6,'JEUX'),(22,6,'CONSOLES'),(23,6,'ACCESSOIRES'),(24,7,'JEUX'),(25,7,'CONSOLES'),(26,7,'ACCESSOIRES');
/*!40000 ALTER TABLE `subcategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xbox_activity`
--

DROP TABLE IF EXISTS `xbox_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xbox_activity` (
  `idactivity` int(13) NOT NULL AUTO_INCREMENT,
  `xuid` varchar(255) NOT NULL,
  `startTime` varchar(255) NOT NULL,
  `endTime` varchar(255) NOT NULL,
  `sessionDurationInMinutes` int(13) NOT NULL,
  `contentImageUri` varchar(255) NOT NULL,
  `bingId` varchar(255) NOT NULL,
  `contentTitle` varchar(255) NOT NULL,
  `vuiDisplayName` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`idactivity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xbox_activity`
--

LOCK TABLES `xbox_activity` WRITE;
/*!40000 ALTER TABLE `xbox_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `xbox_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xbox_gamercard`
--

DROP TABLE IF EXISTS `xbox_gamercard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xbox_gamercard` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `gamertag` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `bio` longtext NOT NULL,
  `gamerscore` int(9) NOT NULL,
  `tier` varchar(255) NOT NULL,
  `motto` varchar(255) NOT NULL,
  `avatarBodyImagePath` varchar(255) NOT NULL,
  `gamerpicSmallImagePath` varchar(255) NOT NULL,
  `gamerpicLargeImagePath` varchar(255) NOT NULL,
  `gamerpicSmallSslImagePath` varchar(255) NOT NULL,
  `gamerpicLargeSslImagePath` varchar(255) NOT NULL,
  `avatarManifest` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xbox_gamercard`
--

LOCK TABLES `xbox_gamercard` WRITE;
/*!40000 ALTER TABLE `xbox_gamercard` DISABLE KEYS */;
/*!40000 ALTER TABLE `xbox_gamercard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xbox_presence`
--

DROP TABLE IF EXISTS `xbox_presence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xbox_presence` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `xuid` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xbox_presence`
--

LOCK TABLES `xbox_presence` WRITE;
/*!40000 ALTER TABLE `xbox_presence` DISABLE KEYS */;
/*!40000 ALTER TABLE `xbox_presence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xbox_presence_lastseen`
--

DROP TABLE IF EXISTS `xbox_presence_lastseen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xbox_presence_lastseen` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `xuid` varchar(255) NOT NULL,
  `deviceType` varchar(255) NOT NULL,
  `titleId` int(13) NOT NULL,
  `titleName` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xbox_presence_lastseen`
--

LOCK TABLES `xbox_presence_lastseen` WRITE;
/*!40000 ALTER TABLE `xbox_presence_lastseen` DISABLE KEYS */;
/*!40000 ALTER TABLE `xbox_presence_lastseen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xbox_profile`
--

DROP TABLE IF EXISTS `xbox_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xbox_profile` (
  `id` int(64) NOT NULL AUTO_INCREMENT,
  `xuid` varchar(255) NOT NULL,
  `hostId` varchar(255) NOT NULL,
  `GameDisplayName` varchar(255) NOT NULL,
  `AppDisplayName` varchar(255) NOT NULL,
  `Gamerscore` int(9) NOT NULL,
  `GameDisplayPicRaw` varchar(255) NOT NULL,
  `AppDisplayPicRaw` varchar(255) NOT NULL,
  `AccountTier` varchar(255) NOT NULL,
  `XboxOneRep` varchar(255) NOT NULL,
  `PreferredColor` varchar(255) NOT NULL,
  `TenureLevel` int(9) NOT NULL,
  `isSponsoredUser` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xbox_profile`
--

LOCK TABLES `xbox_profile` WRITE;
/*!40000 ALTER TABLE `xbox_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `xbox_profile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-16  1:08:10

