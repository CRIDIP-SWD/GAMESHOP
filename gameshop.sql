-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 11 Janvier 2016 à 23:59
-- Version du serveur :  5.5.46-0+deb8u1
-- Version de PHP :  5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gameshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
`id` int(13) NOT NULL,
  `designation_cat` varchar(255) NOT NULL,
  `images_cat` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `designation_cat`, `images_cat`) VALUES
(1, 'PS4', 'ps4'),
(2, 'PS3', 'ps3'),
(3, 'XBOX ONE', 'xboxone'),
(4, 'XBOX 360', 'xbox360'),
(5, 'WII U', 'wiiu'),
(6, '3DS', 'nin3ds'),
(7, 'PS VITA', 'psvita'),
(8, 'PRODUITS D&Eacute;RIV&Eacute;S', ''),
(9, 'BOX OFFICE', 'boxoffice');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
`idclient` int(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `pseudo_psn` varchar(255) NOT NULL,
  `pass_psn` varchar(255) NOT NULL,
  `pseudo_xbox` varchar(255) NOT NULL,
  `pseudo_nintendo` varchar(255) NOT NULL,
  `pseudo_steam` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idclient`, `email`, `password`, `nom_client`, `prenom_client`, `pseudo_psn`, `pass_psn`, `pseudo_xbox`, `pseudo_nintendo`, `pseudo_steam`, `point`) VALUES
(1, 'syltheron@gmail.com', '6efab6020faea2dd89e792f6ba83473a6acf1b32', 'MOCKELYN', 'Maxime', 'syltheron@gmail.com', '1992maxime', 'syltheron', '', '76561198000911095', '100'),
(2, 'mmockelyn@gmail.com', '4203873a3c2d3223b47891d6c196588de351b986', 'MOCKELYN', 'DISTRI', 'syltheron@gmail.com', '1992maxime', 'FS BiGouille', '', '', '0');

-- --------------------------------------------------------

--
-- Structure de la table `client_adresse_fact`
--

CREATE TABLE IF NOT EXISTS `client_adresse_fact` (
`idadresse` int(13) NOT NULL,
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
  `default` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client_adresse_fact`
--

INSERT INTO `client_adresse_fact` (`idadresse`, `idclient`, `alias`, `nom`, `prenom`, `societe`, `telephone`, `adresse`, `code_postal`, `ville`, `pays`, `default`) VALUES
(1, 1, 'MAISON', 'MOCKELYN', 'Maxime', '', '0033633134330', '20 Avenue Jean Jaures', '85100', 'Les Sables d Olonne', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `client_adresse_liv`
--

CREATE TABLE IF NOT EXISTS `client_adresse_liv` (
`idadresse` int(13) NOT NULL,
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
  `default` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client_adresse_liv`
--

INSERT INTO `client_adresse_liv` (`idadresse`, `idclient`, `alias`, `nom`, `prenom`, `societe`, `telephone`, `adresse`, `code_postal`, `ville`, `pays`, `default`) VALUES
(1, 1, 'MAISON', 'MOCKELYN', 'Maxime', '', '0033633134330', '20 Avenue Jean Jaures', '85100', 'Les Sables d Olonne', 1, 1),
(4, 1, 'TRAVAIL', 'MOCKELYN', 'Maxime', 'SAS CRIDIP', '0033633134330', '8 rue Octave Voyer', '85100', 'Les Sables d''Olonne', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client_newsletter`
--

CREATE TABLE IF NOT EXISTS `client_newsletter` (
`idcltnewsletter` int(13) NOT NULL,
  `idclient` int(13) NOT NULL,
  `newsletter` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client_reservation`
--

CREATE TABLE IF NOT EXISTS `client_reservation` (
`idreservation` int(13) NOT NULL,
  `num_reservation` varchar(255) NOT NULL,
  `idclient` varchar(255) NOT NULL,
  `etat_reservation` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client_reservation_article`
--

CREATE TABLE IF NOT EXISTS `client_reservation_article` (
`idreservationarticle` int(13) NOT NULL,
  `num_reservation` varchar(255) NOT NULL,
  `idarticle` int(13) NOT NULL,
  `date_disponible` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
`idcommande` int(13) NOT NULL,
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
  `prix_envoie` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idcommande`, `num_commande`, `date_commande`, `idclient`, `total_commande`, `date_livraison`, `destination`, `statut`, `adresse_fact`, `adresse_liv`, `methode_livraison`, `methode_paiement`, `prix_envoie`) VALUES
(2, 'ORD 2015 12 00236', '1449187200', 1, '463.90', '1481846400', 'LSD (FR)', 9, '1', '2', 'LA POSTE', 'Carte de Credit', '9.90');

-- --------------------------------------------------------

--
-- Structure de la table `commande_article`
--

CREATE TABLE IF NOT EXISTS `commande_article` (
`idcommandearticle` int(13) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `idarticle` int(13) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `total_article_commande` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande_article`
--

INSERT INTO `commande_article` (`idcommandearticle`, `num_commande`, `idarticle`, `qte`, `total_article_commande`) VALUES
(3, 'ORD 2015 12 00236', 1, '1', '69.90'),
(4, 'ORD 2015 12 00236', 8, '1', '399');

-- --------------------------------------------------------

--
-- Structure de la table `commande_reglement`
--

CREATE TABLE IF NOT EXISTS `commande_reglement` (
`direglement` int(13) NOT NULL,
  `num_commande` varchar(255) NOT NULL,
  `mode_reglement` varchar(255) NOT NULL,
  `date_reglement` varchar(255) NOT NULL,
  `ref_reglement` varchar(255) NOT NULL,
  `montant_reglement` varchar(255) NOT NULL,
  `etat_reglement` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
`id` int(11) NOT NULL,
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
  `date_reassort` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `ref_produit`, `designation`, `short_description`, `long_description`, `tag_produit`, `date_sortie`, `prix_vente`, `revenue_point`, `cout_point`, `banner`, `stock`, `statut_global`, `statut_stock`, `date_reassort`) VALUES
(10, 'PRECO', 'PRECOMMANDE', 'TEST', '', 'TEST', '1452816000', '120', '120', '120', '', 15000, 2, 3, '1452816000'),
(11, 'PS4NUNS4', 'Naruto Shippuden - Ultimate Ninja Storm 4', '', '', '', '1454630400', '64.90', '435', '2382', 'PS4NUNS4', 0, 2, 3, '');

-- --------------------------------------------------------

--
-- Structure de la table `produits_bonus`
--

CREATE TABLE IF NOT EXISTS `produits_bonus` (
`id` int(11) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `ref_produit_bonus` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits_caracteristique`
--

CREATE TABLE IF NOT EXISTS `produits_caracteristique` (
`id` int(11) NOT NULL,
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
  `compatibilite` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_caracteristique`
--

INSERT INTO `produits_caracteristique` (`id`, `ref_produit`, `editeur`, `genre`, `multijoueur`, `internet`, `option`, `couleur`, `cap_hdd`, `eth`, `wifi`, `nb_usb`, `compatibilite`) VALUES
(10, 'PRECO', '', '', '', '', '', '', '', '', '', '', ''),
(11, 'PS4NUNS4', 'NAMCO BANDAI', 'Action / Aventure', '1', '1', 'Playstation Network', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `produits_categorie`
--

CREATE TABLE IF NOT EXISTS `produits_categorie` (
`id` int(11) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `idcategorie` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_categorie`
--

INSERT INTO `produits_categorie` (`id`, `ref_produit`, `idcategorie`) VALUES
(12, 'PRECO', 1),
(13, 'PS4NUNS4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_images`
--

CREATE TABLE IF NOT EXISTS `produits_images` (
`id` int(11) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits_promotion`
--

CREATE TABLE IF NOT EXISTS `produits_promotion` (
`id` int(13) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `new_price` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits_subcategorie`
--

CREATE TABLE IF NOT EXISTS `produits_subcategorie` (
`id` int(11) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `idsubcategorie` int(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_subcategorie`
--

INSERT INTO `produits_subcategorie` (`id`, `ref_produit`, `idsubcategorie`) VALUES
(12, 'PRECO', 1),
(13, 'PS4NUNS4', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_videos`
--

CREATE TABLE IF NOT EXISTS `produits_videos` (
`id` int(11) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `video` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `shop_livraison`
--

CREATE TABLE IF NOT EXISTS `shop_livraison` (
`idlivraison` int(13) NOT NULL,
  `transporteur` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `jour_liv` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `shop_livraison`
--

INSERT INTO `shop_livraison` (`idlivraison`, `transporteur`, `logo`, `jour_liv`) VALUES
(1, 'LA POSTE COLISSIMO', 'colissimo.png', '3');

-- --------------------------------------------------------

--
-- Structure de la table `shop_vourcher`
--

CREATE TABLE IF NOT EXISTS `shop_vourcher` (
`idvourcher` int(13) NOT NULL,
  `code` varchar(255) NOT NULL,
  `client` int(1) NOT NULL,
  `idclient` int(13) NOT NULL,
  `percent_rem` varchar(255) NOT NULL,
  `perempsion` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `shop_vourcher`
--

INSERT INTO `shop_vourcher` (`idvourcher`, `code`, `client`, `idclient`, `percent_rem`, `perempsion`) VALUES
(1, 'PROMOX20', 1, 1, '25', '1451865600'),
(2, 'MLOF01', 1, 1, '10', '1460419200');

-- --------------------------------------------------------

--
-- Structure de la table `site_maintenance`
--

CREATE TABLE IF NOT EXISTS `site_maintenance` (
`id` int(13) NOT NULL,
  `pourquoi` varchar(255) NOT NULL,
  `temps` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `site_maintenance`
--

INSERT INTO `site_maintenance` (`id`, `pourquoi`, `temps`) VALUES
(1, 'Problème avec l''API PSN', '1452124800');

-- --------------------------------------------------------

--
-- Structure de la table `subcategorie`
--

CREATE TABLE IF NOT EXISTS `subcategorie` (
`id` int(11) NOT NULL,
  `idcategorie` int(13) NOT NULL,
  `designation_subcat` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `subcategorie`
--

INSERT INTO `subcategorie` (`id`, `idcategorie`, `designation_subcat`) VALUES
(1, 1, 'Jeux'),
(2, 1, 'Consoles'),
(3, 1, 'Accessoires'),
(4, 1, 'Playstation Network'),
(5, 2, 'Jeux'),
(6, 2, 'Accessoires'),
(7, 2, 'Playstation Network'),
(8, 3, 'Jeux'),
(9, 3, 'Consoles'),
(10, 3, 'Accessoires'),
(11, 3, 'Xbox Live'),
(12, 4, 'Jeux'),
(13, 4, 'Consoles'),
(14, 4, 'Accessoires'),
(15, 4, 'Xbox Live'),
(16, 5, 'Jeux'),
(17, 5, 'Consoles'),
(18, 5, 'Accessoires'),
(19, 6, 'Jeux'),
(20, 6, 'Consoles'),
(21, 6, 'Accessoires'),
(22, 7, 'Jeux'),
(23, 7, 'Consoles'),
(24, 7, 'Accessoires'),
(25, 7, 'Playstation Network');

-- --------------------------------------------------------

--
-- Structure de la table `xbox_activity`
--

CREATE TABLE IF NOT EXISTS `xbox_activity` (
`idactivity` int(13) NOT NULL,
  `xuid` varchar(255) NOT NULL,
  `startTime` varchar(255) NOT NULL,
  `endTime` varchar(255) NOT NULL,
  `sessionDurationInMinutes` int(13) NOT NULL,
  `contentImageUri` varchar(255) NOT NULL,
  `bingId` varchar(255) NOT NULL,
  `contentTitle` varchar(255) NOT NULL,
  `vuiDisplayName` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `xbox_activity`
--

INSERT INTO `xbox_activity` (`idactivity`, `xuid`, `startTime`, `endTime`, `sessionDurationInMinutes`, `contentImageUri`, `bingId`, `contentTitle`, `vuiDisplayName`, `platform`, `description`) VALUES
(13, '', '', '', 0, '', '', '', '', '', ''),
(134, '2533274989827894', '', '', 0, '', '', '', '', '', ''),
(135, '2533274920778469', '', '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `xbox_gamercard`
--

CREATE TABLE IF NOT EXISTS `xbox_gamercard` (
`id` int(13) NOT NULL,
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
  `avatarManifest` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `xbox_gamercard`
--

INSERT INTO `xbox_gamercard` (`id`, `gamertag`, `name`, `location`, `bio`, `gamerscore`, `tier`, `motto`, `avatarBodyImagePath`, `gamerpicSmallImagePath`, `gamerpicLargeImagePath`, `gamerpicSmallSslImagePath`, `gamerpicLargeSslImagePath`, `avatarManifest`) VALUES
(12, '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(13, '', '', '', '', 0, '', '', '', '', '', '', '', ''),
(134, 'syltheron', 'syltheron', 'Les Sables d''Olonne, Vend&eacute;e, FRANCE', '', 4214, 'Silver', '', 'http://avatar.xboxlive.com/avatar/syltheron/avatar-body.png', 'http://image.xboxlive.com/global/t.fffe07d1/tile/0/10008', 'http://image.xboxlive.com/global/t.fffe07d1/tile/0/20008', 'https://image-ssl.xboxlive.com/global/t.fffe07d1/tile/0/10008', 'https://image-ssl.xboxlive.com/global/t.fffe07d1/tile/0/20008', 'AAAAAL8AAAAAAAAAABAAAAMhAAPByPEJoZyy4AAIAAADLwADwcjxCaGcsuAAIAAAAzwAA8HI8QmhnLLgAACAAAL6AAPByPEJoZyy4AAAAAAAAAAAAAAAAAAAAAAAACAAAsYAA8HI8QmhnLLgAAAAAAAAAAAAAAAAAAAAAAAAQAACZAADwcjxCaGcsuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/8eYTP8NDQ3/XDss/4JQHf8NDQ3//////w0NDf9/OXn/fzl5AAAAAgAAAAHByPEJoZyy4AACAAAAAAAAAAAAAAAAAAAAAAABAAIAA8HI8QmhnLLgAAEAAAAAAAAAAAAAAAAAAAAAAAQBsAADwcjxCaGcsuAABAAAAAAAAAAAAAAAAAAAAAABAADLAAHByPEJoZyy4AEAAAAAAAAAAAAAAAAAAAAAgAI4AK0AAcHI8QmhnLLgAjgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAA3AAHByPEJoZyy4AAgAAAAAAAAAAAAAAAAAAAAAAAQAKcAAcHI8QmhnLLgABAAAAAAAAAAAAAAAAAAAAAAAAgAYAABwcjxCaGcsuAACAAAAAAAAAAAAAAAAAAAAAAABAGwAAPByPEJoZyy4AAEAAAAAAAAAAAAAAAAAAAAAAAAADYX4wsAAAkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=='),
(135, 'FS BiGouille', 'BIGOUILLE', '', '', 4910, 'Gold', 'C CHAUD MA GUEULE!!', 'http://avatar.xboxlive.com/avatar/FS%20BiGouille/avatar-body.png', 'http://avatar.xboxlive.com/avatar/FS%20BiGouille/avatarpic-s.png', 'http://avatar.xboxlive.com/avatar/FS%20BiGouille/avatarpic-l.png', 'https://avatar-ssl.xboxlive.com/avatar/FS%20BiGouille/avatarpic-s.png', 'https://avatar-ssl.xboxlive.com/avatar/FS%20BiGouille/avatarpic-l.png', 'AAAAAL8AAAA/gAAAABAAAAMeAAPByPEJoZyy4AAIAAADLwADwcjxCaGcsuAAIAAAAzwAA8HI8QmhnLLgAACAAALqAAPByPEJoZyy4AAAAAAAAAAAAAAAAAAAAAAAACAAAnoAA8HI8QmhnLLgAAAAAAAAAAAAAAAAAAAAAAAAQAACbwADwcjxCaGcsuAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA/+Opdv8NDQ3/78KL/5Kyyv9uUyb/4G4y/x8SC///////qh0mAAAAAgAAAAHByPEJoZyy4AACAAAAAAAAAAAAAAAAAAAAAAABAAIAA8HI8QmhnLLgAAEAAAAAAAAAAAAAAAAAAAAAAAQCUwADwcjxCaGcsuAABAAAAAAAAAAAAAAAAAAAAAACCABCAAHByPEJoZyy4AIIAAAAAAAAAAAAAAAAAAAAAAAQA88AAcHI8QmhnLLgABAAAAAAAAAAAAAAAAAAAAAAAEAA6QABwcjxCaGcsuAAQAAAAAAAAAAAAAAAAAAAAAABAADGAAHByPEJoZyy4AEAAAAAAAAAAAAAAAAAAAAAAAiAALMAAcHI8QmhnLLgCIAAAAAAAAAAAAAAAAAAAAAABAAE9QABwcjxCaGcsuAEAAAAAAAAAAAAAAAAAAAAAAAAIAA5AAHByPEJoZyy4AAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAIAA5AAHByPEJoZyy4AAgAAAAAAAAAAAAAAAAAAAAAAAQA88AAcHI8QmhnLLgABAAAAAAAAAAAAAAAAAAAAAAAAgAbgABwcjxCaGcsuAACAAAAAAAAAAAAAAAAAAAAAAABAJTAAPByPEJoZyy4AAEAAAAAAAAAAAAAAAAAADgAA1D2CWgiQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==');

-- --------------------------------------------------------

--
-- Structure de la table `xbox_presence`
--

CREATE TABLE IF NOT EXISTS `xbox_presence` (
`id` int(13) NOT NULL,
  `xuid` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `xbox_presence`
--

INSERT INTO `xbox_presence` (`id`, `xuid`, `state`) VALUES
(13, '', ''),
(134, '2533274989827894', 'Offline'),
(135, '2533274920778469', 'Offline');

-- --------------------------------------------------------

--
-- Structure de la table `xbox_presence_lastseen`
--

CREATE TABLE IF NOT EXISTS `xbox_presence_lastseen` (
`id` int(13) NOT NULL,
  `xuid` varchar(255) NOT NULL,
  `deviceType` varchar(255) NOT NULL,
  `titleId` int(13) NOT NULL,
  `titleName` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `xbox_presence_lastseen`
--

INSERT INTO `xbox_presence_lastseen` (`id`, `xuid`, `deviceType`, `titleId`, `titleName`, `timestamp`) VALUES
(13, '', '', 0, '', ''),
(134, '2533274989827894', 'Xbox360', 960956369, 'Netflix', '2016-01-08T12:37:26.8269089Z'),
(135, '2533274920778469', 'XboxOne', 714681658, 'Home', '2015-12-27T12:55:38.2539217Z');

-- --------------------------------------------------------

--
-- Structure de la table `xbox_profile`
--

CREATE TABLE IF NOT EXISTS `xbox_profile` (
`id` int(64) NOT NULL,
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
  `isSponsoredUser` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `xbox_profile`
--

INSERT INTO `xbox_profile` (`id`, `xuid`, `hostId`, `GameDisplayName`, `AppDisplayName`, `Gamerscore`, `GameDisplayPicRaw`, `AppDisplayPicRaw`, `AccountTier`, `XboxOneRep`, `PreferredColor`, `TenureLevel`, `isSponsoredUser`) VALUES
(3, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(4, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(5, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(6, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(7, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(8, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(9, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(10, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(11, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(12, '', '', '', '', 0, '', '', '', '', '', 0, ''),
(13, '', '', '', '', 0, '', '', '', '', '', 0, ''),
(14, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(15, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(16, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(17, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(18, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(19, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(20, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(21, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(22, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(23, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(24, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(25, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(26, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(27, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(28, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(29, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(30, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(31, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(32, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(33, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(34, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(35, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(36, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(37, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(38, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(39, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(40, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(41, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(42, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(43, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(44, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(45, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(46, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(47, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(48, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(49, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(50, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(51, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(52, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(53, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(54, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(55, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(56, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(57, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(58, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(59, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(60, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(61, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(62, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(63, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(64, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(65, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(66, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(67, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(68, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(69, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(70, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(71, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(72, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(73, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(74, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(75, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(76, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(77, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(78, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(79, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(80, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(81, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(82, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(83, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(84, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(85, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(86, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(87, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(88, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(89, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(90, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(91, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(92, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(93, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(94, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(95, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(96, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(97, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, '');
INSERT INTO `xbox_profile` (`id`, `xuid`, `hostId`, `GameDisplayName`, `AppDisplayName`, `Gamerscore`, `GameDisplayPicRaw`, `AppDisplayPicRaw`, `AccountTier`, `XboxOneRep`, `PreferredColor`, `TenureLevel`, `isSponsoredUser`) VALUES
(98, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(99, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(100, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(101, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(102, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(103, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(104, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(105, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(106, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(107, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(108, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(109, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(110, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(111, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(112, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(113, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(114, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(115, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(116, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(117, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(118, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(119, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(120, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(121, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(122, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(123, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(124, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(125, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(126, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(127, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(128, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(129, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(130, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(131, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(132, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(133, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, ''),
(134, '2533274989827894', '', 'syltheron', 'syltheron', 4214, 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=mHGRD8KXEf2sp2LC58XhBQKNl2IWRp.J.q8mSURKUUeQDtobyN5xmswIs1qggzrwnOY88S_mtORuTfizqf2K3HvhzGdn0oKpklQmrJULJUw-&background=0xababab&format=png', 'Silver', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00000.json ', 0, ''),
(135, '2533274920778469', '', 'FS BiGouille', 'FS BiGouille', 4910, 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'http://images-eds.xboxlive.com/image?url=rwljod2fPqLqGP3DBV9F_yK9iuxAt3_MH6tcOnQXTc._j_4ink7D7LIOBE.BNF7VRYiFwK2t0yJVz0YgHDxr_2oC5Gqm0ZPUBgipj442EfY-&background=0xababab&format=png', 'Gold', 'GoodPlayer', 'http://dlassets.xboxlive.com/public/content/ppl/colors/00016.json', 3, '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`idclient`);

--
-- Index pour la table `client_adresse_fact`
--
ALTER TABLE `client_adresse_fact`
 ADD PRIMARY KEY (`idadresse`);

--
-- Index pour la table `client_adresse_liv`
--
ALTER TABLE `client_adresse_liv`
 ADD PRIMARY KEY (`idadresse`);

--
-- Index pour la table `client_newsletter`
--
ALTER TABLE `client_newsletter`
 ADD PRIMARY KEY (`idcltnewsletter`);

--
-- Index pour la table `client_reservation`
--
ALTER TABLE `client_reservation`
 ADD PRIMARY KEY (`idreservation`);

--
-- Index pour la table `client_reservation_article`
--
ALTER TABLE `client_reservation_article`
 ADD PRIMARY KEY (`idreservationarticle`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`idcommande`);

--
-- Index pour la table `commande_article`
--
ALTER TABLE `commande_article`
 ADD PRIMARY KEY (`idcommandearticle`);

--
-- Index pour la table `commande_reglement`
--
ALTER TABLE `commande_reglement`
 ADD PRIMARY KEY (`direglement`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_bonus`
--
ALTER TABLE `produits_bonus`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_caracteristique`
--
ALTER TABLE `produits_caracteristique`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_categorie`
--
ALTER TABLE `produits_categorie`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_images`
--
ALTER TABLE `produits_images`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_promotion`
--
ALTER TABLE `produits_promotion`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_subcategorie`
--
ALTER TABLE `produits_subcategorie`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produits_videos`
--
ALTER TABLE `produits_videos`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shop_livraison`
--
ALTER TABLE `shop_livraison`
 ADD PRIMARY KEY (`idlivraison`);

--
-- Index pour la table `shop_vourcher`
--
ALTER TABLE `shop_vourcher`
 ADD PRIMARY KEY (`idvourcher`);

--
-- Index pour la table `site_maintenance`
--
ALTER TABLE `site_maintenance`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subcategorie`
--
ALTER TABLE `subcategorie`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `xbox_activity`
--
ALTER TABLE `xbox_activity`
 ADD PRIMARY KEY (`idactivity`);

--
-- Index pour la table `xbox_gamercard`
--
ALTER TABLE `xbox_gamercard`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `xbox_presence`
--
ALTER TABLE `xbox_presence`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `xbox_presence_lastseen`
--
ALTER TABLE `xbox_presence_lastseen`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `xbox_profile`
--
ALTER TABLE `xbox_profile`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
MODIFY `id` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
MODIFY `idclient` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `client_adresse_fact`
--
ALTER TABLE `client_adresse_fact`
MODIFY `idadresse` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `client_adresse_liv`
--
ALTER TABLE `client_adresse_liv`
MODIFY `idadresse` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `client_newsletter`
--
ALTER TABLE `client_newsletter`
MODIFY `idcltnewsletter` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client_reservation`
--
ALTER TABLE `client_reservation`
MODIFY `idreservation` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client_reservation_article`
--
ALTER TABLE `client_reservation_article`
MODIFY `idreservationarticle` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
MODIFY `idcommande` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commande_article`
--
ALTER TABLE `commande_article`
MODIFY `idcommandearticle` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commande_reglement`
--
ALTER TABLE `commande_reglement`
MODIFY `direglement` int(13) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `produits_bonus`
--
ALTER TABLE `produits_bonus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produits_caracteristique`
--
ALTER TABLE `produits_caracteristique`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `produits_categorie`
--
ALTER TABLE `produits_categorie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `produits_images`
--
ALTER TABLE `produits_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `produits_promotion`
--
ALTER TABLE `produits_promotion`
MODIFY `id` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `produits_subcategorie`
--
ALTER TABLE `produits_subcategorie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `produits_videos`
--
ALTER TABLE `produits_videos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `shop_livraison`
--
ALTER TABLE `shop_livraison`
MODIFY `idlivraison` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `shop_vourcher`
--
ALTER TABLE `shop_vourcher`
MODIFY `idvourcher` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `site_maintenance`
--
ALTER TABLE `site_maintenance`
MODIFY `id` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `subcategorie`
--
ALTER TABLE `subcategorie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `xbox_activity`
--
ALTER TABLE `xbox_activity`
MODIFY `idactivity` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT pour la table `xbox_gamercard`
--
ALTER TABLE `xbox_gamercard`
MODIFY `id` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT pour la table `xbox_presence`
--
ALTER TABLE `xbox_presence`
MODIFY `id` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT pour la table `xbox_presence_lastseen`
--
ALTER TABLE `xbox_presence_lastseen`
MODIFY `id` int(13) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
--
-- AUTO_INCREMENT pour la table `xbox_profile`
--
ALTER TABLE `xbox_profile`
MODIFY `id` int(64) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=136;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
