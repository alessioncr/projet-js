-- phpMyAdmin SQL Dump
-- version 4.9.6
-- https://www.phpmyadmin.net/
--
-- Hôte : hhva.myd.infomaniak.com
-- Généré le :  mar. 27 oct. 2020 à 16:25
-- Version du serveur :  5.7.26-log
-- Version de PHP :  7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hhva_team20_3_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `db_client`
--

CREATE TABLE `db_client` (
  `ID_CLI` int(11) NOT NULL,
  `NOM_CLI` varchar(128) DEFAULT NULL,
  `DETAILS_CLI` mediumtext,
  `TEL_CLI` varchar(30) DEFAULT NULL,
  `ANNIVERSAIRE_CLI` date DEFAULT NULL,
  `INSTA_CLI` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `FACE_CLI` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `RETARD_CLI` varchar(1) DEFAULT NULL,
  `PHOTO_PROFIL_CLI` varchar(255) DEFAULT NULL,
  `VALIDE_CLI` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_client`
--

INSERT INTO `db_client` (`ID_CLI`, `NOM_CLI`, `DETAILS_CLI`, `TEL_CLI`, `ANNIVERSAIRE_CLI`, `INSTA_CLI`, `FACE_CLI`, `RETARD_CLI`, `PHOTO_PROFIL_CLI`, `VALIDE_CLI`) VALUES
(2, 'John-Davy F', '2mm coté\r\nlong dessus\r\ncouleur brune                                                  ', '+41793232655', '1987-09-23', 'https://www.instagram.com/crazyperrek', 'https://www.facebook.com/CrazyPerrek/', '0', '67f5d1bb278d49b6a50c0abfe9740be1.jpg', '1'),
(5, 'Francis Marais', 'boule à zéro   ', '+41791377021', '1996-04-01', 'https://instagram.com', 'facebook.com', '1', NULL, '1'),
(22, 'Peter', 'cotés:\r\nsabot 2\r\n\r\n                ', '079.156.56.21', '2020-09-22', '', '', '1', NULL, NULL),
(23, 'Alessio', '  ', '+41.76.888.66.55', '1970-01-01', '', '', '1', NULL, NULL),
(25, 'Jeff', ' 5mm\r\ndégradé 0\r\nbarbe à zéro        ', '0791234567', '2020-09-11', '', '', '1', NULL, NULL),
(30, 'Jean', ' cheveux long', '', '1970-01-01', '', '', '0', NULL, NULL),
(31, 'Jean-pierre', ' teinture grise', '', '1970-01-01', '', '', '0', NULL, NULL),
(32, 'Adrien', '     ', '0227779996', '1970-01-01', '', '', '1', NULL, NULL),
(33, 'Paul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Sebastien Baba', '   Long', '', '2020-09-20', '', '', '1', NULL, NULL),
(35, 'Johan Prug', ' couleur barbe #4435 ', '+52.222.11.33', '1995-12-06', '', '', '0', NULL, NULL),
(36, 'Lottier', 'style degradé\r\ntaille 5 cm', '', '1995-01-01', '', '', '0', NULL, NULL),
(37, 'Georges ', ' style couleur : vert\r\ntaille 5 cm', '0757566554', '1994-01-30', '', '', '0', NULL, NULL),
(38, 'Dubois', '  ', '795787565', '2001-11-11', '', '', '0', NULL, NULL),
(39, 'Philip', ' cheveux long\r\n\r\ncheveux gras\r\n\r\n  ', '079 987 56 23', '1960-09-23', '', '', '0', NULL, NULL),
(40, 'Vincent', 'cheveux court\r\ndégradé 0\r\nteinture blond ', '076 654 45 12', '2001-12-10', '', '', '1', NULL, NULL),
(41, 'Said', ' cheveux court\r\n\r\ndégradé 0', '', '1997-02-25', '', '', '0', NULL, NULL),
(42, 'Mehdi', ' dégradé court\r\n\r\ntrait sur le coté\r\n', '', '1970-01-01', '', '', '1', NULL, NULL),
(43, 'Sid', ' boule a zero', '077 785 23 65', '1990-09-15', '', '', '1', NULL, NULL),
(44, 'Brook', ' ', '', '1970-01-01', '', '', '0', NULL, NULL),
(45, 'Bruno', ' tresse plaquée', '', '1970-01-01', '', '', '0', NULL, NULL),
(46, 'Mathieu', ' shampoing\r\n\r\ncheveux long', '078 789 23 14', '2000-02-01', '', '', '1', NULL, NULL),
(47, 'Katakuri', ' cheveux ras\r\nbarbes 10 cm ', '', '1970-01-01', '', '', '0', NULL, NULL),
(48, 'Rayley', ' Couleur prefere: violet\r\ntaille 2 mm', '7895764645', '1970-01-01', '', '', '0', NULL, NULL),
(49, 'Garp ', 'coupe ras\r\ntaille 1 mm ', '7974653455', '1970-01-01', '', '', '0', NULL, NULL),
(50, 'Noura', ' Dreadz \r\nlongeur 20 cm \r\ncouleur : blonde', '078465454', '1970-01-01', '', '', '0', NULL, NULL),
(51, 'Ben ', ' champoin \r\nnetoyage cheveux\r\ntaille cheuveux : 8 cm\r\n ', '079274644', '1970-01-01', '', '', '1', NULL, NULL),
(52, 'Iannis', ' dégradé 0', '', '1970-01-01', '', '', '1', NULL, NULL),
(53, 'Lucia', ' coupe ras \r\ntaille 0 mm', '079656464', '1970-01-01', '', '', '0', NULL, NULL),
(54, 'Gile', ' coupe militaire', '', '2066-05-05', '', '', '0', NULL, NULL),
(55, 'Patrick', ' attention grain de beauté sur la tête', '', '1978-09-08', '', '', '0', NULL, NULL),
(56, 'Lea', '  style degradé\r\ntaille 3 cm \r\n', '0794355662', '2020-09-22', '', '', '0', NULL, NULL),
(57, 'Christopher', ' cheveux long', '079 483 94 58', '1970-01-01', '', '', '0', NULL, NULL),
(58, 'Charles', ' style degradé\r\ntaille 10 mm', '', '1987-02-23', '', '', '0', NULL, NULL),
(59, 'Sébastien', ' cheveux court\r\n\r\ngrosse barbe', '', '1970-01-01', '', '', '0', NULL, NULL),
(60, 'Luc ', ' coupe ras\r\ncouleur bleu ', '925747747', '1998-10-29', '', '', '0', NULL, NULL),
(61, 'J-M Lemaire', '', '076.321.54.87', '2020-09-22', '', '', '1', NULL, NULL),
(62, 'Philipe', ' coupe degradé\r\ntaille 2 cm \r\ncouleur  blanc', '022734644', '1995-04-09', '', '', '1', NULL, NULL),
(63, 'Greg', ' ', '', '1970-01-01', '', '', '0', NULL, NULL),
(64, 'Dylan', ' ', '', '1970-01-01', '', '', '0', NULL, NULL),
(65, 'Qendrim', ' ', '', '1970-01-01', '', '', '1', NULL, NULL),
(66, 'Blueno', 'coupe ras \r\n ', '0788545463', '1993-01-13', '', '', '1', NULL, NULL),
(67, 'Shiki', ' ', '07985664', '1999-03-14', '', '', '0', NULL, NULL),
(68, 'Chirac Nour', 'disponible après 18h', '022.111.55.55', '1970-01-01', '', '', '1', NULL, NULL),
(69, 'Paul Newmann', 'Route de Genève 12\r\ncode : 2341 ', '022.555.66.65', '2065-09-22', '', '', '0', NULL, NULL),
(70, 'Haki', ' coupe ras      ', '0786436', '1993-12-24', '', '', '1', NULL, NULL),
(71, 'Rebbeca', ' Nouveau client', '0227779996', '1970-01-01', '', '', '1', NULL, NULL),
(72, 'Ferry', ' Passe au salon pour un dreadz \r\nlongueur cheveux  ', '7895764645', '1970-01-01', '', '', '1', NULL, NULL),
(73, 'gilbert', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Alexandre', 'cheveux long\r\nbarbe courte\r\nteinture bleu \r\ntemps (45min) \r\n', '+33 390 25 75', '1997-09-23', '', '', '1', NULL, NULL),
(75, 'Jean Testeur', ' Chauve', '0791112233', '2000-01-01', '', '', '1', NULL, NULL),
(77, 'Robert Drefus', ' Bouclé long', '', '1970-01-01', '', '', '1', NULL, NULL),
(78, 'Lamia Ben Salah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `db_journal_comptable`
--

CREATE TABLE `db_journal_comptable` (
  `ID_JOU` int(11) NOT NULL,
  `TYPE_JOU` varchar(30) DEFAULT NULL,
  `VALEUR_JOU` varchar(10) DEFAULT NULL,
  `DATE_JOU` date DEFAULT NULL,
  `LIBELLE_JOU` varchar(255) DEFAULT NULL,
  `VALIDE_JOU` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_journal_comptable`
--

INSERT INTO `db_journal_comptable` (`ID_JOU`, `TYPE_JOU`, `VALEUR_JOU`, `DATE_JOU`, `LIBELLE_JOU`, `VALIDE_JOU`) VALUES
(1, 'Depense', '140', '2020-10-01', ' Achat de rasoirs', '1'),
(2, 'Recette', '0', '2020-10-02', '   Coupe du jour', '1'),
(3, 'Recette', '40', '2020-10-03', ' ', '1'),
(4, 'Recette', '250', '2020-09-26', 'Coupes du jours', '1'),
(5, 'Recette', '125', '2020-10-04', 'Coupe du jours', '1'),
(6, 'Recette', '75', '2020-10-04', 'Dreads à un client', '1'),
(7, 'Recette', '25', '2020-10-05', 'Vente de produits ', '1'),
(8, 'Recette', '175', '2020-10-02', 'Dreads à un client', '1'),
(9, 'Recette', '60', '2020-10-01', 'Coupe à un client', '1'),
(10, 'Depense', '125', '2020-10-02', 'Achats de lames', '1'),
(11, 'Depense', '125', '2020-10-03', 'Achats de lames', '1'),
(12, 'Depense', '85', '2020-10-05', 'Achat de nouvelles serviettes', '1'),
(13, 'Depense', '50', '2020-10-08', 'Achat de lames', '1'),
(14, 'Recette', '100', '2020-02-02', 'Recette de la journée', '1'),
(15, 'Recette', '100', '2020-10-01', ' Recette de la journée', '1'),
(16, 'Depense', '145', '2020-10-07', 'Achat shampooing ', '1'),
(17, 'Recette', '40', '2020-10-17', ' Coupes du jours (Test de suppression 1)', '1'),
(18, 'Recette', '145', '2020-10-15', 'Coupes du jours ', '1'),
(19, 'Depense', '65', '2020-09-10', 'Achat de serviette ', '1'),
(20, 'Depense', '65', '2020-11-10', 'Achat de serviette', '1'),
(21, 'Depense', '65', '2021-11-10', 'Achat de serviettes', '1'),
(22, 'Depense', '65.50', '2020-10-27', 'Achat de serviettes', '1');

-- --------------------------------------------------------

--
-- Structure de la table `db_livredor`
--

CREATE TABLE `db_livredor` (
  `ID_LIV` int(11) NOT NULL,
  `AUTEUR_LIV` varchar(50) NOT NULL,
  `COMMENTAIRE_LIV` varchar(255) DEFAULT NULL,
  `DATE_LIV` date DEFAULT NULL,
  `VALIDE_LIV` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_livredor`
--

INSERT INTO `db_livredor` (`ID_LIV`, `AUTEUR_LIV`, `COMMENTAIRE_LIV`, `DATE_LIV`, `VALIDE_LIV`) VALUES
(1, 'Alessio', 'Très sympa et super professionnel', '2020-09-02', '1'),
(2, 'Benji', 'Je le trouve juste formidable', '2020-09-14', '1'),
(3, 'Arthur', 'Suuuperbe hâte de revenir', '2020-09-05', '1'),
(4, 'nicola', 'jolie salon ', '2020-10-07', '3'),
(5, 'Lob', 'tro bi1 ton salon', '2020-10-07', '3'),
(6, 'Aimane', 'bonne ambiance ', '2020-10-07', '1'),
(7, 'Mike', ' Tu es nul', '2020-10-07', '3'),
(8, 'Alessandro', ' jolie salon', '2020-10-15', '1'),
(9, 'Alessandro', ' test', '2020-10-15', '3'),
(10, 'test', ' ', '2020-10-15', '3'),
(11, 'votre nom', 'commentaire ', '2020-10-16', '2'),
(12, 'pierre', ' ', '2020-10-16', '2');

-- --------------------------------------------------------

--
-- Structure de la table `db_media`
--

CREATE TABLE `db_media` (
  `ID_MED` int(11) NOT NULL,
  `ID_PRO` int(11) DEFAULT NULL,
  `ID_WAL` int(11) DEFAULT NULL,
  `ID_CLI` int(11) DEFAULT NULL,
  `NOM_MED` varchar(255) DEFAULT NULL,
  `DATE_MED` date DEFAULT NULL,
  `VALIDE_MED` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_media`
--

INSERT INTO `db_media` (`ID_MED`, `ID_PRO`, `ID_WAL`, `ID_CLI`, `NOM_MED`, `DATE_MED`, `VALIDE_MED`) VALUES
(18, NULL, NULL, 2, '814884d7de13cf4a6112bd2aa9ff7edb.jpg', '2020-10-02', '0'),
(19, NULL, NULL, 2, '78297a6e6fc799df0a488b2a1dfce8c1.jpg', '2020-10-08', '0'),
(20, NULL, NULL, 2, '1738089ee5098aedb0ec61b63280dff3.jpg', '2020-10-09', '0'),
(21, NULL, NULL, 2, 'a12611221c6e9c969be5ec266335c03d.jpg', '2020-10-09', '0'),
(22, NULL, NULL, 2, 'b63c6071e52fa3c28a0282adc177739a.png', '2020-10-09', '0'),
(23, NULL, NULL, 2, '67f5d1bb278d49b6a50c0abfe9740be1.jpg', '2020-10-09', '0'),
(24, NULL, NULL, 25, '1c48776670f76f4fcd79224d5d2e25be.jpg', '2020-10-09', '0'),
(25, NULL, NULL, 25, '5e804b875896a42a7ba7f160aa994ee5.jpg', '2020-10-09', '0'),
(26, NULL, NULL, 25, '5b5097c39981eb003beff9610a63230a.jpg', '2020-10-09', '0'),
(27, NULL, NULL, 25, '64f33351d91b3fab43496b3721e79d7f.jpg', '2020-10-09', '0'),
(28, NULL, NULL, 22, '4d9a6306296f985efe203da4fe5452c1.jpg', '2020-10-14', '1'),
(29, NULL, NULL, 22, 'dfadd5be8a563079821027f7ef7eef1e.jpg', '2020-10-14', '1'),
(30, NULL, NULL, 22, '02f875bf3f042dd0fb648e55fb7d9eac.jpg', '2020-10-14', '1'),
(40, NULL, NULL, 22, '7489d891f2a7eee21f5e95ace0a841db.jpg', '2020-10-15', '0'),
(41, NULL, NULL, 22, 'b850aeb1f1fb3a6ca5e8259b189751d9.jpg', '2020-10-15', '0'),
(42, NULL, NULL, 22, '263de0cadd23237fde1d269f4135bacd.jpg', '2020-10-15', '0'),
(43, NULL, NULL, 22, '7e7549669010b8c9c2e6f2279a19f932.jpg', '2020-10-15', '0'),
(57, NULL, NULL, 32, 'f522e1aad89fc9f27f9e59371210ba5f.jpg', '2020-10-15', '0'),
(69, NULL, 32, NULL, 'c30c02f9c6c1837dfa7035cfdd8165c9.jpg', '2020-10-27', '0'),
(70, NULL, 33, NULL, 'b4979ba65293b2da71b8278d41bb2047.jpg', '2020-10-27', '0'),
(71, NULL, 34, NULL, '339d09051351c6f598009b3cd5fc317e.jpg', '2020-10-27', '0'),
(72, NULL, 35, NULL, '21c70187eab11d42f1bc8e60439157a5.jpg', '2020-10-27', '0'),
(73, NULL, NULL, 72, '72b0f4d1e3cfe7c1ac6d070cf33fea66.jpg', '2020-10-27', '0'),
(74, NULL, NULL, 72, '7da86566caf9353f65a7f4cb5190f976.jpg', '2020-10-27', '0');

-- --------------------------------------------------------

--
-- Structure de la table `db_parametre`
--

CREATE TABLE `db_parametre` (
  `ADRESSE_PAR` varchar(255) DEFAULT NULL,
  `DESCRIPTION_PAR` varchar(255) DEFAULT NULL,
  `MA_SA_PAR` varchar(50) DEFAULT NULL,
  `PRIX_BARBE_PAR` int(2) DEFAULT NULL,
  `PRIX_COUPE_PAR` int(2) DEFAULT NULL,
  `PRIX_DREADLOCKS_PAR` int(3) DEFAULT NULL,
  `PRIX_C_ET_B_PAR` int(2) DEFAULT NULL,
  `EMAIL_PAR` varchar(128) DEFAULT NULL,
  `TEL_PAR` varchar(50) DEFAULT NULL,
  `PASSWORD_PAR` varchar(255) DEFAULT NULL,
  `VACANCES_PAR` varchar(1) DEFAULT NULL,
  `INSTAGRAM_PAR` varchar(100) DEFAULT NULL,
  `FACEBOOK_PAR` varchar(100) DEFAULT NULL,
  `CODE_PAR` varchar(255) DEFAULT NULL,
  `T_CODE_PAR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_parametre`
--

INSERT INTO `db_parametre` (`ADRESSE_PAR`, `DESCRIPTION_PAR`, `MA_SA_PAR`, `PRIX_BARBE_PAR`, `PRIX_COUPE_PAR`, `PRIX_DREADLOCKS_PAR`, `PRIX_C_ET_B_PAR`, `EMAIL_PAR`, `TEL_PAR`, `PASSWORD_PAR`, `VACANCES_PAR`, `INSTAGRAM_PAR`, `FACEBOOK_PAR`, `CODE_PAR`, `T_CODE_PAR`) VALUES
('Rue Saint-Léger 18, 1204 Genève', 'Salut !\r\nBienvenue sur mon site !\r\nJe suis un jeune Barber Genevois, spécialisé dans les Dreadlocks et les Tresses. Appelez moi pour plus d\'information.\r\nDr Dread', '8h - 18h', 10, 20, 50, 25, 'dreadzbarber3@gmail.com', '(+41) 022 311 02 68', 'ff9fff929a1292db1c00e3142139b22ee4925177', '0', 'https://instagram.com/dreadz_barber?igshid=1h2jlc59g3jbo', 'https://m.facebook.com/dreadz_barber-109197650780393/', 'Cjqi37UWJ0', 1603809837);

-- --------------------------------------------------------

--
-- Structure de la table `db_produit`
--

CREATE TABLE `db_produit` (
  `ID_PRO` int(32) NOT NULL,
  `NOM_PRO` char(32) DEFAULT NULL,
  `TYPE_PRO` char(32) DEFAULT NULL,
  `PRIX_PRO` char(32) DEFAULT NULL,
  `VALIDE_PRO` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `wall_of_fame`
--

CREATE TABLE `wall_of_fame` (
  `ID_WALL` int(11) NOT NULL,
  `NOM_WAL` varchar(50) DEFAULT NULL,
  `PROFESSION_WAL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wall_of_fame`
--

INSERT INTO `wall_of_fame` (`ID_WALL`, `NOM_WAL`, `PROFESSION_WAL`) VALUES
(32, 'Kevin Mbabu', 'Footballer'),
(33, 'Boris Becker', 'Comédien'),
(34, 'Johan Djourou', 'Footballer'),
(35, 'Boris Becker', 'Comédien');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `db_client`
--
ALTER TABLE `db_client`
  ADD PRIMARY KEY (`ID_CLI`);

--
-- Index pour la table `db_journal_comptable`
--
ALTER TABLE `db_journal_comptable`
  ADD PRIMARY KEY (`ID_JOU`);

--
-- Index pour la table `db_livredor`
--
ALTER TABLE `db_livredor`
  ADD PRIMARY KEY (`ID_LIV`);

--
-- Index pour la table `db_media`
--
ALTER TABLE `db_media`
  ADD PRIMARY KEY (`ID_MED`),
  ADD KEY `I_FK_DB_MEDIA_DB_PRODUIT` (`ID_PRO`),
  ADD KEY `I_FK_DB_MEDIA_WALL_OF_FAME` (`ID_WAL`),
  ADD KEY `I_FK_DB_MEDIA_DB_CLIENT` (`ID_CLI`);

--
-- Index pour la table `db_produit`
--
ALTER TABLE `db_produit`
  ADD PRIMARY KEY (`ID_PRO`);

--
-- Index pour la table `wall_of_fame`
--
ALTER TABLE `wall_of_fame`
  ADD PRIMARY KEY (`ID_WALL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `db_client`
--
ALTER TABLE `db_client`
  MODIFY `ID_CLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `db_journal_comptable`
--
ALTER TABLE `db_journal_comptable`
  MODIFY `ID_JOU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `db_livredor`
--
ALTER TABLE `db_livredor`
  MODIFY `ID_LIV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `db_media`
--
ALTER TABLE `db_media`
  MODIFY `ID_MED` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `db_produit`
--
ALTER TABLE `db_produit`
  MODIFY `ID_PRO` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wall_of_fame`
--
ALTER TABLE `wall_of_fame`
  MODIFY `ID_WALL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
