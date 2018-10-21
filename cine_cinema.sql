-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  ven. 19 oct. 2018 à 16:13
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `id7504135_cinecinema1`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(155) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reporting` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `reporting`) VALUES
(1, 35, 'cinemaParis', '<img src=\"https://cloud.tinymce.com/stable/plugins/emoticons/img/smiley-cry.gif\" alt=\"cry\" />', '2018-10-19 12:14:20', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(155) NOT NULL,
  `title` varchar(155) NOT NULL,
  `horaires` time NOT NULL,
  `duree` time NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_creation` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author`, `title`, `horaires`, `duree`, `image`, `video`, `content`, `date_creation`) VALUES
(1, 'cinemaParis', 'les parapluies de cherbourg', '14:30:00', '01:35:00', 'https://medias.unifrance.org/medias/32/222/56864/format_page/media.jpg', 'Rq0yhizu0y8', '<p>Cherbourg, novembre 1957. Genevi&egrave;ve Emery, dont la m&egrave;re tient un commerce de parapluies, aime Guy Foucher, un jeune garagiste. La m&egrave;re de Genevi&egrave;ve ne voit pas d\'un bon oeil cette idylle et pr&eacute;f&eacute;rerait voir sa fille &eacute;pouser Roland Cassard, un riche diamantaire. Guy est appel&eacute; &agrave; l\'arm&eacute;e, pour la guerre d\'Alg&eacute;rie. Genevi&egrave;ve se donne &agrave; lui avant son d&eacute;part.</p>', '2018-09-30 13:22:44'),
(2, 'cinemaParis', 'Peau d\'âne', '15:30:00', '01:40:00', 'http://www.cinemapassion.com/lesaffiches/Peau-d-ane-20110524082038.jpg', '2jTtSppDlNA', '<p>La reine mourante d\'un royaume enchant&eacute; ordonne &agrave; son mari de n\'&eacute;pouser en secondes noces qu\'une femme plus belle qu\'elle. Or, seule sa fille la surpasse en gr&acirc;ce et en beaut&eacute;. Le roi demande la main de cette derni&egrave;re. La f&eacute;e des Lilas conseille alors &agrave; sa filleule de feindre les plus extravagants c<span class=\"yZlgBd\">aprices afin de d&eacute;courager les assauts paternels.</span></p>', '2018-09-30 16:13:07'),
(3, 'cinemaParis', 'Titanic', '15:30:00', '03:15:00', 'http://images.affiches-et-posters.com//albums/3/4499/affiche-film-titanic-2314.jpg', 'Quf4qIkD3KY', '<p>En 1997, l\'&eacute;pave du Titanic est l\'objet d\'une exploration fi&eacute;vreuse, men&eacute;e par des chercheurs de tr&eacute;sor en qu&ecirc;te d\'un diamant bleu qui se trouvait &agrave; bord. Frapp&eacute;e par un reportage t&eacute;l&eacute;vis&eacute;, l\'une des rescap&eacute;s du naufrage, &acirc;g&eacute;e de 102 ans, Rose DeWitt, se rend sur place et &eacute;voque ses souvenirs. 1912. Fianc&eacute;e &agrave; un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.</p>', '2018-09-30 13:25:28'),
(4, 'cinemaParis', 'West Side Story', '15:30:00', '02:33:00', 'http://cineclap.free.fr/west-side-story/west-side-story-a19.jpg?l6qmub', 'NF1L3NorO3E', '<p>Dans le West Side &agrave; New York, deux bandes s\'affrontent : les Jets, Am&eacute;ricains blancs dirig&eacute;s par Riff, et les Sharks, immigr&eacute;s portoricains dont le chef est Bernardo. Au cours d\'un bal, Maria, la soeur de Bernardo, rencontre Tony, l\'ancien chef des Jets. Alors qu\'ils tombent amoureux, la rivalit&eacute; en<span class=\"yZlgBd\">tre les deux clans s\'envenime. Bernardo tue Riff au cours d\'une bagarre et meurt &agrave; son tour, poignard&eacute; par Tony.</span></p>', '2018-09-30 13:35:16'),
(5, 'cinemaParis', 'Il était une fois en Amerique', '18:30:00', '03:49:00', 'http://fr.web.img3.acsta.net/pictures/15/03/27/15/08/436989.jpg', '-Vmc1sdDlrk', '<p>Il &eacute;tait une fois deux truands , Max et Noodles, li&eacute;s par un pacte d\'&eacute;ternelle amiti&eacute;. D&eacute;butant au d&eacute;but du si&egrave;cle par de fructueux trafics dans le ghetto de New York, ils voient leurs chemins se s&eacute;parer, lorsque Noodles se retrouve durant quelques ann&eacute;es derri&egrave;re les barreaux, puis se recouper en pleine p&eacute;riode de prohibition, dans les ann&eacute;es vingt. Jusqu\'au jour o&ugrave; la trahison les s&eacute;pare &agrave; nouveau.</p>', '2018-09-30 16:11:44'),
(6, 'cinemaParis', 'Autant en emporte le vent', '13:30:00', '03:58:00', 'https://imgc.allpostersimages.com/img/print/posters/filmposter-gejaagd-door-de-wind-gone-with-the-wind-1939_a-G-7938754-0.jpg', 'TIS1mYlXCuI', '<p>En Georgie, en 1861, Scarlett O\'Hara est une jeune femme fi&egrave;re et volontaire de la haute soci&eacute;t&eacute; sudiste. Courtis&eacute;e par tous les bons partis du pays, elle n\'a d\'yeux que pour Ashley Wilkes malgr&eacute; ses fian&ccedil;ailles avec sa douce et timide cousine, Melanie Hamilton. Scarlett est pourtant bien d&eacute;cid&eacute;e &agrave;&nbsp;<span class=\"yZlgBd\">le faire changer d\'avis, mais &agrave; la r&eacute;ception des Douze Ch&ecirc;nes c\'est du cynique Rhett Butler qu\'elle retient l\'attention...</span></p>', '2018-10-06 11:49:57'),
(7, 'cinemaParis', 'Dr Jivago', '20:30:00', '03:20:00', 'https://images-na.ssl-images-amazon.com/images/I/91LuudBUt2L._RI_.jpg', '8i57ScETs0I', '<p>Le g&eacute;n&eacute;ral Yevgraf croit avoir enfin retrouv&eacute; la fille de son fr&egrave;re, perdue quand elle &eacute;tait enfant. Il la convoque dans son bureau pour l\'interroger et lui raconter l\'histoire de ses parents Au d&eacute;but du XXe si&egrave;cle, le drapeau rouge fait irruption dans les rues de Moscou. Le jeune m&eacute;decin et po&egrave;te Y<span class=\"yZlgBd\">ouri Jivago est plut&ocirc;t de ceux qui dansent dans les soir&eacute;es mondaines. Lara, un peu moins argent&eacute;e, vit sous le joug de l\'amant de sa m&egrave;re.</span></p>', '2018-10-06 11:58:40'),
(8, 'cinemaParis', 'Les oiseaux', '15:30:00', '02:00:00', 'https://media.senscritique.com/media/000008589761/source_big/Les_Oiseaux.jpg', 'likhs5A8YhE', '<p>Melanie Daniels, jolie femme mondaine et spontan&eacute;e, rencontre dans une oisellerie Mitch Brenner, un s&eacute;duisant avocat qui cherche des ins&eacute;parables pour les offrir &agrave; sa jeune sur Cathy. Par jeu, Melanie les ach&egrave;te et les apporte &agrave; Bodega Bay, o&ugrave; Cathy habite avec sa m&egrave;re....</p>', '2018-10-08 19:19:47'),
(9, 'cinemaParis', 'Midnight Express', '10:30:00', '02:02:00', 'https://upload.wikimedia.org/wikipedia/en/thumb/5/52/Original_poster_for_Midnight_Express%2C_1978.jpg/220px-Original_poster_for_Midnight_Express%2C_1978.jpg', 'BmraBWl89SU', '<p>Billy Hayes, touriste en Turquie, est arr&ecirc;t&eacute; &agrave; la fronti&egrave;re avec deux kilogrammes de drogue sur lui. Condamn&eacute; &agrave; quelques jours de prison, le jeune homme d&eacute;couvre que sa peine a &eacute;t&eacute; mu&eacute;e en prison &agrave; perp&eacute;tuit&eacute; par le gouvernement souhaitant faire de son cas un exemple. D&eacute;sempar&eacute;, Billy multiplie les proc&egrave;s et parcourt les prisons les plus sordides.</p>', '2018-10-11 05:15:00'),
(10, 'cinemaParis', 'Le Tombeau des lucioles', '10:30:00', '01:30:00', 'http://t0.gstatic.com/images?q=tbn:ANd9GcT80THtIQXwq_LQEvrYsB1vlNkVHSPgBTHfZBkbkqSLp3kh71RJ', 'ELGUE86HPSc', '<p style=\"text-align: center;\"><strong>Cinema des enfants tous les dimanches matin pendant le mois de novembre.</strong><br />Japon, &eacute;t&eacute; 1945. Les bombardiers am&eacute;ricains arrosent Kob&eacute; de plusieurs milliers de tonnes de bombes incendiaires. Un jeune adolescent et sa petite soeur perdent leurs parents. Ils se r&eacute;fugient dans leur famille proche mais cruelle. Leur qu&ecirc;te d&eacute;sesp&eacute;r&eacute;e d\'un monde meilleur les am&egrave;nera &agrave; traverser autant les ruines du Japon ensanglant&eacute; par la fin de cette guerre qu\'&agrave; affronter l\'indiff&eacute;rence et la cruaut&eacute; des adultes...</p>', '2018-10-18 19:24:58'),
(11, 'cinemaParis', 'Le parrain', '10:30:00', '02:55:00', 'http://t3.gstatic.com/images?q=tbn:ANd9GcQyO8trmFbGTJIY6MaIFqzfPB6hW8UFCAYxTqtdKWGz7EJ6Jt-d', 'u36CUncot50', '<p>En 1945, &agrave; New York, les Corleone sont une des cinq familles de la mafia. Don Vito Corleone, \"parrain\" de cette famille, marie sa fille &agrave; un bookmaker. Sollozzo, \" parrain \" de la famille Tattaglia, propose &agrave; Don Vito une association dans le trafic de drogue, mais celui-ci refuse. Sonny, un de ses fils, y est quant &agrave; lui favorable.<br />Afin de traiter avec Sonny, Sollozzo tente de faire tuer Don Vito, mais celui-ci en r&eacute;chappe. Michael, le fr&egrave;re cadet de Sonny, recherche alors les commanditaires de l\'attentat et tue Sollozzo et le chef de la police, en repr&eacute;sailles.<br />Michael part alors en Sicile, o&ugrave; il &eacute;pouse Apollonia, mais celle-ci est assassin&eacute;e &agrave; sa place. De retour &agrave; New York, Michael &eacute;pouse Kay Adams et se pr&eacute;pare &agrave; devenir le successeur de son p&egrave;re...</p>', '2018-10-18 12:04:33');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL DEFAULT '2',
  `pseudo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pass` varchar(155) CHARACTER SET latin1 NOT NULL,
  `email` varchar(155) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `id_group`, `pseudo`, `pass`, `email`, `registration_date`) VALUES
(1, 1, 'cinemaParis', '$2y$10$YM5rJPh5ee64eI6lY/Y0a.9gK0znhc8zYixF07TPup92k9aRU6X5K', '33260laetitia.bernardi@gmail.com', '2018-06-27 17:35:26'),
(2, 2, 'vincent33260', '$2y$10$nvwz0KYHTlZiGHqc3H4ImetWXxdofir3v4r8dTmjU8fb4ESBVGplK', 'vincent33260@yahoo.fr', '2018-10-12 09:12:36'),
(3, 2, 'manon', '$2y$10$RjR6gExXCGHVNZCyCvt24OijtN6bSLJwe1dlmxmZB9l2f.LADr6JC', 'manon.moi@gmail.com', '2018-10-12 09:19:09'),
(4, 2, 'david33000', '$2y$10$u/mZ34j3TJVTEVfbee1uTeRmvIQKVi3mQoLkfv0WHlHxOJ2iewHFa', 'dav.maison@hotmail.com', '2018-10-12 09:53:21'),
(5, 2, 'audreycasa', '$2y$10$V4bbkrbV8loEPAvqhVOFHuNdrtx6zqzkC7ZYBuKtcNob9rPCEphbW', 'audreycasa@yahoo.fr', '2018-10-12 09:54:57'),
(6, 2, 'eric', '$2y$10$G3WK7YhJbuLZpAfzapX9aO2nbUeoAyVqfVtKNNsUqVWv6CpB5dHZW', 'lgachoucha@yahoo.fr', '2018-10-16 14:26:06'),
(7, 2, 'manon2', '$2y$10$GCh9QcND9stHAv.w5/A54up9C.cFAASeS3sFUA7oBGScKDdgG2goG', 'brunoher@wanadoo.fr', '2018-10-17 13:39:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
