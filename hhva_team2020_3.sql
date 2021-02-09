-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : hhva.myd.infomaniak.com
-- Généré le :  jeu. 08 oct. 2020 à 08:52
-- Version du serveur :  5.7.26-log
-- Version de PHP :  7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hhva_team2020_3`
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
  `VALIDE_CLI` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_client`
--

INSERT INTO `db_client` (`ID_CLI`, `NOM_CLI`, `DETAILS_CLI`, `TEL_CLI`, `ANNIVERSAIRE_CLI`, `INSTA_CLI`, `FACE_CLI`, `RETARD_CLI`, `VALIDE_CLI`) VALUES
(2, 'John-Davy F', '2mm coté\r\nlong dessus\r\ncouleur brune                                     ', '+41793232655', '1987-09-23', 'https://www.instagram.com/crazyperrek', 'https://www.facebook.com/CrazyPerrek/', '0', '1'),
(5, 'Francis Marais', 'boule à zéro   ', '+41791377021', '1996-04-01', 'https://instagram.com', 'facebook.com', '1', '1'),
(22, 'Peter', 'cotés:\r\nsabot 2\r\n\r\n         ', '079.156.56.21', '2020-09-22', '', '', '1', NULL),
(23, 'Alessio', '  ', '+41.76.888.66.55', '1970-01-01', '', '', '1', NULL),
(25, 'Jeff', ' 5mm\r\ndégradé 0\r\nbarbe à zéro    ', '0791234567', '2020-09-11', '', '', '1', NULL),
(30, 'Jean', ' cheveux long', '', '1970-01-01', '', '', '0', NULL),
(31, 'Jean-pierre', ' teinture grise', '', '1970-01-01', '', '', '0', NULL),
(32, 'Adrien', '  ', '', '1970-01-01', '', '', '1', NULL),
(33, 'Paul', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Sebastien Baba', '   Long', '', '2020-09-20', '', '', '1', NULL),
(35, 'Johan Prug', ' couleur barbe #4435 ', '+52.222.11.33', '1995-12-06', '', '', '0', NULL),
(36, 'Lottier', 'style degradé\r\ntaille 5 cm', '', '1995-01-01', '', '', '0', NULL),
(37, 'Georges ', ' style couleur : vert\r\ntaille 5 cm', '0757566554', '1994-01-30', '', '', '0', NULL),
(38, 'Dubois', '  ', '795787565', '2001-11-11', '', '', '0', NULL),
(39, 'Philip', ' cheveux long\r\n\r\ncheveux gras\r\n\r\n  ', '079 987 56 23', '1960-09-23', '', '', '0', NULL),
(40, 'Vincent', 'cheveux court\r\ndégradé 0\r\nteinture blond ', '076 654 45 12', '2001-12-10', '', '', '1', NULL),
(41, 'Said', ' cheveux court\r\n\r\ndégradé 0', '', '1997-02-25', '', '', '0', NULL),
(42, 'Mehdi', ' dégradé court\r\n\r\ntrait sur le coté\r\n', '', '1970-01-01', '', '', '1', NULL),
(43, 'Sid', ' boule a zero', '077 785 23 65', '1990-09-15', '', '', '1', NULL),
(44, 'Brook', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Bruno', ' tresse plaquée', '', '1970-01-01', '', '', '0', NULL),
(46, 'Mathieu', ' shampoing\r\n\r\ncheveux long', '078 789 23 14', '2000-02-01', '', '', '1', NULL),
(47, 'Katakuri', ' cheveux ras\r\nbarbes 10 cm ', '', '1970-01-01', '', '', '0', NULL),
(48, 'Rayley', ' Couleur prefere: violet\r\ntaille 2 mm', '7895764645', '1970-01-01', '', '', '0', NULL),
(49, 'Garp ', 'coupe ras\r\ntaille 1 mm ', '7974653455', '1970-01-01', '', '', '0', NULL),
(50, 'Noura', ' Dreadz \r\nlongeur 20 cm \r\ncouleur : blonde', '078465454', '1970-01-01', '', '', '0', NULL),
(51, 'Ben ', ' champoin \r\nnetoyage cheveux\r\ntaille cheuveux : 8 cm\r\n', '079274644', '1970-01-01', '', '', '1', NULL),
(52, 'Iannis', ' dégradé 0', '', '1970-01-01', '', '', '1', NULL),
(53, 'Lucia', ' coupe ras \r\ntaille 0 mm', '079656464', '1970-01-01', '', '', '0', NULL),
(54, 'Gile', ' coupe militaire', '', '2066-05-05', '', '', '0', NULL),
(55, 'Patrick', ' attention grain de beauté sur la tête', '', '1978-09-08', '', '', '0', NULL),
(56, 'Lea', '  style degradé\r\ntaille 3 cm \r\n', '0794355662', '2020-09-22', '', '', '0', NULL),
(57, 'Christopher', ' cheveux long', '079 483 94 58', '1970-01-01', '', '', '0', NULL),
(58, 'Charles', ' style degradé\r\ntaille 10 mm', '', '1987-02-23', '', '', '0', NULL),
(59, 'Sébastien', ' cheveux court\r\n\r\ngrosse barbe', '', '1970-01-01', '', '', '0', NULL),
(60, 'Luc ', ' coupe ras\r\ncouleur bleu ', '925747747', '1998-10-29', '', '', '0', NULL),
(61, 'J-M Lemaire', '', '076.321.54.87', '2020-09-22', '', '', '1', NULL),
(62, 'Philipe', ' coupe degradé\r\ntaille 2 cm \r\ncouleur  blanc', '022734644', '1995-04-09', '', '', '1', NULL),
(63, 'Greg', ' ', '', '1970-01-01', '', '', '0', NULL),
(64, 'Dylan', ' ', '', '1970-01-01', '', '', '0', NULL),
(65, 'Qendrim', ' ', '', '1970-01-01', '', '', '1', NULL),
(66, 'Blueno', 'coupe ras \r\n ', '0788545463', '1993-01-13', '', '', '1', NULL),
(67, 'Shiki', ' ', '07985664', '1999-03-14', '', '', '0', NULL),
(68, 'Chirac Nour', 'disponible après 18h', '022.111.55.55', '1970-01-01', '', '', '1', NULL),
(69, 'Paul Newmann', 'Route de Genève 12\r\ncode : 2341 ', '022.555.66.65', '2065-09-22', '', '', '0', NULL),
(70, 'Haki', ' coupe ras ', '0786436', '1993-12-24', '', '', '1', NULL),
(71, 'Rebbeca', ' Nouveau client', '0227779996', '1970-01-01', '', '', '1', NULL),
(72, 'Ferry', ' Passe au salon pour un dreadz \r\nlongueur cheveux', '7895764645', '1970-01-01', '', '', '1', NULL),
(73, 'gilbert', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'Alexandre', 'cheveux long\r\nbarbe courte\r\nteinture bleu \r\ntemps (45min) \r\n', '+33 390 25 75', '1997-09-23', '', '', '1', NULL),
(75, 'Jean Testeur', ' Chauve', '0791112233', '2000-01-01', '', '', '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `db_journal_comptable`
--

CREATE TABLE `db_journal_comptable` (
  `ID_JOU` int(11) NOT NULL,
  `TYPE_JOU` varchar(30) DEFAULT NULL,
  `VALEUR_JOU` int(4) DEFAULT NULL,
  `DATE_JOU` date DEFAULT NULL,
  `LIBELLE_JOU` varchar(255) DEFAULT NULL,
  `VALIDE_JOU` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `db_journal_comptable`
--

INSERT INTO `db_journal_comptable` (`ID_JOU`, `TYPE_JOU`, `VALEUR_JOU`, `DATE_JOU`, `LIBELLE_JOU`, `VALIDE_JOU`) VALUES
(1, '13', 0, '0000-00-00', '2020-10-01', '1'),
(2, '13', 0, '0000-00-00', '2020-10-01', '1'),
(3, '13', 0, '0000-00-00', '2020-10-01', '1'),
(4, '13', 0, '0000-00-00', '2020-10-01', '1'),
(5, '13', 0, '0000-00-00', '2020-10-01', '1'),
(6, '13', 0, '0000-00-00', '2020-10-01', '1'),
(7, '13', 0, '0000-00-00', '2020-10-01', '1'),
(8, '13', 0, '0000-00-00', '2020-10-01', '1'),
(9, '13', 0, '0000-00-00', '2020-10-01', '1'),
(10, '13', 0, '0000-00-00', '2020-10-01', '1'),
(11, '13', 0, '0000-00-00', '2020-10-01', '1'),
(12, '13', 0, '0000-00-00', '2020-10-01', '1'),
(13, '13', 0, '0000-00-00', '2020-10-01', '1'),
(14, 'Recette', 100, '2020-02-02', 'Recette de la journée', '1'),
(15, 'Recette', 1000, '2020-10-01', 'Recette de la journée', '1'),
(16, 'Depense', 99, '2020-10-07', 'Achat shampooing ', '1');

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
(4, 'nicola', 'jolie salon ', '2020-10-07', '2'),
(5, 'Lob', 'tro bi1 ton salon', '2020-10-07', '3'),
(6, 'Aimane', 'bonne ambiance ', '2020-10-07', '2'),
(7, 'Mike', ' Tu es nul', '2020-10-07', '2');

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
(18, NULL, NULL, 2, '814884d7de13cf4a6112bd2aa9ff7edb.jpg', '2020-10-02', '0');

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
('Rue Saint-Léger 18, 1204 Genève', ' Salut !\r\nBienvenue sur mon site !\r\nJe suis un jeune Barber Genevois, spécialisé dans les Dreadlocks et les Tresses. Appelez moi pour plus d\'information.\r\nDr Dread                  ', '9h - 19h', 10, 20, 50, 25, 'elv-john-davy.frrr@eduge.ch', '(+41) 022 311 02 68', 'd033e22ae348aeb5660fc2140aec35850c4da997', '0', 'https://instagram.com/dreadz_barber?igshid=1h2jlc59g3jbo', 'https://m.facebook.com/dreadz_barber-109197650780393/', '35spu7lFqW', 1601906630);

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
  `ID_WAL` int(11) NOT NULL,
  `NOM_WAL` varchar(50) DEFAULT NULL,
  `PROFESSION_WAL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`ID_WAL`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `db_client`
--
ALTER TABLE `db_client`
  MODIFY `ID_CLI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `db_journal_comptable`
--
ALTER TABLE `db_journal_comptable`
  MODIFY `ID_JOU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `db_livredor`
--
ALTER TABLE `db_livredor`
  MODIFY `ID_LIV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `db_media`
--
ALTER TABLE `db_media`
  MODIFY `ID_MED` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `db_produit`
--
ALTER TABLE `db_produit`
  MODIFY `ID_PRO` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wall_of_fame`
--
ALTER TABLE `wall_of_fame`
  MODIFY `ID_WAL` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
