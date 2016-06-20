-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 28 Janvier 2016 à 19:35
-- Version du serveur: 5.5.46
-- Version de PHP: 5.4.45-0+deb7u2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gameshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `designation_cat` varchar(255) NOT NULL,
  `images_cat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `designation_cat`, `images_cat`) VALUES
(1, 'PS4', 'ps4'),
(2, 'PS3', 'ps3'),
(3, 'PS VITA', 'psvita'),
(4, 'XBOX ONE', 'xboxone'),
(5, 'XBOX 360', 'xbox360'),
(6, 'WII U', 'wiiu'),
(7, 'NINTENDO 3DS', 'nin3ds'),
(13, 'PS2', 'PS2');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(13) NOT NULL AUTO_INCREMENT,
  `groupe` int(1) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idclient`, `groupe`, `email`, `password`, `nom_client`, `prenom_client`, `pseudo_psn`, `pass_psn`, `pseudo_xbox`, `pseudo_nintendo`, `pseudo_steam`, `point`) VALUES
(1, 1, 'mmockelyn@gmail.com', '25d95d7979a1542d581f79867ceb9175112272e2', 'MOCKELYN', 'Maxime', 'syltheron@gmail.com', '1992maxime', 'syltheron', '', '76561198000911095', '1298'),
(2, 0, 'syltheron@gmail.com', '82780b864bce040a3f8111f02e477f9c91802a94', 'PIOT', 'Maxime', '', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Structure de la table `client_adresse_fact`
--

CREATE TABLE IF NOT EXISTS `client_adresse_fact` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `client_adresse_fact`
--

INSERT INTO `client_adresse_fact` (`idadresse`, `idclient`, `alias`, `nom`, `prenom`, `societe`, `telephone`, `adresse`, `code_postal`, `ville`, `pays`, `default`) VALUES
(1, 1, 'Ma Maison', 'MOCKELYN', 'Maxime', '', '0633134330', '20 Avenue Jean Jaures', '85100', 'Les Sables d Olonne', 1, 1),
(2, 1, 'Travail', 'MOCKELYN', 'Maxime', 'SAS CRIDIP', '0972450239', '8 Rue Octave Voyer', '85100', 'Les Sables d Olonne', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client_adresse_liv`
--

CREATE TABLE IF NOT EXISTS `client_adresse_liv` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `client_adresse_liv`
--

INSERT INTO `client_adresse_liv` (`idadresse`, `idclient`, `alias`, `nom`, `prenom`, `societe`, `telephone`, `adresse`, `code_postal`, `ville`, `pays`, `default`) VALUES
(1, 1, 'Ma Maison', 'MOCKELYN', 'Maxime', '', '0633134330', '20 Avenue Jean Jaures', '85100', 'Les Sables d Olonne', 1, 1),
(4, 1, 'Travail', 'MOCKELYN', 'Maxime', 'SAS CRIDIP', '0972450239', '8 Rue Octave Voyer', '85100', 'Les Sables d Olonne', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `client_newsletter`
--

CREATE TABLE IF NOT EXISTS `client_newsletter` (
  `idcltnewsletter` int(13) NOT NULL AUTO_INCREMENT,
  `idclient` int(13) NOT NULL,
  `newsletter` int(1) NOT NULL,
  PRIMARY KEY (`idcltnewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client_reservation`
--

CREATE TABLE IF NOT EXISTS `client_reservation` (
  `idreservation` int(13) NOT NULL AUTO_INCREMENT,
  `num_reservation` varchar(255) NOT NULL,
  `idclient` varchar(255) NOT NULL,
  `etat_reservation` int(1) NOT NULL,
  PRIMARY KEY (`idreservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client_reservation_article`
--

CREATE TABLE IF NOT EXISTS `client_reservation_article` (
  `idreservationarticle` int(13) NOT NULL AUTO_INCREMENT,
  `num_reservation` varchar(255) NOT NULL,
  `idarticle` int(13) NOT NULL,
  `date_disponible` varchar(255) NOT NULL,
  PRIMARY KEY (`idreservationarticle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idcommande`, `num_commande`, `date_commande`, `idclient`, `total_commande`, `date_livraison`, `destination`, `statut`, `adresse_fact`, `adresse_liv`, `methode_livraison`, `methode_paiement`, `prix_envoie`) VALUES
(23, 'CMD5827244', '1453604700', 1, '99.8', '1453950300', 'France', 3, '', '20 Avenue Jean Jaures,<br> 85100 Les Sables d Olonne', 'LA POSTE', 'VIREMENT BANCAIRE', '8.5');

-- --------------------------------------------------------

--
-- Structure de la table `commande_article`
--

CREATE TABLE IF NOT EXISTS `commande_article` (
  `idcommandearticle` int(13) NOT NULL AUTO_INCREMENT,
  `num_commande` varchar(255) NOT NULL,
  `ref_produit` varchar(255) NOT NULL,
  `qte` varchar(255) NOT NULL,
  `total_article_commande` varchar(255) NOT NULL,
  PRIMARY KEY (`idcommandearticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `commande_article`
--

INSERT INTO `commande_article` (`idcommandearticle`, `num_commande`, `ref_produit`, `qte`, `total_article_commande`) VALUES
(37, 'CMD5827244', 'PS4UTNDC', '1', '59.9'),
(38, 'CMD5827244', 'PS4REOC', '1', '39.9');

-- --------------------------------------------------------

--
-- Structure de la table `commande_reglement`
--

CREATE TABLE IF NOT EXISTS `commande_reglement` (
  `idreglement` int(13) NOT NULL AUTO_INCREMENT,
  `num_commande` varchar(255) NOT NULL,
  `mode_reglement` varchar(255) NOT NULL,
  `date_reglement` varchar(255) NOT NULL,
  `ref_reglement` varchar(255) NOT NULL,
  `montant_reglement` varchar(255) NOT NULL,
  `etat_reglement` int(1) NOT NULL,
  PRIMARY KEY (`idreglement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `commande_reglement`
--

INSERT INTO `commande_reglement` (`idreglement`, `num_commande`, `mode_reglement`, `date_reglement`, `ref_reglement`, `montant_reglement`, `etat_reglement`) VALUES
(9, 'CMD5827244', 'VIREMENT BANCAIRE', '1453604757', 'VIRREF533396564', '108.3', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
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
  `poids` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `ref_produit`, `designation`, `short_description`, `long_description`, `tag_produit`, `date_sortie`, `prix_vente`, `revenue_point`, `cout_point`, `banner`, `stock`, `statut_global`, `statut_stock`, `date_reassort`, `poids`) VALUES
(1, 'PS4TWOMTLO', 'This War Of Mine The Little Ones', 'Les histoires de jeunes enfants viennent s''ajouter au mélange de survie et de gestion des personnes et des ressources ', '<p>Le cycle des jours et des nuits r&eacute;git le rythme du jeu. Pendant la journ&eacute;e, les tireurs d''&eacute;lite embusqu&eacute;s vous emp&ecirc;chent de quitter votre refuge. Autrement dit, il vous faut prendre soin d''un groupe de civils et entretenir votre cachette en fabriquant ce qu''il faut pour survivre pendant la guerre.</p>\r\n\r\n<p>Pendant la nuit, les joueurs pourront choisir une personne pour partir explorer diff&eacute;rents lieux &agrave; la recherche d''objets pouvant aider le groupe &agrave; rester en vie. Essayez de prot&eacute;ger tout le monde ou faites des sacrifices pour survivre &agrave; cette &eacute;preuve. Pendant la guerre, oubliez les bonnes et mauvaises d&eacute;cisions, seule la survie compte.</p>\r\n\r\n<div style="font-size: 15px; font-weight: bold;">Principales caract&eacute;ristiques :</div>\r\n<ul>\r\n	<li>Inspir&eacute; d''&eacute;v&eacute;nements r&eacute;els, sombres, r&eacute;alistes et marquants.</li>\r\n	<li>Dirigez un groupe de civils et aidez-les &agrave; survivre &agrave; la guerre - vos choix affectent chacun d’entre eux.</li>\r\n	<li>Fabriquez des objets : armes, alcool, lits, r&eacute;chauds, jouets et plus.</li>\r\n	<li>Prenez des d&eacute;cisions impitoyables et &agrave; fort impact &eacute;motionnel sur des questions de vie ou de mort. La meilleure d&eacute;cision &agrave; prendre sera parfois aussi la plus difficile.</li>\r\n	<li>Choisissez de jouer avec des personnages et un monde al&eacute;atoires &agrave; chaque nouvelle partie, suivez des sc&eacute;narios pr&eacute;d&eacute;finis ou cr&eacute;ez vos propres sc&eacute;narios et personnages si vous le souhaitez !</li>\r\n	<li>Une esth&eacute;tique stylis&eacute;e fa&ccedil;on charbon pour renforcer l''atmosph&egrave;re lugubre de la vie r&eacute;elle en temps de guerre.</li>\r\n	<li>Contient l''exp&eacute;rience du jeu original PLUS le contenu exclusif des jeunes survivants et tout le contenu (DLC) pr&eacute;c&eacute;demment publi&eacute; suite &agrave; la sortie sur PC.</li>\r\n	<li>Des commandes optimis&eacute;es pour les consoles : vous avez maintenant directement le contrôle des survivants.</li>\r\n</ul>\r\n\r\n<p><strong>This War Of Mine: The Little Ones</strong> offre une exp&eacute;rience de la guerre d''un r&eacute;alisme lugubre, dramatique et suscitant souvent la r&eacute;flexion. Vivez la guerre non pas du point de vue d''un soldat d''&eacute;lite, mais plutôt de celui d''un groupe de civils faisant son possible pour survivre. Confront&eacute;s au manque de nourriture, &agrave; un stock m&eacute;dical limit&eacute; voire &eacute;puis&eacute; et &agrave; la menace constante des dangers environnants, les joueurs devront prendre des d&eacute;cisions vitales pour tenir ne serait-ce qu’un jour de plus.</p>\r\n', '', '1454025600', '29.9', '299', '1495', 'twomtlo', 0, 2, 3, '', '1'),
(2, 'PS4NUNS4', 'Naruto Ultimate Ninja Storm 4', 'Le studio japonais CyberConnect2, grand fan de l''anime, a créé le jeu Naruto et développé exclusivement pour la nouvelle génération de consoles. ', '<p>Le studio japonais CyberConnect2, grand fan de l''anime, a cr&eacute;&eacute; le jeu Naruto et d&eacute;velopp&eacute; exclusivement pour la nouvelle g&eacute;n&eacute;ration de consoles,</p>\r\n\r\n<p><strong>Naruto Shippuden : Ultimate Ninja Storm 4</strong> propose comme toujours des combats nerveux. Gr&acirc;ce au mode multijoueur en duel, vous pourrez d&eacute;fier des joueurs en ligne &agrave; l''autre bout du monde ou affronter vos amis hors ligne pour devenir le ninja ultime.</p>\r\n\r\n<p>Enfin, l''&eacute;diteur Bandai Namco Entertainment a pr&eacute;vu d''int&eacute;grer son nouveau jeu &agrave; sa d&eacute;sormais c&eacute;l&egrave;bre Storm League.</p>\r\n', '', '1454630400', '64.9', '649', '3245', '', 0, 2, 3, '', '2.50'),
(3, 'PS4UTNDC', 'Uncharted The Nathan Drake Collection', 'Les trois premiers épisodes de la saga Uncharted sont là dans une version remasterisée en 1080p / 60 fps.', '<h1>DESCRIPTION</h1>\r\n<p>Uncharted The Nathan Drake Collection</p>\r\n<p>Les trois premiers &eacute;pisodes de la saga Uncharted sont l&agrave; dans une version remasteris&eacute;e en 1080p / 60 fps.</p>\r\n<p>C''est bien l&agrave; le meilleur moyen de red&eacute;couvrir ou de d&eacute;couvrir les premi&egraveres aventures de Drake dans les meilleures conditions possibles et ainsi pouvoir ensuite passer &agrave; la version PlayStation 4.</p>\r\n<p>Cette collection inclut, un acc&egraves &agrave; la b&ecircta multijoueur d''<strong>Uncharted 4</strong>.</p>\r\n<ul>\r\n	<li><strong>Uncharted : Drake''s Fortune</strong></li>\r\n	<li><strong>Uncharted 2 : Among Thieves</strong></li>\r\n	<li><strong>Uncharted 3 : L''Illusion de Drake</strong></li>\r\n	<li>Un acc&egraves &agrave; la <strong>B&ecircta Multijoueurs d''<div class="text-danger">Uncharted 4: A Thief''s End.</div></strong></li>\r\n	<li>Un <strong>mode photo</strong></li>\r\n</ul>\r\n<br>\r\n<hr />\r\n<br>\r\n<h1>TEST</h1>\r\nNote globale : <h1><strong>4/5</strong></h1>\r\n\r\n\r\n<strong>Les Plus :</strong>\r\n<ul>\r\n	<li>Tout Uncharted avant l’arriv&eacute;e du 4</li>\r\n	<li>Des jeux qui restent efficaces</li>\r\n	<li>Une bonne dur&eacute;e de vie</li>\r\n</ul>\r\n\r\n<strong>Les Moins :</strong>\r\n<ul>\r\n	<li>Un simple upscaling</li>\r\n	<li>Des d&eacute;fauts de gameplay non corrig&eacute;s</li>\r\n	<li>Adieu, le Multijoueur</li>\r\n	<li>Un portage fain&eacute;ant</li>\r\n</ul>\r\n\r\n<h2>Avis de la r&eacute;daction</h2>\r\n<strong>&agrave; qui s’adresse ce jeu ?</strong>\r\n<ul>\r\n	<li>Aux joueurs &agrave; partir de 16 ans</li>\r\n	<li>&agrave; ceux qui avaient rat&eacute; la saga sur PS3</li>\r\n	<li>Aux fans qui se moquent du Multijoueur</li>\r\n</ul>\r\n\r\n<strong>Vous aimerez si vous avez aim&eacute; :</strong>\r\n<ul>\r\n	<li>Les pr&eacute;c&eacute;dents Uncharted sur PS3</li>\r\n	<li>Tomb Raider</li>\r\n</ul>\r\n\r\n', '', '1444176000', '59.9', '399', '1397', 'PS4UTNDC', 0, 1, 1, '1454284800', '1'),
(4, 'PS4500B_DLC', 'Pack PS4 500 Go Noire + Destiny : Le Roi Des Corrompus Edition Légendaire', 'Le pack qui c&eacute;l&egrave;bre toutes les Gardiennes et les Gardiens de la Terre !', '<p>Le pack <strong>PS4 500 Go Noire + Destiny : Le Roi des Corrompus Edition L&eacute;gendaire</strong> comprend :</p>\r\n<ul>\r\n	<li>Console PS4 500 Go Noire</li>\r\n	<li>Le jeu Destiny : Le Roi des Corrompus Edition L&eacute;gendaire (code pour t&eacute;l&eacute;charger le Roi des Corrompus).</li>\r\n	<li>1 manette Dualshock 4 Noire</li>\r\n	<li>Un câble HDMI</li>\r\n	<li>Un câble USB</li>\r\n	<li>Alimentation</li>\r\n	<li>Oreillette-micro mono</li>\r\n</ul>\r\n\r\n<strong>La console</strong>\r\n<ul>\r\n	<li>Disque dur 500 Go</li>\r\n	<li>Lecteur Blu-ray (DVD)</li>\r\n	<li>Poids : 2,8 Kg</li>\r\n	<li>Dimension : 275×53×305 mm</li>\r\n	<li>2 ports USB 3.0</li>\r\n	<li>Port HDMI</li>\r\n	<li>Ethernet, Wi-Fi, Bluetooth, Digital Out (optique), Auxiliaire (x1)</li>\r\n</ul>\r\n\r\n<strong>Centr&eacute; sur les joueurs, inspir&eacute; par les d&eacute;veloppeurs</strong>\r\n\r\n<p>Le syst&egrave;me PS4 est con&ccedil;ue pour offrir aux joueurs PlayStation les meilleurs jeux et les exp&eacute;riences les plus immersives. Pens&eacute;e pour r&eacute;pondre &agrave; leurs besoins, la PS4 permet aussi aux plus grands d&eacute;veloppeurs de jeux du monde de laisser libre cours &agrave; leur cr&eacute;ativit&eacute;.</p>\r\n\r\n<p>La PS4 connecte &eacute;galement le joueur de mani&egrave;re fluide au vaste monde d?''exp&eacute;riences de PlayStation &agrave; travers le syst&egrave;me et les espaces mobiles, ainsi que PlayStation Network (PSN).</p>\r\n\r\n<p>L''?architecture du syst&egrave;me PS4 se distingue par ses hautes performances et sa facilit&eacute; de d&eacute;veloppement. Elle repose sur une puissante puce modifi&eacute;e &agrave; huit coeurs x86-64 et un processeur graphique de pointe.</p>\r\n\r\n<p>La PS4 est dot&eacute; de 8 Go de m&eacute;moire syst&egrave;me unifi&eacute;e facilitant la cr&eacute;ation de jeux et augmentant la richesse de contenu possible sur la plateforme. La m&eacute;moire est de type GDDR5. Elle offre au syst&egrave;me une bande passante de 176 Go/seconde et accroît encore sa performance graphique.</p>\r\n\r\n<p>Pour les joueurs, le tout se traduit par des graphismes haute-fid&eacute;lit&eacute; d&eacute;taill&eacute;s et une exp&eacute;rience de jeu immersive au-del&agrave; de toute esp&eacute;rance.</p>\r\n\r\n<strong>Exp&eacute;riences de jeu partag&eacute;es</strong>\r\n<ul>\r\n	<li>Les interactions sociales sont au c?oeur des exp&eacute;riences PS4.</li>\r\n	<li>Dot&eacute; d?''un syst&egrave;me de compression et d&eacute;compression vid&eacute;o d&eacute;di&eacute; permanent qui permet de t&eacute;l&eacute;charger instantan&eacute;ment des vid&eacute;os de jeu.</li>\r\n	<li>Les joueurs peuvent partager leurs victoires &eacute;piques d?un simple geste. Il suffit d''?appuyer sur la touche « SHARE » (partager) de la manette, scanner les derni&egrave;res minutes de jeu, les annoter et reprendre la partie.</li>\r\n	<li>Les joueurs peuvent lier leur compte Facebook &agrave; leur compte Sony Entertainment Network. Les utilisateurs peuvent d&eacute;velopper leurs connexions en jouant en coop&eacute;ration ou en dialoguant via l''?espace de discussion Cross-game.</li>\r\n</ul>\r\n\r\n<strong>&eacute;crans secondaires PS4?</strong>\r\n<ul>\r\n	<li>Prise en charge des &eacute;crans secondaires, comme le syst&egrave;me PS Vita, les smartphones et les tablettes, pour permettre aux joueurs d?''emporter leurs contenus favoris où qu?''ils aillent. Les joueurs peuvent ainsi porter leurs jeux PS4 sur leur PS Vita.</li>\r\n	<li>Une nouvelle application de SCE appel&eacute;e « PlayStation App » permettra aux appareils iPhone, iPad, smartphones et tablettes AndroidTM de devenir des &eacute;crans secondaires.</li>\r\n</ul>\r\n\r\n<strong>Jeu imm&eacute;diat</strong>\r\n<ul>\r\n<li>La PS4 r&eacute;duit consid&eacute;rablement la latence s&eacute;parant les joueurs de leurs contenus. Elle int&egrave;gre une fonctionnalit&eacute; de « suspend mode » (suspens) qui la maintient en &eacute;tat de veille tout en pr&eacute;servant la session de jeu. Le temps aujourd?''hui n&eacute;cessaire pour d&eacute;marrer le syst&egrave;me et charger une partie sauvegard&eacute;e appartiendra bientôt au pass&eacute;. Le joueur appuie sur la touche d''?alimentation et retrouve instantan&eacute;ment sa partie l&agrave; où il l''?avait quitt&eacute;e. De plus, l?''utilisateur peut lancer plusieurs applications, dont un navigateur internet, alors qu?''il joue &agrave; un jeu sur PS4.</li>\r\n</ul>\r\n\r\n<p>Le syst&egrave;me PS4 permet &eacute;galement de t&eacute;l&eacute;charger ou de mettre &agrave; jour des jeux en tâche de fond ou en veille. Il va m&ecircme encore plus loin en offrant la possibilit&eacute; de jouer &agrave; un jeu num&eacute;rique alors qu''?il est en cours de t&eacute;l&eacute;chargement.</p>\r\n\r\n<strong>Du contenu cibl&eacute; et personnalis&eacute;</strong>\r\n<ul>\r\n	<li>Grâce aux nouveaux menus, le joueur peut parcourir les informations li&eacute;es aux jeux partag&eacute;es par ses amis, regarder simplement ses amis jouer ou obtenir des informations sur du contenu recommand&eacute; (jeux, &eacute;missions de t&eacute;l&eacute;vision, films).</li>\r\n</ul>\r\n', '', '1442275200', '389', '3890', '38900', 'ps4', -1, 1, 0, '', '5.80'),
(5, 'PS4REOC', 'Resident Evil Origins Collection', 'Resident Evil Origins Collection regroupe deux titres d’anthologie : Resident Evil et Resident Evil 0', '<p>Dans l’&eacute;dition originale, <strong>Resident Evil</strong>, les joueurs choisiront d’incarner Chris Redfield ou Jill Valentine, c&eacute;l&egrave;bres membres de l’&eacute;quipe des S.T.A.R.S. (« Special Tactics and Rescue Service »), munis d’un arsenal d’armes r&eacute;duits et envoy&eacute;s en mission pour retrouver l’&eacute;quipe Bravo. Les joueurs devront faire preuve de courage en parcourant de nombreux lieux &eacute;touffants et sombres, o&ugrave; de nombreux pi&egrave;ges et &eacute;nigmes les attendent au tournant.</p>\r\n<p><strong>Resident Evil 0</strong>, quant &agrave; lui, replonge les joueurs en 1998. Certains rapports font &eacute;tat de meurtres inhabituels dans la r&eacute;gion de Raccoon City. Les forces sp&eacute;ciales de la ville, les S.T.A.R.S, envoient l’&eacute;quipe Bravo sur place, dont la jeune recrue, Rebecca Chambers, qui y fera la rencontre de l’ex lieutenant de la Navy, Billy Coen. Les joueurs pourront contrôler le duo Rebecca et Billy en les inter-changeant &agrave; n’importe quel moment.</p>\r\n<ul>\r\n	<li>Retour aux origines : D&eacute;couvrez la v&eacute;rit&eacute; derri&egrave;re les horreurs du Manoir, avec les &eacute;v&eacute;nements ant&eacute;rieurs &agrave; L’Ecliptic Express avec ce pack regroupant les 2 jeux pr&eacute;f&eacute;r&eacute;s des fans.</li>\r\n	<li>Graphismes am&eacute;lior&eacute;s : Nouvelles textures en haute-r&eacute;solution sp&eacute;cialement cr&eacute;&eacute;es pour cette version. Le jeu supportera l’affichage en 1080p sur consoles next-gen tout en pr&eacute;servant l’apparence des jeux d’origine.</li>\r\n	<li>Effets sonores am&eacute;lior&eacute;s : Profitez du Sound Surrond 5.1 pour davantage d’immersion.</li>\r\n	<li>Mode Wesker : Pour la premi&egrave;re fois dans Resident Evil 0, les joueurs d&eacute;couvriront les &eacute;v&eacute;nements qui ont conduit &agrave; rendre le Manoir si embl&eacute;matique, en y incarnant le personnage d’Albert Wesker dot&eacute;e d’une tenue sp&eacute;ciale et d’incroyables nouveaux pouvoirs.</li>\r\n</ul>', '', '1453420800', '39.9', '599', '7182', '', 10, 4, 2, '', '1'),
(6, 'PS4TT', 'Trackmania Turbo', 'Courses sens dessus dessous', '<p>Red&eacute;couvrez l’univers des courses arcade de Trackmania Turbo grâce &agrave; ses graphismes next-gen, une toute nouvelle direction artistique ainsi que son fameux gameplay ultra fun… mais impitoyable. Dot&eacute; d’une &eacute;norme rejouabilit&eacute;, Trackmania vous offre une exp&eacute;rience de jeu vari&eacute;e qui m&ecirc;le course arcade et outils de cr&eacute;ation parfaits : grâce &agrave; un  &eacute;diteur de circuits remani&eacute; et intuitif, vous pourrez concevoir une infinit&eacute; de  trac&eacute;s originaux.</p>\r\n\r\n<h2><strong>4 ENVIRONNEMENTS, 4 GAMEPLAYS DIFF&eacute;RENTS</strong></h2>\r\n\r\n<p>Traversez des environnements stup&eacute;fiants et domptez  chacune de leurs sp&eacute;cifit&eacute;s :</p>\r\n<ul>\r\n	<li><strong>Rollercoaster Lagoon:</strong> d&eacute;fiez la gravit&eacute; dans cet archipel tropical paradisiaque.</li>\r\n	<li><strong>International Stadium:</strong> talents et pr&eacute;cision, tels sont les ma&icirc;tres mots de cet environnement tr&egrave;s comp&eacute;titif.</li>\r\n	<li><strong>Canyon Grand Drift:</strong> pilotez tout en drift dans ce grand canyon nord-am&eacute;ricain.</li>\r\n	<li><strong>Down & Dirty Valley:</strong> des circuits tr&egrave;s immersifs en pleine campagne qui font part belle aux sauts.</li>\r\n<ul>\r\n\r\n<h2><strong>MODE CAMPAGNE</strong></h2>\r\n\r\n<p>Mettez vos comp&eacute;tences &agrave; l’&eacute;preuve, remportez des m&eacute;dailles, d&eacute;bloquez jusqu’&agrave; 200 circuits diff&eacute;rents dans plus de 5 niveaux de difficult&eacute; et gravissez les &eacute;chelons des classements mondiaux.</p>\r\n\r\n<h2><strong>DOUBLE DRIVER</strong></h2>\r\n\r\n<p>Vous n’&ecirc;tes pas oblig&eacute;s d’affronter seul les d&eacute;fis de Trackmania. Faites &eacute;quipe avec un ami et contrôlez une m&ecirc;me voiture avec deux manettes. Attention : communiquez et restez synchro ou ce sera le \r\ncrash !</p>\r\n\r\n<h2><strong>TRACKBUILDER</strong></h2>\r\n\r\n<p>Jouez avec cette bo&icirc;te &agrave; outils intuitive pour concevoir vos propres trac&eacute;s originaux ou pimenter votre exp&eacute;rience en g&eacute;n&eacute;rant des circuits al&eacute;atoires. Sauvegardez vos meilleures cr&eacute;ations et mettez les autres joueurs au d&eacute;fi.</p>\r\n\r\n<h2><strong>MULTIJOUEUR LOCAL</strong></h2>\r\n\r\n<p>3 modes de jeu seront disponibles :</p>\r\n<ul>\r\n     <li>Arcade : obtenez le meilleur classement en vous focalisant sur votre score.</li>\r\n     <li>Hotseat : concentrez-vous ici sur votre consommation de carburant dans des courses comprenant jusqu’&agrave; 8 joueurs.</li>\r\n     <li>&eacute;cran partag&eacute; : jouez jusqu’&agrave; 4 sur le m&ecirc;me &eacute;cran.</li>\r\n</ul>\r\n<p>Chacun de ces modes sera jouable en solo, chacun pour soi ou Double Driver.</p>\r\n\r\n<h2><strong>BANDE-SON DYNAMIQUE</strong></h2>\r\n\r\n<p>Dans Trackmania, la musique s’adapte &agrave; votre exp&eacute;rience de course : vos talents de pilote cr&eacute;ent des variations d’intensit&eacute; et des silences pleins de suspense. La musique change quand vous passez un point de contrôle, quand vous faites un drift ou un saut, pour rendre chaque course totalement unique.</p>\r\n\r\n', '', '1459382400', '39.9', '599', '7182', '', 0, 2, 3, '', '1'),
(7, 'PS4TCTD', 'Tom Clancy''s The Division', 'Le jour du Black Friday, une pand&eacute;mie d&eacute;vastatrice se propage dans les rues de New York, coupant un par un l’acc&egrave;s aux services indispensables au quotidien. ', '<p>Le jour du Black Friday, une pand&eacute;mie d&eacute;vastatrice se propage dans les rues de New York, coupant un par un l’acc&egrave;s aux services indispensables au quotidien.</p>\r\n<p>En l’espace de quelques jours, le manque d’eau et de nourriture plonge la ville dans le chaos, laissant chaque quartier &agrave; la merci de factions hostiles.</p>\r\n<p>C’est alors qu’intervient La Division, une unit&eacute; d’agents tactiques autonomes, class&eacute;e secret d&eacute;fense. Sous couvert d’une existence &agrave; priori ordinaire, ces agents sont entrain&eacute;s pour agir en toute ind&eacute;pendance afin de sauver la soci&eacute;t&eacute;.</p>\r\n<p>Quand tout s’effondre, leur mission commence.</p>\r\n\r\n<h2><strong>Reprenez New York</strong></h2>\r\n<p>Bienvenue dans une exp&eacute;rience nouvelle g&eacute;n&eacute;ration. &eacute;voluez dans un environnement persistant et dynamique, o&ugrave; l’exploration et la progression du joueur sont essentielles.</p>\r\n<p>Fa&icirc;tes &eacute;quipe avec d’autres agents de la Division afin de restaurer l’ordre, retrouver la source du virus et reprendre le contrôle de New York.</p>\r\n\r\n<h2><strong>Un monde vivant</strong></h2>\r\n\r\n<p>Explorez un univers o&ugrave; le temps et les conditions climatiques auront un impact d&eacute;terminant sur votre exp&eacute;rience de jeu.</p>\r\n<p>Utilisez l’environnement &agrave; votre avantage afin de prendre en embuscade vos ennemis et dominer les affrontements. Utilisez votre masque &agrave; gaz pour &eacute;viter la contamination, et am&eacute;liorez-le pour entrer dans les zones les plus infect&eacute;es.</p>\r\n\r\n<h2><strong>Une jungle urbaine</strong></h2>\r\n\r\n<p>La ville de New York a &eacute;t&eacute; prise d’assaut par des groupes hostiles tentant de tirer profit du chaos. M&eacute;fiez-vous des bandits qui rôdent en bandes dans les rues en s’attaquant aux cibles sans d&eacute;fense.</p>\r\n<p>Combattez les Cleaners, dont l’objectif est de brûler toute forme de vie &agrave; l’aide de leurs lance-flammes pour d&eacute;truire le virus.</p>\r\n<p>Affronter les Rikers, un gang de d&eacute;tenus de la prison de Rickers Island qui a profit&eacute; du chaos pour prendre le contrôle d’une partie de la ville.</p>\r\n\r\n<h2><strong>Loot et personnalisation</strong></h2>\r\n\r\n<p>En tant que membre de la Division, vous b&eacute;n&eacute;ficiez d’un &eacute;quipement &agrave; la pointe de la technologie. Customisez enti&egrave;rement votre personnage et son sac &agrave; dos pour survivre dans un New York en crise.</p>\r\n<p>Restez en contact permanent avec les autres agents grâce &agrave; votre montre connect&eacute;e. Pillez vos ennemis, customisez et am&eacute;liorez vos armes, votre &eacute;quipement ainsi que vos capacit&eacute;s.</p>\r\n\r\n<h2><strong>Des technologies de pointe</strong></h2>\r\n\r\n<p>Choisissez et am&eacute;liorez vos comp&eacute;tences pour compl&eacute;ter celles de vos co&eacute;quipiers et obtenir l’avantage lors de vos affrontements.</p>\r\n<p>Modifiez vos comp&eacute;tences &agrave; tout moment selon votre style de jeu. Utilisez une mine guid&eacute;e qui saura trouver les ennemis les plus planqu&eacute;s, ou faites une diversion efficace avec la tourelle.</p>\r\n<p>Utilisez la comp&eacute;tence ECHO, un outil qui vous permettra de visualiser des &eacute;v&eacute;nements pass&eacute;s afin de collecter de pr&eacute;cieuses informations sur votre environnement, de trouver des objets cach&eacute;s et d’en apprendre plus sur les origines de la pand&eacute;mie.</p>\r\n\r\n<h2><strong>Mode multijoueur : La Dark Zone</strong></h2>\r\n\r\n<p>P&eacute;n&eacute;trez dans la Dark Zone, une zone de quarantaine prot&eacute;g&eacute;e en plein milieu de Manhattan, rassemblant les &eacute;quipements et objets les plus pr&eacute;cieux, abandonn&eacute;s suite &agrave; l’&eacute;vacuation militaire.</p>\r\n\r\n<p>Cette zone est &eacute;galement la plus dangereuse du jeu : collaborez avec les autres joueurs pour combattre ensemble vos ennemis et extraire des loots l&eacute;gendaires en h&eacute;licopt&egrave;re... ou attaquer-les pour les piller Dans la Dark Zone, peur, trahison et tension sont les ma&icirc;tres mots.</p>\r\n\r\n<h2><strong>Le moteur SnowDrop</strong></h2>\r\n\r\n<p>D&eacute;velopp&eacute; avec le nouveau moteur Snowdrop con&ccedil;u pour les consoles next-gen, Tom Clancy’s The Division repousse les limites du r&eacute;alisme et propose un niveau de d&eacute;tails in&eacute;dit dans un monde ouvert.</p>', '', '1457395200', '64.9', '974', '11682', 'PS4TCTD', 0, 2, 3, '', '1'),
(8, 'PS4MEC', 'Mirror''s Edge Catalyst', 'La plus rapide des coursi&egrave;res de Glass est de retour', '<p>Incarnez Faith, une Messag&egrave;re intr&eacute;pide qui combat pour la libert&eacute; &agrave; travers la Cit&eacute; de Verre, une ville ultramoderne dont l’architecture vertigineuse dissimule un terrible secret derri&egrave;re ses reflets &eacute;blouissants.</p>\r\n<p>Explorez librement chaque recoin de la cit&eacute;, du haut de ses gratte-ciel majestueux aux tr&eacute;fonds de ses tunnels obscurs.</p>\r\n<p>La jouabilit&eacute; &agrave; la premi&egrave;re personne combine d&eacute;placements fluides et capacit&eacute;s de combat avanc&eacute;es pour mieux dominer les &eacute;l&eacute;ments urbains, ma&icirc;triser votre environnement et percer un vaste complot.</p>\r\n<p>Mirror''s Edge revient en force et place la barre encore plus haut en termes d’action et d’immersion.</p>\r\n\r\n<h2><strong>Action en vue subjective</strong></h2>\r\n\r\n<p>Au plus pr&egrave;s de vos ennemis : utilisez votre libert&eacute; de d&eacute;placement et les arts martiaux en vous appuyant sur les d&eacute;cors pour vivre une exp&eacute;rience en vue subjective in&eacute;dite.</p>\r\n\r\n<h2><strong>Explorez la Cit&eacute; de Verre</strong></h2>\r\n\r\n<p>Parcourez la ville ultramoderne &agrave; votre propre rythme et d&eacute;bloquez progressivement tous ses quartiers. Explorez librement le moindre recoin de la cit&eacute;, des gratte-ciel aux surfaces vitr&eacute;es jusqu’aux tunnels souterrains cach&eacute;s.</p>\r\n\r\n<h2><strong>Vivez l’av&egrave;nement de Faith</strong></h2>\r\n\r\n<p>Livr&eacute;e &agrave; elle-m&ecirc;me dans une soci&eacute;t&eacute; totalitaire, Faith a trouv&eacute; refuge au sein d’un groupe clandestin appel&eacute; "les Traceurs".</p>\r\n<p>D&eacute;couvrez les origines de l’h&eacute;roïne et luttez &agrave; ses côt&eacute;s contre l’oppression tandis qu’elle se r&eacute;v&egrave;le comme l’&eacute;lue capable de lib&eacute;rer la Cit&eacute; de Verre de ses illusions. </p>', '', '1464220800', '64.9', '974', '11682', 'PS4MEC', 0, 2, 3, '', '1'),
(9, 'PS4B', 'Battleborn', 'Battleborn est un jeu de tir &agrave; la premi&egrave;re personne r&eacute;alis&eacute; par les cr&eacute;ateurs de Borderlands.', '<p>Une bande de h&eacute;ros survitamin&eacute;s aux pouvoirs extraordinaires lutte pour la protection de la derni&egrave;re &eacute;toile de l''univers, menac&eacute;e par un mal myst&eacute;rieux.<br>\r\nPour vous battre, vous pourrez compter sur des personnages et des armes d''une vari&eacute;t&eacute; inimaginable : cyborgs hommes-oiseaux, vampires samouraïs, montagnes de muscles &eacute;quip&eacute;es de sulfateuses.<br>\r\nCe shooter next-gen vous est pr&eacute;sent&eacute; par les cr&eacute;ateurs de Borderlands.<br> \r\nCorps-&agrave;-corps et esquive, tir &agrave; distance en mouvement, magie et charge ou encore oblit&eacute;ration pure et dure : choisissez le style de combat des h&eacute;ros de votre &eacute;quipe et am&eacute;liorez leurs comp&eacute;tences.<br>\r\nTrouvez votre h&eacute;ros pr&eacute;f&eacute;r&eacute; et battez-vous en solo ou en coop aux côt&eacute;s de vos amis au cours de tr&eacute;pidantes missions Histoire ou contre eux dans des matchs multijoueurs fr&eacute;n&eacute;tiques.</p>\r\n\r\n<h2><strong>Les h&eacute;ros de Battleborn</strong></h2>\r\n\r\n<p>Battleborn propose un panel de 25 h&eacute;ros jouables, tous parfaitement uniques. Chaque h&eacute;ros pr&eacute;sente une personnalit&eacute; propre et est dot&eacute; d''armes et de pouvoirs diff&eacute;rents.</p>\r\n\r\n<h2><strong>Mode Histoire</strong></h2>\r\n\r\n<p>Le mode Histoire de Battleborn suit une narration haletante et peut &ecirc;tre enti&egrave;rement jou&eacute;e en solo, mais elle est encore plus palpitante en coop avec vos amis, en ligne comme sur &eacute;cran partag&eacute;.</p>\r\n\r\n<h2><strong>Multijoueur</strong></h2>\r\n\r\n<p>Le mode multijoueur par &eacute;quipe de Battleborn peut &ecirc;tre rejoint en ligne par un maximum de 10 joueurs, pour des matchs de 5 contre 5.</p>\r\n<p>Il inclut trois modes multijoueurs distincts :</p>\r\n<ul>\r\n<li>Incursion : Des &eacute;quipes de h&eacute;ros doivent d&eacute;fendre leur base contre des vagues de sbires contrôl&eacute;es par l''IA, tout en &eacute;tablissant des strat&eacute;gies coop&eacute;ratives pour permettre &agrave; leurs propres sbires de d&eacute;truire la base adverse.</li>\r\n<li>Destruction : Des &eacute;quipes de h&eacute;ros de h&eacute;ros s''affrontent au cours de terribles matchs &agrave; mort et doivent capturer et conserver certains objectifs pour remporter la victoire.</li>\r\n<li>Fusion : Des &eacute;quipes de h&eacute;ros doivent guider leurs sbires pour les conduire &agrave; la mort au centre de la carte. Des points sont accord&eacute;s pour chaque sbire sacrifi&eacute; dans l''incin&eacute;rateur. L''&eacute;quipe qui obtient le meilleur score remporte la victoire.</li>\r\n</ul><br>\r\n<h2><strong>Un syst&egrave;me de progression persistante</strong></h2>\r\n\r\n<p>Tous les points d''exp&eacute;rience, qu''ils soient gagn&eacute;s en mode Histoire ou en mode comp&eacute;titif multijoueur, contribuent &agrave; la progression du rang de chaque personnage, mais aussi &agrave; la progression du rang de commandement associ&eacute; au profil du joueur.</p>\r\n<ul>\r\n<li>Rang de personnage : En participant &agrave; des missions et &agrave; des matchs, chaque personnage peut progresser de fa&ccedil;on permanente du niveau 1 au niveau 10, ce qui permet au joueur de modifier les bonus de son helix et de d&eacute;bloquer de nouvelles skins.</li>\r\n<li>Rang de commandement : Le profil du joueur peut progresser, ce qui lui permet de d&eacute;bloquer des badges et des titres pour impressionner ses amis et de gagner des objets afin d''am&eacute;liorer le h&eacute;ros qu''il souhaite incarner.</li>\r\n</ul>\r\n<br>\r\n<h2><strong>Le syst&egrave;me d''Helix</strong></h2>\r\n\r\n<p>Le syst&egrave;me de progression acc&eacute;l&eacute;r&eacute;e des personnages de Battleborn permet aux joueurs de d&eacute;velopper les personnages du niveau 1 au niveau 10 et d''am&eacute;liorer leurs armes et leurs pouvoirs.<br>\r\nL''exp&eacute;rience est acquise en mode Histoire, mais aussi au cours des matchs multijoueurs.</p>', '', '1462233600', '59.9', '899', '10782', 'PS4B', 0, 2, 3, '', '1');

-- --------------------------------------------------------

--
-- Structure de la table `produits_bonus`
--

CREATE TABLE IF NOT EXISTS `produits_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `designation_bonus` varchar(255) NOT NULL,
  `images_bonus` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `produits_bonus`
--

INSERT INTO `produits_bonus` (`id`, `ref_produit`, `designation_bonus`, `images_bonus`) VALUES
(1, 'PS4NUNS4', 'Metal Plate Naruto', 'PS4NUNS4_MPN'),
(2, 'PS4NUNS4', 'Livre Inside Naruto Exclusif', 'PS4NUNS4_LINE'),
(3, 'PS4NUNS4', 'Acc&egrave;s Anticip&eacute; personnages et costumes ! ', 'PS4NUNS4_AAPC');

-- --------------------------------------------------------

--
-- Structure de la table `produits_caracteristique`
--

CREATE TABLE IF NOT EXISTS `produits_caracteristique` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produits_caracteristique`
--

INSERT INTO `produits_caracteristique` (`id`, `ref_produit`, `editeur`, `genre`, `multijoueur`, `internet`, `option`, `couleur`, `cap_hdd`, `eth`, `wifi`, `nb_usb`, `compatibilite`) VALUES
(1, 'PS4TWOMTLO', 'KOCH MEDIA', 'Action / Aventure', '0', '0', '', '', '', '0', '0', '', ''),
(2, 'PS4NSUNS4', 'BANDAI NAMCO GAMES', 'Combat', '1', '1', 'PlayStation Plus', '', '', '', '', '', ''),
(3, 'PS4UTNDC', 'SONY', 'Compilation', '1', '', 'Playstation Plus', '', '', '', '', '', ''),
(4, 'PS4500B_DLC', 'SONY', '', '0', '0', 'PlayStation Plus', 'Noir', '500Go', '1', '1', '2', ''),
(5, 'PS4REOC', 'CAPCOM', 'Compilation', '', '', '', '', '', '', '', '', ''),
(6, 'PS4TT', 'UBISOFT', 'Sport', '1', '1', 'Playstation Plus', '', '', '', '', '', ''),
(7, 'PS4TCTD', 'UBISOFT', 'Action & Aventure', '1', '1', 'Playstation Plus', '', '', '', '', '', ''),
(8, 'PS4MEC', 'ELECTRONIC ARTS', 'Action', '', '', '', '', '', '', '', '', ''),
(9, 'PS4B', 'TAKE 2 (2K)', 'FPS', '1', '1', 'Playstation Plus', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `produits_categorie`
--

CREATE TABLE IF NOT EXISTS `produits_categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `idcategorie` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produits_categorie`
--

INSERT INTO `produits_categorie` (`id`, `ref_produit`, `idcategorie`) VALUES
(1, 'PS4TWOMTLO', 1),
(2, 'PS4NUNS4', 1),
(3, 'PS4UTNDC', 1),
(4, 'PS4500B_DLC', 1),
(5, 'PS4REOC', 1),
(6, 'PS4TT', 1),
(7, 'PS4TCTD', 1),
(8, 'PS4MEC', 1),
(9, 'PS4B', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_images`
--

CREATE TABLE IF NOT EXISTS `produits_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `produits_images`
--

INSERT INTO `produits_images` (`id`, `ref_produit`, `images`) VALUES
(1, 'PS4TWOMTLO', 'PS4TWOMTLO_1'),
(2, 'PS4TWOMTLO', 'PS4TWOMTLO_2'),
(3, 'PS4TWOMTLO', 'PS4TWOMTLO_3'),
(4, 'PS4TWOMTLO', 'PS4TWOMTLO_4'),
(5, 'PS4TWOMTLO', 'PS4TWOMTLO_5'),
(6, 'PS4TWOMTLO', 'PS4TWOMTLO_6'),
(7, 'PS4TWOMTLO', 'PS4TWOMTLO_7'),
(8, 'PS4TWOMTLO', 'PS4TWOMTLO_8'),
(9, 'PS4NUNS4', 'PS4NUNS4_1'),
(10, 'PS4NUNS4', 'PS4NUNS4_2'),
(11, 'PS4NUNS4', 'PS4NUNS4_3'),
(12, 'PS4NUNS4', 'PS4NUNS4_4'),
(13, 'PS4NUNS4', 'PS4NUNS4_5'),
(14, 'PS4NUNS4', 'PS4NUNS4_6'),
(15, 'PS4NUNS4', 'PS4NUNS4_7'),
(16, 'PS4NUNS4', 'PS4NUNS4_8'),
(17, 'PS4NUNS4', 'PS4NUNS4_9'),
(18, 'PS4NUNS4', 'PS4NUNS4_10'),
(19, 'PS4NUNS4', 'PS4NUNS4_11');

-- --------------------------------------------------------

--
-- Structure de la table `produits_promotion`
--

CREATE TABLE IF NOT EXISTS `produits_promotion` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `new_price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produits_subcategorie`
--

CREATE TABLE IF NOT EXISTS `produits_subcategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `idsubcategorie` int(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `produits_subcategorie`
--

INSERT INTO `produits_subcategorie` (`id`, `ref_produit`, `idsubcategorie`) VALUES
(1, 'PS4TWOMTLO', 1),
(2, 'PS4NUNS4', 1),
(3, 'PS4UTNDC', 1),
(4, 'PS4500B_DLC', 2),
(5, 'PS4REOC', 1),
(6, 'PS4TT', 1),
(7, 'PS4TCTD', 1),
(8, 'PS4MEC', 1),
(9, 'PS4B', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits_videos`
--

CREATE TABLE IF NOT EXISTS `produits_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` varchar(255) NOT NULL,
  `video` longtext NOT NULL,
  `images_video` varchar(255) NOT NULL,
  `title_video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `produits_videos`
--

INSERT INTO `produits_videos` (`id`, `ref_produit`, `video`, `images_video`, `title_video`) VALUES
(1, 'PS4NUNS4', 'http://video1.cedemo.com/vdo/eb19835ba1c94c65002e8806a9a702e9/5699792b/51586/51586_3000.mp4', '', ''),
(2, 'PS4NUNS4', 'http://video1.cedemo.com/vdo/0d9fc1c8078bf1107614fab83d82ac7b/5699805a/51313/51313_3000.mp4', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `shop_transporteur`
--

CREATE TABLE IF NOT EXISTS `shop_transporteur` (
  `idtransporteur` int(13) NOT NULL AUTO_INCREMENT,
  `nom_transporteur` varchar(255) NOT NULL,
  `logo_transporteur` varchar(255) NOT NULL,
  `jour_livraison` varchar(255) NOT NULL,
  `poids_max` varchar(255) NOT NULL,
  PRIMARY KEY (`idtransporteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `shop_transporteur`
--

INSERT INTO `shop_transporteur` (`idtransporteur`, `nom_transporteur`, `logo_transporteur`, `jour_livraison`, `poids_max`) VALUES
(1, 'La Poste', 'https://upload.wikimedia.org/wikipedia/fr/2/2a/Logo-laposte.png', '4', '30.00'),
(2, 'Chronopost 24H - Avant 10H', 'http://www.chauffe-eau-instantane.fr/img/cms/chronopost10.gif', '1', '20.00'),
(3, 'Chronopost 24H - Avant 13H', 'http://www.chauffe-eau-instantane.fr/img/cms/chronopost13.gif', '1', '20.00'),
(4, 'UPS', 'http://vignette3.wikia.nocookie.net/logopedia/images/0/0e/UPS_logo_2003.png/revision/latest?cb=20100615165603', '2', '70.00');

-- --------------------------------------------------------

--
-- Structure de la table `shop_transporteur_tranche`
--

CREATE TABLE IF NOT EXISTS `shop_transporteur_tranche` (
  `idtranche` int(13) NOT NULL AUTO_INCREMENT,
  `idtransporteur` int(13) NOT NULL,
  `poids_debut` varchar(255) NOT NULL,
  `montant` varchar(255) NOT NULL,
  PRIMARY KEY (`idtranche`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `shop_transporteur_tranche`
--

INSERT INTO `shop_transporteur_tranche` (`idtranche`, `idtransporteur`, `poids_debut`, `montant`) VALUES
(1, 1, '0', '4.90'),
(2, 1, '0.251', '6.10'),
(3, 1, '0.501', '6.90'),
(4, 1, '0.751', '7.50'),
(5, 1, '1.001', '8.50'),
(6, 1, '2.001', '12.50'),
(7, 1, '5.001', '18.50'),
(8, 1, '10.001', '26.50'),
(9, 2, '0', '34.88'),
(10, 2, '2.01', '36.98'),
(11, 2, '5.01', '38.17'),
(12, 2, '6.01', '39.35'),
(13, 2, '7.01', '40.52'),
(14, 2, '8.01', '41.71'),
(15, 2, '9.01', '42.89'),
(16, 2, '10.01', '44.06'),
(17, 2, '11.01', '45.25'),
(18, 2, '12.01', '46.43'),
(19, 2, '13.01', '47.62'),
(20, 2, '14.01', '48.79'),
(21, 2, '15.01', '49.97'),
(22, 2, '16.01', '51.16'),
(23, 2, '17.01', '52.33'),
(24, 2, '18.01', '53.51'),
(25, 2, '19.01', '54.70');

-- --------------------------------------------------------

--
-- Structure de la table `shop_vourcher`
--

CREATE TABLE IF NOT EXISTS `shop_vourcher` (
  `idvourcher` int(13) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `client` int(1) NOT NULL,
  `idclient` int(13) NOT NULL,
  `percent_rem` varchar(255) NOT NULL,
  `perempsion` varchar(255) NOT NULL,
  PRIMARY KEY (`idvourcher`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `shop_vourcher`
--

INSERT INTO `shop_vourcher` (`idvourcher`, `code`, `client`, `idclient`, `percent_rem`, `perempsion`) VALUES
(1, 'VRC20', 1, 1, '20', '1480550400');

-- --------------------------------------------------------

--
-- Structure de la table `site_maintenance`
--

CREATE TABLE IF NOT EXISTS `site_maintenance` (
  `id` int(13) NOT NULL AUTO_INCREMENT,
  `pourquoi` varchar(255) NOT NULL,
  `temps` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `subcategorie`
--

CREATE TABLE IF NOT EXISTS `subcategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcategorie` int(13) NOT NULL,
  `designation_subcat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `subcategorie`
--

INSERT INTO `subcategorie` (`id`, `idcategorie`, `designation_subcat`) VALUES
(1, 1, 'JEUX'),
(2, 1, 'CONSOLES'),
(3, 1, 'ACCESSOIRES'),
(4, 1, 'PLAYSTATION NETWORK'),
(5, 2, 'JEUX'),
(6, 2, 'CONSOLES'),
(7, 2, 'ACCESSOIRES'),
(8, 2, 'PLAYSTATION NETWORK'),
(9, 3, 'JEUX'),
(10, 3, 'CONSOLES'),
(11, 3, 'ACCESSOIRES'),
(12, 3, 'PLAYSTATION NETWORK'),
(13, 4, 'JEUX'),
(14, 4, 'CONSOLES'),
(15, 4, 'ACCESSOIRES'),
(16, 4, 'XBOX LIVE'),
(17, 5, 'JEUX'),
(18, 5, 'CONSOLES'),
(19, 5, 'ACCESSOIRES'),
(20, 5, 'XBOX LIVE'),
(21, 6, 'JEUX'),
(22, 6, 'CONSOLES'),
(23, 6, 'ACCESSOIRES'),
(24, 7, 'JEUX'),
(25, 7, 'CONSOLES'),
(26, 7, 'ACCESSOIRES'),
(32, 13, 'JEUX'),
(33, 13, 'ACCESSOIRES');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
