-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 oct. 2018 à 10:05
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cine_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(155) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reporting` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(155) NOT NULL,
  `title` varchar(155) NOT NULL,
  `horaires` time NOT NULL,
  `duree` time NOT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(155) NOT NULL,
  `content` text NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `horaires`, `duree`, `image`, `video`, `content`, `date_creation`) VALUES
(1, 'cinemaParis', 'les parapluies de cherbourg', '14:30:00', '01:35:00', 'https://medias.unifrance.org/medias/32/222/56864/format_page/media.jpg', 'Rq0yhizu0y8', '<p>Cherbourg, novembre 1957. Genevi&egrave;ve Emery, dont la m&egrave;re tient un commerce de parapluies, aime Guy Foucher, un jeune garagiste. La m&egrave;re de Genevi&egrave;ve ne voit pas d\'un bon oeil cette idylle et pr&eacute;f&eacute;rerait voir sa fille &eacute;pouser Roland Cassard, un riche diamantaire. Guy est appel&eacute; &agrave; l\'arm&eacute;e, pour la guerre d\'Alg&eacute;rie. Genevi&egrave;ve se donne &agrave; lui avant son d&eacute;part.</p>', '2018-09-30 13:22:44'),
(2, 'cinemaParis', 'Peau d\'âne', '15:30:00', '01:40:00', 'http://www.cinemapassion.com/lesaffiches/Peau-d-ane-20110524082038.jpg', '2jTtSppDlNA', '<p>La reine mourante d\'un royaume enchant&eacute; ordonne &agrave; son mari de n\'&eacute;pouser en secondes noces qu\'une femme plus belle qu\'elle. Or, seule sa fille la surpasse en gr&acirc;ce et en beaut&eacute;. Le roi demande la main de cette derni&egrave;re. La f&eacute;e des Lilas conseille alors &agrave; sa filleule de feindre les plus extravagants c<span class=\"yZlgBd\">aprices afin de d&eacute;courager les assauts paternels.</span></p>', '2018-09-30 16:13:07'),
(3, 'cinemaParis', 'Titanic', '15:30:00', '03:15:00', 'http://images.affiches-et-posters.com//albums/3/4499/affiche-film-titanic-2314.jpg', 'Quf4qIkD3KY', '<p>En 1997, l\'&eacute;pave du Titanic est l\'objet d\'une exploration fi&eacute;vreuse, men&eacute;e par des chercheurs de tr&eacute;sor en qu&ecirc;te d\'un diamant bleu qui se trouvait &agrave; bord. Frapp&eacute;e par un reportage t&eacute;l&eacute;vis&eacute;, l\'une des rescap&eacute;s du naufrage, &acirc;g&eacute;e de 102 ans, Rose DeWitt, se rend sur place et &eacute;voque ses souvenirs. 1912. Fianc&eacute;e &agrave; un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.</p>', '2018-09-30 13:25:28'),
(4, 'cinemaParis', 'Spartacus', '15:30:00', '03:18:00', 'https://images-na.ssl-images-amazon.com/images/I/71jhOAJXVtL._SX342_.jpg', 'TvH7XEEGRUA', '<p>Rome, 69 avant J&eacute;sus Christ. Une r&eacute;volte de gladiateurs &eacute;clate. &Agrave; sa t&ecirc;te, Spartacus, esclave et gladiateur, m&egrave;ne ses troupes contre l\'arm&eacute;e romaine. Sur le chemin de la libert&eacute;, il doit affronter une arm&eacute;e surpuissante command&eacute;e par Crassus, dont le pouvoir est absolu &agrave; Rome. Symbolisant la lutte &eacute;<span class=\"yZlgBd\">ternelle de l\'homme pour sa libert&eacute;, Spartacus m&ecirc;le r&eacute;alit&eacute; historique, grand spectacle et passion. Un grand classique !</span></p>', '2018-09-30 13:35:16'),
(5, 'cinemaParis', 'Il était une fois en Amerique', '18:30:00', '03:49:00', 'http://fr.web.img3.acsta.net/pictures/15/03/27/15/08/436989.jpg', 'Vmc1sdDlrk', '<p>A New York, &agrave; la fin de la prohibition, Noodles se r&eacute;fugie dans une fumerie d\'opium apr&egrave;s un coup qui a mal tourn&eacute;.</p>', '2018-09-30 16:11:44'),
(6, 'cinemaParis', 'Autant en emporte le vent', '13:30:00', '03:58:00', 'https://imgc.allpostersimages.com/img/print/posters/filmposter-gejaagd-door-de-wind-gone-with-the-wind-1939_a-G-7938754-0.jpg', 'TIS1mYlXCuI', '<p>En Georgie, en 1861, Scarlett O\'Hara est une jeune femme fi&egrave;re et volontaire de la haute soci&eacute;t&eacute; sudiste. Courtis&eacute;e par tous les bons partis du pays, elle n\'a d\'yeux que pour Ashley Wilkes malgr&eacute; ses fian&ccedil;ailles avec sa douce et timide cousine, Melanie Hamilton. Scarlett est pourtant bien d&eacute;cid&eacute;e &agrave;&nbsp;<span class=\"yZlgBd\">le faire changer d\'avis, mais &agrave; la r&eacute;ception des Douze Ch&ecirc;nes c\'est du cynique Rhett Butler qu\'elle retient l\'attention...</span></p>', '2018-10-06 11:49:57'),
(7, 'cinemaParis', 'Dr Jivago', '20:30:00', '03:20:00', 'https://images-na.ssl-images-amazon.com/images/I/91LuudBUt2L._RI_.jpg', '8i57ScETs0I', '<p>Le g&eacute;n&eacute;ral Yevgraf croit avoir enfin retrouv&eacute; la fille de son fr&egrave;re, perdue quand elle &eacute;tait enfant. Il la convoque dans son bureau pour l\'interroger et lui raconter l\'histoire de ses parents Au d&eacute;but du XXe si&egrave;cle, le drapeau rouge fait irruption dans les rues de Moscou. Le jeune m&eacute;decin et po&egrave;te Y<span class=\"yZlgBd\">ouri Jivago est plut&ocirc;t de ceux qui dansent dans les soir&eacute;es mondaines. Lara, un peu moins argent&eacute;e, vit sous le joug de l\'amant de sa m&egrave;re.</span></p>', '2018-10-06 11:58:40'),
(8, 'cinemaParis', 'Le fantome de l\'opera', '15:30:00', '02:20:00', 'http://fr.web.img6.acsta.net/c_215_290/medias/nmedia/18/35/42/82/18400051.jpg', '2e7FtEw75vY', '<p>Au XIXe si&egrave;cle, dans les fastes du Palais Garnier, l\'Op&eacute;ra de Paris, Christine, soprano vedette, est au sommet de sa gloire. Son succ&egrave;s est d&ucirc; &agrave; sa voix d\'or et aux myst&eacute;rieux conseils qu\'elle re&ccedil;oit d\'un \"Ange\", un fant&ocirc;me qui vit dans les souterrains du b&acirc;timent.<br />L\'homme, un g&eacute;nie musical d&eacute;figur&eacute; qui vit reclus et hante l\'op&eacute;ra, aime la jeune fille d\'un amour absolu et exclusif. Lorsque Raoul entre dans la vie de Christine, le Fant&ocirc;me ne le supporte pas.</p>', '2018-10-08 19:19:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` varchar(155) NOT NULL DEFAULT 'USER',
  `pseudo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(155) CHARACTER SET latin1 NOT NULL,
  `email` varchar(155) NOT NULL,
  `registration_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `id_group`, `pseudo`, `pass`, `email`, `registration_date`) VALUES
(1, 'ADMIN', 'cinemaParis', '$2y$10$7rRhTBPqNlTfiOC2eIKOqOVRuKIbYu8pDBqZR5eOC07sr6sadtoXm\r\n\r\n', '33260laetitia.bernardi@gmail.com', '2018-06-27 11:19:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
