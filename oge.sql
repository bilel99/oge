-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 23 Novembre 2015 à 16:06
-- Version du serveur: 5.1.66
-- Version de PHP: 5.3.28-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `oge`
--

-- --------------------------------------------------------

--
-- Structure de la table `blocs`
--

CREATE TABLE IF NOT EXISTS `blocs` (
  `id_bloc` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Nom du bloc',
  `slug` varchar(255) NOT NULL COMMENT 'Identifiant permanent du bloc pour appeller le fichier qui sera du type : bloc_slug',
  `status` tinyint(1) NOT NULL COMMENT 'Statut du bloc (0 : offline | 1 : online)',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id_bloc`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `blocs`
--


-- --------------------------------------------------------

--
-- Structure de la table `blocs_elements`
--

CREATE TABLE IF NOT EXISTS `blocs_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bloc` int(11) NOT NULL COMMENT 'ID du bloc',
  `id_element` int(11) NOT NULL COMMENT 'ID de l''élément',
  `id_langue` varchar(2) NOT NULL,
  `value` text NOT NULL COMMENT 'Valeur de l''élément pour ce bloc',
  `complement` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'Statut de l''élément (0 : offline | 1 : online)',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_bloc` (`id_bloc`,`id_element`,`id_langue`),
  KEY `id_bloc_2` (`id_bloc`),
  KEY `id_element` (`id_element`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `blocs_elements`
--


-- --------------------------------------------------------

--
-- Structure de la table `blocs_templates`
--

CREATE TABLE IF NOT EXISTS `blocs_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bloc` int(11) NOT NULL COMMENT 'ID du bloc pour ce template',
  `id_template` int(11) NOT NULL COMMENT 'ID du template',
  `position` enum('Haut','Droite','Bas','Gauche') NOT NULL COMMENT 'Position du bloc sur le template',
  `ordre` int(11) NOT NULL COMMENT 'Ordre du bloc sur le template',
  `status` tinyint(1) NOT NULL COMMENT 'Statut du bloc (0 : offline | 1 : online)',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_bloc` (`id_bloc`,`id_template`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `blocs_templates`
--


-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: offline 1: online',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `brands`
--


-- --------------------------------------------------------

--
-- Structure de la table `cdms`
--

CREATE TABLE IF NOT EXISTS `cdms` (
  `id_cdm` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `banner` varchar(50) NOT NULL,
  `date_naissance` datetime NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(100) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `motorise` varchar(100) NOT NULL,
  `num_ss` varchar(100) NOT NULL,
  `provenance` varchar(100) NOT NULL,
  `langues` varchar(100) NOT NULL,
  `cursus` varchar(100) NOT NULL,
  `annee` varchar(20) NOT NULL,
  `details` varchar(255) NOT NULL,
  `upload` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_cdm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `cdms`
--

INSERT INTO `cdms` (`id_cdm`, `nom`, `prenom`, `telephone`, `email`, `banner`, `date_naissance`, `adresse`, `ville`, `code_postal`, `motorise`, `num_ss`, `provenance`, `langues`, `cursus`, `annee`, `details`, `upload`, `status`, `added`, `updated`) VALUES
(20, 'test', 'test', '01', 'test@equinoa.com', 'test', '1991-02-01 00:00:00', 'test', 'test', '75000', 'motorise1', '111562154586', 'test,test,test', '', 'cursus1', '2011', 'test', '', 1, '2015-11-17 15:14:21', '2015-11-17 15:14:21'),
(19, 'STEINER', 'Charlotte', '01524254.2420', 'mehdi.boufous@gmail.com', 'bgfdh4ng4', '2009-04-09 00:00:00', '2, avenue ede rien ', 'Paris', '750100', 'motorise1', '9212142154654', 'sdfsdtgrdf,sdsdsd,sdsdsd', 'langues1,langues2,langues3', 'cursus1', '2009', 'sdsdsdsd', '', 1, '2015-04-09 19:52:37', '2015-04-09 19:52:37'),
(15, 'TEST FINAL 2', 'TEST FINAL 2', '0666666665', 'test2@test.com', 'B00444445', '1801-01-01 00:00:00', 'ici', 'ici', '96000', 'motorise3', '2222222', 'Autre ville,Autre ville,Haha', 'langues1,langues2', 'cursus2', '2015', 'xxxy', '', 1, '2014-10-21 09:44:50', '2014-10-21 09:48:00'),
(12, 'BOUILLAUD', 'Clément', '0630608527', 'clems172@gmail.com', 'B00461482', '2012-03-22 00:00:00', '2 rue des Plants Bruns', 'CERGY', '95000', 'motorise1', '119321566981', 'AA,BB,CC', 'langues1,langues3', 'cursus1', '2015', 'Quedal', '', 1, '2014-08-06 20:21:45', '2014-08-08 09:28:35'),
(17, 'BODZFHSG', 'Mehdi', '0636445545445545', 'fsdgsdfgdsfgdfsg@fefsq.com', 'B00393453', '1990-04-05 00:00:00', '2, rue Baron', 'Paris', '75017', 'motorise2', '184327452845823485214', 'Paris,Paris,Paris', 'langues2,langues3', 'cursus1', '2014', 'Gossbo', '', 1, '2015-01-25 11:45:51', '2015-01-25 11:45:51');

-- --------------------------------------------------------

--
-- Structure de la table `cdm_etude`
--

CREATE TABLE IF NOT EXISTS `cdm_etude` (
  `id_cdm_etude` int(11) NOT NULL AUTO_INCREMENT,
  `id_cdm` int(11) NOT NULL,
  `id_etude` int(11) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_cdm_etude`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `cdm_etude`
--

INSERT INTO `cdm_etude` (`id_cdm_etude`, `id_cdm`, `id_etude`, `added`, `updated`) VALUES
(3, 12, 2, '2014-08-29 17:35:54', '2014-08-29 17:35:54'),
(4, 14, 4, '2014-09-10 01:44:34', '2014-09-10 01:44:34'),
(5, 14, 3, '2014-09-19 00:47:28', '2014-09-19 00:47:28'),
(6, 12, 5, '2014-09-19 15:52:12', '2014-09-19 15:52:12'),
(7, 14, 5, '2014-09-19 15:52:17', '2014-09-19 15:52:17'),
(10, 18, 8, '2015-03-03 08:22:14', '2015-03-03 08:22:14'),
(9, 17, 7, '2015-01-25 11:47:15', '2015-01-25 11:47:15'),
(11, 15, 8, '2015-03-03 08:22:20', '2015-03-03 08:22:20'),
(13, 12, 23, '2015-11-17 14:54:19', '2015-11-17 14:54:19'),
(14, 12, 24, '2015-11-18 10:54:15', '2015-11-18 10:54:15'),
(15, 19, 1, '2015-11-21 03:21:01', '2015-11-21 03:21:01'),
(16, 12, 1, '2015-11-21 03:21:21', '2015-11-21 03:21:21');

-- --------------------------------------------------------

--
-- Structure de la table `cdps`
--

CREATE TABLE IF NOT EXISTS `cdps` (
  `id_cdp` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `annee` varchar(50) NOT NULL,
  `nom_interne` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(100) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `num_ss` varchar(100) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_cdp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `cdps`
--

INSERT INTO `cdps` (`id_cdp`, `nom`, `prenom`, `telephone`, `annee`, `nom_interne`, `email`, `mdp`, `adresse`, `ville`, `code_postal`, `num_ss`, `details`, `status`, `added`, `updated`) VALUES
(2, 'BOUILLAUDd', 'Clémente', '063060852712', '2011', 'CBd', 'clems172@gmail.cfr', '766ebcd59621e305170616ba3d3dac32', 'ddzzbbbb', 'dzddzbbbb', '95021', '12315946894', 'QUEEDALLaa', 1, '2014-08-08 09:22:24', '2014-11-20 16:34:35'),
(3, 'Cdp Test 2', 'Cdp Test 2', '123456', '2003', 'Cdp Test 2', 'admin@equinoa.fr', '', 'Cdp Test 2', 'Cdp Test 2', '4567', '132', 'Cdp Test 2', 1, '2014-08-29 17:17:12', '2014-08-29 17:17:12'),
(4, 'Cdp Test 3', 'Cdp Test 3', '132456', '2000', 'Cdp Test 3', 'admin@equinoa.fr', '', 'Cdp Test 3', 'Cdp Test 3', '123456', '123456', 'Cdp Test 3', 1, '2014-08-29 17:17:58', '2014-08-29 17:17:58'),
(5, 'Cdp Test 4', 'Cdp Test 4', '13', '2001', 'Cdp Test 4', 'admin@equinoa.fr', '', 'Cdp Test 4', 'Cdp Test 4', '12345', '12345', 'Cdp Test 4', 1, '2014-08-29 17:18:41', '2014-08-29 17:18:41'),
(6, 'Cdp Test 5', 'Cdp Test 5', '12345', '2014', 'Cdp Test 5', 'iewolo@yahoo.fr', '', 'Cdp Test 5', 'Cdp Test 5', '123456', '132456', '132Cdp Test 5', 1, '2014-08-29 17:19:28', '2014-08-29 17:19:28'),
(7, 'Cdp Test 6', 'Cdp Test 6', '123564', '2008', 'Cdp Test 6', 'admin@equinoa.fr', '', 'Cdp Test 6', 'Cdp Test 6', '123456', '12345', 'Cdp Test 6', 1, '2014-08-29 17:20:13', '2014-08-29 17:20:13'),
(8, 'Cdp Test 7', 'Cdp Test 7', '123564', '2008', 'Cdp Test 7', 'admin@equinoa.fr', '', 'Cdp Test 7', 'Cdp Test 7', '123456', '12345', 'Cdp Test 7', 1, '2014-08-29 17:20:16', '2014-08-29 17:35:04'),
(9, 'new', 'new', '12345', '2001', 'new', 'new@new.new', '68ce199ec2c5517597ce0a4d89620f55', 'fsdfsdoñik', 'ca', '879', '132', 'new', 1, '2014-11-20 15:46:53', '2014-11-20 15:46:53'),
(11, 'testeo jeje', 'testeo jeje', '789789', '2000', 'testeo jeje', 'tes@tewsdt.asd', '8b8369fc782a66a1118bd9eda89ebc07', '14 rue SoleilletBL375020 Paris', 'Paris', '8797', '564', '874897', 1, '2014-11-20 16:33:09', '2014-11-20 16:33:09'),
(12, 'test2', 'test2', '0123456789', '2000', 'test2', 'test@equinoa.com', '1c329ead8a0a9d8ae7e81b91978bee1f', 'test2', 'test2', '75000', '1523846364', 'test2', 1, '2015-11-17 15:37:11', '2015-11-17 15:40:14'),
(13, 'STEINER', 'Charlotte', '0682741711', '2014', 'CS', 'charlotte.steiner@essec.edu', '8d7e99c73cd5a10adaaf4c9f9a520368', '13 rue de Hartmanswiller', 'MULHOUSE', '68200', '293', 'RAS', 1, '2015-11-20 16:37:20', '2015-11-20 16:37:20');

-- --------------------------------------------------------

--
-- Structure de la table `cdp_etude`
--

CREATE TABLE IF NOT EXISTS `cdp_etude` (
  `id_cdp_etude` int(11) NOT NULL AUTO_INCREMENT,
  `id_cdp` int(11) NOT NULL,
  `id_etude` int(11) NOT NULL,
  `percentage` varchar(4) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_cdp_etude`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `cdp_etude`
--

INSERT INTO `cdp_etude` (`id_cdp_etude`, `id_cdp`, `id_etude`, `percentage`, `added`, `updated`) VALUES
(1, 2, 1, '30', '2014-08-27 14:50:15', '2015-11-21 03:22:36'),
(2, 2, 2, '25', '2014-08-29 17:16:10', '2014-08-29 17:37:17'),
(3, 6, 2, '10', '2014-08-29 17:22:06', '2014-08-29 17:22:25'),
(4, 5, 2, '15', '2014-08-29 17:22:33', '2014-08-29 17:22:33'),
(5, 4, 2, '15', '2014-08-29 17:22:41', '2014-08-29 17:35:40'),
(6, 3, 2, '30', '2014-08-29 17:35:24', '2014-08-29 17:35:24'),
(7, 7, 2, '5', '2014-08-29 17:37:17', '2014-08-29 17:37:17'),
(8, 3, 4, '100', '2014-09-10 01:44:28', '2014-09-10 01:44:28'),
(9, 3, 3, '40', '2014-09-19 00:47:07', '2014-09-19 00:47:23'),
(10, 7, 3, '45', '2014-09-19 00:47:16', '2014-09-19 00:47:16'),
(11, 6, 3, '15', '2014-09-19 00:47:23', '2014-09-19 00:47:23'),
(12, 2, 5, '30', '2014-09-19 15:51:50', '2014-09-19 15:52:25'),
(13, 7, 5, '30', '2014-09-19 15:51:58', '2014-09-19 15:51:58'),
(14, 5, 5, '30', '2014-09-19 15:52:07', '2014-09-19 15:52:07'),
(15, 3, 5, '10', '2014-09-19 15:52:25', '2014-09-19 15:52:25'),
(16, 6, 6, '50', '2015-01-15 20:20:10', '2015-01-15 20:20:15'),
(17, 4, 6, '50', '2015-01-15 20:20:15', '2015-01-15 20:20:15'),
(18, 6, 7, '50', '2015-01-25 11:21:01', '2015-01-25 11:21:09'),
(19, 7, 7, '50', '2015-01-25 11:21:09', '2015-01-25 11:21:09'),
(20, 9, 8, '35', '2015-03-03 08:21:16', '2015-03-03 08:21:33'),
(21, 10, 8, '50', '2015-03-03 08:21:25', '2015-03-03 08:21:25'),
(22, 4, 8, '15', '2015-03-03 08:21:33', '2015-03-03 08:21:33'),
(23, 8, 23, '100', '2015-11-17 14:50:14', '2015-11-17 14:50:14'),
(24, 4, 24, '100', '2015-11-18 10:53:01', '2015-11-18 10:53:01'),
(25, 5, 1, '25', '2015-11-19 15:42:50', '2015-11-21 03:22:36'),
(26, 8, 1, '45', '2015-11-19 15:42:58', '2015-11-19 15:42:58'),
(27, 4, 15, '20', '2015-11-19 15:44:34', '2015-11-19 16:01:43'),
(28, 6, 15, '15', '2015-11-19 15:44:40', '2015-11-19 16:01:28'),
(29, 8, 15, '10', '2015-11-19 15:44:45', '2015-11-19 16:01:19'),
(30, 5, 15, '20', '2015-11-19 15:47:20', '2015-11-19 16:01:43'),
(31, 2, 15, '35', '2015-11-19 16:00:59', '2015-11-19 16:00:59');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `id_langue` varchar(5) NOT NULL,
  `civilite` enum('M.','Mme','Mlle') NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `naissance` date NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `optin1` tinyint(1) NOT NULL COMMENT '0: Offline | 1: Online',
  `optin2` tinyint(1) NOT NULL COMMENT '0: Offline | 1: Online',
  `status` tinyint(1) NOT NULL COMMENT '0: Offline | 1: Online',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `email` (`email`),
  KEY `hash` (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `clients`
--


-- --------------------------------------------------------

--
-- Structure de la table `clients_adresses`
--

CREATE TABLE IF NOT EXISTS `clients_adresses` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `defaut` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Non | 1: Oui adresse par defaut',
  `type` tinyint(1) NOT NULL COMMENT '0: Livraison | 1: Facturation',
  `nom_adresse` varchar(255) NOT NULL,
  `civilite` enum('M.','Mme','Mlle') NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `societe` varchar(255) NOT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) NOT NULL,
  `adresse3` varchar(255) NOT NULL,
  `cp` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `id_pays` int(11) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: Offline | 1: Online',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_adresse`),
  KEY `id_client` (`id_client`),
  KEY `type` (`type`),
  KEY `defaut` (`defaut`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `clients_adresses`
--


-- --------------------------------------------------------

--
-- Structure de la table `clients_groupes`
--

CREATE TABLE IF NOT EXISTS `clients_groupes` (
  `id_client` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_client`,`id_groupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients_groupes`
--


-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contact` varchar(150) NOT NULL,
  `prenom_contact` varchar(150) NOT NULL,
  `fonction` varchar(150) NOT NULL,
  `tel_fixe` varchar(150) NOT NULL,
  `tel_port` varchar(150) NOT NULL,
  `linkedin` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `contacts`
--

INSERT INTO `contacts` (`id_contact`, `nom_contact`, `prenom_contact`, `fonction`, `tel_fixe`, `tel_port`, `linkedin`, `email`, `status`, `added`, `updated`, `id_user`) VALUES
(18, 'Contact 2', '2', 'Dev', '465789', '123456', 'www.link.com', 'contact2@gmail.com', 1, '2014-08-14 18:51:54', '2015-03-06 20:14:38', 1),
(17, 'Contact 1', '1', 'Dev', '123456789', '12345789', 'www.link.com', 'contact1@gmail.com', 1, '2014-08-14 18:51:10', '2015-11-19 15:40:30', 1),
(3, 'test', 'test', 'test', 'test', 'test', 'http://www.test.com', 'test@test.com', 0, '2014-04-02 01:51:48', '2014-07-02 16:25:34', 1),
(4, 'test', 'test', 'test', 'test', 'test', 'http://www.test.com', 'test@test.com', 0, '2014-04-02 01:51:48', '2014-08-14 18:48:58', 1),
(5, 'Test1', 'Test1', 'Fonction1', 'tel fixe1', 'tel port', 'http://www.linkedin1.com', 'test1@test1.com', 0, '2014-04-16 17:17:53', '2014-08-14 18:49:26', 1),
(6, 'Test2', 'Test2', 'fonction2', 'tel fxe2', 'tel port2', 'http://www.linkedin2.com', 'test2@test2.com', 0, '2014-04-24 17:18:51', '2014-08-14 18:49:29', 1),
(7, 'Contact', 'New', 'Dev', '+6578542', '+987462452', 'http://www.contact.com', 'contact@domain.com', 0, '2014-04-10 21:55:30', '2014-07-02 16:25:47', 1),
(8, 'Contact', 'pre', 'Fontion', '+654987', '+659685', 'http://www.oge', 'contact@oge.com', 0, '2014-04-10 21:58:40', '2014-07-11 13:06:51', 1),
(9, 'barrios', 'esgar', 'dev', '2762369', '31313131313', 'http://www.test.com', 'esteban.barrios@inventiba.com', 0, '2014-04-10 22:04:24', '2014-07-28 19:13:28', 1),
(14, 'Nandji', 'David', 'CDP', '0171183322', '0102030405', 'https://www.linkedin.com/profile/view?id=72443194&trk=nav_responsive_tab_profile', 'd.nandji@equinoa.com', 0, '2014-07-02 08:53:32', '2014-08-14 18:49:23', 1),
(13, 'Perreau', 'Louis', 'CDP', '0145789632', '0645127856', 'http://www.eop.fr', 'testlongaffichageeeeeeeeeee@equinoa.com', 0, '2014-05-27 10:57:27', '2014-08-14 18:49:59', 1),
(15, 'Tania', 'Ruaut', 'Lalalabiz', '00OOOoend', 'ooo 00', 'http://google.fr', 'google@google.com', 0, '2014-07-15 23:38:00', '2014-07-28 15:45:36', 2),
(16, 'nandji', 'PRENOM', 'DEVELOPMENT', '12345852', '1234596', 'www.ink.com', 'inj@nandji.com', 0, '2014-07-24 18:41:01', '2014-07-28 19:13:41', 1),
(19, 'Contact 3', '3', 'dev', '123456', '12345', 'Linkedin', 'contac@gmail.com', 1, '2014-08-14 19:25:44', '2015-03-06 20:14:59', 1),
(20, 'Contact  4', '4', 'dev', '12345', '123454', '', 'contact4@gmail.com', 1, '2014-08-14 19:26:24', '2015-03-06 20:15:30', 1),
(21, 'Contact 5', '5', 'dev', '465', '123', '', 'contact5@gmail.com', 1, '2014-08-14 19:29:15', '2015-03-06 20:15:39', 1),
(22, 'Contact 6', '6', 'dev', '159', '159', '', 'contact6@gmail.com', 1, '2014-08-14 19:30:52', '2015-03-06 20:15:49', 1),
(23, 'David', 'nandji', 'dev', '123', '123', '', 'nandji@gmail.com', 1, '2014-08-19 16:26:58', '2014-08-19 16:26:58', 1),
(24, 'asdasd', 'adasd', 'asdasd', '654654', '54564', '564564', 'jejeje@gmail.com', 1, '2014-11-20 16:40:03', '2014-11-20 16:40:03', 1),
(25, 'Jérôme', 'LAMBERT', 'COO', '32fsndjfgs', '54565435223243423', 'SDGFQSDFG', 'sdgfdsqg@ersgdg.com', 1, '2015-01-25 11:25:43', '2015-01-25 11:25:43', 2);

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudes` int(11) NOT NULL,
  `nature` varchar(255) NOT NULL,
  `nom_document` varchar(255) NOT NULL,
  `date_sortie` date NOT NULL,
  `tresorier_validation` tinyint(11) NOT NULL DEFAULT '0',
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `id_type_doc` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT 'statut document | 0:offline ; 1: online',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `documents`
--

INSERT INTO `documents` (`id_document`, `id_etudes`, `nature`, `nom_document`, `date_sortie`, `tresorier_validation`, `nom`, `prenom`, `id_type_doc`, `status`, `added`, `updated`) VALUES
(8, 5, 'Convention', 'Convention-1', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 15:52:49', '2014-09-19 15:52:49'),
(7, 3, ' Factures', ' Factures-1', '2014-09-19', 1, '', '', 4, 1, '2014-09-19 01:04:21', '2014-09-19 01:04:21'),
(6, 3, 'Convention', 'Convention-2', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 01:01:56', '2014-09-19 01:01:56'),
(5, 3, 'Convention', 'Convention-1', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 01:01:33', '2014-09-19 01:01:33'),
(9, 5, ' Factures', ' Factures-1', '2014-09-19', 1, '', '', 4, 1, '2014-09-19 15:53:51', '2014-09-19 15:53:51'),
(10, 5, 'Avenant étudiant', 'Avenant étudiant-1', '2014-09-19', 1, '', '', 8, 1, '2014-09-19 15:54:16', '2014-09-19 15:54:16'),
(11, 5, 'Convention', 'Convention-2', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 15:54:44', '2014-09-19 15:54:44'),
(12, 5, 'Convention', 'Convention-3', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 15:54:45', '2014-09-19 15:54:45'),
(13, 5, 'Convention', 'Convention-4', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 15:55:03', '2014-09-19 15:55:03'),
(14, 5, ' Factures', ' Factures-2', '2014-09-19', 1, '', '', 4, 1, '2014-09-19 15:58:42', '2014-09-19 15:58:42'),
(15, 5, 'Convention', 'Convention-5', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 15:59:54', '2014-09-19 15:59:54'),
(16, 5, ' Factures', ' Factures-3', '2014-09-19', 1, '', '', 4, 1, '2014-09-19 16:00:15', '2014-09-19 16:00:15'),
(17, 5, ' Factures', ' Factures-4', '2014-09-19', 1, '', '', 4, 1, '2014-09-19 16:01:16', '2014-09-19 16:01:16'),
(18, 5, ' Factures', ' Factures-5', '2014-09-19', 0, '', '', 4, 1, '2014-09-19 17:03:39', '2014-09-19 17:03:39'),
(19, 3, 'Convention', 'Convention-3', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 22:02:03', '2014-09-19 22:02:03'),
(20, 3, 'Convention', 'Convention-4', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 22:04:53', '2014-09-19 22:04:53'),
(21, 3, 'Convention', 'Convention-5', '2014-09-19', 1, '', '', 1, 1, '2014-09-19 22:06:35', '2014-09-19 22:06:35'),
(22, 2, 'Convention', 'Convention-1', '2014-11-20', 1, '', '', 1, 1, '2014-11-20 16:41:29', '2014-11-20 16:41:29'),
(23, 2, 'Convention', 'Convention-2', '2014-11-20', 1, '', '', 1, 1, '2014-11-20 16:41:51', '2014-11-20 16:41:51'),
(24, 2, 'Bulletin de versement (BV)', 'Bulletin de versement (BV)-1', '2015-03-03', 1, '', '', 3, 1, '2015-03-03 15:30:17', '2015-03-03 15:30:17'),
(25, 8, 'Attestation de fin de mission', 'Attestation de fin de mission-1', '2015-03-03', 1, '', '', 2, 1, '2015-03-03 15:54:11', '2015-03-03 15:54:11'),
(26, 8, 'Accord de confidentialité', 'Accord de confidentialité-1', '2015-03-03', 1, '', '', 7, 1, '2015-03-03 15:56:02', '2015-03-03 15:56:02'),
(27, 2, 'Attestation de fin de mission', 'Attestation de fin de mission-1', '2015-03-03', 1, '', '', 2, 1, '2015-03-03 16:19:06', '2015-03-03 16:19:06'),
(28, 1, 'Convention', 'Convention-1', '2015-03-11', 1, '', '', 1, 1, '2015-03-11 18:15:33', '2015-03-11 18:15:33'),
(29, 1, 'Accord de confidentialité', 'Accord de confidentialité-1', '2015-03-11', 1, '', '', 7, 1, '2015-03-11 18:16:02', '2015-03-11 18:16:02'),
(30, 1, 'Convention', 'Convention-2', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 21:23:30', '2015-03-13 21:23:30'),
(31, 1, 'Convention', 'Convention-3', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 21:30:12', '2015-03-13 21:30:12'),
(32, 1, 'Convention', 'Convention-4', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:43:14', '2015-03-13 23:43:14'),
(33, 1, 'Convention', 'Convention-5', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:49:18', '2015-03-13 23:49:18'),
(34, 1, 'Convention', 'Convention-6', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:49:40', '2015-03-13 23:49:40'),
(35, 1, 'Convention', 'Convention-7', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:50:54', '2015-03-13 23:50:54'),
(36, 1, 'Convention', 'Convention-8', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:52:18', '2015-03-13 23:52:18'),
(37, 1, 'Convention', 'Convention-9', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:53:21', '2015-03-13 23:53:21'),
(38, 1, 'Convention', 'Convention-10', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:58:36', '2015-03-13 23:58:36'),
(39, 13, 'Convention', 'Convention-1', '2015-03-13', 1, '', '', 1, 1, '2015-03-13 23:59:17', '2015-03-13 23:59:17'),
(40, 1, 'Convention', 'Convention-11', '2015-03-14', 1, '', '', 1, 1, '2015-03-14 00:03:01', '2015-03-14 00:03:01'),
(41, 13, 'Convention', 'Convention-2', '2015-03-14', 1, '', '', 1, 1, '2015-03-14 00:04:44', '2015-03-14 00:04:44'),
(42, 13, 'Convention', 'Convention-3', '2015-03-14', 1, '', '', 1, 1, '2015-03-14 00:29:35', '2015-03-14 00:29:35'),
(43, 13, 'Convention', 'Convention-4', '2015-03-14', 1, '', '', 1, 1, '2015-03-14 00:32:47', '2015-03-14 00:32:47'),
(44, 3, 'Convention', 'Convention-6', '2015-03-14', 1, '', '', 1, 1, '2015-03-14 14:22:04', '2015-03-14 14:22:04'),
(45, 1, 'Accord de confidentialité', 'Accord de confidentialité-2', '2015-03-17', 1, '', '', 7, 1, '2015-03-17 00:14:46', '2015-03-17 00:14:46'),
(46, 2, 'Avenant étudiant', 'Avenant étudiant-1', '2015-03-18', 1, '', '', 8, 1, '2015-03-18 00:01:47', '2015-03-18 00:01:47'),
(47, 2, 'Accord de confidentialité', 'Accord de confidentialité-1', '2015-03-18', 1, '', '', 7, 1, '2015-03-18 00:02:22', '2015-03-18 00:02:22'),
(48, 2, 'Accord de confidentialité', 'Accord de confidentialité-2', '2015-03-18', 1, '', '', 7, 1, '2015-03-18 00:02:43', '2015-03-18 00:02:43'),
(49, 1, 'Convention', 'Convention-12', '2015-03-18', 1, '', '', 1, 1, '2015-03-18 14:14:56', '2015-03-18 14:14:56'),
(50, 1, 'Convention', 'Convention-13', '2015-03-18', 1, '', '', 1, 1, '2015-03-18 17:30:36', '2015-03-18 17:30:36'),
(51, 1, 'Attestation de fin de mission', 'Attestation de fin de mission-1', '2015-03-18', 1, '', '', 2, 1, '2015-03-18 17:30:47', '2015-03-18 17:30:47'),
(52, 1, 'Accord de confidentialité', 'Accord de confidentialité-3', '2015-03-18', 1, '', '', 7, 1, '2015-03-18 17:31:08', '2015-03-18 17:31:08'),
(53, 1, 'Avenant étudiant', 'Avenant étudiant-1', '2015-03-18', 1, '', '', 8, 1, '2015-03-18 17:31:23', '2015-03-18 17:31:23'),
(54, 1, 'Convention', 'Convention-14', '2015-03-18', 1, '', '', 1, 1, '2015-03-18 17:38:28', '2015-03-18 17:38:28'),
(55, 23, 'Bulletin de versement (BV)', 'Bulletin de versement (BV)-1', '2015-11-17', 1, '', '', 3, 1, '2015-11-17 14:56:49', '2015-11-17 14:56:49'),
(56, 23, 'Accord de confidentialité', 'Accord de confidentialité-1', '2015-11-17', 1, '', '', 7, 1, '2015-11-17 15:01:14', '2015-11-17 15:01:14'),
(57, 23, 'Bulletin de versement (BV)', 'Bulletin de versement (BV)-2', '2015-11-17', 1, '', '', 3, 1, '2015-11-17 15:01:36', '2015-11-17 15:01:36'),
(58, 19, 'Bulletin de versement (BV)', 'Bulletin de versement (BV)-1', '2015-11-17', 1, '', '', 3, 1, '2015-11-17 16:25:02', '2015-11-17 16:25:02'),
(59, 24, 'Bulletin de versement (BV)', 'Bulletin de versement (BV)-1', '2015-11-18', 1, '', '', 3, 1, '2015-11-18 11:21:05', '2015-11-18 11:21:05'),
(60, 24, ' Factures', ' Factures-1', '2015-11-18', 0, '', '', 4, 1, '2015-11-18 11:23:15', '2015-11-18 11:23:15'),
(61, 1, ' Factures', ' Factures-1', '2015-11-18', 0, '', '', 4, 1, '2015-11-18 14:23:21', '2015-11-18 14:23:21'),
(62, 1, ' Factures', ' Factures-2', '2015-11-21', 0, '', '', 4, 1, '2015-11-21 03:24:03', '2015-11-21 03:24:03'),
(63, 1, ' Factures', ' Factures-3', '2015-11-21', 0, '', '', 4, 1, '2015-11-21 03:24:41', '2015-11-21 03:24:41'),
(64, 1, 'Avenant étudiant', 'Avenant étudiant-2', '2015-11-21', 1, '', '', 8, 1, '2015-11-21 03:24:49', '2015-11-21 03:24:49');

-- --------------------------------------------------------

--
-- Structure de la table `document_templates`
--

CREATE TABLE IF NOT EXISTS `document_templates` (
  `id_document_template` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_document` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_document_template`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `document_templates`
--

INSERT INTO `document_templates` (`id_document_template`, `id_type_document`, `content`, `added`, `updated`) VALUES
(1, 1, '<table style="width: 80%;" align="center">\r\n        <tbody><tr>\r\n            <td style="width: 100%;" align="center">\r\n                <h1>\r\n                    <u> $num_convention</u>\r\n                </h1>\r\n            </td>\r\n        </tr>\r\n    </tbody></table>\r\n<table style="width: 80%;" align="center">\r\n        <tbody><tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p><strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"],</strong> <br>  $this-&gt;etude["num_rcs"], <br>  $this-&gt;etude ["adresse"] $this-&gt;etude["code_postal"]  $this-&gt;etude["ville"] <br>   $this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"], <br>  <strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong>,</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p><strong></strong>,  $this-&gt;etude["siret"] $this-&gt;etude["id_sector"]  $num_urssaf <br>  , <br>  <strong></strong>,</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p> <strong></strong>  <strong></strong> </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p> <strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong>  <strong></strong> </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>&nbsp;</p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p> <strong></strong>  $this-&gt;etude["je"] </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p> <strong></strong>  <strong></strong> <strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong> </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p><strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong>  <strong></strong> </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                     \r\n                     \r\n                                        $this-&gt;etude["budget_fsi"] \r\n                     \r\n                    ($this-&gt;etude["descriptif"]\r\n                     ) \r\n                                        $this-&gt;etude["je"] ($duree_etude_texte) \r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                    &nbsp;                </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                     \r\n                    <strong></strong> \r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                     $duree_prestation \r\n                     $num_premiere-semaine \r\n                     $num_derniere-semaine.\r\n                </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                     \r\n                    <strong></strong> \r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                     \r\n                    <strong></strong>\r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n               <p>\r\n                     \r\n                    <strong></strong> \r\n                                   </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                     \r\n                    <br> \r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p> \r\n                     \r\n                     \r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                                        <strong></strong> \r\n                     \r\n                    <strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong> \r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <strong></strong>\r\n                     \r\n                    <strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong>\r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                    </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                     \r\n                    <strong></strong>.\r\n                </p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p>\r\n                    <u></u>\r\n                                     </p>             \r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n                <p></p>\r\n            </td>\r\n        </tr>\r\n    </tbody></table>\r\n\r\n<table style="width: 80%;" align="center">\r\n        <tbody><tr>\r\n            <td> $fait_a_date, <br> </td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td> <strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong> <br> </td>\r\n            <td> <strong></strong> <br> </td>\r\n        </tr>\r\n        <tr>\r\n            <td>&nbsp;</td>\r\n            <td>&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td><br> <strong>$this-&gt;etude["nom_societe"]."". $this-&gt;etude["nom"]." ". $this-&gt;etude["prenom"]</strong></td>\r\n            <td><i></i> <br> <strong></strong></td>\r\n        </tr>\r\n    </tbody></table>', '2015-03-06 23:21:10', '2015-03-06 23:26:31'),
(2, 2, '<h1 style="margin: 0px 0px 15px; padding: 0px 0px 0px 45px; outline: 0px; -webkit-tap-highlight-color: transparent; font-weight: normal; color: rgb(169, 11, 3); font-size: 14px; line-height: 16px; font-family: HelveticaNeueExtended, ''Helvetica Neue'', Helvetica, Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px; text-align: center; background: url(http://oge.demo2.equinoa.net/images/admin/shape1.png) 0px 50% no-repeat rgb(252, 252, 252);">\r\n	<span style="margin: 0px; padding: 0px 46px 0px 0px; outline: 0px; -webkit-tap-highlight-color: transparent; background: url(http://oge.demo2.equinoa.net/images/admin/shape2.png) 100% 50% no-repeat;">ATTESTATION DE FIN DE MISSION</span></h1>\r\n', '2015-03-06 23:21:30', '2015-03-06 23:21:30');

-- --------------------------------------------------------

--
-- Structure de la table `doc_elements`
--

CREATE TABLE IF NOT EXISTS `doc_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_doc_template` int(11) NOT NULL,
  `id_elements` int(11) NOT NULL,
  `value` text NOT NULL,
  `complement` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `doc_elements`
--

INSERT INTO `doc_elements` (`id`, `id_doc_template`, `id_elements`, `value`, `complement`, `status`, `added`, `updated`) VALUES
(1, 1, 8, '1', '', 1, '2015-11-17 15:47:19', '2015-11-23 10:31:33');

-- --------------------------------------------------------

--
-- Structure de la table `doc_templates`
--

CREATE TABLE IF NOT EXISTS `doc_templates` (
  `id_doc_template` int(11) NOT NULL AUTO_INCREMENT,
  `id_type_document` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_doc_template`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `doc_templates`
--

INSERT INTO `doc_templates` (`id_doc_template`, `id_type_document`, `added`, `updated`) VALUES
(1, 1, '2015-03-11 10:48:49', '2015-03-11 00:00:00'),
(2, 2, '2015-03-11 10:49:26', '2015-03-11 10:49:30'),
(3, 3, '2015-03-11 10:50:12', '2015-03-11 10:50:14'),
(4, 4, '2015-03-11 10:50:22', '2015-03-11 10:50:26'),
(5, 5, '2015-03-11 10:51:06', '2015-03-11 10:51:09'),
(6, 6, '2015-03-11 10:51:12', '2015-03-11 10:51:14'),
(7, 7, '2015-03-11 10:51:17', '2015-03-11 10:51:20'),
(8, 8, '2015-03-11 10:51:22', '2015-03-11 10:51:26');

-- --------------------------------------------------------

--
-- Structure de la table `elements`
--

CREATE TABLE IF NOT EXISTS `elements` (
  `id_element` int(11) NOT NULL AUTO_INCREMENT,
  `id_template` int(11) NOT NULL COMMENT 'ID du template pour cet élément',
  `id_bloc` int(11) NOT NULL COMMENT 'ID du bloc pour cet élément',
  `name` varchar(255) NOT NULL COMMENT 'Nom de l''élément',
  `slug` varchar(255) NOT NULL COMMENT 'Slug de l''élément pour l''appeler dans les pages',
  `ordre` int(11) NOT NULL DEFAULT '0' COMMENT 'Ordre de l''élément sur le template ou le bloc, on commence à 0',
  `type_element` varchar(50) NOT NULL COMMENT 'Liste des types d''élément pour l''affichage du formulaire',
  `status` tinyint(1) NOT NULL COMMENT 'Statut de l''élément (0 : offline | 1 : online | 2: intouchable)',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id_element`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `elements`
--

INSERT INTO `elements` (`id_element`, `id_template`, `id_bloc`, `name`, `slug`, `ordre`, `type_element`, `status`, `added`, `updated`) VALUES
(8, 1, 0, 'Setting 1', 'convention-document-setting-1', 0, 'Texte', 1, '2015-03-11 22:31:06', '2015-03-14 15:45:26'),
(9, 1, 0, 'Setting 2', 'convention-document-setting-2', 1, 'Texte', 1, '2015-03-11 22:36:34', '2015-03-11 22:36:34'),
(10, 1, 0, 'Setting 3', 'convention-document-setting-3', 2, 'Texte', 1, '2015-03-11 22:36:56', '2015-03-11 22:36:56'),
(11, 1, 0, 'Setting 4', 'convention-document-setting-4', 3, 'Texte', 1, '2015-03-11 22:39:36', '2015-03-11 22:39:36'),
(12, 1, 0, 'Setting 5', 'convention-document-setting-5', 4, 'Texte', 1, '2015-03-11 22:40:18', '2015-03-11 22:40:18'),
(13, 1, 0, 'Setting 6', 'convention-document-setting-6', 5, 'Texte', 1, '2015-03-11 22:42:37', '2015-03-11 22:42:37'),
(14, 1, 0, 'Setting 7', 'convention-document-setting-7', 6, 'Texte', 1, '2015-03-11 22:42:53', '2015-03-11 22:42:53');

-- --------------------------------------------------------

--
-- Structure de la table `errors`
--

CREATE TABLE IF NOT EXISTS `errors` (
  `id_error` int(11) NOT NULL AUTO_INCREMENT,
  `errid` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `trace` text NOT NULL,
  `session` text NOT NULL,
  `post` text NOT NULL,
  `server` text NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_error`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `errors`
--


-- --------------------------------------------------------

--
-- Structure de la table `etudes`
--

CREATE TABLE IF NOT EXISTS `etudes` (
  `id_etudes` int(11) NOT NULL AUTO_INCREMENT,
  `id_oge_client` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `num_convention` varchar(55) NOT NULL,
  `nom_interne` varchar(150) NOT NULL,
  `descriptif` varchar(250) NOT NULL,
  `budget_fsi` varchar(50) NOT NULL,
  `je` varchar(50) NOT NULL,
  `budget_hfs` varchar(50) NOT NULL,
  `frais_previsio` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_etudes`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `etudes`
--

INSERT INTO `etudes` (`id_etudes`, `id_oge_client`, `id_contact`, `num_convention`, `nom_interne`, `descriptif`, `budget_fsi`, `je`, `budget_hfs`, `frais_previsio`, `date_debut`, `date_fin`, `added`, `updated`) VALUES
(1, 35, 4, '', 'etude 15', 'Descripcion', 'budget', 'je', '150', '350', '0000-00-00', '0000-00-00', '2014-04-12 12:12:40', '2014-04-19 12:12:42'),
(2, 35, 23, '', 'Etude 1', 'Etude 1', '500', '110', '390', '100', '0000-00-00', '0000-00-00', '2014-08-29 17:16:01', '2014-08-29 17:16:01'),
(3, 29, 18, '', 'Etudes Test Al', 'Description Etudes Test Al', '500', '1', '390', '1', '0000-00-00', '0000-00-00', '2014-09-10 01:18:45', '2014-09-10 01:18:45'),
(4, 31, 21, '', 'Etude 5', 'Etude 5', '500', '500', '390', '500', '0000-00-00', '0000-00-00', '2014-09-10 01:44:19', '2014-09-10 01:44:19'),
(5, 33, 23, '', 'Etude 21', 'New Etude 21', '200', '150', '156', '150', '0000-00-00', '0000-00-00', '2014-09-19 15:51:41', '2014-09-19 15:51:41'),
(6, 29, 23, '', 'lalalal', 'lalalala', '600', '12', '468', '0', '0000-00-00', '0000-00-00', '2015-01-15 20:20:03', '2015-01-15 20:20:03'),
(7, 33, 20, '', 'L''Oréal BD', 'Faire beaucoup de choses avec plein de questionnaires', '8600', '30', '6708', '800', '0000-00-00', '0000-00-00', '2015-01-25 11:20:48', '2015-01-25 11:20:48'),
(8, 32, 17, '', 'TEST DN', 'Etude de marché sur le lancement d''une start up de co voiturage', '3500', '10', '2730', '150', '0000-00-00', '0000-00-00', '2015-03-03 08:10:43', '2015-03-03 08:10:43'),
(9, 29, 18, '1', 'test', 'test', '1542', '12345', '1202.76', '12345', '2015-03-05', '2015-03-07', '2015-03-05 18:25:52', '2015-03-05 18:25:52'),
(10, 29, 20, '2', 'test two', 'test two', '4512', '45123', '3519.36', '451233', '2015-03-05', '2015-03-05', '2015-03-05 18:26:43', '2015-03-05 18:26:43'),
(11, 32, 17, '1', 'étude 1', 'Admodum intellegam éx usu, in vix feûgiat cïvibus mènàndri. Quœ eu quœd torquatôs pêrseçutî, assentiœr tincidunt mei an. No seâ œmnesque vîtuperatœribùs, pro ét nœbîs altêrùm posidôniûm. Eû pro error œffîçîîs vïtupëratoribus, pôpulo çaûsaë sed te. Qû', '1200', '10', '936', '50', '2015-01-01', '2015-01-31', '2015-03-06 20:22:36', '2015-03-06 20:22:36'),
(12, 34, 18, '2', 'étude 2', 'Vix option dolorés glœriàtur an.', '1500', '20', '1170', '100', '2015-02-01', '2015-02-28', '2015-03-06 20:28:35', '2015-03-06 20:28:35'),
(13, 34, 19, '1', 'étude 3', 'Duis dicéret mînimum quô té, eïùs cœnsùlatû lâboràmus mea ad, atqùi voçent àt ëam.', '300', '15', '234', '20', '2015-02-12', '2015-02-15', '2015-03-06 20:30:32', '2015-03-06 20:30:32'),
(14, 29, 19, '2', 'étude 4', 'Bœnorum apèîrian in pri. Ex ùllum maîèstatis théophrastùs qui.', '1100', '14', '858', '150', '2014-10-01', '2015-02-18', '2015-03-06 20:36:26', '2015-03-06 20:36:26'),
(15, 34, 21, '1', 'étude 5', 'In seà vêrï qûàndo option, qùi në férri vïtaé definïtiônés. Nec ùtînàm voluptatîbus éx.', '5000', '60', '3900', '300', '2015-02-19', '2015-03-07', '2015-03-06 20:37:55', '2015-03-06 20:37:55'),
(16, 36, 22, '2', 'étude 6', 'Ea hàbèô venïâm féugait ést.', '10000', '500', '7800', '2000', '2015-03-06', '2016-09-30', '2015-03-06 20:39:29', '2015-03-06 20:39:29'),
(17, 31, 18, '2', 'étude 7', 'Aétérno fâcilis lobortïs mei at, hàs ïllùm fàbulàs mêntitum àn.', '10000', '10', '7800', '100', '2015-03-06', '2015-03-27', '2015-03-06 20:57:55', '2015-03-06 20:57:55'),
(18, 33, 17, '1', 'étude 8', 'Error tollit àbhôrreant at prô.', '3000', '333', '2340', '150', '2015-02-04', '2015-03-06', '2015-03-06 21:03:53', '2015-03-06 21:03:53'),
(19, 34, 19, '2', 'étude 8', 'Nâm pàulo possît at, eœs in cibœ omnêsqué âdvèrsariùm.', '800', '10', '624', '100', '2015-03-04', '2015-03-19', '2015-03-06 21:36:06', '2015-03-06 21:36:06'),
(20, 34, 21, '2', 'étude 9', 'Ut cum elît veri vôlûptatùm, êrânt rèprimïque quî ne.', '10000', '222', '7800', '300', '2015-01-13', '2015-02-18', '2015-03-06 21:37:22', '2015-03-06 21:37:22'),
(21, 29, 17, '2', 'étude 9', 'Natum altérum vîm ut, êt per êràt falli nonùmes.', '5000', '34', '3900', '300', '2015-03-01', '2015-04-30', '2015-03-06 21:38:32', '2015-03-06 21:38:32'),
(22, 29, 17, '2', 'étude 10', 'Id èlïtr interprétârîs ëâm.', '5000', '20', '3900', '150', '2015-03-01', '2015-03-14', '2015-03-06 21:40:45', '2015-03-06 21:40:45'),
(23, 31, 20, '1', 'test', 'test', '1000', '10000', '780', '500', '2015-11-17', '2015-11-18', '2015-11-17 14:49:06', '2015-11-17 14:49:06'),
(24, 31, 25, '12384', 'test c', 'test c', '1000', '1', '780', '12', '2015-11-18', '2015-11-30', '2015-11-18 10:49:00', '2015-11-18 10:49:00');

-- --------------------------------------------------------

--
-- Structure de la table `fdp`
--

CREATE TABLE IF NOT EXISTS `fdp` (
  `id_fdp` int(11) NOT NULL AUTO_INCREMENT,
  `id_zone` int(11) NOT NULL,
  `id_type` int(11) NOT NULL COMMENT 'Reference de la table type de livraison',
  `poids` int(11) NOT NULL COMMENT 'En gramme donc pas de virgules',
  `fdp` float NOT NULL,
  `fdp_reduit` float NOT NULL COMMENT 'Montant des frais de port quand on atteint le seuil de gratuité',
  `montant_free` float NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_fdp`),
  UNIQUE KEY `id_zone` (`id_zone`,`id_type`,`poids`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `fdp`
--


-- --------------------------------------------------------

--
-- Structure de la table `fdp_type`
--

CREATE TABLE IF NOT EXISTS `fdp_type` (
  `id_type` int(11) NOT NULL,
  `id_langue` varchar(2) NOT NULL,
  `crosslog` int(11) NOT NULL COMMENT 'correspondance crosslog',
  `url_suivi` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `affichage` text NOT NULL,
  `description` text NOT NULL,
  `delais_min` int(11) NOT NULL,
  `delais_max` int(11) NOT NULL,
  `ordre` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL COMMENT '0: inactif | 1: Actif',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_type`,`id_langue`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fdp_type`
--


-- --------------------------------------------------------

--
-- Structure de la table `formes`
--

CREATE TABLE IF NOT EXISTS `formes` (
  `id_forme` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_forme`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `formes`
--

INSERT INTO `formes` (`id_forme`, `description`, `added`, `updated`) VALUES
(1, 'Forme 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Forme 2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Forme 3', '2011-10-27 17:20:49', '2011-10-27 17:20:49'),
(4, 'Forme 4', '2011-10-27 17:20:49', '2011-10-27 17:20:49');

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE IF NOT EXISTS `groupes` (
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: Offline | 1: Online',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `groupes`
--


-- --------------------------------------------------------

--
-- Structure de la table `info_documents`
--

CREATE TABLE IF NOT EXISTS `info_documents` (
  `id_info_document` int(11) NOT NULL AUTO_INCREMENT,
  `id_document` int(11) NOT NULL,
  `adresse_etudiant` varchar(255) DEFAULT NULL,
  `adresse_pp` varchar(255) DEFAULT NULL,
  `adresse_societe` varchar(255) DEFAULT NULL,
  `capital_societe` varchar(255) DEFAULT NULL,
  `code_naf` varchar(255) DEFAULT NULL,
  `cp_etudiant` varchar(255) DEFAULT NULL,
  `cp_societe` varchar(255) DEFAULT NULL,
  `date_echeance` timestamp NULL DEFAULT NULL,
  `date_envoi_courrier` timestamp NULL DEFAULT NULL,
  `date_reception_doc` timestamp NULL DEFAULT NULL,
  `date_signature_convention` timestamp NULL DEFAULT NULL,
  `duree_etude` varchar(255) DEFAULT NULL,
  `duree_etude_texte` varchar(255) DEFAULT NULL,
  `etudiant` varchar(255) DEFAULT NULL,
  `fait_a_date` varchar(255) DEFAULT NULL,
  `lieu_rcs_societe` varchar(255) DEFAULT NULL,
  `metier_societe` varchar(255) DEFAULT NULL,
  `mission_etude` varchar(255) DEFAULT NULL,
  `nom_contact` varchar(255) DEFAULT NULL,
  `nom_pp` varchar(255) DEFAULT NULL,
  `nom_societe` varchar(255) DEFAULT NULL,
  `nom_tresorier` varchar(255) DEFAULT NULL,
  `num_convention` int(11) DEFAULT NULL,
  `num_etudiant` int(11) DEFAULT NULL,
  `num_facture` int(11) DEFAULT NULL,
  `num_rcs_societe` int(11) DEFAULT NULL,
  `num_siret` int(11) DEFAULT NULL,
  `num_urssaf` int(11) DEFAULT NULL,
  `prenom_contact` varchar(255) DEFAULT NULL,
  `prix_prestation_ht` varchar(255) DEFAULT NULL,
  `prix_prestation_ht_texte` varchar(255) DEFAULT NULL,
  `solde_relatif` varchar(255) DEFAULT NULL,
  `total_frais` varchar(255) DEFAULT NULL,
  `total_ttc_a_regler` varchar(255) DEFAULT NULL,
  `total_ttc_a_regler_lettre` varchar(255) DEFAULT NULL,
  `total_tva` varchar(255) DEFAULT NULL,
  `total_valeur_frais_ht` varchar(255) DEFAULT NULL,
  `tva` varchar(255) DEFAULT NULL,
  `type_frais` varchar(255) DEFAULT NULL,
  `valeur_frais_ht` varchar(255) DEFAULT NULL,
  `ville_etudiant` varchar(255) DEFAULT NULL,
  `ville_societe` varchar(255) DEFAULT NULL,
  `added` timestamp NULL DEFAULT NULL,
  `uptated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_info_document`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `info_documents`
--

INSERT INTO `info_documents` (`id_info_document`, `id_document`, `adresse_etudiant`, `adresse_pp`, `adresse_societe`, `capital_societe`, `code_naf`, `cp_etudiant`, `cp_societe`, `date_echeance`, `date_envoi_courrier`, `date_reception_doc`, `date_signature_convention`, `duree_etude`, `duree_etude_texte`, `etudiant`, `fait_a_date`, `lieu_rcs_societe`, `metier_societe`, `mission_etude`, `nom_contact`, `nom_pp`, `nom_societe`, `nom_tresorier`, `num_convention`, `num_etudiant`, `num_facture`, `num_rcs_societe`, `num_siret`, `num_urssaf`, `prenom_contact`, `prix_prestation_ht`, `prix_prestation_ht_texte`, `solde_relatif`, `total_frais`, `total_ttc_a_regler`, `total_ttc_a_regler_lettre`, `total_tva`, `total_valeur_frais_ht`, `tva`, `type_frais`, `valeur_frais_ht`, `ville_etudiant`, `ville_societe`, `added`, `uptated`) VALUES
(8, 8, '', '', 'rue 2', '', 'Secteur 1', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', '200', 'New Etude 21', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 15:52:49', '0000-00-00 00:00:00'),
(7, 7, '', '', 'Avenue Guabi', '', '', '', '12345', '2014-09-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'empresa  natural 1', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Paris', '2014-09-19 01:04:21', '0000-00-00 00:00:00'),
(6, 6, '', '', 'Avenue Guabi', '', '', '', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', '', '', '', '', '', '', 'empresa  natural 1', '', 0, 0, 0, 0, 0, 0, '', '500', 'Description Etudes Test Al', '', '', '', '', '', '', '', '', '', '', 'Paris', '2014-09-19 01:01:56', '0000-00-00 00:00:00'),
(5, 5, '', '', 'Avenue Guabi', '', '', '', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', '', '', '', '', '', '', 'empresa  natural 1', '', 0, 0, 0, 0, 0, 0, '', '500', 'Description Etudes Test Al', '', '', '', '', '', '', '', '', '', '', 'Paris', '2014-09-19 01:01:33', '0000-00-00 00:00:00'),
(9, 9, '', '', 'rue 2', '', '', '', '700012', '2014-09-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 15:53:51', '0000-00-00 00:00:00'),
(10, 10, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2014-09-19 15:54:16', '0000-00-00 00:00:00'),
(11, 11, '', '', 'rue 2', '', 'Secteur 1', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', '200', 'New Etude 21', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 15:54:44', '0000-00-00 00:00:00'),
(12, 12, '', '', 'rue 2', '', 'Secteur 1', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', '200', 'New Etude 21', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 15:54:45', '0000-00-00 00:00:00'),
(13, 13, '', '', 'rue 2', '', 'Secteur 1', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', '200', 'New Etude 21', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 15:55:03', '0000-00-00 00:00:00'),
(14, 14, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 15:58:42', '0000-00-00 00:00:00'),
(15, 15, '', '', 'rue 2', '', 'Secteur 1', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '150', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', '200', 'New Etude 21', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 15:59:54', '0000-00-00 00:00:00'),
(16, 16, '', '', 'rue 2', '', '', '', '700012', '2014-09-27 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 16:00:15', '0000-00-00 00:00:00'),
(17, 17, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 16:01:16', '0000-00-00 00:00:00'),
(18, 18, '', '', 'rue 2', '', '', '', '700012', '2014-09-30 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-09-19 17:03:39', '0000-00-00 00:00:00'),
(19, 19, '', '', 'Avenue Guabi', '', '', '', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', '', '', '', '', '', '', 'empresa  natural 1', '', 0, 0, 0, 0, 0, 0, '', '500', 'Description Etudes Test Al', '', '', '', '', '', '', '', '', '', '', 'Paris', '2014-09-19 22:02:03', '0000-00-00 00:00:00'),
(20, 20, '', '', 'Avenue Guabi', '', '', '', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', '', '', '', '', '', '', 'empresa  natural 1', '', 0, 0, 0, 0, 0, 0, '', '500', 'Description Etudes Test Al', '', '', '', '', '', '', '', '', '', '', 'Paris', '2014-09-19 22:04:53', '0000-00-00 00:00:00'),
(21, 21, '', '', 'Avenue Guabi', '', '', '', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', '', '', '', '', '', '', 'empresa  natural 1', '', 0, 0, 0, 0, 0, 0, '', '500', 'Description Etudes Test Al', '', '', '', '', '', '', '', '', '', '', 'Paris', '2014-09-19 22:06:35', '0000-00-00 00:00:00'),
(22, 22, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '110', '', '', '', '', '', '', '', '', 'Empresa Juridica 4 ', '', 0, 0, 0, 0, 123456, 0, '', '500', 'Etude 1', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-11-20 16:41:29', '0000-00-00 00:00:00'),
(23, 23, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '110', '', '', '', '', '', '', '', '', 'Empresa Juridica 4 ', '', 0, 0, 0, 0, 123456, 0, '', '500', 'Etude 1', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2014-11-20 16:41:51', '0000-00-00 00:00:00'),
(24, 24, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-03 15:30:17', '0000-00-00 00:00:00'),
(25, 25, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-03 15:54:11', '0000-00-00 00:00:00'),
(26, 26, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '10', 'Contact', '', 'Empresa  Natural 1', '', 0, 0, 0, 0, 0, 0, '1', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-03 15:56:02', '0000-00-00 00:00:00'),
(27, 27, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-03 16:19:06', '0000-00-00 00:00:00'),
(28, 28, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-11 18:15:33', '0000-00-00 00:00:00'),
(29, 29, '', '', 'rue 2', '500', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'lieu rcs', '', 'je', 'test', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, 'test', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-11 18:16:02', '0000-00-00 00:00:00'),
(30, 30, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 21:23:30', '0000-00-00 00:00:00'),
(31, 31, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 21:30:12', '0000-00-00 00:00:00'),
(32, 32, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:43:14', '0000-00-00 00:00:00'),
(33, 33, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:49:18', '0000-00-00 00:00:00'),
(34, 34, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:49:40', '0000-00-00 00:00:00'),
(35, 35, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:50:54', '0000-00-00 00:00:00'),
(36, 36, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:52:18', '0000-00-00 00:00:00'),
(37, 37, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:53:21', '0000-00-00 00:00:00'),
(38, 38, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:58:36', '0000-00-00 00:00:00'),
(39, 39, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '15', '', '', '', '', '', '', '', '', 'Cliente 3 c', '', 0, 0, 0, 0, 0, 0, '', '300', 'Duis dicéret mînimum quô té, eïùs cœnsùlatû lâboràmus mea ad, atqùi voçent àt ëam.', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-13 23:59:17', '0000-00-00 00:00:00'),
(40, 40, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-14 00:03:01', '0000-00-00 00:00:00'),
(41, 41, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '15', '', '', '', '', '', '', '', '', 'Cliente 3 c', '', 0, 0, 0, 0, 0, 0, '', '300', 'Duis dicéret mînimum quô té, eïùs cœnsùlatû lâboràmus mea ad, atqùi voçent àt ëam.', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-14 00:04:44', '0000-00-00 00:00:00'),
(42, 42, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '15', '', '', '', '', '', '', '', '', 'Cliente 3 c', '', 0, 0, 0, 0, 0, 0, '', '300', 'Duis dicéret mînimum quô té, eïùs cœnsùlatû lâboràmus mea ad, atqùi voçent àt ëam.', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-14 00:29:35', '0000-00-00 00:00:00'),
(43, 43, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '15', '', '', '', '', '', '', '', '', 'Cliente 3 c', '', 0, 0, 0, 0, 0, 0, '', '300', 'Duis dicéret mînimum quô té, eïùs cœnsùlatû lâboràmus mea ad, atqùi voçent àt ëam.', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-14 00:32:47', '0000-00-00 00:00:00'),
(44, 44, '', '', 'Avenue Guabi', '', '', '', '12345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', '', '', '', '', '', '', 'Cliente 1 a', '', 0, 0, 0, 0, 0, 0, '', '500', 'Description Etudes Test Al', '', '', '', '', '', '', '', '', '', '', 'Paris', '2015-03-14 14:22:04', '0000-00-00 00:00:00'),
(45, 45, '', '', 'rue 2', '500', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'lieu rcs', '', 'je', 'test', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, 'test', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-17 00:14:46', '0000-00-00 00:00:00'),
(46, 46, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-18 00:01:47', '0000-00-00 00:00:00'),
(47, 47, '', '', 'rue 2', '500', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'lieu rcs', '', '110', 'David', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, 'nandji', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-18 00:02:22', '0000-00-00 00:00:00'),
(48, 48, '', '', 'rue 2', '500', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'lieu rcs', '', '110', 'David', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, 'nandji', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-18 00:02:43', '0000-00-00 00:00:00'),
(49, 49, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-18 14:14:56', '0000-00-00 00:00:00'),
(50, 50, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-18 17:30:36', '0000-00-00 00:00:00'),
(51, 51, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-18 17:30:47', '0000-00-00 00:00:00'),
(52, 52, '', '', 'rue 2', '500', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'lieu rcs', '', 'je', 'test', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, 'test', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-18 17:31:08', '0000-00-00 00:00:00'),
(53, 53, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-03-18 17:31:23', '0000-00-00 00:00:00'),
(54, 54, '', '', 'rue 2', '', 'Secteur 2', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'je', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 123456, 0, '', 'budget', 'Descripcion', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-03-18 17:38:28', '0000-00-00 00:00:00'),
(55, 55, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-11-17 14:56:49', '0000-00-00 00:00:00'),
(56, 56, '', '', 'rue 2', '6456', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 'lieu rcs', '', '10000', 'Contact  4', '', 'Empresa Juridica 1 ', '', 0, 0, 0, 0, 0, 0, '4', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-11-17 15:01:14', '0000-00-00 00:00:00'),
(57, 57, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-11-17 15:01:36', '0000-00-00 00:00:00'),
(58, 58, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-11-17 16:25:02', '0000-00-00 00:00:00'),
(59, 59, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-11-18 11:21:05', '0000-00-00 00:00:00'),
(60, 60, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 1 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-11-18 11:23:15', '0000-00-00 00:00:00'),
(61, 61, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-11-18 14:23:21', '0000-00-00 00:00:00'),
(62, 62, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-11-21 03:24:03', '0000-00-00 00:00:00'),
(63, 63, '', '', 'rue 2', '', '', '', '700012', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 'Empresa Juridica 3 ', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Yaoundé (CAMEROUN)', '2015-11-21 03:24:41', '0000-00-00 00:00:00'),
(64, 64, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2015-11-21 03:24:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `mails_filer`
--

CREATE TABLE IF NOT EXISTS `mails_filer` (
  `id_filermails` int(11) NOT NULL AUTO_INCREMENT,
  `id_textemail` int(11) NOT NULL,
  `desabo` varchar(255) NOT NULL,
  `email_nmp` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `headers` text NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_filermails`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `mails_filer`
--


-- --------------------------------------------------------

--
-- Structure de la table `mails_text`
--

CREATE TABLE IF NOT EXISTS `mails_text` (
  `id_textemail` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `lang` varchar(2) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `exp_name` varchar(255) NOT NULL,
  `exp_email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` longtext,
  `id_nmp` varchar(255) NOT NULL,
  `nmp_unique` varchar(255) NOT NULL,
  `nmp_secure` varchar(255) NOT NULL,
  `mode` tinyint(1) NOT NULL COMMENT '0 transac 1 Market',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_textemail`),
  UNIQUE KEY `type` (`type`,`lang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `mails_text`
--

INSERT INTO `mails_text` (`id_textemail`, `type`, `lang`, `name`, `exp_name`, `exp_email`, `subject`, `content`, `id_nmp`, `nmp_unique`, `nmp_secure`, `mode`, `added`, `updated`) VALUES
(1, 'admin-nouveau-mot-de-passe', 'fr', 'Admin - Nouveau mot de passe', 'Administrateur', 'admin@equinoa.fr', 'Nouveau mot de passe', '<html>\r\n	<head>\r\n    	<title>Nouveau mot de passe</title>\r\n        <style type=''text/css''>\r\n			img { display:block; }\r\n		</style>\r\n  	</head>\r\n    <body style=''margin:0; padding:0; text-align:center; background-color:#FFF;''>\r\n    	<table cellpadding=''0'' cellspacing=''0'' style=''font:12px Arial, Helvetica, sans-serif; color:#000; text-align:left;''>\r\n        	<tr>\r\n            	<td><img src=''$surl/images/admin/logo_$cms.png'' alt=''$cms'' /></td>\r\n          	</tr>\r\n            <tr><td>&nbsp;</td></tr>\r\n            <tr>\r\n            	<td style=''color:#2F86B2; font-weight:bold; font-size:16px;''>Nouveau mot de passe</td>\r\n          	</tr>\r\n            <tr><td>&nbsp;</td></tr>\r\n            <tr>\r\n            	<td>\r\n                	Bonjour,<br><br>\r\n                   	Voici les codes d''acc&egrave;s &agrave; votre compte :<br><br>\r\n                    <strong>Identifiant</strong> : $email<br>\r\n                    <strong>Mot de Passe</strong> : $password\r\n              	</td>\r\n          	</tr>\r\n            <tr><td>&nbsp;</td></tr>\r\n            <tr>\r\n            	<td style=''text-align:center; font-size:10px; line-height:12px;''><em>Ce message a &eacute;t&eacute; envoy&eacute; automatiquement, merci de ne pas y r&eacute;pondre.</em></td>\r\n          	</tr>\r\n     	</table>\r\n  	</body>\r\n</html>', '', '', '', 0, '2011-05-10 19:27:57', '2011-11-07 17:46:10'),
(2, 'admin-confirmation-inscription-client', 'fr', 'Admin - Confirmation inscription client', 'Administrateur', 'admin@equinoa.fr', 'Confirmation de votre inscription', '<html>\r\n	<head>\r\n    	<title>Confirmation de votre inscription</title>\r\n        <style type=''text/css''>\r\n			img { display:block; }\r\n		</style>\r\n  	</head>\r\n    <body style=''margin:0; padding:0; text-align:center; background-color:#FFF;''>\r\n    	<table cellpadding=''0'' cellspacing=''0'' style=''font:12px Arial, Helvetica, sans-serif; color:#000; text-align:left;''>\r\n        	<tr>\r\n            	<td><img src=''$surl/images/admin/logo_$cms.png'' alt=''$cms'' /></td>\r\n          	</tr>\r\n            <tr><td>&nbsp;</td></tr>\r\n            <tr>\r\n            	<td style=''color:#2F86B2; font-weight:bold; font-size:16px;''>Confirmation de votre inscription</td>\r\n          	</tr>\r\n            <tr><td>&nbsp;</td></tr>\r\n            <tr>\r\n            	<td>\r\n                	Bonjour $prenom,<br><br>\r\n					Voici les codes d''acc&egrave;s &agrave; votre compte client :<br><br>\r\n                    <strong>Identifiant</strong> : $email<br>\r\n                    <strong>Mot de Passe</strong> : $password\r\n              	</td>\r\n          	</tr>\r\n            <tr><td>&nbsp;</td></tr>\r\n            <tr>\r\n            	<td style=''text-align:center; font-size:10px; line-height:12px;''><em>Ce message a &eacute;t&eacute; envoy&eacute; automatiquement, merci de ne pas y r&eacute;pondre.</em></td>\r\n          	</tr>\r\n     	</table>\r\n  	</body>\r\n</html>', '', '', '', 0, '2011-05-23 17:51:11', '2011-11-07 17:45:47');

-- --------------------------------------------------------

--
-- Structure de la table `memos`
--

CREATE TABLE IF NOT EXISTS `memos` (
  `id_memo` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) NOT NULL,
  `id` int(11) NOT NULL,
  `target` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_memo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `memos`
--

INSERT INTO `memos` (`id_memo`, `description`, `id`, `target`, `status`, `added`, `updated`) VALUES
(1, 'Primer Mémo                                ', 1, '', 1, '2014-07-04 21:23:21', '2014-07-07 16:45:28'),
(2, 'Mi memo   editado\r\n                                                                                             ', 1, '', 0, '2014-07-04 22:00:34', '2014-07-04 22:00:51'),
(8, 'Test test', 1, 'clients', 1, '2014-08-06 18:51:37', '2014-08-06 18:51:37'),
(18, 'azsdf', 1, 'clients', 1, '2014-08-20 23:38:42', '2014-08-20 23:38:42'),
(9, 'jjjjjjjjjjjjjj', 1, 'clients', 1, '2014-08-06 18:53:56', '2014-08-06 18:53:56'),
(17, 'asd', 2, 'clients', 1, '2014-08-20 23:38:22', '2014-08-20 23:38:22'),
(16, 'testing', 1, 'clients', 1, '2014-08-20 16:14:56', '2014-08-20 23:43:53'),
(21, 'A Memo', 1, 'etudes', 1, '2014-08-27 14:50:47', '2014-08-27 14:50:47'),
(22, 'Memo  Test', 3, 'etudes', 1, '2014-09-19 00:47:37', '2014-09-19 00:47:37'),
(23, 'Memo 1\r\n', 5, 'etudes', 1, '2014-09-19 15:52:33', '2014-09-19 15:52:33'),
(24, 'ffjff', 15, 'cdm', 1, '2014-10-21 09:46:10', '2014-10-21 09:46:10'),
(25, 'dasd', 15, 'cdm', 1, '2014-11-20 15:48:52', '2014-11-20 15:48:52'),
(26, 'dasd', 15, 'cdm', 1, '2014-11-20 15:48:52', '2014-11-20 15:48:52'),
(28, 'adasd', 29, 'clients', 1, '2014-11-20 16:37:11', '2014-11-20 16:37:11'),
(29, 'fghgf\r\n', 24, 'contacts', 1, '2014-11-20 16:40:23', '2014-11-20 16:40:23'),
(30, 'dcsdvsdv', 20, 'contacts', 1, '2015-01-19 20:43:06', '2015-01-19 20:43:06'),
(31, 'dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff dfgrqdfdff ', 20, 'contacts', 1, '2015-01-19 20:43:22', '2015-01-19 20:43:22'),
(32, 'test', 7, 'etudes', 1, '2015-01-25 11:21:23', '2015-01-25 11:21:23'),
(33, 'rqgsf', 17, 'cdm', 1, '2015-01-25 11:46:51', '2015-01-25 11:46:51'),
(34, 'test\r\n', 29, 'clients', 1, '2015-11-17 14:38:26', '2015-11-17 14:38:26'),
(35, 'bhjbhbh,n ', 31, 'clients', 1, '2015-11-21 03:02:54', '2015-11-21 03:02:54'),
(36, 'cdsfse\r\n', 1, 'etudes', 1, '2015-11-21 03:26:52', '2015-11-21 03:26:52');

-- --------------------------------------------------------

--
-- Structure de la table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(5) NOT NULL COMMENT '0 : Hors ligne 1: En ligne',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `menus`
--


-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE IF NOT EXISTS `newsletters` (
  `id_newsletter` int(11) NOT NULL AUTO_INCREMENT,
  `id_langue` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: Désabonné | 1: Abonné',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_newsletter`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `newsletters`
--


-- --------------------------------------------------------

--
-- Structure de la table `nmp`
--

CREATE TABLE IF NOT EXISTS `nmp` (
  `id_nmp` int(11) NOT NULL AUTO_INCREMENT,
  `serialize_content` text NOT NULL,
  `date` date NOT NULL,
  `mailto` varchar(255) NOT NULL,
  `reponse` text NOT NULL,
  `erreur` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 pending 1 send 2 error 3 obiwan',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_nmp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `nmp`
--


-- --------------------------------------------------------

--
-- Structure de la table `nmp_desabo`
--

CREATE TABLE IF NOT EXISTS `nmp_desabo` (
  `id_desabo` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_textemail` int(11) NOT NULL,
  `raison` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_desabo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `nmp_desabo`
--


-- --------------------------------------------------------

--
-- Structure de la table `oge_clients`
--

CREATE TABLE IF NOT EXISTS `oge_clients` (
  `id_oge_client` int(11) NOT NULL AUTO_INCREMENT,
  `num_oge_client` int(11) NOT NULL,
  `typologie` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom_societe` varchar(150) DEFAULT NULL,
  `activite` varchar(150) DEFAULT NULL,
  `id_sector` varchar(150) DEFAULT NULL,
  `capital` varchar(150) DEFAULT NULL,
  `etranger` varchar(50) NOT NULL,
  `id_forme` varchar(50) DEFAULT NULL,
  `siret` varchar(150) DEFAULT NULL,
  `lieu_rcs` varchar(150) DEFAULT NULL,
  `num_rcs` varchar(150) DEFAULT NULL,
  `num_tva` varchar(150) DEFAULT NULL,
  `adresse` varchar(150) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `tel_standard` varchar(50) NOT NULL,
  `provenance` varchar(50) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `id_pays` varchar(50) NOT NULL,
  `site_internet` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `id_user` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_oge_client`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `oge_clients`
--

INSERT INTO `oge_clients` (`id_oge_client`, `num_oge_client`, `typologie`, `type`, `nom`, `prenom`, `nom_societe`, `activite`, `id_sector`, `capital`, `etranger`, `id_forme`, `siret`, `lieu_rcs`, `num_rcs`, `num_tva`, `adresse`, `ville`, `tel_standard`, `provenance`, `code_postal`, `id_pays`, `site_internet`, `status`, `id_user`, `added`, `updated`) VALUES
(27, 2014023, 'particulier', 'P', 'client1', 'client1', '', '', '', '', 'FR', '', '', '', '', '', 'client1client1', 'paris', '54321', 'Provenance 3', '12345', '4', 'www.client1.com', 0, 1, '2014-07-28 19:13:31', '2014-08-14 16:14:52'),
(2, 0, 'entreprise', '', '', '', 'test', 'test', 'Secteur 1', '1200', 'FR', 'Forme 2', '123456', '123456', '123456', '2123', 'rue 4', 'Paris', '12345', 'Provenance 1', '277777', '16', 'www.test.com', 0, 1, '2014-04-02 01:50:30', '2014-08-14 16:10:11'),
(3, 0, 'particulier', '', 'Client 1', 'Prenom', '', '', '', '', 'FR', '0', '', '', '', '', 'Avenue 2', 'Versalles', '+3159753654', '1', '23645', '78', 'www.test.com', 0, 1, '0000-00-00 00:00:00', '2014-07-28 19:09:44'),
(4, 2014004, 'particulier', '', 'Client 4', 'Prenom Client 4', '', '', '', '', 'FR', '0', '', '', '', '', 'Avenue 5', 'Monaco', '+3254968752', '1', '2054852', '79', 'www.client4.com', 0, 1, '2014-04-04 00:50:16', '2014-08-14 16:10:16'),
(5, 2014005, 'entreprise', '', '', '', 'Societe 3', 'Software', '1', '1500', 'FR', '1', '05163', 'Rcs', '1245', '12354', 'Avenue 9', 'Paris', '+312457862', '1', '204532', '79', 'www.societe3.com', 0, 1, '2014-04-04 00:56:20', '2014-08-14 16:10:20'),
(6, 2014006, 'particulier', '', 'Client 5', 'Prenom client 5', '', '', '', '', 'FR', '0', '', '', '', '', 'Avenue 6', 'Marseille', '+6978542665', '2', '0364585', '79', 'www.client5.com', 0, 1, '2014-04-04 01:01:29', '2014-04-14 17:00:22'),
(7, 2014007, 'entreprise', '', '', '', 'Societe 5', 'Development', '5', '5000', 'FR', '2', '4678', '456456', '35345', '45645456', 'Avenue 235', 'Paris', '+8654626', '4', '25452', '79', 'www.societe5.com', 0, 1, '2014-04-04 01:02:50', '2014-08-14 16:10:25'),
(8, 2014008, 'entreprise', '', '', '', 'Societe 6', 'Software', 'Secteur 1', '6000', 'FR', 'Forme 1', '456', '654654', '654654', '654645', 'Avenue 5', 'Paris', '+69854654', 'Provenance 1', '3654654', '19', 'www.societe6.com', 0, 1, '2014-04-04 01:04:18', '2014-08-14 16:10:29'),
(9, 2014009, 'particulier', '', 'Client  8', 'Prenom Client 8', '', '', '', '', 'FR', '0', '', '', '', '', 'Avenue 10', 'Paris', '+584262', '2', '46523', '79', 'www.test1.com', 0, 1, '2014-04-04 01:08:07', '2014-07-28 19:12:20'),
(10, 20140010, 'entreprise', '', '', '', 'Societe 10', 'Web', '1', '100000', 'RDM', '3', '45545', '36456', '65', '456+546+', 'Avenue 10', 'Paris', '+85697412', '3', '45682502', '79', 'www.societe10.com', 0, 1, '2014-04-04 01:09:19', '2014-08-14 16:10:33'),
(11, 0, 'particulier', '', 'Client Particulier', 'Prenom Particulier', '', '', '', '', 'FR', '0', '', '', '', '', 'Avenue 10', 'Paris', '+6854687', '2', '1654213', '79', 'www.client.com', 0, 1, '2014-04-04 01:10:22', '2014-07-28 19:12:26'),
(12, 2014012, 'particulier', '', 'perreau', 'louis', '', '', '', '', 'FR', '0', '', '', '', '', 'adresse teste', 'ville teste', '0655555555', '2', '45456', '79', 'www.equinoa.com', 0, 1, '2014-05-26 10:39:43', '2014-08-14 16:13:52'),
(13, 2014013, 'entreprise', '', '', '', 'moon', 'créateur de reve', '1', '1000000000', 'FR', '1', '651', 'rg', '9864', '987', 'rertertertert', 'erterte', '0666666666', '1', '12224', '19', 'rtyrtyry', 0, 1, '2014-05-27 10:29:21', '2014-08-14 16:13:55'),
(14, 2014014, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '6', 'Louis test Plusieurs pages', '3', 'Louis test Plusieurs pages', 0, 1, '2014-05-28 11:01:37', '2014-07-28 19:13:07'),
(15, 2014015, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '2', 'Louis test Plusieurs pages', '3', 'Louis test Plusieurs pages', 0, 1, '2014-05-28 11:02:15', '2014-07-28 19:13:03'),
(16, 2014016, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '2', 'Louis test Plusieurs pages', '3', 'Louis test Plusieurs pagesv', 0, 1, '2014-05-28 11:02:36', '2014-07-28 19:12:57'),
(17, 2014017, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '1', 'Louis test Plusieurs pages', '2', 'Louis test Plusieurs pages', 0, 1, '2014-05-28 11:02:56', '2014-07-28 19:12:53'),
(18, 2014018, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '1', 'Louis test Plusieurs pages', '1', 'Louis test Plusieurs pages', 0, 1, '2014-05-28 11:03:20', '2014-07-28 19:12:48'),
(19, 2014019, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '2', 'Louis test Plusieurs pages', '2', 'Louis test Plusieurs pages', 0, 1, '2014-05-28 11:03:36', '2014-07-28 19:12:44'),
(20, 2014020, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '1', 'Louis test Plusieurs pages', '1', 'Louis test Plusieurs pages', 0, 1, '2014-05-28 11:03:52', '2014-07-28 19:12:39'),
(21, 2014021, 'particulier', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '', '', '', '', 'FR', '0', '', '', '', '', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', 'Louis test Plusieurs pages', '1', 'Louis test Plusieurs pages', '2', 'Louis test Plusieurs pages', 0, 1, '2014-05-28 11:04:11', '2014-07-28 19:12:34'),
(22, 2014022, 'entreprise', '', '', '', 'Louis test affichageLouis test affichageLouis test affichageLouis test affichage', 'Louis test affichage', '1', 'Louis test affichage', 'FR', '2', 'Louis test affichage', 'Louis test affichage', 'Louis test affichage', 'Louis test affichage', 'Louis test affichage', 'Louis test affichage', '06518646863165', '1', 'Louis test affichage', '13', 'http://www.webpagetest.org/forums/showthread.php?tid=481&pid=23514#pid23514', 0, 1, '2014-05-28 11:08:56', '2014-08-14 16:13:48'),
(23, 2014023, 'entreprise', 'C', '', '', 'Equinoa', 'Agence Digitale', 'Secteur 2', '65000', 'FR', 'Forme 1', '123456789', 'Paris', '1234567890', 'FR123345677', '11bis rue Bachaumont', 'Paris', '0171183322', 'Provenance 1', '75003', '79', 'www.equinoa.com', 0, 1, '2014-07-02 09:08:34', '2014-08-14 16:14:43'),
(28, 2014024, 'entreprise', 'C', '', '', 'WOUOHOU', 'HJHF', 'Secteur 1', '123', 'FR', 'Forme 1', '12312312300017', 'Nanterre', '123123123', '50504784500027', 'eee', 'eee', '0630608527', 'Provenance 1', '14569', '13', 'www.orange.fr', 0, 2, '2014-08-06 19:01:11', '2014-08-14 16:33:08'),
(30, 2014026, 'entreprise', 'C', '', '', 'Empresa Juridica 1', 'Development', 'Secteur 2', '1000', 'UE', 'Forme 2', '123456', 'lieu rcs', 'num rcs', 'num tva ', 'Avenue Guabi', 'Éveux', '33123555', 'Provenance 2', '123456', '79', 'www.empresajuridica1.com', 0, 1, '2014-08-14 18:30:12', '2014-09-06 16:03:12'),
(29, 2014025, 'particulier', '', 'Cliente 1', 'a', '', '', '', '', 'UE', '', '', '', '', '', 'Avenue Guabi', 'Paris', '3312355564', 'Provenance 1', '12345', '79', 'www.empresanatural1.com', 1, 1, '2014-08-14 18:28:29', '2015-03-06 20:32:53'),
(31, 2014027, 'entreprise', 'C', '', '', 'Empresa Juridica 1', 'Development', 'Secteur 2', '6456', 'RDM', 'Forme 2', '123456', 'lieu rcs', 'num rcs', 'num tva ', 'rue 2', 'Yaoundé (CAMEROUN)', '3312355564', 'Provenance 2', '700012', '2', 'www.empresajuridica2.com', 1, 1, '2014-08-14 18:59:42', '2015-03-06 20:33:15'),
(32, 2014028, 'particulier', '', 'Cliente 2', 'b', '', '', '', '', 'RDM', '', '', '', '', '', 'rue 2', 'Yaoundé (CAMEROUN)', '3312355564', 'Provenance 3', '700012', '41', 'www.empresanatural1.com', 1, 1, '2014-08-14 19:01:32', '2015-03-06 20:34:08'),
(33, 2014029, 'entreprise', 'C', '', '', 'Empresa Juridica 2', 'Development', 'Secteur 1', '500', 'UE', 'Forme 3', '123456', 'lieu rcs', 'num rcs', 'num tva ', 'rue 2', 'Yaoundé (CAMEROUN)', '3312355564', 'Provenance 2', '700012', '2', 'www.test1.com', 1, 1, '2014-08-14 23:03:40', '2015-03-06 20:33:31'),
(34, 2014030, 'particulier', '', 'Cliente 3', 'c', '', '', '', '', 'RDM', '', '', '', '', '', 'rue 2', 'Yaoundé (CAMEROUN)', '3312355564', 'Provenance 3', '700012', '2', 'www.empresanatural4.com', 1, 1, '2014-08-15 00:54:55', '2015-03-06 20:34:51'),
(35, 2014031, 'entreprise', 'C', '', '', 'Empresa Juridica 3', 'Development', 'Secteur 2', '500', 'RDM', 'Forme 2', '123456', 'lieu rcs', 'num rcs', 'num tva ', 'rue 2', 'Yaoundé (CAMEROUN)', '456', 'Provenance 2', '700012', '2', 'www.test1.com', 1, 1, '2014-08-15 00:55:28', '2015-03-06 20:33:44'),
(36, 2015032, 'entreprise', 'C', '', '', 'L''Oréal Cosmétique Active', 'Cosmétique', 'Secteur 2', '5900000', 'UE', 'Forme 2', 'rfdgdgshqsfgdgf', 'fddfgdffsg', 'gfdssdffd', 'dfsdfgsgdfs', '2, rue Baron', 'Paris', '0636134554', 'Provenance 2', '75017', '79', 'dsfgdfsgdfs', 1, 2, '2015-01-25 11:24:45', '2015-01-25 11:24:45'),
(37, 2015033, 'entreprise', 'C', '', '', 'test', 'test', 'Secteur 1', '10000', 'FR', 'Forme 1', 'test', 'test', 'test', 'test', 'test', 'Paris', '016066696878', 'Provenance 2', '75000', '79', 'www.equinoa.fr', 1, 1, '2015-11-17 14:35:48', '2015-11-17 14:35:48');

-- --------------------------------------------------------

--
-- Structure de la table `oge_clients_contacts`
--

CREATE TABLE IF NOT EXISTS `oge_clients_contacts` (
  `id_oge_clients_contact` int(11) NOT NULL AUTO_INCREMENT,
  `id_oge_client` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_oge_clients_contact`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Contenu de la table `oge_clients_contacts`
--

INSERT INTO `oge_clients_contacts` (`id_oge_clients_contact`, `id_oge_client`, `id_contact`, `status`, `added`, `updated`) VALUES
(51, 29, 17, 1, '2014-08-14 18:55:44', '2014-08-14 18:55:44'),
(2, 1, 3, 1, '2014-04-24 17:16:25', '2014-07-02 16:25:34'),
(54, 32, 18, 1, '2014-08-14 23:51:02', '2014-08-14 23:51:02'),
(59, 0, 23, 1, '2014-11-20 16:13:43', '2014-11-20 16:13:43'),
(67, 0, 24, 1, '2015-11-17 15:20:03', '2015-11-17 15:20:03'),
(66, 37, 19, 1, '2015-11-17 14:40:15', '2015-11-17 14:40:15'),
(65, 0, 25, 1, '2015-11-16 16:17:35', '2015-11-16 16:17:35'),
(60, 0, 22, 1, '2014-11-20 16:24:47', '2014-11-20 16:24:47'),
(56, 33, 18, 1, '2014-08-14 23:51:43', '2014-08-14 23:51:43'),
(62, 29, 22, 1, '2014-11-20 16:37:19', '2014-11-20 16:37:19'),
(58, 0, 19, 1, '2014-11-20 16:13:27', '2014-11-20 16:13:27'),
(61, 0, 18, 1, '2014-11-20 16:28:45', '2014-11-20 16:28:45'),
(55, 31, 22, 1, '2014-08-14 23:51:24', '2014-08-14 23:51:24'),
(52, 31, 20, 1, '2014-08-14 19:31:40', '2014-08-14 19:31:40'),
(53, 31, 18, 1, '2014-08-14 19:31:47', '2014-08-14 19:31:47'),
(68, 0, 20, 1, '2015-11-17 15:20:11', '2015-11-17 15:20:11');

-- --------------------------------------------------------

--
-- Structure de la table `oge_clients_contacts_history`
--

CREATE TABLE IF NOT EXISTS `oge_clients_contacts_history` (
  `id_oge_clients_contacts_history` int(11) NOT NULL AUTO_INCREMENT,
  `id_oge_client` int(11) NOT NULL,
  `id_contact` int(11) NOT NULL,
  `event_time` datetime NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_oge_clients_contacts_history`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Contenu de la table `oge_clients_contacts_history`
--

INSERT INTO `oge_clients_contacts_history` (`id_oge_clients_contacts_history`, `id_oge_client`, `id_contact`, `event_time`, `event_type`, `added`, `updated`) VALUES
(6, 1, 5, '2014-07-26 21:29:19', 'delete', '2014-07-26 21:29:19', '2014-07-26 21:29:19'),
(7, 13, 13, '2014-07-26 21:32:07', 'create', '2014-07-26 21:32:07', '2014-07-26 21:32:07'),
(8, 13, 1, '2014-07-26 21:32:13', 'delete', '2014-07-26 21:32:13', '2014-07-26 21:32:13'),
(9, 13, 1, '2014-07-26 21:32:41', 'create', '2014-07-26 21:32:41', '2014-07-26 21:32:41'),
(10, 4, 4, '2014-07-26 21:34:07', 'create', '2014-07-26 21:34:07', '2014-07-26 21:34:07'),
(11, 2, 9, '2014-07-28 05:10:53', 'delete_contact', '2014-07-28 05:10:53', '2014-07-28 05:10:53'),
(12, 1, 9, '2014-07-28 05:10:53', 'delete_contact', '2014-07-28 05:10:53', '2014-07-28 05:10:53'),
(13, 12, 9, '2014-07-28 05:10:53', 'delete_contact', '2014-07-28 05:10:53', '2014-07-28 05:10:53'),
(14, 8, 1, '2014-07-28 15:44:20', 'create', '2014-07-28 15:44:20', '2014-07-28 15:44:20'),
(15, 1, 15, '2014-07-28 15:45:36', 'delete_contact', '2014-07-28 15:45:36', '2014-07-28 15:45:36'),
(16, 8, 1, '2014-07-28 15:46:10', 'delete', '2014-07-28 15:46:10', '2014-07-28 15:46:10'),
(17, 13, 13, '2014-07-28 16:10:37', 'delete_client', '2014-07-28 16:10:37', '2014-07-28 16:10:37'),
(18, 13, 14, '2014-07-28 16:10:37', 'delete_client', '2014-07-28 16:10:37', '2014-07-28 16:10:37'),
(19, 13, 1, '2014-07-28 16:10:37', 'delete_client', '2014-07-28 16:10:37', '2014-07-28 16:10:37'),
(20, 26, 4, '2014-07-28 16:14:37', 'create', '2014-07-28 16:14:37', '2014-07-28 16:14:37'),
(21, 2, 13, '2014-07-28 16:24:03', 'delete_contact', '2014-07-28 16:24:03', '2014-07-28 16:24:03'),
(22, 22, 13, '2014-07-28 16:24:03', 'delete_contact', '2014-07-28 16:24:03', '2014-07-28 16:24:03'),
(23, 1, 13, '2014-07-28 16:24:03', 'delete_contact', '2014-07-28 16:24:03', '2014-07-28 16:24:03'),
(24, 12, 4, '2014-07-28 16:48:11', 'create', '2014-07-28 16:48:11', '2014-07-28 16:48:11'),
(25, 2, 14, '2014-07-28 17:00:59', 'create', '2014-07-28 17:00:59', '2014-07-28 17:00:59'),
(26, 1, 16, '2014-07-28 17:01:10', 'delete', '2014-07-28 17:01:10', '2014-07-28 17:01:10'),
(27, 1, 14, '2014-07-28 17:06:19', 'delete', '2014-07-28 17:06:19', '2014-07-28 17:06:19'),
(28, 1, 14, '2014-07-28 18:22:21', 'create', '2014-07-28 18:22:21', '2014-07-28 18:22:21'),
(29, 1, 14, '2014-07-28 18:22:27', 'delete', '2014-07-28 18:22:27', '2014-07-28 18:22:27'),
(30, 1, 2, '2014-07-28 18:28:24', 'delete', '2014-07-28 18:28:24', '2014-07-28 18:28:24'),
(31, 1, 1, '2014-07-28 18:28:28', 'delete', '2014-07-28 18:28:28', '2014-07-28 18:28:28'),
(32, 24, 16, '2014-07-28 19:13:41', 'delete_contact', '2014-07-28 19:13:41', '2014-07-28 19:13:41'),
(33, 25, 16, '2014-07-28 19:13:41', 'delete_contact', '2014-07-28 19:13:41', '2014-07-28 19:13:41'),
(34, 27, 14, '2014-07-28 21:20:14', 'create', '2014-07-28 21:20:14', '2014-07-28 21:20:14'),
(35, 2, 13, '2014-07-29 00:52:05', 'create', '2014-07-29 00:52:05', '2014-07-29 00:52:05'),
(36, 1, 13, '2014-08-06 18:51:03', 'create', '2014-08-06 18:51:03', '2014-08-06 18:51:03'),
(37, 1, 5, '2014-08-06 18:52:38', 'create', '2014-08-06 18:52:38', '2014-08-06 18:52:38'),
(38, 4, 14, '2014-08-07 15:48:04', 'create', '2014-08-07 15:48:04', '2014-08-07 15:48:04'),
(39, 5, 14, '2014-08-08 09:26:47', 'create', '2014-08-08 09:26:47', '2014-08-08 09:26:47'),
(40, 5, 13, '2014-08-08 09:27:11', 'create', '2014-08-08 09:27:11', '2014-08-08 09:27:11'),
(41, 2, 2, '2014-08-14 16:10:11', 'delete_client', '2014-08-14 16:10:11', '2014-08-14 16:10:11'),
(42, 2, 7, '2014-08-14 16:10:11', 'delete_client', '2014-08-14 16:10:11', '2014-08-14 16:10:11'),
(43, 2, 14, '2014-08-14 16:10:11', 'delete_client', '2014-08-14 16:10:11', '2014-08-14 16:10:11'),
(44, 2, 13, '2014-08-14 16:10:11', 'delete_client', '2014-08-14 16:10:11', '2014-08-14 16:10:11'),
(45, 4, 1, '2014-08-14 16:10:16', 'delete_client', '2014-08-14 16:10:16', '2014-08-14 16:10:16'),
(46, 4, 2, '2014-08-14 16:10:16', 'delete_client', '2014-08-14 16:10:16', '2014-08-14 16:10:16'),
(47, 4, 14, '2014-08-14 16:10:16', 'delete_client', '2014-08-14 16:10:16', '2014-08-14 16:10:16'),
(48, 4, 4, '2014-08-14 16:10:16', 'delete_client', '2014-08-14 16:10:16', '2014-08-14 16:10:16'),
(49, 5, 1, '2014-08-14 16:10:20', 'delete_client', '2014-08-14 16:10:20', '2014-08-14 16:10:20'),
(50, 5, 2, '2014-08-14 16:10:20', 'delete_client', '2014-08-14 16:10:20', '2014-08-14 16:10:20'),
(51, 5, 14, '2014-08-14 16:10:20', 'delete_client', '2014-08-14 16:10:20', '2014-08-14 16:10:20'),
(52, 5, 13, '2014-08-14 16:10:20', 'delete_client', '2014-08-14 16:10:20', '2014-08-14 16:10:20'),
(53, 7, 14, '2014-08-14 16:10:25', 'delete_client', '2014-08-14 16:10:25', '2014-08-14 16:10:25'),
(54, 12, 1, '2014-08-14 16:13:52', 'delete_client', '2014-08-14 16:13:52', '2014-08-14 16:13:52'),
(55, 12, 4, '2014-08-14 16:13:52', 'delete_client', '2014-08-14 16:13:52', '2014-08-14 16:13:52'),
(56, 23, 14, '2014-08-14 16:14:43', 'delete_client', '2014-08-14 16:14:43', '2014-08-14 16:14:43'),
(57, 27, 14, '2014-08-14 16:14:52', 'delete_client', '2014-08-14 16:14:52', '2014-08-14 16:14:52'),
(58, 1, 4, '2014-08-14 18:48:58', 'delete_contact', '2014-08-14 18:48:58', '2014-08-14 18:48:58'),
(59, 26, 4, '2014-08-14 18:48:58', 'delete_contact', '2014-08-14 18:48:58', '2014-08-14 18:48:58'),
(60, 25, 14, '2014-08-14 18:49:23', 'delete_contact', '2014-08-14 18:49:23', '2014-08-14 18:49:23'),
(61, 1, 5, '2014-08-14 18:49:26', 'delete_contact', '2014-08-14 18:49:26', '2014-08-14 18:49:26'),
(62, 1, 13, '2014-08-14 18:49:59', 'delete_contact', '2014-08-14 18:49:59', '2014-08-14 18:49:59'),
(63, 30, 17, '2014-08-14 18:55:00', 'create', '2014-08-14 18:55:00', '2014-08-14 18:55:00'),
(64, 29, 17, '2014-08-14 18:55:44', 'create', '2014-08-14 18:55:44', '2014-08-14 18:55:44'),
(65, 31, 20, '2014-08-14 19:31:40', 'create', '2014-08-14 19:31:40', '2014-08-14 19:31:40'),
(66, 31, 18, '2014-08-14 19:31:47', 'create', '2014-08-14 19:31:47', '2014-08-14 19:31:47'),
(67, 32, 18, '2014-08-14 23:51:02', 'create', '2014-08-14 23:51:02', '2014-08-14 23:51:02'),
(68, 31, 22, '2014-08-14 23:51:24', 'create', '2014-08-14 23:51:24', '2014-08-14 23:51:24'),
(69, 33, 18, '2014-08-14 23:51:43', 'create', '2014-08-14 23:51:43', '2014-08-14 23:51:43'),
(70, 30, 23, '2014-08-19 16:27:19', 'create', '2014-08-19 16:27:19', '2014-08-19 16:27:19'),
(71, 30, 17, '2014-09-06 16:03:12', 'delete_client', '2014-09-06 16:03:12', '2014-09-06 16:03:12'),
(72, 30, 23, '2014-09-06 16:03:12', 'delete_client', '2014-09-06 16:03:12', '2014-09-06 16:03:12'),
(73, 0, 19, '2014-11-20 16:13:27', 'create', '2014-11-20 16:13:27', '2014-11-20 16:13:27'),
(74, 0, 23, '2014-11-20 16:13:43', 'create', '2014-11-20 16:13:43', '2014-11-20 16:13:43'),
(75, 0, 22, '2014-11-20 16:24:47', 'create', '2014-11-20 16:24:47', '2014-11-20 16:24:47'),
(76, 0, 18, '2014-11-20 16:28:45', 'create', '2014-11-20 16:28:45', '2014-11-20 16:28:45'),
(77, 29, 22, '2014-11-20 16:37:19', 'create', '2014-11-20 16:37:19', '2014-11-20 16:37:19'),
(78, 36, 25, '2015-01-25 11:26:34', 'create', '2015-01-25 11:26:34', '2015-01-25 11:26:34'),
(79, 36, 25, '2015-01-25 11:27:46', 'delete', '2015-01-25 11:27:46', '2015-01-25 11:27:46'),
(80, 36, 25, '2015-01-25 11:27:53', 'create', '2015-01-25 11:27:53', '2015-01-25 11:27:53'),
(81, 36, 25, '2015-01-25 11:27:56', 'delete', '2015-01-25 11:27:56', '2015-01-25 11:27:56'),
(82, 0, 25, '2015-11-16 16:17:35', 'create', '2015-11-16 16:17:35', '2015-11-16 16:17:35'),
(83, 37, 19, '2015-11-17 14:40:15', 'create', '2015-11-17 14:40:15', '2015-11-17 14:40:15'),
(84, 0, 24, '2015-11-17 15:20:03', 'create', '2015-11-17 15:20:03', '2015-11-17 15:20:03'),
(85, 0, 20, '2015-11-17 15:20:11', 'create', '2015-11-17 15:20:11', '2015-11-17 15:20:11'),
(86, 29, 25, '2015-11-18 10:25:02', 'create', '2015-11-18 10:25:02', '2015-11-18 10:25:02'),
(87, 29, 25, '2015-11-18 10:28:27', 'delete', '2015-11-18 10:28:27', '2015-11-18 10:28:27');

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE IF NOT EXISTS `paniers` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL,
  `id_client_tmp` varchar(255) NOT NULL COMMENT 'id du client temporaire',
  `id_client` int(11) NOT NULL,
  `id_partenaire` int(11) NOT NULL,
  `id_livraison` int(11) NOT NULL,
  `id_facturation` int(11) NOT NULL,
  `id_type` int(11) NOT NULL DEFAULT '1' COMMENT 'type de FDP',
  `status` tinyint(1) NOT NULL COMMENT '0: en cours | 1: abandonné',
  `etat` int(11) NOT NULL COMMENT 'dernier etat du panier',
  `type_paiement` tinyint(1) NOT NULL COMMENT '0 : VISA | 3: MASTERCARD | 1 : Auto | 2: AMEX',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_panier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `paniers`
--


-- --------------------------------------------------------

--
-- Structure de la table `paniers_cadeaux`
--

CREATE TABLE IF NOT EXISTS `paniers_cadeaux` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_details` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0 Echantillon | 1 Cadeau',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_panier`,`id_produit`,`id_details`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `paniers_cadeaux`
--


-- --------------------------------------------------------

--
-- Structure de la table `paniers_produits`
--

CREATE TABLE IF NOT EXISTS `paniers_produits` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_details` int(11) NOT NULL,
  `offert` tinyint(1) NOT NULL COMMENT '0 Non | 1 Oui',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_panier`,`id_produit`,`id_details`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `paniers_produits`
--


-- --------------------------------------------------------

--
-- Structure de la table `paniers_promos`
--

CREATE TABLE IF NOT EXISTS `paniers_promos` (
  `id_panier` int(11) NOT NULL,
  `code_promo` varchar(255) NOT NULL,
  `id_code` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL COMMENT '0 : code inactif 1: code actif',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_panier`,`id_code`),
  KEY `code_promo` (`code_promo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `paniers_promos`
--


-- --------------------------------------------------------

--
-- Structure de la table `parrainages`
--

CREATE TABLE IF NOT EXISTS `parrainages` (
  `id_parrainage` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 En attente | 1 Validé | 2 mail envoyé (car traitement ds le cron)',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_parrainage`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `parrainages`
--


-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE IF NOT EXISTS `partenaires` (
  `id_partenaire` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `id_type` int(11) NOT NULL COMMENT 'table partenaires_types',
  `id_code` int(11) NOT NULL COMMENT 'id du code promo',
  `status` tinyint(1) NOT NULL COMMENT '0 : Hors ligne 1: En ligne',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_partenaire`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `partenaires`
--


-- --------------------------------------------------------

--
-- Structure de la table `partenaires_clics`
--

CREATE TABLE IF NOT EXISTS `partenaires_clics` (
  `id_partenaire` int(11) NOT NULL,
  `date` date NOT NULL,
  `nb_clics` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_partenaire`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `partenaires_clics`
--


-- --------------------------------------------------------

--
-- Structure de la table `partenaires_types`
--

CREATE TABLE IF NOT EXISTS `partenaires_types` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 : Hors ligne 1: En ligne',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `partenaires_types`
--


-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id_pays` int(11) NOT NULL AUTO_INCREMENT,
  `id_langue` varchar(50) NOT NULL,
  `fr` varchar(255) NOT NULL,
  `en` varchar(255) NOT NULL,
  `id_zone` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_pays`),
  UNIQUE KEY `id_pays` (`id_pays`,`id_zone`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=249 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `id_langue`, `fr`, `en`, `id_zone`, `added`, `updated`) VALUES
(1, 'af', 'Afghanistan', 'Afghanistan', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(2, 'za', 'Afrique du sud', 'South africa', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(3, 'ax', 'Land, îles', 'Land islands', 0, '2011-05-19 10:58:04', '2011-05-19 17:01:48'),
(4, 'al', 'Albanie', 'Albania', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(5, 'dz', 'Algérie', 'Algeria', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(6, 'de', 'Allemagne', 'Germany', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(7, 'ad', 'Andorre', 'Andorra', 0, '2011-05-19 10:58:04', '2011-05-19 17:01:48'),
(8, 'ao', 'Angola', 'Angola', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(9, 'ai', 'Anguilla', 'Anguilla', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(10, 'aq', 'Antarctique', 'Antarctica', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(11, 'ag', 'Antigua-et-barbuda', 'Antigua and barbuda', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(12, 'sa', 'Arabie saoudite', 'Saudi arabia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(13, 'ar', 'Argentine', 'Argentina', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(14, 'am', 'Arménie', 'Armenia', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(15, 'aw', 'Aruba', 'Aruba', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(16, 'au', 'Australie', 'Australia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(17, 'at', 'Autriche', 'Austria', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(18, 'az', 'Azerbaïdjan', 'Azerbaijan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(19, 'bs', 'Bahamas', 'Bahamas', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(20, 'bh', 'Bahreïn', 'Bahrain', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(21, 'bd', 'Bangladesh', 'Bangladesh', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(22, 'bb', 'Barbade', 'Barbados', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(23, 'by', 'Bélarus', 'Belarus', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(24, 'be', 'Belgique', 'Belgium', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(25, 'bz', 'Belize', 'Belize', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(26, 'bj', 'Bénin', 'Benin', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(27, 'bm', 'Bermudes', 'Bermuda', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(28, 'bt', 'Bhoutan', 'Bhutan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(29, 'bo', 'Bolivie, l''état plurinational de', 'Bolivia, plurinational state of', 0, '2011-05-19 10:58:04', '2011-05-19 17:01:48'),
(30, 'bq', 'Bonaire, saint-eustache et saba', 'Bonaire, saint eustatius and saba', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(31, 'ba', 'Bosnie-herzégovine', 'Bosnia and herzegovina', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(32, 'bw', 'Botswana', 'Botswana', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(33, 'bv', 'Bouvet, île', 'Bouvet island', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(34, 'br', 'Brésil', 'Brazil', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(35, 'bn', 'Brunéi darussalam', 'Brunei darussalam', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(36, 'bg', 'Bulgarie', 'Bulgaria', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(37, 'bf', 'Burkina faso', 'Burkina faso', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(38, 'bi', 'Burundi', 'Burundi', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(39, 'ky', 'Caïmanes, îles', 'Cayman islands', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(40, 'kh', 'Cambodge', 'Cambodia', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(41, 'cm', 'Cameroun', 'Cameroon', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(42, 'ca', 'Canada', 'Canada', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(43, 'cv', 'Cap-vert', 'Cape verde', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(44, 'cf', 'Centrafricaine, république', 'Central african republic', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(45, 'cl', 'Chili', 'Chile', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(46, 'cn', 'Chine', 'China', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(47, 'cx', 'Christmas, île', 'Christmas island', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(48, 'cy', 'Chypre', 'Cyprus', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(49, 'cc', 'Cocos (keeling), îles', 'Cocos (keeling) islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(50, 'co', 'Colombie', 'Colombia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(51, 'km', 'Comores', 'Comoros', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(52, 'cg', 'Congo', 'Congo', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(53, 'cd', 'Congo, la république démocratique du', 'Congo, the democratic republic of the', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(54, 'ck', 'Cook, îles', 'Cook islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(55, 'kr', 'Corée, république de', 'Korea, republic of', 0, '2011-05-19 10:58:04', '2011-05-19 17:01:48'),
(56, 'kp', 'Corée, république populaire démocratique de', 'Korea, democratic people''s republic of', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(57, 'cr', 'Costa rica', 'Costa rica', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(58, 'ci', 'Côte d''ivoire', 'Ivory Coast', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(59, 'hr', 'Croatie', 'Croatia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(60, 'cu', 'Cuba', 'Cuba', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(61, 'cw', 'Curaçao', 'Curacao', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(62, 'dk', 'Danemark', 'Denmark', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(63, 'dj', 'Djibouti', 'Djibouti', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(64, 'do', 'Dominicaine, république', 'Dominican republic', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(65, 'dm', 'Dominique', 'Dominica', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(66, 'eg', 'Egypte', 'Egypt', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(67, 'sv', 'El salvador', 'El salvador', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(68, 'ae', 'Emirats arabes unis', 'United arab emirates', 0, '2011-05-19 10:58:04', '2011-05-19 17:01:48'),
(69, 'ec', 'Equateur', 'Ecuador', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(70, 'er', 'Erythrée', 'Eritrea', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(71, 'es', 'Espagne', 'Spain', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(72, 'ee', 'Estonie', 'Estonia', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(73, 'us', 'Etats-unis', 'United states', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(74, 'et', 'Ethiopie', 'Ethiopia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(75, 'fk', 'Falkland, îles (malvinas)', 'Falkland islands (malvinas)', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(76, 'fo', 'Féroé, îles', 'Faroe islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(77, 'fj', 'Fidji', 'Fiji', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(78, 'fi', 'Finlande', 'Finland', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(79, 'fr', 'France', 'France', 0, '2011-05-19 10:58:04', '2011-07-22 14:09:12'),
(80, 'ga', 'Gabon', 'Gabon', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(81, 'gm', 'Gambie', 'Gambia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(82, 'ge', 'Géorgie', 'Georgia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(83, 'gs', 'Géorgie du sud et les îles sandwich du sud', 'South georgia and the south sandwich islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(84, 'gh', 'Ghana', 'Ghana', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(85, 'gi', 'Gibraltar', 'Gibraltar', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(86, 'gr', 'Grèce', 'Greece', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(87, 'gd', 'Grenade', 'Grenada', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(88, 'gl', 'Groenland', 'Greenland', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(89, 'gp', 'Guadeloupe', 'Guadeloupe', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(90, 'gu', 'Guam', 'Guam', 0, '2011-05-19 10:58:04', '2011-05-19 17:01:48'),
(91, 'gt', 'Guatemala', 'Guatemala', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(92, 'gg', 'Guernesey', 'Guernsey', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(93, 'gn', 'Guinée', 'Guinea', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(94, 'gq', 'Guinée équatoriale', 'Equatorial guinea', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(95, 'gw', 'Guinée-bissau', 'Guinea-bissau', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(96, 'gy', 'Guyana', 'Guyana', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(97, 'gf', 'Guyane franÇaise', 'French guiana', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(98, 'ht', 'Haïti', 'Haiti', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(99, 'hm', 'Heard, île et mcdonald, îles', 'Heard island and mcdonald islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(100, 'hn', 'Honduras', 'Honduras', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(101, 'hk', 'Hong-kong', 'Hong kong', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(102, 'hu', 'Hongrie', 'Hungary', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(103, 'im', 'Ile de man', 'Isle of man', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(104, 'um', 'Iles mineures éloignées des États-unis', 'United states minor outlying islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(105, 'vg', 'Iles vierges britanniques', 'Virgin islands, british', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(106, 'vi', 'Iles vierges des États-unis', 'Virgin islands, u.s.', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(107, 'in', 'Inde', 'India', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(108, 'id', 'Indonésie', 'Indonesia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(109, 'ir', 'Iran, république islamique d''', 'Iran, islamic republic of', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(110, 'iq', 'Iraq', 'Iraq', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(111, 'ie', 'Irlande', 'Ireland', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(112, 'is', 'Islande', 'Iceland', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(113, 'il', 'Israël', 'Israel', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(114, 'it', 'Italie', 'Italy', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(115, 'jm', 'Jamaïque', 'Jamaica', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(116, 'jp', 'Japon', 'Japan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(117, 'je', 'Jersey', 'Jersey', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(118, 'jo', 'Jordanie', 'Jordan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(119, 'kz', 'Kazakhstan', 'Kazakhstan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(120, 'ke', 'Kenya', 'Kenya', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(121, 'kg', 'Kirghizistan', 'Kyrgyzstan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(122, 'ki', 'Kiribati', 'Kiribati', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(123, 'kw', 'KoweÏt', 'Kuwait', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(124, 'la', 'Lao, république démocratique populaire', 'Lao people''s democratic republic', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(125, 'ls', 'Lesotho', 'Lesotho', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(126, 'lv', 'Lettonie', 'Latvia', 0, '2011-05-19 10:58:04', '2011-05-19 16:40:47'),
(127, 'lb', 'Liban', 'Lebanon', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(128, 'lr', 'Libéria', 'Liberia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(129, 'ly', 'Libyenne, jamahiriya arabe', 'Libyan arab jamahiriya', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(130, 'li', 'Liechtenstein', 'Liechtenstein', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(131, 'lt', 'Lituanie', 'Lithuania', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(132, 'lu', 'Luxembourg', 'Luxembourg', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(133, 'mo', 'Macao', 'Macao', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(134, 'mk', 'Macédoine, l''ex-république yougoslave de', 'Macedonia, the former yugoslav republic of', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(135, 'mg', 'Madagascar', 'Madagascar', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(136, 'my', 'Malaisie', 'Malaysia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(137, 'mw', 'Malawi', 'Malawi', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(138, 'mv', 'Maldives', 'Maldives', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(139, 'ml', 'Mali', 'Mali', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(140, 'mt', 'Malte', 'Malta', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(141, 'mp', 'Mariannes du nord, îles', 'Northern mariana islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(142, 'ma', 'Maroc', 'Morocco', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(143, 'mh', 'Marshall, îles', 'Marshall islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(144, 'mq', 'Martinique', 'Martinique', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(145, 'mu', 'Maurice', 'Mauritius', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(146, 'mr', 'Mauritanie', 'Mauritania', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(147, 'yt', 'Mayotte', 'Mayotte', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(148, 'mx', 'Mexique', 'Mexico', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(149, 'fm', 'Micronésie, états fédérés de', 'Micronesia, federated states of', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(150, 'md', 'Moldova, république de', 'Moldova, republic of', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(151, 'mc', 'Monaco', 'Monaco', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(152, 'mn', 'Mongolie', 'Mongolia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(153, 'me', 'Monténégro', 'Montenegro', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(154, 'ms', 'Montserrat', 'Montserrat', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(155, 'mz', 'Mozambique', 'Mozambique', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(156, 'mm', 'Myanmar', 'Myanmar', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(157, 'na', 'Namibie', 'Namibia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(158, 'nr', 'Nauru', 'Nauru', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(159, 'np', 'Népal', 'Nepal', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(160, 'ni', 'Nicaragua', 'Nicaragua', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(161, 'ne', 'Niger', 'Niger', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(162, 'ng', 'Nigéria', 'Nigeria', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(163, 'nu', 'Niué', 'Niue', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(164, 'nf', 'Norfolk, île', 'Norfolk island', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(165, 'no', 'Norvège', 'Norway', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(166, 'nc', 'Nouvelle-calédonie', 'New caledonia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(167, 'nz', 'Nouvelle-zélande', 'New zealand', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(168, 'io', 'Océan indien, territoire britannique de l''', 'British indian ocean territory', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(169, 'om', 'Oman', 'Oman', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(170, 'ug', 'Ouganda', 'Uganda', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(171, 'uz', 'Ouzbékistan', 'Uzbekistan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(172, 'pk', 'Pakistan', 'Pakistan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(173, 'pw', 'Palaos', 'Palau', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(174, 'ps', 'Palestinien occupé, territoire', 'Palestinian territory, occupied', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(175, 'pa', 'Panama', 'Panama', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(176, 'pg', 'Papouasie-nouvelle-guinée', 'Papua new guinea', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(177, 'py', 'Paraguay', 'Paraguay', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(178, 'nl', 'Pays-bas', 'Netherlands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(179, 'pe', 'Pérou', 'Peru', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(180, 'ph', 'Philippines', 'Philippines', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(181, 'pn', 'Pitcairn', 'Pitcairn', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(182, 'pl', 'Pologne', 'Poland', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(183, 'pf', 'Polynésie française', 'French polynesia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(184, 'pr', 'Porto rico', 'Puerto rico', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(185, 'pt', 'Portugal', 'Portugal', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(186, 'qa', 'Qatar', 'Qatar', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(187, 're', 'Réunion', 'Reunion', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(188, 'ro', 'Roumanie', 'Romania', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(189, 'gb', 'Royaume-uni', 'United kingdom', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(190, 'ru', 'Russie, fédération de', 'Russian federation', 0, '2011-05-19 10:58:04', '2011-05-19 16:41:15'),
(191, 'rw', 'Rwanda', 'Rwanda', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(192, 'eh', 'Sahara occidental', 'Western sahara', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(193, 'bl', 'Saint-barthélemy', 'Saint barthelemy', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(194, 'sh', 'Sainte-hélène, ascension et tristan da cunha', 'Saint helena, ascension and tristan da cunha', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(195, 'lc', 'Sainte-lucie', 'Saint lucia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(196, 'kn', 'Saint-kitts-et-nevis', 'Saint kitts and nevis', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(197, 'sm', 'Saint-marin', 'San marino', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(198, 'sx', 'Saint-martin (partie néerlandaise)', 'Sint maarten (dutch part)', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(199, 'mf', 'Saint-martin(partie française)', 'Saint martin (french part)', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(200, 'pm', 'Saint-pierre-et-miquelon', 'Saint pierre and miquelon', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(201, 'va', 'Saint-siège (état de la cité du vatican)', 'Holy see (vatican city state)', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(202, 'vc', 'Saint-vincent-et-les grenadines', 'Saint vincent and the grenadines', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(203, 'sb', 'Salomon, îles', 'Solomon islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(204, 'ws', 'Samoa', 'Samoa', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(205, 'as', 'Samoa américaines', 'American samoa', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(206, 'st', 'Sao tomé-et-principe', 'Sao tome and principe', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(207, 'sn', 'Sénégal', 'Senegal', 0, '2011-05-19 10:58:04', '2011-05-19 16:41:15'),
(208, 'rs', 'Serbie', 'Serbia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(209, 'sc', 'Seychelles', 'Seychelles', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(210, 'sl', 'Sierra leone', 'Sierra leone', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(211, 'sg', 'Singapour', 'Singapore', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(212, 'sk', 'Slovaquie', 'Slovakia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(213, 'si', 'Slovénie', 'Slovenia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(214, 'so', 'Somalie', 'Somalia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(215, 'sd', 'Soudan', 'Sudan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(216, 'lk', 'Sri lanka', 'Sri lanka', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(217, 'se', 'Suède', 'Sweden', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(218, 'ch', 'Suisse', 'Switzerland', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(219, 'sr', 'Suriname', 'Suriname', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(220, 'sj', 'Svalbard et île jan mayen', 'Svalbard and jan mayen', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(221, 'sz', 'Swaziland', 'Swaziland', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(222, 'sy', 'Syrienne, république arabe', 'Syrian arab republic', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(223, 'tj', 'Tadjikistan', 'Tajikistan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(224, 'tw', 'TaÏwan, province de chine', 'Taiwan, province of china', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(225, 'tz', 'Tanzanie, république-unie de', 'Tanzania, united republic of', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(226, 'td', 'Tchad', 'Chad', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(227, 'cz', 'Tchèque, république', 'Czech republic', 0, '2011-05-19 10:58:04', '2011-05-19 16:41:15'),
(228, 'tf', 'Terres australes françaises', 'French southern territories', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(229, 'th', 'Thaïlande', 'Thailand', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(230, 'tl', 'Timor-leste', 'Timor-leste', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(231, 'tg', 'Togo', 'Togo', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(232, 'tk', 'Tokelau', 'Tokelau', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(233, 'to', 'Tonga', 'Tonga', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(234, 'tt', 'Trinité-et-tobago', 'Trinidad and tobago', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(235, 'tn', 'Tunisie', 'Tunisia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(236, 'tm', 'Turkménistan', 'Turkmenistan', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(237, 'tc', 'Turks et caïques, îles', 'Turks and caicos islands', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(238, 'tr', 'Turquie', 'Turkey', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(239, 'tv', 'Tuvalu', 'Tuvalu', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(240, 'ua', 'Ukraine', 'Ukraine', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(241, 'uy', 'Uruguay', 'Uruguay', 0, '2011-05-19 10:58:04', '2011-05-19 16:41:15'),
(242, 'vu', 'Vanuatu', 'Vanuatu', 0, '2011-05-19 10:58:04', '2011-05-19 16:41:15'),
(243, 've', 'Venezuela, république bolivarienne du', 'Venezuela, bolivarian republic of', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(244, 'vn', 'Viet nam', 'Viet nam', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(245, 'wf', 'Wallis et futuna', 'Wallis and futuna', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(246, 'ye', 'Yémen', 'Yemen', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(247, 'zm', 'Zambie', 'Zambia', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04'),
(248, 'zw', 'Zimbabwe', 'Zimbabwe', 0, '2011-05-19 10:58:04', '2011-05-19 10:58:04');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `id_template` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `type` enum('Produit','Echantillon','Cadeau') NOT NULL,
  `tva` float NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: Hors ligne | 1: En ligne',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `produits`
--


-- --------------------------------------------------------

--
-- Structure de la table `produits_avis`
--

CREATE TABLE IF NOT EXISTS `produits_avis` (
  `id_avis` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `titre` text NOT NULL,
  `avis` text NOT NULL,
  `ip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: En attente de moderation | 1 : En ligne',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_avis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `produits_avis`
--


-- --------------------------------------------------------

--
-- Structure de la table `produits_crosseling`
--

CREATE TABLE IF NOT EXISTS `produits_crosseling` (
  `id_produit` int(11) NOT NULL,
  `id_crosseling` int(11) NOT NULL,
  `ordre` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_produit`,`id_crosseling`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_crosseling`
--


-- --------------------------------------------------------

--
-- Structure de la table `produits_details`
--

CREATE TABLE IF NOT EXISTS `produits_details` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `poids` float NOT NULL COMMENT 'en grammes',
  `prix` float NOT NULL COMMENT 'prix ttc',
  `prix_ht` float NOT NULL COMMENT 'prix ht calculé avec la tva du produit',
  `promo` tinyint(1) NOT NULL COMMENT '0: Remise | 1: %',
  `montant_promo` float NOT NULL,
  `prix_promo` float NOT NULL COMMENT 'prix ttc incluant la promo',
  `prix_promo_ht` float NOT NULL COMMENT 'prix ht incluant la promo',
  `debut_promo` date NOT NULL,
  `fin_promo` date NOT NULL,
  `type_detail` enum('ml','g','') NOT NULL COMMENT 'type du detail exemple ml,g,m,...',
  `detail` text NOT NULL COMMENT 'valeur du detail',
  `ordre` int(11) NOT NULL COMMENT 'ordre du detail pour le produit',
  `stock` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: Inactif | 0: Actif',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `produits_details`
--


-- --------------------------------------------------------

--
-- Structure de la table `produits_elements`
--

CREATE TABLE IF NOT EXISTS `produits_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `id_element` int(11) NOT NULL,
  `id_langue` varchar(2) NOT NULL,
  `value` text NOT NULL,
  `complement` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0: Offline | 1: Online',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `produits_elements`
--


-- --------------------------------------------------------

--
-- Structure de la table `produits_images`
--

CREATE TABLE IF NOT EXISTS `produits_images` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `ordre` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `id_produit` (`id_produit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `produits_images`
--


-- --------------------------------------------------------

--
-- Structure de la table `produits_tree`
--

CREATE TABLE IF NOT EXISTS `produits_tree` (
  `id_produit` int(11) NOT NULL,
  `id_tree` int(11) NOT NULL,
  `ordre_tree` int(11) NOT NULL COMMENT 'ordre des categories et pages',
  `ordre_produit` int(11) NOT NULL COMMENT 'ordre des produits dans la categorie principale',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_produit`,`id_tree`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits_tree`
--


-- --------------------------------------------------------

--
-- Structure de la table `produits_votes`
--

CREATE TABLE IF NOT EXISTS `produits_votes` (
  `id_vote` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_vote`),
  UNIQUE KEY `id_produit` (`id_produit`,`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `produits_votes`
--


-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `id_code` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Remise','Pourcentage') NOT NULL,
  `code` varchar(50) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `value` float NOT NULL,
  `seuil` float NOT NULL,
  `fdp` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: FDP Payant | 1: FDP Gratuit',
  `id_tree` varchar(255) NOT NULL COMMENT 'liste des categories pour avoir le code',
  `id_produit` varchar(255) NOT NULL COMMENT 'liste des produits pour avoir le code',
  `id_tree2` varchar(255) NOT NULL,
  `id_produit2` varchar(255) NOT NULL,
  `nb_minimum2` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit_kdo` int(11) NOT NULL COMMENT 'id du produit offert',
  `nb_utilisations` int(11) NOT NULL,
  `nb_minimum` int(11) NOT NULL,
  `plus_cher` tinyint(1) NOT NULL COMMENT '0 rien | 1 on offre le plus cher des produits',
  `moins_cher` tinyint(1) NOT NULL COMMENT '0 rien | 1 on offre le moins cher',
  `duree` int(11) NOT NULL COMMENT 'Pour les temoins la duree en jour de la promo',
  `id_promo` int(11) NOT NULL COMMENT 'id d''un code promo de type template qui sera envoyé au client',
  `premiere_cmde` tinyint(1) NOT NULL COMMENT '0 non 1 oui pour la 1ere commande du client',
  `status` tinyint(1) NOT NULL COMMENT '0: Offline | 1: Online | 2 Temoins 3 auto',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_code`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `promotions`
--


-- --------------------------------------------------------

--
-- Structure de la table `queries`
--

CREATE TABLE IF NOT EXISTS `queries` (
  `id_query` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sql` text NOT NULL,
  `paging` int(11) NOT NULL,
  `executions` int(11) NOT NULL,
  `executed` datetime NOT NULL,
  `cms` varchar(50) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_query`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `queries`
--

INSERT INTO `queries` (`id_query`, `name`, `sql`, `paging`, `executions`, `executed`, `cms`, `added`, `updated`) VALUES
(1, 'Liste des commandes pour la campagne', 'SELECT\r\n t.id_transaction AS ID_TRANSACTION, \r\n (SELECT c.nom FROM clients c WHERE c.id_client = t.id_client) AS NOM_CLIENT, \r\n (SELECT c.prenom FROM clients c WHERE c.id_client = t.id_client) AS PRENOM_CLIENT, \r\n t.id_type AS TYPE_LIV, \r\n t.date_transaction AS DATE_TRANSACTION, \r\n t.liv_passeport AS PASSEPORT_LIV, \r\n ROUND((t.montant)/100,2) AS MONTANT, \r\n ROUND((t.fdp)/100,2) AS FDP, \r\n ROUND((t.montant_reduc)/100,2) AS REDUCTION, \r\n t.type_paiement AS TYPE_PAIEMENT \r\nFROM transactions t \r\nWHERE t.status = 1 AND t.etat != 3 AND id_partenaire = @ID_Partenaire@', 50, 0, '2011-11-01 00:00:00', 'iZicom', '2011-11-01 00:00:00', '2011-11-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `redirections`
--

CREATE TABLE IF NOT EXISTS `redirections` (
  `id_redirection` int(11) NOT NULL AUTO_INCREMENT,
  `id_langue` varchar(5) NOT NULL,
  `from_slug` varchar(255) NOT NULL,
  `to_slug` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_redirection`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `redirections`
--


-- --------------------------------------------------------

--
-- Structure de la table `routages`
--

CREATE TABLE IF NOT EXISTS `routages` (
  `id_routage` int(11) NOT NULL AUTO_INCREMENT,
  `id_langue` varchar(10) NOT NULL,
  `ctrl_url` varchar(255) NOT NULL,
  `fct_url` varchar(255) NOT NULL,
  `ctrl_projet` varchar(255) NOT NULL,
  `fct_projet` varchar(255) NOT NULL,
  `statut` tinyint(4) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_routage`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `routages`
--


-- --------------------------------------------------------

--
-- Structure de la table `sectors`
--

CREATE TABLE IF NOT EXISTS `sectors` (
  `id_sector` int(11) NOT NULL AUTO_INCREMENT,
  `noun` varchar(50) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_sector`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `sectors`
--

INSERT INTO `sectors` (`id_sector`, `noun`, `added`, `updated`) VALUES
(1, 'Sector 1', '2011-10-27 17:20:49', '2011-10-27 17:20:49'),
(2, 'Sector 2', '2011-10-27 17:20:49', '2011-10-27 17:20:49'),
(3, 'Sector 3', '2011-10-27 17:20:49', '2011-10-27 17:20:49'),
(4, 'Sector 4', '2011-10-27 17:20:49', '2011-10-27 17:20:49'),
(5, 'Sector 5', '2011-10-27 17:20:49', '2011-10-27 17:20:49');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL COMMENT 'Type du parametre',
  `id_template` int(11) NOT NULL,
  `value` text NOT NULL COMMENT 'Valeur du parametre',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Statut du parametre (0 : offline | 1 : online | 2 : Intouchable)',
  `cms` varchar(50) NOT NULL,
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id_setting`),
  UNIQUE KEY `type` (`type`,`id_template`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `settings`
--

INSERT INTO `settings` (`id_setting`, `type`, `id_template`, `value`, `status`, `cms`, `added`, `updated`) VALUES
(1, 'Google Analytics', 0, '', 2, 'iZinoa', '2011-05-03 17:49:57', '2011-08-26 18:45:11'),
(2, 'Google Mail', 0, '', 2, 'iZinoa', '2011-05-03 17:49:57', '2011-05-10 18:26:41'),
(3, 'Google Password', 0, '', 2, 'iZinoa', '2011-05-03 17:50:50', '2011-05-10 18:26:56'),
(4, 'Paging Tableaux', 0, '', 2, 'iZinoa', '2011-05-03 17:50:50', '2011-06-23 18:01:39'),
(5, 'Google Webmaster Tools', 0, '', 2, 'iZinoa', '2011-05-06 09:05:05', '2011-09-19 19:17:20'),
(6, 'Baseline Title', 0, '', 2, 'iZinoa', '2011-05-06 09:05:18', '2011-09-13 15:45:02'),
(7, 'Categories', 0, '', 2, 'iZicom', '2011-05-17 15:08:59', '2011-05-25 12:01:32'),
(8, 'Categories secondaires', 0, '', 2, 'iZicom', '2011-05-17 15:08:59', '2011-05-25 12:01:32'),
(9, 'TVA', 0, '', 2, 'iZicom', '2011-05-17 15:15:21', '2011-05-17 15:15:21'),
(10, 'NMP Server API', 0, '', 2, 'iZinoa', '2012-10-03 11:06:12', '2012-10-03 11:06:12'),
(11, 'NMP Key', 0, '', 2, 'iZinoa', '2012-10-03 11:06:19', '2012-10-03 11:06:19'),
(12, 'NMP Login', 0, '', 2, 'iZinoa', '2012-10-03 11:06:26', '2012-10-03 11:06:26'),
(13, 'NMP Password', 0, '', 2, 'iZinoa', '2012-10-03 11:06:32', '2012-10-03 11:06:32'),
(14, 'NMP Mail', 0, '', 2, 'iZinoa', '2012-10-03 11:06:41', '2012-10-03 11:06:41'),
(15, 'NMP From Mail', 0, '', 2, 'iZinoa', '2012-10-03 11:06:52', '2012-10-03 11:06:52'),
(16, 'NMP ID Clonage', 0, '', 2, 'iZinoa', '2012-10-03 11:07:00', '2012-10-03 11:07:00'),
(17, '404 Mail Alerte', 0, '', 2, 'iZinoa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Provenance', 0, 'Provenance 1;Provenance 2;Provenance 3', 1, 'iZinoa', '2014-07-04 21:28:08', '2014-07-04 21:28:08'),
(19, 'Secteur', 0, 'Secteur 1;Secteur 2;Secteur 3', 1, 'iZinoa', '2014-07-04 21:28:28', '2014-07-04 21:28:28'),
(20, 'Forme', 0, 'Forme 1;Forme 2;Forme 3', 1, 'iZinoa', '2014-07-04 21:28:46', '2014-07-04 21:28:46'),
(21, 'Cursus', 0, 'BBA 1;BBA 2;BBA 3;PI;Msc 1;Msc 2;Msc 3;Msc 4;MS', 1, 'iZinoa', '2014-07-28 17:29:57', '2015-11-23 08:58:02'),
(22, 'Annee', 0, '2000;2020', 1, 'iZinoa', '2014-07-28 17:30:19', '2014-07-28 17:30:19'),
(23, 'Langues', 0, 'langues1;langues2;langues3', 1, 'iZinoa', '2014-07-28 17:30:39', '2014-07-28 17:30:39'),
(24, 'Motorise', 0, 'Oui;Permis sans voiture;Non', 1, 'iZinoa', '2014-07-28 17:30:53', '2015-11-23 08:57:20'),
(25, 'Competences', 0, 'competences1;competences2;competences3', 1, 'iZinoa', '2014-07-28 17:31:23', '2014-07-28 17:31:23'),
(26, 'Budget HFS', 0, '0,22', 1, 'iZinoa', '2014-08-28 19:19:14', '2014-08-28 19:19:14'),
(27, 'Setting1Document', 0, ' Junior-Entreprise de l''ESSEC', 1, 'iZinoa', '2015-03-05 14:51:02', '2015-03-05 14:53:50'),
(28, 'Setting2Document', 0, ' N° SIRET 331 879 551 00017', 1, 'iZinoa', '2015-03-05 14:52:04', '2015-03-05 14:52:04'),
(29, 'Setting3Document', 0, 'code NAF 7022Z', 1, 'iZinoa', '2015-03-05 14:52:55', '2015-03-05 14:52:55'),
(30, 'Setting4Document', 0, 'n° URSSAF 950 630 151 00000 1011', 1, 'iZinoa', '2015-03-05 14:53:31', '2015-03-05 14:53:31'),
(31, 'Setting5Document', 0, '95021 Cergy-Pontoise Cedex', 1, 'iZinoa', '2015-03-05 15:01:14', '2015-03-05 15:01:14'),
(32, 'Setting6Document', 0, 'Sofyène LAKEHAL', 1, 'iZinoa', '2015-03-05 15:01:51', '2015-03-05 15:01:51'),
(33, 'Setting7Document', 0, 'Fait à Cergy-Pontoise', 1, 'iZinoa', '2015-03-05 15:03:35', '2015-03-05 15:03:35'),
(34, 'Setting1eachtimeDocument', 0, 'Junior ESSEC', 1, 'iZinoa', '2015-03-05 15:05:57', '2015-03-05 15:05:57'),
(35, 'SettingCompagnyName', 0, 'Carine GUICHETEAU', 1, 'iZinoa', '2015-03-05 15:06:35', '2015-03-05 15:08:45');

-- --------------------------------------------------------

--
-- Structure de la table `se_log`
--

CREATE TABLE IF NOT EXISTS `se_log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `nb_results` int(11) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `se_log`
--


-- --------------------------------------------------------

--
-- Structure de la table `se_matches`
--

CREATE TABLE IF NOT EXISTS `se_matches` (
  `id_word` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `object_type` tinyint(1) NOT NULL COMMENT '0 = produit / 1 = page',
  PRIMARY KEY (`id_word`,`id_object`,`object_type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `se_matches`
--


-- --------------------------------------------------------

--
-- Structure de la table `se_words`
--

CREATE TABLE IF NOT EXISTS `se_words` (
  `id_word` int(11) NOT NULL AUTO_INCREMENT,
  `id_langue` varchar(2) NOT NULL,
  `word` varchar(255) NOT NULL,
  PRIMARY KEY (`word`),
  KEY `id_word` (`id_word`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `se_words`
--


-- --------------------------------------------------------

--
-- Structure de la table `spare_promos`
--

CREATE TABLE IF NOT EXISTS `spare_promos` (
  `id_spare` int(11) NOT NULL AUTO_INCREMENT,
  `id_code` int(11) NOT NULL,
  `code_promo` varchar(255) NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_spare`),
  KEY `code_promo` (`code_promo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `spare_promos`
--


-- --------------------------------------------------------

--
-- Structure de la table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Nom du template',
  `slug` varchar(255) NOT NULL COMMENT 'Identifiant permanent du template pour appeller le fichier qui sera du type : template_slug',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Template tree | 1: Template produit',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Statut du template (0 : offline | 1 : online)',
  `affichage` tinyint(4) NOT NULL COMMENT '0 : Affichage Normal 1 page fantome ou popup etc...',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id_template`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `templates`
--

INSERT INTO `templates` (`id_template`, `name`, `slug`, `type`, `status`, `affichage`, `added`, `updated`) VALUES
(1, 'convention-document', 'convention-document', 0, 1, 0, '2015-03-11 15:50:29', '2015-03-11 16:29:42'),
(2, 'attestation-document', 'atestationdocument', 0, 1, 0, '2015-03-11 16:30:43', '2015-03-11 16:31:13'),
(3, 'bulletin-document', 'bulletindocument', 0, 1, 0, '2015-03-11 16:31:47', '2015-03-11 16:31:47'),
(4, 'factures-document', 'facturesdocument', 0, 1, 0, '2015-03-11 16:32:18', '2015-03-11 16:32:18'),
(5, 'facturesfrais-document', 'facturesfraisdocument', 0, 1, 0, '2015-03-11 16:32:54', '2015-03-11 16:32:54'),
(6, 'avoirs-document', 'avoirsdocument', 0, 1, 0, '2015-03-11 16:33:28', '2015-03-11 16:33:28'),
(7, 'accord-document', 'accorddocument', 0, 1, 0, '2015-03-11 16:34:09', '2015-03-11 16:34:09'),
(8, 'avenant-document', 'avenantdocument', 0, 1, 0, '2015-03-11 16:34:35', '2015-03-11 16:34:35');

-- --------------------------------------------------------

--
-- Structure de la table `textes`
--

CREATE TABLE IF NOT EXISTS `textes` (
  `id_texte` int(11) NOT NULL AUTO_INCREMENT,
  `id_langue` varchar(2) NOT NULL,
  `section` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `texte` text NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_texte`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `textes`
--


-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `id_panier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_partenaire` int(11) NOT NULL,
  `id_livraison` int(11) NOT NULL,
  `id_facturation` int(11) NOT NULL,
  `id_type` int(11) NOT NULL COMMENT 'Type de FDP',
  `fdp` int(11) NOT NULL COMMENT 'x100',
  `montant` int(11) NOT NULL COMMENT 'FDP et Promo inclus x100',
  `montant_reduc` int(11) NOT NULL COMMENT '*100',
  `id_langue` varchar(50) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `type_paiement` varchar(255) NOT NULL COMMENT '0 : VISA | 3: MASTERCARD | 1 : Auto | 2: AMEX',
  `status` tinyint(1) NOT NULL COMMENT 'Statut du paiement 0: NOK 1: OK',
  `etat` tinyint(1) NOT NULL COMMENT '0: En attente 1: Validée 2: Expédiée 3: Annulée',
  `ip_client` varchar(255) NOT NULL,
  `serialize_paniers` text NOT NULL,
  `serialize_paniers_produits` text NOT NULL,
  `serialize_paniers_promos` text NOT NULL,
  `serialize_paniers_cadeaux` text NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `civilite_liv` enum('M.','Mme','Mlle') NOT NULL,
  `nom_liv` varchar(255) NOT NULL,
  `prenom_liv` varchar(255) NOT NULL,
  `societe_liv` varchar(255) NOT NULL,
  `adresse1_liv` varchar(255) NOT NULL,
  `adresse2_liv` varchar(255) NOT NULL,
  `adresse3_liv` varchar(255) NOT NULL,
  `cp_liv` varchar(255) NOT NULL,
  `ville_liv` varchar(255) NOT NULL,
  `id_pays_liv` int(11) NOT NULL,
  `civilite_fac` enum('M.','Mme','Mlle') NOT NULL,
  `nom_fac` varchar(255) NOT NULL,
  `prenom_fac` varchar(255) NOT NULL,
  `societe_fac` varchar(255) NOT NULL,
  `adresse1_fac` varchar(255) NOT NULL,
  `adresse2_fac` varchar(255) NOT NULL,
  `adresse3_fac` varchar(255) NOT NULL,
  `cp_fac` varchar(255) NOT NULL,
  `ville_fac` varchar(255) NOT NULL,
  `id_pays_fac` int(11) NOT NULL,
  `colis` text NOT NULL COMMENT 'numero de suivi',
  PRIMARY KEY (`id_transaction`),
  KEY `id_client` (`id_client`),
  KEY `id_partenaire` (`id_partenaire`),
  KEY `status` (`status`),
  KEY `etat` (`etat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `transactions`
--


-- --------------------------------------------------------

--
-- Structure de la table `transactions_cadeaux`
--

CREATE TABLE IF NOT EXISTS `transactions_cadeaux` (
  `id_transaction` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `detail` float NOT NULL,
  `type_detail` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0 Echantillon | 1 Cadeau',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_transaction`,`id_produit`,`id_detail`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transactions_cadeaux`
--


-- --------------------------------------------------------

--
-- Structure de la table `transactions_produits`
--

CREATE TABLE IF NOT EXISTS `transactions_produits` (
  `id_transaction` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `desc_courte` varchar(255) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `detail` text NOT NULL,
  `type_detail` varchar(50) NOT NULL,
  `poids` float NOT NULL,
  `prix` float NOT NULL,
  `prix_ht` float NOT NULL,
  `promo` tinyint(1) NOT NULL COMMENT '0: Remise | 1: %',
  `montant_promo` float NOT NULL,
  `prix_promo` float NOT NULL,
  `prix_promo_ht` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_transaction`,`id_produit`,`id_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transactions_produits`
--


-- --------------------------------------------------------

--
-- Structure de la table `transactions_promos`
--

CREATE TABLE IF NOT EXISTS `transactions_promos` (
  `id_transaction` int(11) NOT NULL,
  `id_code` int(11) NOT NULL,
  `code_promo` varchar(255) NOT NULL,
  `actif` tinyint(1) NOT NULL COMMENT '0 : code inactif 1: code actif',
  `added` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id_transaction`,`id_code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transactions_promos`
--


-- --------------------------------------------------------

--
-- Structure de la table `tree`
--

CREATE TABLE IF NOT EXISTS `tree` (
  `id_tree` int(11) NOT NULL,
  `id_langue` varchar(2) NOT NULL,
  `id_parent` int(11) NOT NULL COMMENT 'ID de la rubrique parente : 0 pour la Home et à partir de 1 pour le reste',
  `id_template` int(11) NOT NULL COMMENT 'ID du template lié à la page',
  `id_user` int(11) NOT NULL COMMENT 'ID de l''utilisateur qui a rédigé l''article',
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL COMMENT 'Permalink de la page que l''on va rendre modifiable',
  `img_menu` varchar(255) NOT NULL COMMENT 'Image pour le menu',
  `menu_title` varchar(255) NOT NULL COMMENT 'Titre pour les menus',
  `meta_title` varchar(255) NOT NULL COMMENT 'Title de la balise META',
  `meta_description` text NOT NULL COMMENT 'Description pour la balise META',
  `meta_keywords` text NOT NULL COMMENT 'Mots clés pour la balise META',
  `ordre` int(11) NOT NULL DEFAULT '0' COMMENT 'Ordre de la page dans le Tree, on part de 0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Statut de la page (0 : offline | 1 : online)',
  `status_menu` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Statut de la page dans la navigation principale du site (0 : invisible | 1 : visible)',
  `prive` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Public | 1: Private',
  `indexation` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 pas d''indexation dans les moteurs 1 : oui',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  `canceled` datetime NOT NULL COMMENT 'Date de suppression',
  PRIMARY KEY (`id_tree`,`id_langue`),
  KEY `id_parent` (`id_parent`),
  KEY `id_template` (`id_template`),
  KEY `id_tree` (`id_tree`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tree`
--

INSERT INTO `tree` (`id_tree`, `id_langue`, `id_parent`, `id_template`, `id_user`, `title`, `slug`, `img_menu`, `menu_title`, `meta_title`, `meta_description`, `meta_keywords`, `ordre`, `status`, `status_menu`, `prive`, `indexation`, `added`, `updated`, `canceled`) VALUES
(1, 'fr', 0, 0, 1, 'iZiCom', '', '', 'iZiCom', 'iZiCom', 'iZiCom', '', 0, 1, 0, 0, 1, '2011-10-27 17:20:49', '2011-10-28 17:07:21', '2011-10-27 17:20:49');

-- --------------------------------------------------------

--
-- Structure de la table `tree_elements`
--

CREATE TABLE IF NOT EXISTS `tree_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tree` int(11) NOT NULL COMMENT 'ID de la page',
  `id_element` int(11) NOT NULL COMMENT 'ID de l''element',
  `id_langue` varchar(2) NOT NULL,
  `value` text NOT NULL COMMENT 'Valeur de l''élément pour cette page',
  `complement` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Statut de l''élément sur la page (0 : offline | 1 : Online)',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_tree_2` (`id_tree`,`id_element`,`id_langue`),
  KEY `id_element` (`id_element`),
  KEY `id_tree_3` (`id_tree`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `tree_elements`
--


-- --------------------------------------------------------

--
-- Structure de la table `tree_menu`
--

CREATE TABLE IF NOT EXISTS `tree_menu` (
  `id` int(11) NOT NULL,
  `id_langue` varchar(2) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `complement` varchar(255) NOT NULL,
  `target` enum('_self','_blank','_top','_parent') NOT NULL,
  `ordre` int(11) NOT NULL DEFAULT '0' COMMENT 'Ordre de la page dans le menu, on commence de 0',
  `status` tinyint(1) NOT NULL COMMENT '0 : Hors ligne 1: En ligne',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id`,`id_langue`),
  UNIQUE KEY `id_langue` (`id_langue`,`id_menu`,`nom`,`value`,`complement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tree_menu`
--


-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

CREATE TABLE IF NOT EXISTS `type_document` (
  `id_type_doc` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `src` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_type_doc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `type_document`
--

INSERT INTO `type_document` (`id_type_doc`, `name`, `src`, `description`, `status`, `added`, `updated`) VALUES
(1, 'Convention', 'convention', 'Convention', 1, '2014-09-11 23:08:26', '2014-09-09 10:49:11'),
(2, 'Attestation de fin de mission', 'attestation-de-fin-de-mission', 'Attestation de fin de mission', 1, '2014-09-11 23:02:43', '2014-09-09 10:49:11'),
(3, 'Bulletin de versement (BV)', '', 'Bulletin de versement (BV)', 0, '2014-09-09 10:50:05', '2014-09-09 10:50:05'),
(4, ' Factures', 'facture', ' Factures', 0, '2014-09-11 00:55:52', '2014-09-09 10:50:05'),
(5, 'Factures de frais', 'note-de-frais-attachee-a-une-facture', 'Factures de frais', 0, '2014-09-11 23:40:08', '2014-09-09 10:50:51'),
(6, ' Avoirs', '', ' Avoirs', 0, '0000-00-00 00:00:00', '2014-09-09 10:50:51'),
(7, 'Accord de confidentialité', 'accord-de-confidentialite', 'Accord de confidentialité', 1, '2014-09-11 23:00:08', '2014-09-09 10:51:38'),
(8, 'Avenant étudiant', 'avenant-etudiant', 'Avenant étudiant', 1, '2014-09-11 23:10:45', '2014-09-09 10:51:38');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL COMMENT 'Prénom du user',
  `name` varchar(255) NOT NULL COMMENT 'Nom du user',
  `phone` varchar(50) NOT NULL COMMENT 'Numére de téléphone',
  `mobile` varchar(50) NOT NULL COMMENT 'Numéro de portable',
  `email` varchar(255) NOT NULL COMMENT 'Le mail qui nous sert pour le login',
  `password` varchar(255) NOT NULL COMMENT 'Mot de passe en MD5',
  `id_tree` int(11) NOT NULL DEFAULT '0' COMMENT 'ID de la rubrique dans laquelle il arrive au login',
  `status` tinyint(1) NOT NULL COMMENT 'Statut de l''utilisateur (0 : offline | 1 : online | 2 : Intouchable)',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  `lastlogin` datetime NOT NULL COMMENT 'Date de la dernière connexion',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `firstname`, `name`, `phone`, `mobile`, `email`, `password`, `id_tree`, `status`, `added`, `updated`, `lastlogin`) VALUES
(1, 'Admin', 'Equinoa', '', '', 'admin@equinoa.fr', 'a57260e8f5fa2e91fb1dfd7dbfcf3dfe', 0, 2, '2011-05-03 17:17:28', '2011-10-28 13:54:46', '2015-11-23 15:53:41'),
(2, 'JEC', 'OGE', '', '', 'je@junioressec.com', '7fad6f6c9508537cd20e79c4f75f3134', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2015-11-21 01:38:17');

-- --------------------------------------------------------

--
-- Structure de la table `users_zones`
--

CREATE TABLE IF NOT EXISTS `users_zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL COMMENT 'ID de l''utilisateur',
  `id_zone` int(11) NOT NULL COMMENT 'ID de la zone autorisée',
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`,`id_zone`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `users_zones`
--

INSERT INTO `users_zones` (`id`, `id_user`, `id_zone`, `added`, `updated`) VALUES
(1, 1, 1, '2011-05-12 08:30:47', '2011-05-12 08:30:47'),
(2, 1, 2, '2011-05-12 08:30:47', '2011-05-12 08:30:47'),
(3, 1, 3, '2011-05-12 08:30:58', '2011-05-12 08:30:58'),
(4, 1, 4, '2011-05-12 08:30:58', '2011-05-12 08:30:58'),
(5, 1, 5, '2011-05-12 08:31:11', '2011-05-12 08:31:11'),
(6, 1, 6, '2011-05-12 08:31:11', '2011-05-12 08:31:11'),
(7, 1, 7, '2011-05-12 08:31:17', '2011-05-12 08:31:17'),
(8, 1, 8, '2011-05-12 08:49:02', '2011-05-12 08:49:02'),
(9, 1, 9, '2014-03-28 16:26:04', '2014-03-28 16:26:04'),
(10, 1, 10, '2014-04-12 09:11:17', '2014-04-12 09:11:21'),
(11, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 2, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--

CREATE TABLE IF NOT EXISTS `zones` (
  `id_zone` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Nom de la zone protégée',
  `slug` varchar(255) NOT NULL COMMENT 'Permalink de la zone pour l''appel du control d''accès',
  `status` tinyint(1) NOT NULL COMMENT 'Statut de la zone (0 : offline | 1 : online)',
  `cms` varchar(50) NOT NULL,
  `added` datetime NOT NULL COMMENT 'Date d''ajout',
  `updated` datetime NOT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`id_zone`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `zones`
--

INSERT INTO `zones` (`id_zone`, `name`, `slug`, `status`, `cms`, `added`, `updated`) VALUES
(1, 'Dashboard', 'dashboard', 2, 'iZicom', '2011-05-12 08:48:48', '2011-05-12 08:48:48'),
(2, 'Edition', 'edition', 2, 'iZinoa', '2011-05-12 08:27:54', '2011-05-12 08:27:54'),
(3, 'Configuration', 'configuration', 2, 'iZinoa', '2011-05-12 08:29:18', '2011-05-12 08:29:18'),
(4, 'Stats', 'stats', 2, 'iZinoa', '2011-05-12 08:29:18', '2011-05-12 08:29:18'),
(5, 'Boutique', 'boutique', 2, 'iZicom', '2011-05-12 08:29:46', '2011-05-12 08:29:46'),
(6, 'Clients', 'clients', 2, 'iZicom', '2011-05-12 08:29:46', '2011-05-12 08:29:46'),
(7, 'Commandes', 'commandes', 2, 'iZicom', '2011-05-12 08:29:57', '2011-05-12 08:29:57'),
(8, 'Ventes', 'ventes', 2, 'iZicom', '2011-10-28 18:47:11', '2011-10-28 18:47:15'),
(9, 'Contacts', 'contacts', 1, 'iZimoa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'etudes', 'etudes', 2, 'iZimoa', '2014-04-12 09:10:01', '2014-04-12 09:10:03');
