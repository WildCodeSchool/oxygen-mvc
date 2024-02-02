-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simple-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `title`) VALUES
(1, 'Stuff'),
(2, 'Doodads');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Structure de la table `Student`
--

CREATE TABLE `Student` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(100) NOT NULL,
  `lastName` VARCHAR(150) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `tel` INT(10),
  `degree` VARCHAR(100),
  `birthday` DATE,
  `address` TEXT NOT NULL,
  `avatar_image` VARCHAR(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Course`
--

CREATE TABLE `Course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(150) NOT NULL,
  `capacity` VARCHAR(150) NOT NULL,
  `location` VARCHAR(100),
  `date` DATE NOT NULL,
  `duration` VARCHAR(50),
  `degree` VARCHAR(100) NOT NULL,
  `financing_supported` BOOLEAN,
  `discipline_id` INT,
  `url_image` VARCHAR(255),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`discipline_id`) REFERENCES `Discipline`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Discipline`
--

CREATE TABLE `Discipline` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `icon` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Structure de la table `Les_eleves_d_Oxygen_School_temoignent`
--

CREATE TABLE `Student_Reviews` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `student_id` INT,
  `testimonial` TEXT,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`student_id`) REFERENCES `Student`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Les_eleves_d_Oxygen_School_temoignent`
--

CREATE TABLE `contact` (
 `id` INT NOT NULL AUTO_INCREMENT,
 `firstName` VARCHAR(150) NOT NULL,
 `lastName` VARCHAR(150) NOT NULL,
 `email` VARCHAR(255) NOT NULL,
 `phone` INT NOT NULL,
 `message` VARCHAR(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- AUTO_INCREMENT pour les tables exportées
--

--

--
-- Contenu de la table `Discipline`
--

INSERT INTO `Discipline` (`icon`, `name`, `description`) VALUES
('fa-laptop-code', 'Informatique', 'Découvrez les métiers du design à travers nos formations et apprenez  les fondamentaux du design d’interface.'),
('fa-pen-nib', 'Design', 'Découvrez les métiers du design à travers nos formations et apprenez  les fondamentaux du design d’interface.'),
('fa-money-bill-trend-up', 'Finance', 'Nos formations en finance vous permettront d’acquérir une culture économique et financière solide.'),
('fa-chart-simple', 'Marketing', 'Trouvez votre formation marketing idéale parmi une large sélection de formations.'),
('fa-notes-medical', 'Santé', 'Découvrez toutes nos formations destinées aux professionnels médicaux et paramédicaux.');
--
-- Contenu de la table `Student`
--

INSERT INTO `Student` (`firstName`, `lastName`, `email`, `tel`, `degree`, `birthday`, `address`, `avatar_image`) VALUES
('Asma', 'Jaballah', 'asma@gmail.com', 1234567890, 'PO Marketing', '1990-01-01', 'Paris', 'https://media.licdn.com/dms/image/D4E03AQGj9nhRHrjBzQ/profile-displayphoto-shrink_800_800/0/1684840480045?e=1712188800&v=beta&t=Y_dABFY94yxvlDfcQT7XR3X2_onGQlIdKh66PcS_v-c'),
('Kevin', 'Girault', 'kevin@gmail.com', 1234567890, 'Junior Dev Web', '1986-01-01', 'Etrangers', 'https://media.licdn.com/dms/image/D5603AQFzhJJ8v2K2QQ/profile-displayphoto-shrink_800_800/0/1685949560183?e=1711584000&v=beta&t=PLV-fVRuPbBUAdYOBGV1M3TFo-ao0k0nAEW-6jfBrOk'),
('Joël', 'Mayemba', 'joel@gmail.com', 1234567890, 'Bac+3 ReactJs', '1995-01-01', 'Paris', 'https://media.licdn.com/dms/image/D4E03AQF_1iyiRToEHQ/profile-displayphoto-shrink_800_800/0/1701904115437?e=1711584000&v=beta&t=z3HTNjBHIO5npMAXU5A5VhmRBrHwu499FrSaqgjnkoY'),
('Lucas', 'Boillot', 'lucas@gmail.com', 1234567890, 'Angular Professor', '1990-01-01', 'Paris', 'https://avatars.githubusercontent.com/u/25879136?v=4'),
('Quentin', 'Guillemineau', 'Quentin@gmail.com', 1234567890, 'Data Engineer', '1990-01-01', 'Paris', 'https://i.postimg.cc/66b3Cffp/Quentin.png'),
('Yazid', 'Sefsaf', 'Yazid@gmail.com', 1234567890, 'Big Data Junior', '1990-01-01', 'Paris', 'https://cdn.discordapp.com/attachments/1186683768640122982/1187052343859089549/ayzd.jpg?ex=65c3a025&is=65b12b25&hm=4fc40165ef44b2f148d9f1be816925f478fa227452980b207de6b157007b3af8&');

--
-- Contenu de la table `Les_eleves_d_Oxygen_School_temoignent`
--

INSERT INTO `Student_Reviews` (`student_id`, `testimonial`) VALUES
(1, 'Je suis arrivée chez la wild avec la conviction que le design est ma vocation professionnelle. Nous sommes une petite promo qui se soutient beaucoup et cela me permet de rester très motivée et gagner confiance en moi pour réussir !'),
(2, 'Le fait que la formation passe beaucoup par la pratique était très important pour moi, je pense que c’est de cette façon que l’on assimile le mieux.'),
(3, 'On n’apprend pas un langage par cœur, mais davantage comment on devient développeur et on se dote d’outils pour être capable d’apprendre en permanence.'),
(4, 'Je n’ai jamais porté une grande importance aux diplômes, mais plutôt à mes compétences, à ce que je suis capable de faire concrètement. Je cherchais à allier la partie technique et le côté relationnel et fonctionnel dans la suite de ma carrière'),
(5, 'C’était très intense, j’ai eu une promotion en or et beaucoup d’entraide et ça ça a été très important.'),
(6, 'Peu importe ce que l’on a fait avant, c’est toujours une force, et non une faiblesse.');
