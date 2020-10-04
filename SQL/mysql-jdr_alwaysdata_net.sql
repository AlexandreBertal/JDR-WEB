-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-jdr.alwaysdata.net
-- Generation Time: Aug 19, 2020 at 11:38 AM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jdr_bdd`
--
CREATE DATABASE IF NOT EXISTS `jdr_bdd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `jdr_bdd`;

-- --------------------------------------------------------

--
-- Table structure for table `bestiaire`
--

CREATE TABLE `bestiaire` (
  `nom_bestiaire` varchar(50) DEFAULT NULL,
  `illustration_bestiaire` varchar(50) NOT NULL,
  `corruption_bestiaire` varchar(50) DEFAULT NULL,
  `generation_bestiaire` int(11) NOT NULL,
  `description_bestiaire` text DEFAULT NULL,
  `localisation_bestiaire` varchar(50) DEFAULT NULL,
  `statu_bestiaire` varchar(50) NOT NULL,
  `ID_bestiaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bestiaire`
--

INSERT INTO `bestiaire` (`nom_bestiaire`, `illustration_bestiaire`, `corruption_bestiaire`, `generation_bestiaire`, `description_bestiaire`, `localisation_bestiaire`, `statu_bestiaire`, `ID_bestiaire`) VALUES
('Lutin', '../image/lutin.jpg', NULL, 1, 'Les lutins sont des petites créatures d\'une dizaine de millimètres vivant dans les forêts ou aux alentours des petits villages de campagne. D\'un naturel farceur, il aime jouer des tours aux voyageurs imprudents ou égarés. Leurs ailes et leur connaissance de la magie leur donne la possibilité d\'invoquer des labyrinthes de brume ou des clones d\'eux même pour piéger leur cible.', 'Forêt de jura', 'Inconnu', 1),
('Ours', '../image/Ours.png', '../image/OursC.jpg', 2, 'L\'ours est généralement diurne, mais peut être actif la nuit ou au crêpuscule, notamment près des habitations. Les ours sont aidés par leur excellent sens de l\'odorat, et malgré leur forte corpulence et une démarche maladroite, ils peuvent courir rapidement (jusqu\'à 50km/h) et sont des grimpeurs habiles comme d\'excellents nageurs. Leurs dents sont utilisées pour la défense et comme outils et dépendent du régime de l\'ours. Leurs griffes sont employées pour déchirer, creuser et attraper. Sur leurs pattes arrière, ils peuvent avoir une démarche bipède.', 'Forêt de jura et par de la porte blance', 'inconnue', 2),
('Loup', '../image/loup.jpg', '../image/l-c.PNG', 2, 'Le loup est un animal carnivore qui se nourrit de différentes espèces selon la taille de la meute. Il peut s\'agir de cerfs, moutons, chamgliers de petite taille lorsque la meute est petite. Mais pour les grosses meutes, les proies sont plus variées: élans, rennes, mouflons, chamois, lièvres. Il mesure environ 80 cm au garrot. Le mâle peut peser de 32 à 59kg, la femelle est plus légère d\'environ 20%. Sa fourrure peut prendre différents coloris allant du blanc au noir, en passant par différentes teintes de gris.e est petit. Mais pour les grosses meutes les proies sont plus variées : élans, rennes, mouflons, chamois, lièvres, Il mesure environ 80 cm au garrot. Le mâle peut peser de 32 à 59 kg, la femelle est plus légère d\'environ 20 %. Sa fourrure peut prendre différents coloris allant du blanc au noir, en passant par différentes teintes de gris.', 'dans les forêt et plaine proche', 'inconnue ', 3),
('Chamglier', '../image/chamglier.png', NULL, 2, 'L\'avant-train est puissant, le cou massif. La tête (hure) a une forme globalement conique. Les flancs sont comprimés. Le pelage est constitué de longs jarres très rèches (les soies) ainsi que d\'un épais duvet. Les adultes sont de couleur gris-brun uniforme, foncé en général ; les plus jeunes ont un pelage formé de bandes rousses et crème horizontales oû pousse les graine qu\'il des fruit ou des légume qu\'il ingurgite pour se nourrire. Les oreilles triangulaires sont toujours dressêes et serve au plante grimpente pour se développer. Les canines sont particulièrement développées. Celles de la mâchoire supérieure, les grés, se recourbent vers le haut durant la croissance. La taille des mâles est plus importante que celle des femelles.', 'Ouest de dralor', 'Inconnue', 4),
('Kobold', '../image/kobold.jpg', NULL, 1, 'Le Kobold est un gobelin qui vit dans les cavernes ou dans les mines et ils vivent en petit groupes. Mais il peuvent devinir dangeureux si on les deranges ou que l\'on va dans leur lieu de vie', 'Caverne et mine', 'Inconnue', 5),
('Niffleur', '../image/niffleur.png', NULL, 1, 'Le Niffleur est une créature recouverte d\'une fourrure noire, dotée d\'un museau arrondi, entre la taupe et l\'ornithorynque. Attirée par tout ce qui brille, cette petite bête, qui vit dans un terrier, se montre d\'une rapidité et d\'une agilité remarquables et s\'empare du moindre objet scintillant.', 'caverne et mine', 'inconue', 6),
('Lycanthrope', '../image/lycan.JPG', NULL, 2, 'Le lycanthrope se catégorise en différentes formes. La première forme n\'est pas très éloignée d\'un loup bien que beaucoup plus gros et plus puissant, au bout de plusieurs mois le lycan va petit à petit se redresser pour pouvoir devenir une créature bipède. Sous cette dernière forme, sa force et sa vitesse sont décuplées. Les lycanthropes vivent en meute entre cinq et dix individus dirigés par un lycanthrope Alpha et cohabitant avec différent clan. Le seul point faible des lycanthropes est l\'argent, qui est un poison pour leur organisme et empêche leur régénération. L\'espèce n\'est pas très présente sur le continent à l\'exception de la forêt de Jura où il contamine loup et humain aussi rapidement qu\'ils sont chassés.', 'Forêt de jura', 'Éteine ', 7),
('Lycanthrope Alpha', '../image/Lycan_alpha.jpg', NULL, 2, 'Un lycanthrope alpha est la forme finale et parfaite d\'un lycanthrope, ses capacités physique et intellectuelle sont au maximum, et peut en oubliant sa nature bestiale imiter l\'apparence humaine à la perfection. Il est le chef de meute, le plus gros, le plus rapide et le plus fort. Sous sa forme naturel, le lycan alpha possède une peau et une fourrure qui pourrais faire dévier une épée, ses crocs et ses griffes sont plus acérée que jamais et pourrais trancher un arbre.\r\n\r\n', 'Forêt de jura', 'inconnue', 8),
('Nécrophages d\'arcontia', '', '../image/necrophage.png', 2, 'Le Nécrophage est un être plus ou moins grand avec des attributs purement chaotiques telle que des membres en plus, des tentacules, des nageoires ou des glandes d\'acides. Présent uniquement dans les égouts d\'Archontiat, ils étaient autrefois les enfants des familles pauvres jetées dedans. Les Nécrophages peuvent faire entre 1 et 7 mètres de haut et atteindre les 1 tonnes. Ils se nourrissent de tout ce qu\'ils peuvent trouver dans les égoutsé: déchet, excréments, petit animaux, cadavres ou les autres Nécrophages. Les plus grand sont très souvent accompagné de Nécrophages plus petits mais si se n\'est pas le cas, ils peuvent en appeler d\'autres. Ils vivent entre 15 et 150 ans en fonction des prédateurs qu\'ils sont et qu\'ils croisent dans les égouts et de leurs meutes. Il ne peut y avoir qu\'une seule Calamité à la fois dans les égouts d\'Archontiat. Les Nécrophages sont tous stériles et essaieront de s\'entre tuer si ils pensent avoir l\'avantage sur la meute adverse', 'Arcontia', 'Éteins', 9),
('Profond Corrompu', '', '../image/profond.png', 1, 'Le Profond est un être humanoïde avec des attributs marins telle que des branchies, une peau d\' écailles, des doigts palmés et des yeux globuleux. Toujours issus d\'un rituel pratiqué par des sectes adorant un dieu méconnu et proches des mers et océans,il était autrefois un humanoïde telle qu\'un humain ou un elfe. Les Profonds font aux alentours de 2m20 pour 170 kg de moyenne. Ils se nourrisse de toutes les viandes trouvables mais raffolent des viandes humanoïdes. Ils sont toujours sauf exception accompagner d\'une secte qui les adorent en tant que semi-divinité. Les spécimens ont une durée de vie égale à l\'existence de la secte qui les a créés. Seul un spécimen vieux de plusieurs centaines d\'années et fessant 3 m de haut a survécu à la disparition de sa secte. Les profonds ne peuvent pas se reproduire et s\'entre tue à chaque fois qu\'ils croisent un congénére.', 'inconnue', 'inconnue', 10),
('Rat', '../image/rats.jpg', '../image/ratsC.jpg', 2, 'Les rats sont des petites créatures d’une longueur de 15 à 20 cm, à laquelle s\'ajoute une longue queue de 20 cm toujours plus longue que le corps. Cette créature est une piétre nageuse mais ses capacités de grimpeuse compense ce probléme. Créature nocturne et omnivore, elles se regroupent généralement en grand groupe de plusieurs centaines d’individus. On peut les apercevoir généralement dans des grottes ou des caves à l’abri de la lumiére dans des galeries que les colonies ont creusées.', 'caverne', 'inconnue', 11);

-- --------------------------------------------------------

--
-- Table structure for table `carte`
--

CREATE TABLE `carte` (
  `ID_carte` int(11) NOT NULL,
  `nom_carte` varchar(50) NOT NULL,
  `lien_carte` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carte`
--

INSERT INTO `carte` (`ID_carte`, `nom_carte`, `lien_carte`) VALUES
(1, 'Monde', '../image/MapV2.png'),
(2, 'Dralor 1 & 2 génération', '../image/MapV2.png'),
(3, 'Yakthoth', '../image/yakthoth.png'),
(4, 'Dralor', '../image/Dralor.png');

-- --------------------------------------------------------

--
-- Table structure for table `fiche`
--

CREATE TABLE `fiche` (
  `nom_fiche` varchar(50) NOT NULL,
  `lien_fiche` varchar(250) NOT NULL,
  `lien_modifiable` varchar(250) NOT NULL,
  `image_fiche` varchar(50) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `generation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fiche`
--

INSERT INTO `fiche` (`nom_fiche`, `lien_fiche`, `lien_modifiable`, `image_fiche`, `id_joueur`, `generation`) VALUES
('Aesar Fyr', 'https://docs.google.com/document/d/1wZZUf7SGQVhnL-MiagITlE7xUu-CuUamGSohbDeIhKY/edit?usp=sharing', '', '../image/aesar.jpg', 1, 1),
('Alice Nargin', 'https://docs.google.com/document/d/1s2zlI4upsx2i2Fk9kd8OobOLl6cGOXwJIK3tpBo8i10/edit?usp=sharing', 'https://docs.google.com/document/d/1s2zlI4upsx2i2Fk9kd8OobOLl6cGOXwJIK3tpBo8i10/edit?usp=sharing', '../image/alice.png', 3, 2),
('Alinar Vagwyn', 'https://docs.google.com/document/d/1ULWNasmba7i_5bMHKWaWFF15cTTP1JTHty_dJTGxDmY/edit?usp=sharing', 'https://docs.google.com/document/d/1ULWNasmba7i_5bMHKWaWFF15cTTP1JTHty_dJTGxDmY/edit?usp=sharing', '../image/Alinar.png', 5, 3),
('Arysis seregon', 'https://docs.google.com/document/d/1CyjNTK0YnPUKIZDHYgutC-qfLZG6Cc06QpCj5GybaQY/edit?usp=sharing', 'https://docs.google.com/document/d/1CyjNTK0YnPUKIZDHYgutC-qfLZG6Cc06QpCj5GybaQY/edit?usp=sharing', '../image/arysisV1.png', 2, 1),
('Arysis seregon (femme)', 'https://docs.google.com/document/d/12hgG2gmt0AAd05L6PtzhvyDmDaLrtsn8Ss_wnRSVyZw/edit?usp=sharing', 'https://docs.google.com/document/d/12hgG2gmt0AAd05L6PtzhvyDmDaLrtsn8Ss_wnRSVyZw/edit?usp=sharing', '../image/arysisV2.png', 2, 2),
('Ash Nargin', 'https://docs.google.com/document/d/1Iq2Kguupghti9i_rCsxFr5UFo_b5EeMT3hu4FuQ2vb8/edit?usp=sharing', 'https://docs.google.com/document/d/1Iq2Kguupghti9i_rCsxFr5UFo_b5EeMT3hu4FuQ2vb8/edit?usp=sharing', '../image/ash.png', 3, 1),
('Bartol', 'https://docs.google.com/document/d/1CznHGWVWDYvIbNjNKz_0ql-Tzr0uOHK7ayFlFbZf0Rk/edit?usp=sharing', 'https://docs.google.com/document/d/1CznHGWVWDYvIbNjNKz_0ql-Tzr0uOHK7ayFlFbZf0Rk/edit?usp=sharing', '../image/bartol.png', 2, 3),
('David Draco', 'https://docs.google.com/document/d/1COggeOLH9OrbIOut0PWPoG3T1qgPJkpWFB4Bq5WK2pQ/edit?usp=sharing', 'https://docs.google.com/document/d/1COggeOLH9OrbIOut0PWPoG3T1qgPJkpWFB4Bq5WK2pQ/edit?usp=sharing', '../image/david.png', 5, 2),
('Donatien De la Croix', 'https://docs.google.com/document/d/1ZCK6_AB9r8eD1RvzMD7ol4C_gf2OPgBV3leevqWT8q0/edit?usp=sharing', 'https://docs.google.com/document/d/1ZCK6_AB9r8eD1RvzMD7ol4C_gf2OPgBV3leevqWT8q0/edit?usp=sharing', '../image/donatien.png', 4, 2),
('Ealna Ferdel', 'https://docs.google.com/document/d/1jPhX75Djwbp54Q1N_OhlZBXX5RCw-eq6tofT22B1AN8/edit?usp=sharing', 'https://docs.google.com/document/d/1jPhX75Djwbp54Q1N_OhlZBXX5RCw-eq6tofT22B1AN8/edit?usp=sharing', '../image/ealna.png', 4, 2),
('Eigham Aadat ', 'https://docs.google.com/document/d/1rQ7cxi_ztUwkc2hP2TNYH583ztNsUfl_0c0s-_pYajE/edit?usp=sharing', 'https://docs.google.com/document/d/1rQ7cxi_ztUwkc2hP2TNYH583ztNsUfl_0c0s-_pYajE/edit?usp=sharing', '../image/eigham.png', 7, 2),
('Elana', 'https://docs.google.com/document/d/1UUk19_KuJBULkLgeg-idsh6oanP8zH7QqKdpnE-waQM/edit?usp=sharing', 'https://docs.google.com/document/d/1UUk19_KuJBULkLgeg-idsh6oanP8zH7QqKdpnE-waQM/edit?usp=sharing', '../image/elana.png', 6, 1),
('Elrune Fyr', 'https://docs.google.com/document/d/1indpr2onRlqYdBG-PeBv-QEjTpV8uy3UahMQXDN6fl4/edit?usp=sharing', 'https://docs.google.com/document/d/1indpr2onRlqYdBG-PeBv-QEjTpV8uy3UahMQXDN6fl4/edit?usp=sharing', '../image/elrune.jpg', 1, 2),
('Ghani Nael', 'https://docs.google.com/document/d/19sRy2-thkoFkpOqHmDPcmirejZHvJeNJBA__gSWUDG4/edit?usp=sharing', 'https://docs.google.com/document/d/19sRy2-thkoFkpOqHmDPcmirejZHvJeNJBA__gSWUDG4/edit?usp=sharing', '../image/ghaniNael.png', 1, 3),
('Jean DelaCroix', 'https://docs.google.com/document/d/1Wb2jc72WWpVvRvRSl-YYXRWijbBPsEKJKzfwqBCFRKA/edit?usp=sharing', 'https://docs.google.com/document/d/1Wb2jc72WWpVvRvRSl-YYXRWijbBPsEKJKzfwqBCFRKA/edit?usp=sharing', '../image/Jean.png', 4, 1),
('Millian Ichtus', 'https://docs.google.com/document/d/1KKu7c_b3JZYnwBnfr4bgRn3jg__LaeKKSAtA6F3xIuM/edit?usp=sharing', 'https://docs.google.com/document/d/1KKu7c_b3JZYnwBnfr4bgRn3jg__LaeKKSAtA6F3xIuM/edit?usp=sharing', '../image/Millian.png', 2, 3),
('Roent Genium', 'https://docs.google.com/document/d/1c5-jBXuf4qSWiYCn9fsLBKpjYlCrsW6WjoTimxSLsI0/edit?usp=sharing', 'https://docs.google.com/document/d/1c5-jBXuf4qSWiYCn9fsLBKpjYlCrsW6WjoTimxSLsI0/edit?usp=sharing', '../image/roent.png', 4, 2),
('Sadarn Yognyar', 'https://docs.google.com/document/d/1yZ_qqNb0ZMBYsAEJhTVQdtvct-jfTvNn0hSe-rcQANw/edit?usp=sharing', 'https://docs.google.com/document/d/1yZ_qqNb0ZMBYsAEJhTVQdtvct-jfTvNn0hSe-rcQANw/edit?usp=sharing', '../image/Sadarn.png', 3, 3),
('Shuna', 'https://docs.google.com/document/d/1fvxYfgb3zL4XCcMrT_wy-DM8_ubOGv2SdM0vbYYOEx0/edit?usp=sharing', 'https://docs.google.com/document/d/1fvxYfgb3zL4XCcMrT_wy-DM8_ubOGv2SdM0vbYYOEx0/edit?usp=sharing', '../image/shuan.png', 3, 3),
('Trelxia', 'https://docs.google.com/document/d/1idxtEkeSXbxjhdOphbrrIZFZGFrAqyv19UqV0id5Rck/edit?usp=sharing', 'https://docs.google.com/document/d/1idxtEkeSXbxjhdOphbrrIZFZGFrAqyv19UqV0id5Rck/edit?usp=sharing', '../image/Trelxia.png', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `ID_groupe` int(11) NOT NULL,
  `nom_groupe` varchar(50) NOT NULL,
  `chef_groupe` varchar(50) DEFAULT NULL,
  `but_groupe` varchar(50) DEFAULT NULL,
  `description_groupe` text DEFAULT NULL,
  `generation_groupe` int(11) NOT NULL,
  `illustration_groupe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`ID_groupe`, `nom_groupe`, `chef_groupe`, `but_groupe`, `description_groupe`, `generation_groupe`, `illustration_groupe`) VALUES
(1, 'cour des comptes', 'Leopolde Toucher De Soie', 'Amasser de l\'argent et avoir un contrôle total de ', 'Une alliance de marchand très puissant ,est fortement présente à Tirion. Il Modifie les prix, et possède un Monopole sur les marchés. Il ne se refuse pas l\'utilisation de Bandit ou d\'assassinat ou de pirate', 2, '../image/CDC1.png'),
(2, 'Cartel Portuaire', 'Thorgrim', 'Avoir le contrôle total de la pègre de Tirion et p', 'Les inégalités sont nombreusse à tirion , et on finit par donner vie au Cartel Portuaire qui ce compose en grande majorité de nains mais aussi de toute les race ou personne qui ont été traîner dans la boue ou abandonner des puissant et des noble.Il sont près a tout pour dérober les objets qui sont leur objectif', 2, '../image/Thorgrim.jpg'),
(3, 'Main Blanche', NULL, 'Inconnue', 'Groupe d\'assassins réputé pour leur efficacité et leurs tenues pour le moins intrigantes. Ils étaient autrefois les mains des Inquisiteur afin de dégoter des preuves sur la culpabilité des suspects par tous les moyens possibles, ils se séparérent de l\'église lors des Grandes Réformes de Flammien qui leur interdisait tout simplement ce pour quoi ils avaient étaient formé à la base.Les rumeurs disent que leur quartier générale se trouverait sous le nez des autorités religieuse à Arcontiat', 2, '../image/mainBlanche.png'),
(4, 'village des chasseurs', NULL, 'Survivre et chasser du lycan', 'En plein cour de la Forêt de Jura, un petit village s\'est bâti au fil du temps. Les habitants commerces principalement des peaux de lycanthrope, en effet la forêt de jura est infestée de lycan qui agressent le moindre voyageur qui ose fouler le sol de cette forêt. Pour s\'en défendre les villageois sont devenues des chasseurs experts dans la chasse des lycans.', 2, '../image/villagechasseur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `personnages`
--

CREATE TABLE `personnages` (
  `ID_perso` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Illustration_perso` varchar(50) NOT NULL,
  `Histoire` text NOT NULL,
  `generation_personnage` int(11) NOT NULL,
  `localisation_personnage` varchar(50) DEFAULT NULL,
  `etat_personnage` varchar(50) DEFAULT NULL,
  `groupe_personnage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personnages`
--

INSERT INTO `personnages` (`ID_perso`, `Nom`, `Illustration_perso`, `Histoire`, `generation_personnage`, `localisation_personnage`, `etat_personnage`, `groupe_personnage`) VALUES
(1, 'Jaskier', '../image/jaskier.png', 'Jaskier est un jeune homme de 27 ans, vêtus d\'habit extrêmement coloré qui reflète le caractère excentrique de son porteur. Il se définit lui-même comme “un bard, un poète, un agent de l’ombre, un séducteur, l’homme de ses dames…”. Cependant à part sa rapière aiguiser et sa capacité à devenir invisible les aventuriers ne connaissent que très peu de chose sur cet étrange personnage.', 2, 'Ahotgart', 'vivant', '\"l\'ordre\"'),
(7, 'Aldaron', '../image/Aldaron.jpg', 'Supérieur direct d\'Aesar et Arysis, Aldaron est un elfe ayant accompli ses faits d\'arme à Tirion sous les ordres de la DGG, gravissant les échelons grâce à son épée et ses compétences martiales.', 2, 'Imphir', 'Mort', 'D.D.G'),
(8, 'Leopold Toucher de soie', '../image/Leopold.jpg', 'Chef de la Cour des comptes à Tirion, Léopold a acquis son titre de noblesse grâce à son commerce de soie qu\'il garde jalousement de toute concurrence. Les aventuriers ont pu voir que cet homme négocie tout et rien et qu\'il n\'hésite pas à éliminer toute forme de problème, s\'il ne peut pas les corrompre.', 2, 'Manoir Toucher de Soie', 'Mort', 'Cour des comptes'),
(9, 'Thorgrim', '../image/Thorgrim.jpg', 'Thorgrim a grandi dans les basfonds de Tirion. Il développa ses relations très rapidement au sein des ouvrier nains (soit 90% des ouvrier du port). Après plusieurs accords avec des gangs et petite voleur de des rues il commença à se faire un nom. Ses relations augmentée tellement qu’il n’y avait plus aucune activité illégale qui ne devais pas lui des rendre des comptes pour exister, le Cartel Portuaire été né. La seule entité capable de tenir tête au cartel été la « Cour des Compte » une alliance de puissant marchant dirigé par la famille Touché de Soie. La guerre commerciale dura jusqu’à la l’arrivé des morts et la destruction de Tirion.\r\n\r\n20 ans après la guerre des morts, Thorgrim survécu et utilisa toutes les ressources du Cartel pour rebâtir Tirion, malheureusement pour lui les Toucher de Soie ont survécu aussi et guerre pour le monopole totale de la Nouvelle-Tirion. Cette guerre prit fin après qu’un groupe d’aventurier posa des explosifs dans la demeure des Toucher de soie et incinère la maison. Après la disparition de ses rival, Thorgrim prit la direction et le contrôle total de Tirion. Il entreprit des fouilles archéologiques sous Tirion qui d’après les récits de ses ancêtres abriterait un bastion de la civilisation naine qui sommeille depuis des centaines et centaine d’année. Après l’explorations de ce bastion en compagnie des mêmes aventuriers que l’assassinat. Il récupéra un artéfact mystérieux qui sembler appartenir à un roi du peuple nains. Quelque temps après la récupération de l’artéfact Thorgrim s’allia à Isabella Sanguine et lança une vague de soulèvement dans les colonies nains du nord. La guerre contre l’Église débuta.', 2, 'Tirion', 'Vivant', 'Cartel Portuaire'),
(10, 'Rahchar', '../image/rahchar.jpg', 'Rahchar est l’homme de mains de Thorgrim et bras gauche du Cartel Portuaire. Il est l’homme qui ouvre toutes les portes et toutes les lèvres. Si des dettes non pas été payé ? Rahchar ! Si deux personne provoque des bastons en interne ? Rahchar ! Quand il y a des gens à brutalisé Rahchar n’est jamais loin.', 2, 'Tirion', 'Vivant', 'Cartel Portuaire'),
(11, 'Cesar', '../image/cesar.jpg', 'Le maître des différents établissements légaux et illégaux du Cartel Portuaire. Il est le bras droit de Thorgrim et un grand stratège économique. Sans lui, un grand nombre de bar n’aurait jamais suivi le Cartel sans Cesar. Dans sa jeunesse il fut un pirate reconnu qui déroba un grand nombre de trésors et d’artefact magique. Il revendue ses trésors pour acheter différents bars de Tirion et écouler son argent mal acquis, en bien tout à fait respectable. Il amassa assez d’or pour transformer son équipage en une grande chaîne de bar et de taverne jusqu’à faire entièrement disparaître sa réputation de pirate aux yeux des autorités. Suite à sa connaissance des ports durant sa vie de pirate, il fut contacté par un gang des ports tenue par un nains nommé Thorgrim et s’allia avec lui pour faire fructifier son affaire. Le gang fessait disparaître les concurrents et soudoient les marchants pour faire baisser les prix. Au fil des années Cesar commença la gestion de tous les établissements du Cartel Portuaire et fit fleurir le commerce.', 2, 'Tirion', 'Vivant', 'Cartel Portuaire'),
(12, 'Arthurus Calice', '../image/Arthurus.jpg', 'Arthurus est né sous les auspices de l\'avarice avec ses parents qui été de riches marchands. Cependant, pour ses 5 ans, une tempête vint mettre fin à cette opulence et coulant les 3 navires de sa famille et ses deux parents. Il fut laissé dans les égouts et fut recueilli par les Nécrophages du clan à Croisard Croisé à mené d\'une main de fer par un adolescent qui avait pour rêve de faire l\'Inquisition. Trois ans plus, son chef mourut et se fut Jean de La Croix, Nêcrophage de 12 ans et dêjà géants qui repris les commandes. Il fut ainsi instruit à lire et écrire et devint son premier conseiller. A ses 16 ans, il suivit Jean qui retourna à la surface et ils extraire ensemble dans l\'Eglise de la Lumière. Jean qui été quelqu\'un ayant d\'énormes péchès, il fut envoyé dans les contrées lointaine de Tyron séparant ainsi Arthurus de tout modèle à suivre. Cette séparation provoqua en Arthurus une immense peine qu\'il transforma en colère contre le système et les ordures qui jeté leurs enfants dans les égouts. Sa colère été tel qu\'il entra dans l\'ordres des Inquisiteur à 23 ans seulement battant le record de jeunesse de 10 ans. Par la suite il démontra ses capacités à tisé des réseaux de délation très étendu et fiable à un tel point qu\'on lui confia la charge de chasser la corruption à Archontiat. Il obtient son réle de Colonel de réserve lors d\'un des raids sur Archontiat en défendent une des portes de la ville avec seulement 15 hommes et 1 géants face à une centaine d\'ennemis. Son dernier ordre de mission et de trouver pourquoi la cité d\'Erkham ne donne plus signe d\'existence\r\n\r\nSuite à la « Guerre des morts » Arthurus suivis Jean son amis d’enfance. Jeans gagne énormément d’influence au sein de l’Église et fit un coup d’état, il devient la nouvelle « Grande Croix » et Arthurus devient un haut commandant de l’Église de la lumière. Après une intervention dans la forêt de Jura, il fut capturé, lui et son unité par un disciple de Vezhan qui les envoya sur le plan du dieu fou. Pendant des jours, peut être même des mois lui et son unité ont maintenue le siège de Fort Rock, un bastion arraché de terre sainte contre des horde de rat géant se tenant sur deux pattes. Les dernières personnes à avoir vue Arthurus vivant, dise qu’il été utilisé comme trophée par un homme en armure rouge.', 2, 'Plan chaotique de Vezane', 'Mort', 'Église de la lumière'),
(13, 'Isabella Sanguine', '../image/Isabella.jpg', 'Isabella est la descendante légitime de Strevas Sanguine né après la guerre des morts, elle fût captivée pas les récits de cette bataille. Tout particulièrement les récits narrant les exploits d \'Arysis Seregon un mage nécromantique qui avais développé une nouvelle magie, la magie du sang. Elle fut très attirée par cet nouvelle et intrigante magie. Après plusieurs années de travail elle réussit à manipuler son propre sang. D’année en année ses expérience était de plus en plus importante. L’une de ses expériences la transforma, la changeant. Elle augmenta grandement sa capacité de contrôle sur le sang mais elle en été maintenant dépendante et devait s’en nourrie pour garde ce pouvoir. Bien des années après elle rencontra une femme qui se disait être Arysis Seregon. Bien qu’elle ne fût pas sûr de cette histoire, la femme en question pratiquer effectivement la magie du sang. Suite à plusieurs altercations avec le groupe de cette femme, le château de la dynastie sanguine fut énormément endommagé. Plus tard, elle s’allia à Thorgrim le nouveau dirigeant de Tirion dans le but de s’attaquer à l’Église pour leur faire perdre du territoire et réduire leur monopole.', 2, 'Sylvanie', 'Vivant', 'Dynastie Sanguine'),
(14, 'Strevas Sanguine', '../image/StrevasSanguine.png', 'Dernier seigneur de la dynastie Sanguine et de l\'empire déchu de Sylvanie, Strevas était un grand nécromancien. Il maniait tout aussi bien les morts que son immense faux gravée de runes. Durant sa jeunesse, Strevas dû fuir et échapper à plusieurs formes de danger à cause de son titre de dernier descendant légitime de l\'empire. Il gravit les échelons en utilisant les cadavres de ses adversaires pour s\'installer sur le trône de crâne, de manière définitive. Il est maintenant reconnu comme le dernier tyran de Sylvanie, on raconte même qu\'il serait mort accroché sur son trône qu\'il ne voulait pas quitter. Cependant, des murmures racontent que les morts se lèvent de nouveaux dans les ruines de Sylvanie, peut-être qu\'il resterait encore des survivants de cet empire déchu qui souhaite revoir un ancien parent.', 1, 'Sylvanie', 'Mort', 'Dynastie Sanguine'),
(15, 'Talennger L\'archithecte des mondes', '../image/talennger.jpg', 'Talennger est un jeune demi-Elfe au moins du point de vue elfique, son corps est beaucoup plus faible que la normale ce qui le rend plutôt faible et vulnérable physiquement, mais il régla ce problème, créant lui-même des sorts de barrière qui sont déployés en permanence autour de lui de façon invisible. Inventeur de génie en termes de focalisation des runes et harmonisation Mécanique, il prit la tête du conseil de Irem malgré son jeune âge. Cependant, Talennger n\'est pas une personne très assidue voir même sérieuse, en effet, il est extrêmement connu à Irem pour son habitude à disparaître dans la nature pour tester de nouveau prototype, en oubliant entièrement ses responsabilités de chef enfin jusqu\'au moment où sa secrétaire Rébecca lui mettra la main dessus.\r\n\r\nTalennger, ancien dirigeant d’Irem « la Belle Mécanique », n’est maintenant plus qu’un savant enfermer dans les ruines d’un dédale d’acier et d’engrenage. Suite à la « Guerre des morts, » la cité fut entièrement ravagée et les très rares survivants de ce carnage ne pouvaient creuser les tombes de leur père avant de se soumettre à l’autorité de l’Église de la lumière. Mais pas Talennger, après avoir vu de ses propres yeux la mort de son assistante Rebecca, il choisit de concentrer toute son énergie, à un moyen capable de faire évacuer une grande quantité de personne aussi loin que possible de toute menace. Mais la ville était en ruine, la source d’énergie de la ville n’avaient pas était endommagé, mais comment construire sans outils. La solution était simple, l’Église. Il proposa à Jean de La Croix une ancienne connaissance de guerre qui avait grandement augmenter son influence au sein de l’Église. En échange de connaissance sur les pierres d’anti-magie et de quelques appareils utiles pour ses projets, Talennger travailla sans relâche pendant 15 sur un prototype de portail inter plan pour pouvoir se déplacer sur un plan d’existence où les lois physiques, la temporalité ou même la notion des distances serait différente puis revenir sur le plan original à une autre localisation en quelques secondes.', 2, 'Irem', 'Vivant', 'Aucun'),
(16, 'Rébecca', '../image/rebeca.jpg', 'Rébecca est une femme elfe plutôt doué dans les sorts de destructions, reconnue comme mage de bataille d\'exception bien que ceci est un passé qui n\'est plus le sien. De nos jours, Rébecca est l\'assistante personnelle de Talennger inventeur de génie et chef de la cité d\'Irem. Cependant, ce travail n\'est pas de tout repos, en effet, Talennger est un demi-elfe plutôt tête en l\'air, qui s\'enfuit en permanence de ses obligations pour tester des prototypes ou vivre des aventures. À cause de ces agissements Rébecca doit alors courir après Talennger une grande partie du temps et s\'occuper de sa survie et sa santé.\r\n\r\n', 1, 'Irem', 'Mort', 'Aucun'),
(17, 'Hao', '../image/hao.jpg', 'Hao est un jeune homme d\'une vingtaine d\'années qui vient du continent orientable et qui en moins d\'une semaine serait devenus. La deuxième guilde la plus puissante de la D.G.G. Il utilise la magie des runes et le contrôle des esprits. En effet, le corps de Hao est recouvert de rune et est accompagné d\'un immense esprit du feu. Certaines rumeurs prétendent qu\'il serait immortel et d\'autre qu\'il se réincarne.\r\n\r\nHao était le haut-prêtre de la tribu des cendres. Il était la personne en communications directe avec Kagutsuchi le seigneur des flammes. Suite à un évènement tragique toute la tribu des cendres fut réduite à néant. Tous sauf lui, après cet évènement il ressortie lier au seigneur élémentaire qui avaient réduit en cendre ses fidèle. Nul ne sait comment, ni pourquoi c’est deux être se sont lié aussi étroitement. Bien des années plus tard on entendit encore parler de lui, il avait rajeuni, et changer de corps, il était devenu bien trop puissant. Il rassembla des alliés dans plusieurs pays, pour réaliser son rêve. Il souhaiter unifier le « Voile » et notre plan d’existence car d’après lui ce procéder aurait donné une connaissance innée de la magie, à tous les êtres conscient et la capacité de changer le monde à leur bon vouloir. Malheureusement pour lui son rituel fut arrêté, Hao quant à lui fut tué par un groupe d’aventurier qui s’était allié aux seigneurs chaotiques. Son âme réside maintenant dans les lames jumelles d’Arioch : Mourdblade et StormBriger. Son âme sera torturée pour l’éternité.', 2, 'Ahotgart', 'Mort', 'Peuple des cendres'),
(18, 'Koya', '../image/koya.jpg', 'Chef de la tribu des cendres, il fut l’un des premiers à savoir le sort que sa tribu aller subir. Les hommes, les femmes et enfants, tous allaient finir brûler vif dans ce déluge de flamme. Pourquoi ? Qu’avaient-ils fait ? Est-ce notre prière n’était pas suffisante ? En voulait-il plus ? Tant de questions qui viennent à un homme condamner à mort. Mais l’espoir venait de renaître, le grand-prêtre de la tribu avait trouvé une solution, une solution qui nous redonnerais nos forces et nos vies dans un future lointain, un où le peuple des cendres pourra voyager, vivre au bord de l’eau ou à la lisière de forêt luxuriante. Cette solution consistée à ne faire plus qu’un avec les flammes et leur donner notre cœur. Koya fut le premier à subir la transformation, remplaçant son cœur par un cœur artificiel composer de rune et de flamme et plongea dans un long sommeil. Bien des années plus tard Koya se réveillera et vue son peuple défiguré et transformer en créature de cendre. Le prêtre lui était encore vivant, il avait changé d’apparence et rajeunit, mais sa force, elle avait grandi. La solution était incorrecte, et ne laissa qu’un très faible taux de réveil, mais il était possible de les ramener. Koya choisis de suivre son nouveau seigneur pour redonner un monde à l’ancienne tribu des cendres.', 2, NULL, 'Mort', 'Peuple des cendres'),
(19, 'Jotun', '../image/jotun.jpg', 'Jotun est un marchand itinérant se déplaçant exclusivement avec sa grande charrette où est exposé des centaines d\'objet divers et varié, du plus utile aux plus inutile, du plus récent aux plus anciens, des plus légaux aux plus …. „ Regardé cette magnifique paire de boucle d ’oreille, elles sont réputées incassable „', 2, 'Porte blanche', 'Vivant', '\"l\'ordre\"'),
(20, 'La bouche', '../image/LaBouche.png', 'Créature Infestait de Chaos pur, d\'une corruption étrangère aux dieux du chaos. Cette personne dénommée „La Bouche„ est remplie de mystère. Elle ne semble pas agressive, mais possède la capacité de disparaître dans les ombres. Nul ne sait qui elle est, ou pour quoi elle existe, mais une chose est sûr „ Il était, il est et il sera votre maître, car il est source de pouvoir.', 2, 'Sylvanie', 'Vivant', 'Démon Chaotique'),
(21, 'Grand-père Ergule', '../image/ergule.jpg', '', 1, 'Erkham', 'Mort', 'Adepte Chaotique'),
(22, 'Leyla Fyr', '../image/leyla.jpg', 'Leyla Fyr, fille d’Aesar Fyr. Des sa naissance, Leyla avait un talent pour les arts magiques, ses flammes dépasser de bien loin celle des membres de la famille Vadan. Mais quelque chose la tracassé, elle avait en permanence l’impressions que quelque chose essayer de lui parler. Comme une voix qui chuchoterai à son oreille. Les année passées et cette sensation l’a dérangé de plus en plus. Jusqu’au jour où elle fut kidnappée par des hommes de l’Église. Cet incident la traumatisa grandement de par les choses ce c’est homme lui on fait mais aussi ce qu’elle leur à fait avant que son père ne la sauve en réduisant le village en cendre. Après ce jour, Leyla fut enfermé durant 5 jour en compagnie Luxios et Balthazar. Depuis ce jour l’ont à toujours vue Leyla avec son nouveau collier gravé d’un crâne.', 2, 'Grande Nécropôle', 'Vivant', 'Dynastie Fyr'),
(23, 'Lucia drako', '../image/LuciaDrako.jpg', 'Lucia est la fille de Sofie Drako, Sœur de Hélène et Erelim Drako. Contrairement à un être humain normal, Lucia n’est pas née sur le même plan d’existence, elle est née dans une des parcelles des monde fou du seigneur du savoir et de la folie Vezhan. Elle survécut en compagnie d’Hadvar un des premiers guerriers de l’Église qui participa à vaincre les seigneurs qui fut enfermer dans ce plan et qui recueille la mère de Lucia. Après la perte de sa mère Lucia, fonda un village de réfugier qui accueils toutes les personnes envoyées sur cette île privée du dieu fou. Après la rencontre avec un groupe de nouveau venu, Lucia rencontra un homme qui semblerait être un cousin éloigné. Suivant ce groupe dans leur aventure sur l’île, elle assista à des horreurs qu’elles n’avaient encore jamais vécues, comme la torture et le meurtre entre les Hommes. Elle découvrit le plan de sa mère, après avoir découvert un pouvoir inné de flamme bleu, elle quitta le groupe qu’elles avaient suivi et partie seule vers la découverte d’un monde qui lui est inconnue.', 2, 'Nord de Dralor', 'Vivant', 'aucun'),
(24, 'Thorfine', '../image/thorfin.jpg', 'Le plus jeune Jarl de l’histoire des peuples Norsk. Thorfin prit le pouvoir après la mort de son père tué par Galmar durant l’assaut de Unland. Thorfin récupéra les « Crocs de Kavik » et la bannière de l’union avant de s’enfuir vers Bisland. A cause de cette fuite, un grand nombre de guerrier n’apprécie pas sa présence à la tête du clan. Ses nouveaux ordres en défaveur de l’esclavage et des raids n’ont pas amélioré sa popularité. Il voudrait réaliser du commerce avec les sudistes qui tue le Norsk depuis les premières neiges. Il fut contacté par un homme aux mille couleurs, l’invitant dans une alliance avec le jarl Yorgun pour vaincre Hadvar et Galmar. Une armée imposante c’est rassembler au pied du Ahotgart. Espérons que ce soit des alliés ?', 2, 'Ahotgart', 'Vivant', 'Peuple Nordien'),
(25, 'Yorgun la Falaise', '../image/yorgun.jpg', 'Jarl de Vendéeaux depuis de 85 ans suite à la mort de son père Tyr. Yorgun à vue son clan se déchirer année après année. Suite à un conseil des jarls, il rencontra un jeune homme dénommé Bijorn fils du jarl Thorn. Les deux enfants débâtés par la lame à chaque rencontre. Le seul et unique sujet qui put être réglé, été le sort du peuple Norsk qui devait être unifié sous une même bannière. Bien des années plus tard l’unité dont les jeunes enfants rêvés fut. Bijorn unifia les clans des montagnes de l’Est ainsi que les sauvages chasseur du sud. Grâce à un Yorgun, Bijorn devient le haut-roi et le seigneur du nord. Bijorn hérita du « Pic blanc », une lance légendaire fait avec les os du dragon originel. Elle aurait la capacité de changer tous ce qu’elle touche en glace éternel. Suite à la mort de Bijorn, Yorgun récupéra Slepnir la monture de Bijorn. Les différents clans commençaient une révolte pour prendre le contrôle du Ahotgart et devenir le nouveau Haut-Roi. 5 ans plus tard un groupe d’aventurier sauva Hellà la fille de Bijorn des chasseurs sauvages et la ramena à Yorgun. En formant une alliance avec ces aventuriers et un dénommé Jaskier, il put vaincre les clans des montagnes de l’Est mené par Galmar et les sauvages chasseur du sud mené par Hadvar.', 2, 'Ahotgart', 'Vivant', 'Peuple Nordien'),
(26, 'Hadvar le Chasseur', '../image/Hadvar.jpg', '', 2, 'Forêt du traqueur', 'Mort', 'Peuple Nordien'),
(27, 'Galmar le boucher de Blaviken', '../image/galmar.jpg', 'Galmar,Le boucher de blaviken, le porteur de « Polunrunt ». Fils de Bolthorn et de la femme du Chef des Trolls des montagnes. Galmar a été éduqué comme un surhomme. Bolthorn avait pour but d’unifier les clans des trolls des montagnes avec un roi inter espèce. Et effectivement cela est arrivé, Galmar unifia les clans, humains et troll et fracassa le crâne de son père pour en faire un trophée ainsi que son ours Kali qu’il porte désormais sur son casque. Il s’empara de Polunrunt une arme fabrique avec les os du dragon originel qui d’après la légende pouvais soulever des montagnes de se nourrir de l’air ambiant. Bien des années plus tard, sa chaman Sac de souris lui annonça qu’il deviendrait Haut-Roi et seigneur du nord. Pour que ce destin puisse arrivait, il unifia les sauvages chasseur du sud pour raser Unland et pour récupérer la bannière de l’unifications et soumettre le peuple Norsk et débuter la conquête du sud.', 2, 'Ahotgart', 'Mort', 'Peuple Nordien');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(250) NOT NULL,
  `mot_de_passe` varchar(250) NOT NULL,
  `image_utilisateur` varchar(250) DEFAULT NULL,
  `description_utilisateur` text DEFAULT NULL,
  `droit_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_utilisateur`, `pseudo`, `mot_de_passe`, `image_utilisateur`, `description_utilisateur`, `droit_utilisateur`) VALUES
(1, 'Alexandre', '$2y$10$WWYZpVbjs6iDCBx5aQ/vx.Sb9i.y.bvcxbN4ds1rmBRriLvqHAj62', 'ghaniNael.png', 'je suis roi', 5),
(2, 'Esteban', '$2y$10$BKhLFHrlYLkVUz418xG/fOAq7e716DJ91RkYx/7yx162pPIrSvPia', NULL, NULL, 0),
(3, 'Dorine', '$2y$10$gGBdDprOP/cLeJ99HOaDoufpGYc/LwK2EI/8jA.emHepx37/eIZ1C', '20191012_214645.jpg', NULL, 0),
(4, 'korentin', '$2y$10$QcQcMsVpgOlpN9qdSMxwAugVtT56EB8Lg2JgA9df13A8ICu8nntVi', NULL, NULL, 0),
(5, 'Florian', '$2y$10$JAX.76rp4yu6gDF2oxVWTuOhW9.BsdvQDwU0RMdOdSCQpJtwa1D/O', 'smug.jpg', 'David Draco ? Alexendre serieusement x) ?\r\n', 0),
(6, 'anysia', '$2y$10$XeuKTJ1ME0/vY08Xp8ekhO1WN4rt6jm.EYpbxc13pB5UD6LMGAHA2', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestiaire`
--
ALTER TABLE `bestiaire`
  ADD PRIMARY KEY (`ID_bestiaire`);

--
-- Indexes for table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`ID_carte`);

--
-- Indexes for table `fiche`
--
ALTER TABLE `fiche`
  ADD PRIMARY KEY (`nom_fiche`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`ID_groupe`);

--
-- Indexes for table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`ID_perso`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carte`
--
ALTER TABLE `carte`
  MODIFY `ID_carte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `ID_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `ID_perso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
