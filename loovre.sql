-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 17 mai 2022 à 08:53
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `loovre`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `texte` text NOT NULL,
  `date_com` date NOT NULL,
  `note` smallint(6) DEFAULT NULL,
  `id_commentaire` bigint(20) UNSIGNED DEFAULT NULL,
  `id_destination` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `texte`, `date_com`, `note`, `id_commentaire`, `id_destination`) VALUES
(1, 'Jean-Marc WEISS', 'Super !\r\nLe voyage a était parfaitement organisé par votre équipe, on a pu se réjouir du début à la fin.', '2021-08-12', 5, NULL, 1),
(3, 'Léane VAUTHIER', 'J\'aime pas il y a trop de monde et de pollution, grosse désillusion, choqué et déçus.', '2022-01-13', 2, NULL, 1),
(4, 'Enzo BRUNIER', 'J\'ai bien aimé que l\'équipe nous organise l\'entièreté de notre voyage, périlleux mais unique en son genre.', '2021-06-17', 4, NULL, 3),
(5, 'Julien ADAMS', 'Je ne suis pas d\'accord, j\'ai trouvé paris délabré, loin de ce que l\'on m\'avait vendu.', '2021-04-22', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `continent`
--

CREATE TABLE `continent` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `continent`
--

INSERT INTO `continent` (`id`, `nom`, `image`) VALUES
(1, 'Europe', './img/bdd/europe.jpg'),
(2, 'Asie', './img/bdd/asie.jpg'),
(3, 'Afrique', './img/bdd/africa.jpg'),
(4, 'Amériques', './img/bdd/america.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `couchage`
--

CREATE TABLE `couchage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(20) NOT NULL,
  `svg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `couchage`
--

INSERT INTO `couchage` (`id`, `nom`, `svg`) VALUES
(1, 'Hotel', './img/svg/hotel.svg'),
(2, 'Villa', './img/svg/villa.svg'),
(3, 'Tente', './img/svg/tente.svg'),
(4, 'Outdoor', './img/svg/outdoor.svg'),
(5, 'Auberge', './img/svg/auberge.svg');

-- --------------------------------------------------------

--
-- Structure de la table `destination`
--

CREATE TABLE `destination` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `prix` smallint(6) NOT NULL,
  `tendance` int(11) NOT NULL,
  `id_couchage` bigint(20) UNSIGNED NOT NULL,
  `id_pays` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `destination`
--

INSERT INTO `destination` (`id`, `titre`, `description`, `image`, `prix`, `tendance`, `id_couchage`, `id_pays`) VALUES
(1, 'Paris', 'Si Paris est l’une des premières destinations touristiques au monde, c’est qu’elle excelle dans l’art de conjuguer beauté, raffinement, culture et dynamisme ! Votre voyage à Paris vous fera découvrir une cité vivante, bouillonnante, et fière de son patrimoine, qui couvre jusqu’à 2000 ans d’histoire(s) ! Perdez-vous dans les petites ruelles ou laissez-vous entraîner dans le flot des avenues haussmanniennes. Ouvrez grand les yeux : Paris est un spectacle permanent !', './img/bdd/paris.jpg', 1270, 480, 1, 1),
(2, 'Osaka', 'Bien qu\'Osaka ne se trouve qu\'à une courte distance de Tokyo en shinkansen, son atmosphère est totalement différente de celle de la capitale nipponne. Attrapez un train à grande vitesse pour faire escale dans une ville à la vie nocturne animée, où vous dégusterez plusieurs spécialités savoureuses et échangerez avec des habitants francs et chaleureux. ', './img/bdd/osaka.jpg', 1780, 280, 1, 2),
(3, 'Saint Jacques de Compostelle', 'Entre les Picos de Europa et la côte Cantabrique tantôt déchiquetée en immenses falaises, tantôt douce et verdoyante, les paysages sont charmants. Villes prestigieuses, villages traditionnels, ports de pêche, gardent un patrimoine parfois unique en Europe comme les splendides églises romanes, préromanes et mozarabes.', './img/bdd/st-jacques.jpg', 410, 200, 5, 4),
(8, 'Dubaï', 'Dubaï est une destination qui mêle la culture moderne à l\'histoire, l\'aventure, le divertissement et le shopping de première classe. Venez assister à une représentation à l\'opéra de Dubaï, observez le cœur de la ville du haut de la tour Burj Khalifa et passez un après-midi au bord de la rivière de Dubaï à explorer les souks d\'or, de tissus et d\'épices.', './img/bdd/dubai.jpg', 1350, 380, 1, 8),
(9, 'Bali', 'Avec ses décors de carte postale, Bali est un véritable paradis en Indonésie. Prenez le soleil sur un tapis de sable blanc et découvrez la faune tropicale en explorant les récifs coralliens de l\'île ou l\'épave colorée d\'un navire de guerre datant de la Seconde Guerre mondiale. Enfoncez vous dans les terres et découvrez une jungle luxuriante dans laquelle sont camouflés d\'antiques temples de pierre habités par des singes facétieux.', './img/bdd/bali.jpg', 890, 700, 2, 10),
(10, 'Cancún', 'C\'est certain, Cancún est avant tout un refuge pour les étudiants cherchant à passer des vacances alcoolisées. Cependant, l\'endroit regorge d\'excellents complexes familiaux accueillant les touristes à la recherche d\'un endroit calme pour découvrir le climat tropical du Yucatan. La région recèle aussi des ruines mayas, comme El Rey et le Yamil Lu\'um, tour en pierre grise en train de s\'effondrer.', './img/bdd/cancun.jpg', 720, 410, 3, 9),
(11, 'Rome', 'Rome ne s\'est pas faite en un jour, mais Rome ne se visite pas en un jour non plus. On se croirait dans un gigantesque musée en plein air : vous vous retrouvez au milieu d\'un authentique assemblage de « piazzas », de marchés en plein air et de sites historiques fascinants. Jetez une pièce dans la fontaine de Trevi, pâmez-vous d\'admiration au Colisée et au Panthéon, puis prenez un cappuccino pour refaire le plein d\'énergie au cours d\'un après-midi shopping au Campo de\'Fiori ou dans la Via Veneto.', './img/bdd/rome.jpg', 570, 600, 2, 5),
(12, 'Crète', 'L\'île de Crète est un petit joyau grec flottant sur une mer turquoise. Les plages sont de divines étendues de sable mœlleux et de galets polis. Sans oublier son importance historique et mythologique : la Crète serait le lieu de naissance de Zeus, le roi des Dieux, et elle a été le berceau de la première civilisation moderne d\'Europe. ', './img/bdd/crete.jpg', 320, 200, 4, 11),
(13, 'Las Vegas', 'Que vous soyez joueur ou non, Las Vegas aura forcément quelque chose à vous offrir. Goûtez à la cuisine des grands chefs ou servez-vous dans les copieux buffets, tentez votre chance dans l\'un des plus grands casinos du monde ou bien assistez à un spectacle grandiose. Pour faire un peu d\'exercice, une balade sur le Strip suffit.', './img/bdd/las-vegas.jpg', 980, 450, 1, 13),
(14, 'New Delhi', 'Calme et chaotique à la fois, tel est le paradoxe qui se dégage de New Delhi, ville à la configuration très complexe où l\'on voit souvent les vaches errer dans les rues bordées par les cabanes. Le Fort rouge, datant du XVIIe siècle, est un ensemble coiffé de dômes et de tourelles, tandis que le marché de Chandni Chowk permet de se livrer à un passionnant exercice de marchandage amical.', './img/bdd/new-delhi.jpg', 650, 210, 2, 14),
(15, 'L’Alhambra Grenade', 'L’Alhambra de Grenade est l’un des ensembles monumentaux médiévaux les plus spectaculaires, et l’un des plus beaux échantillons d’art islamique au monde. C’est aussi le témoin le plus tenace de huit siècles de domination musulmane éclairée dans l’Espagne médiévale. Les tours fortifiées de l’Alhambra dominent la ville : on aperçoit de loin ses murs rouges au-dessus des cyprès et des ormes, avec pour toile de fond les sommets enneigés de la Sierra Nevada. ', './img/bdd/alhambra.jpg', 550, 230, 5, 4),
(16, 'Kyoto', 'Ne vous êtes vous jamais demandé à quoi vous ressembleriez en manga ou en samouraï ? Ce circuit original conçu spécialement pour petits et grands est une initiation ludique à la culture japonaise, bercée entre traditions et modernité. A Osaka, Kurashiki et la plaine de Kibi, à Kyoto et Nara, au mont Fuji avec la nuit chez l\'habitant et à Tokyo : de nombreuses idées de visites vous sont proposées !', './img/bdd/kyoto.jpg', 2430, 680, 2, 2),
(17, 'Bangkok', 'Après Londres en 2011, c’est Bangkok qui devient, désormais, la ville la plus touristique au monde. La capitale Thaïlandaise attire près de 22 millions de touristes chaque année. Bangkok est célèbre pour sa vie nocturne, ses temples, musées, boutiques, restaurants et aussi pour ses plages. Un touriste reste, en moyenne, 9,5 jours à Bangkok. La ville est la porte d’entrée dans le pays qui attire notamment pour ses plages, plus au sud.', './img/bdd/bangkok.jpg', 940, 560, 1, 15),
(18, 'Venise', 'Venise, capitale de la région de la Vénétie au nord de l\'Italie, occupe plus de 100 petites îles dans un lagon de la mer Adriatique. La ville ne comprend aucune route, uniquement des canaux, dont le Grand Canal, bordé de palais gothiques et Renaissance.', './img/bdd/venise.jpg', 540, 400, 2, 5),
(19, 'Florence', 'Florence, capitale de la Toscane, est riche de nombreux chefs-d\'œuvre de l\'art et de l\'architecture de la Renaissance. L\'un de ses sites les plus emblématiques est le Duomo, la cathédrale dont la coupole en terre cuite a été conçue par Brunelleschi et, le campanile, par Giotto. ', './img/bdd/florence.jpg', 1800, 500, 5, 5),
(20, 'Paria Canyon', 'Situé à cheval sur l’Utah et l’Arizona, le Paria Canyon est moins connu que ses proches voisins mais n’en est pas moins spectaculaire ! C’est l’érosion de la roche sédimentaire qui est à l’origine de ces incroyables voûtes et autres formes creusées dans la roche d’un rouge typique de la région.', './img/bdd/paria.jpg', 720, 340, 3, 13),
(21, 'Le Cenote Ik Kil', 'Le mot « cenote » ne vous dit peut être rien… Il provient pourtant de la langue Maya dans laquelle il signifie « puit sacré ». A l’époque, les cenotes étaient considérés comme des passerelles vers l’au-delà. S’ils ont aujourd’hui perdu leur image surnaturelle, ils n’en restent pas moins de superbes oeuvres d’art de Mère Nature.', './img/bdd/cenote.jpg', 920, 350, 4, 9),
(22, 'Yellowstone', 'S’étendant sur plus de 8900 km entre les états du Wyoming, du Montana et de l’Idaho, le parc de Yellowstone est certainement le plus impressionnant des parcs nationaux américains. Célèbre pour ses phénomènes géothermiques, il contient en effet de nombreux geysers et sources chaudes mais également de grands mammifères comme des grizzlys, des loups et même des bisons.', './img/bdd/yellow.jpg', 870, 420, 3, 13),
(23, 'Mont Fuji', 'Point culminant et emblème du Japon, le Mont Fuji est un cône volcanique situé sur l’île de Honshū. S’élevant à 3776 mètres d’altitude, ce volcan est toujours considéré comme actif, bien que la dernière éruption remonte au XVIIIe siècle.', './img/bdd/fuji.jpg', 1700, 620, 3, 2),
(24, 'Les bassins de Pamukkale', 'Inscrit à l’UNESCO depuis 1988, l’incroyable site de Pamukkale est situé au sud-ouest de la Turquie, à proximité de la ville de Denizli. Ses piscines d’eau chaude formées par de la roche calcaire, dont certaines ont une température de plus de 45°C, sont connues pour leurs vertus thérapeutiques permettant de soigner certaines maladies et infections.', './img/bdd/pamukkale.jpg', 650, 320, 3, 12),
(25, 'Cappadoce', 'La Cappadoce est une région semi-aride du centre de la Turquie. Elle est réputée pour ses cheminées de fées caractéristiques, grandes formations rocheuses en forme de cônes présentes dans la vallée des Moines, à Göreme et ailleurs. ', './img/bdd/cappadoce.jpg', 1650, 100, 4, 12),
(26, 'Istanbul', 'Istanbul est une grande ville turque à cheval entre l\'Europe et l\'Asie, séparée par le détroit du Bosphore. Sa vieille ville reflète les influences culturelles des nombreux empires qui ont régné sur Istanbul. Dans le quartier de Sultanahmet, l\'hippodrome en plein air datant de l\'époque romaine a accueilli des courses de chars pendant plusieurs siècles, et des obélisques égyptiens sont toujours debout.', './img/bdd/istanbul.jpg', 1400, 210, 1, 12),
(27, 'Collonges-La-Rouge', 'Située dans la région Nouvelle-Aquitaine, Collonges-La-Rouge n’a pas volé son nom. Cette si mignonne petite commune n’est pas née de la dernière pluie. En effet, derrière ses briques rouges se cachent plus de 1000 ans d’histoire. Allez découvrir le Castel de Vassinhac, la très photogénique Maison de la Sirène et en fait, toutes les maisons du village qui donnent juste envie de tout lâcher et de s’installer dans le coin.', './img/bdd/collonges.jpg', 310, 110, 5, 1),
(28, 'Mont Saint-Michel', 'C’est encore plus beau en vrai qu’en photo ! Honnêtement, même si le lieu est super touristique, il est loin d’être surfait. Déjà, vous pouvez éviter la foule en y allant un week-end (ou quand il pleut, aussi). Le mieux est de se lever tôt pour assister à une lumière magnifique tombant sur le monastère et puis de revenir le soir pour assister à l’un des plus beaux couchers de soleil auxquels vous assisterez dans votre vie. Petit conseil : évitez de prendre la navette et marchez jusqu’au pied du Mont. La balade vaut vraiment le coup !', './img/bdd/michel.jpg', 540, 400, 5, 1),
(29, 'Le temple Borobudur', 'Rendez-vous au cœur de l’île de Java, à quelques dizaines de kilomètres de l’importante ville de Yogyakarta pour admirer un monument bouddhiste d’une rare beauté : Le temple Borobudur. Ce temple a été construit dans la jungle entre la fin du VIIIe siècle et le début du IXe siècle, à l’époque de la dynastie Sailendra, avant d’être abandonné pendant plusieurs siècles, puis redécouvert au XIXe siècle.', './img/bdd/borobudur.jpg', 1500, 320, 3, 10),
(30, 'L’île de Nusa Lembongan', 'Vous vous demandez que faire en Indonésie ? Profitez d’un voyage à Bali pour vous échapper quelques jours sur l’île de Nusa Lembongan. À seulement quelques kilomètres de Bali, cette île est la destination parfaite pour explorer les fonds marins.', './img/bdd/lembongan.jpg', 1780, 120, 4, 10),
(31, 'L’ancienne capitale d’Ayutthaya', 'Ayutthaya, l’ancienne ville sainte, est située à environ 75 kilomètres de Bangkok. Autrefois capitale du Royaume de Siam, cette cité antique classée au patrimoine mondial de l’UNESCO fut entièrement détruite par les Birmans. Il en subsiste aujourd’hui un ensemble exceptionnel de prangs et de monuments religieux aux proportions impressionnantes.', './img/bdd/ayutthaya.jpg', 1800, 430, 4, 15),
(32, 'L\'archipel de Koh Phi Phi', 'Même si Koh Phi Phi est l’archipel le plus visité du pays, il reste un incontournable à voir en Thaïlande. Ce chapelet d’îles est devenu mondialement célèbre grâce au film La Plage avec Leonardo di Caprio. Depuis, les îles Phi Phi connaissent un succès retentissant et les voyageurs du monde entier s’y pressent pour les découvrir.', './img/bdd/koh.jpg', 1450, 300, 3, 15),
(33, 'Yosemite', 'Situé dans les montagnes de la Sierra Nevada, le Yosemite est l’endroit rêvé pour tous les amateurs de randonnée ou d’escalade. Il promet des paysages spectaculaires : chutes d’eau, falaises de granit, séquoias géants… Ce parc est reconnu patrimoine de l’Humanité par l’UNESCO depuis 1984.', './img/bdd/yosemite.jpg', 910, 140, 5, 13),
(34, 'Denali', 'Ce parc est situé aux abords du Mont McKinley, point culminant d\'amérique du nord. Glaciers et forêts boréales à parcourir en voiture ou à pieds pour partir à la rencontre de la faune sauvage. Dépaysement garantie, à vivre avec prudence et respect de l\'environnement.', './img/bdd/denali.jpg', 1550, 80, 3, 13),
(35, 'Hong Kong', 'Un voyage à Hong Kong est une odyssée dans le temps, une plongée au cœur d’un monde multiculturel et d’une baie mythique, à la croisée des influences chinoises et britanniques. Là où la Chine n’est ni tout à fait la même, ni tout à fait une autre... Jeune, cosmopolite, bouillonnant, ce bout de terre à la fois minuscule et tentaculaire est tout en contrastes', './img/bdd/hong-kong.jpg', 1310, 360, 1, 3),
(36, 'Grande Muraille de Chine', 'La Grande Muraille de Chine, classée au patrimoine de l’Unesco depuis 1987, fait partie des sept merveilles du monde. Elle reste incontestablement l’une des plus belles et des plus impressionnantes constructions sur notre planète. Tel un gigantesque dragon, la Grande Muraille domine déserts, vallées, montagnes et plateaux. Elle s’étend sur presque 9000 kilomètres, d’Est en Ouest. ', './img/bdd/muraille.jpg', 1680, 260, 5, 3),
(37, 'Les falaises d’Étretat', 'Situées dans le département de la Seine-Maritime, les falaises d’Étretat ont depuis toujours inspiré les artistes et notamment les peintres Gustave Courbet et Claude Monet. Les formes singulières des falaises calcaires se jetant dans la mer, les étroites plages de galets mais aussi la verdure des pelouses qui les surplombent créent en effet un paysage unique en son genre.', './img/bdd/etretat.jpg', 390, 100, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etiqueter`
--

CREATE TABLE `etiqueter` (
  `id_etiquette` bigint(20) UNSIGNED NOT NULL,
  `id_table_destination` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etiqueter`
--

INSERT INTO `etiqueter` (`id_etiquette`, `id_table_destination`) VALUES
(6, 2),
(4, 3),
(3, 3),
(7, 2),
(8, 2),
(5, 3),
(1, 2),
(4, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(9, 9),
(2, 9),
(4, 9),
(1, 9),
(7, 10),
(11, 10),
(5, 10),
(6, 8),
(7, 8),
(10, 8),
(8, 8),
(9, 12),
(1, 12),
(10, 12),
(10, 11),
(5, 11),
(9, 11),
(8, 11),
(7, 13),
(3, 13),
(6, 13),
(8, 14),
(10, 14),
(11, 14),
(5, 14),
(7, 16),
(9, 16),
(8, 16),
(5, 15),
(2, 15),
(1, 15),
(9, 17),
(2, 17),
(1, 17),
(5, 18),
(8, 18),
(9, 18),
(8, 18),
(10, 18),
(9, 19),
(5, 19),
(11, 19),
(12, 20),
(12, 22),
(12, 21),
(3, 22),
(2, 22),
(4, 22),
(4, 21),
(3, 21),
(2, 21),
(3, 20),
(2, 20),
(4, 20),
(12, 23),
(4, 23),
(11, 23),
(3, 23),
(3, 24),
(12, 24),
(4, 24),
(6, 25),
(9, 25),
(3, 25),
(1, 25),
(7, 26),
(5, 26),
(10, 26),
(11, 26),
(8, 26),
(5, 27),
(7, 27),
(9, 27),
(4, 30),
(12, 30),
(2, 30),
(1, 30),
(9, 29),
(5, 29),
(11, 29),
(12, 30),
(5, 28),
(3, 28),
(9, 28),
(10, 28),
(12, 31),
(12, 31),
(2, 31),
(2, 32),
(5, 31),
(11, 31),
(4, 32),
(1, 32),
(13, 23),
(13, 33),
(13, 34),
(14, 33),
(14, 22),
(14, 24),
(4, 33),
(12, 33),
(2, 33),
(4, 34),
(2, 34),
(12, 34),
(1, 35),
(11, 35),
(7, 35),
(9, 35),
(11, 36),
(5, 36),
(12, 36),
(3, 36),
(4, 37),
(1, 37),
(10, 37);

-- --------------------------------------------------------

--
-- Structure de la table `etiquette`
--

CREATE TABLE `etiquette` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `svg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etiquette`
--

INSERT INTO `etiquette` (`id`, `nom`, `svg`) VALUES
(1, 'Relax', './img/svg/relax.svg'),
(2, 'Aventure', './img/svg/aventure.svg'),
(3, 'Unique', './img/svg/unique.svg'),
(4, 'Nature', './img/svg/nature.svg'),
(5, 'Architecture', './img/svg/architecture.svg'),
(6, 'Nocturne', './img/svg/nuit.svg'),
(7, 'Agglomération', './img/svg/ville.svg'),
(8, 'Gastronomie', './img/svg/food.svg'),
(9, 'Artistique', './img/svg/art.svg'),
(10, 'Romantique', './img/svg/heart.svg'),
(11, 'Historique', './img/svg/historic.svg'),
(12, 'Excursion', './img/svg/hiking.svg'),
(13, 'Montagne', './img/svg/mountain.svg'),
(14, 'Parc Naturel', './img/svg/parc.svg');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `chaleur` tinyint(4) NOT NULL,
  `id_continent` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `chaleur`, `id_continent`) VALUES
(1, 'France', 3, 1),
(2, 'Japon', 3, 2),
(3, 'Chine', 1, 2),
(4, 'Espagne', 3, 1),
(5, 'Italie', 3, 1),
(6, 'Angleterre', 3, 1),
(7, 'Corée', 4, 2),
(8, 'Émirats arabes unis', 9, 3),
(9, 'Mexique', 5, 4),
(10, 'Indonésie', 8, 2),
(11, 'Grèce', 4, 1),
(12, 'Turquie', 4, 1),
(13, 'États-Unis', 2, 4),
(14, 'Inde', 4, 2),
(15, 'Thaïlande', 8, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_com_com` (`id_commentaire`),
  ADD KEY `fk_id_destination` (`id_destination`);

--
-- Index pour la table `continent`
--
ALTER TABLE `continent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `couchage`
--
ALTER TABLE `couchage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_id_couchage` (`id_couchage`),
  ADD KEY `fk_id_pays` (`id_pays`);

--
-- Index pour la table `etiqueter`
--
ALTER TABLE `etiqueter`
  ADD KEY `fk_id_table_destination` (`id_table_destination`),
  ADD KEY `fk_id_etiquette` (`id_etiquette`);

--
-- Index pour la table `etiquette`
--
ALTER TABLE `etiquette`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_id_continent` (`id_continent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `continent`
--
ALTER TABLE `continent`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `couchage`
--
ALTER TABLE `couchage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `etiquette`
--
ALTER TABLE `etiquette`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_com_com` FOREIGN KEY (`id_commentaire`) REFERENCES `commentaire` (`id`),
  ADD CONSTRAINT `fk_id_destination` FOREIGN KEY (`id_destination`) REFERENCES `destination` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `destination`
--
ALTER TABLE `destination`
  ADD CONSTRAINT `fk_id_couchage` FOREIGN KEY (`id_couchage`) REFERENCES `couchage` (`id`),
  ADD CONSTRAINT `fk_id_pays` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `etiqueter`
--
ALTER TABLE `etiqueter`
  ADD CONSTRAINT `fk_id_etiquette` FOREIGN KEY (`id_etiquette`) REFERENCES `etiquette` (`id`),
  ADD CONSTRAINT `fk_id_table_destination` FOREIGN KEY (`id_table_destination`) REFERENCES `destination` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `fk_id_continent` FOREIGN KEY (`id_continent`) REFERENCES `continent` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
