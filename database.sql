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
  `formation` VARCHAR(255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Structure de la table `Course`
--

CREATE TABLE `Course` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(1500) NOT NULL,
  `capacity` VARCHAR(150) NOT NULL,
  `location` VARCHAR(100),
  `date` DATE NOT NULL,
  `duration` VARCHAR(50),
  `degree` VARCHAR(100) NOT NULL,
  `financing_supported` BOOLEAN,
  `discipline_id` INT,
  `url_image` VARCHAR(755),
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
  `url_img` VARCHAR(500),
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

INSERT INTO `Discipline` (`icon`, `name`, `description`, `url_img`) VALUES
('fa-laptop-code', 'Informatique', 'Découvrez les métiers du design à travers nos formations et apprenez  les fondamentaux du design d’interface.', 'https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'),
('fa-pen-nib', 'Design', 'Découvrez les métiers du design à travers nos formations et apprenez  les fondamentaux du design d’interface.', 'https://i0.wp.com/mappingmotion.com/wp-content/uploads/2022/07/5feb0f4527cc9976b63dd88c_big-bang-mockup.png?w=1169&ssl=1'),
('fa-money-bill-trend-up', 'Finance', 'Nos formations en finance vous permettront d’acquérir une culture économique et financière solide.', 'https://static3.cegos.fr/content/uploads/2019/09/11142555/les-metiers-de-la-finance.jpg.webp'),
('fa-chart-simple', 'Marketing', 'Trouvez votre formation marketing idéale parmi une large sélection de formations.', 'https://d1rluokkqqu56n.cloudfront.net/wpapp/uploads/2022/02/12081839/marketing-digital-1620x1080.jpeg'),
('fa-notes-medical', 'Santé', 'Découvrez toutes nos formations destinées aux professionnels médicaux et paramédicaux.', 'https://www.ifc.org/content/dam/ifc/migration/Health_Background_Nov21.jpg');
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


--
-- Contenu de la table `Course`
--

INSERT INTO `Course` (`name` , `description` , `capacity` , `location`, `date`, `duration` , `degree` , `financing_supported` , `discipline_id`, `url_image`) VALUES 
('Web Designer', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 20, 'Paris', '2024-7-01', '5 mois', 'Bac +2', 100, 1, 'https://www.ntc.edu/sites/default/files/styles/full_width_16_9/public/2021-06/web-design-header.jpg?itok=4d7TmUMl'),
('Python Developer', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 12, 'Paris', '2024-9-01', '3 mois', 'Bac +3', 100, 1, 'https://blog.eduonix.com/wp-content/uploads/2018/09/Scientific-Python-Scipy-696x500.jpg'),
('Data Analyst', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 15, 'Paris', '2024-4-01', '8 mois', 'Bac', 100, 1, 'https://www.ntc.edu/sites/default/files/styles/full_width_16_9/public/2021-06/software-development-specialist.jpg?itok=D8qgVwxb'),
('PHP Developer', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 16, 'Paris', '2024-3-01', '3 mois', 'Bac +2', 100, 1, 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi4Pn8gc6rJbSkB86v02ZHpzR9dQD-F6uvOKMZ7bEqVkczQu5WPVTMB2GBXHG9dJnB97DWAhmlSrVEgIvnI3e8AoFf9Z9oeBFm533Bpm-YY1Fs7_CLi6Cw3XkUsezJTDRZyJHt-9Lk-g6Ujrxm6kpLOirbmcqtL6UdOaCk_Z3XGfwf7D2sHXIFBd997/s1000/hiring-PHP-developer.jpg'),
('Data Scientist', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 10, 'Paris', '2024-5-01', '5 mois', 'Bac +5', 100, 2, 'https://www.michaelpage.fr/sites/michaelpage.fr/files/legacy/shutterstock_1100046194_970x480.jpg'),
('Designer', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 12, 'Paris', '2024-6-01', '3 mois', 'Bac +2', 100, 2, 'https://ascentcomputer.co.in/wp-content/uploads/2021/06/WEB_FINAL.png'),
('Figma Course', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 18, 'Paris', '2024-4-01', '12 mois', 'Bac +5', 100, 2, 'https://assets-global.website-files.com/648b07b602810d848d5617a5/651f5ba7e58bbd0d7c9f683d_00_7_Best_Figma_Courses.jpg'),
('PhotoShop Course', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 12, 'Paris', '2024-9-01', '8 mois', 'Bac +2', 100, 2, 'https://i0.wp.com/www.admecindia.co.in/wp-content/uploads/2020/01/Adobe-Photoshop-Master-Course.jpg?fit=390%2C355&ssl=1'),
('Auditeur', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 12, 'Paris', '2024-6-01', '6 mois', 'Bac +2', 100, 3, 'https://www.3foldtraining.com/wp-content/uploads/2021/09/ISO-9001-QMS-Internal-Auditor-Course-in-Mumbai-900x500.jpg'),
('Comptabilité', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 14, 'Paris', '2024-6-01', '3 mois', 'Bac', 100, 3, 'https://youmatter.world/app/uploads/sites/3/2016/11/Comptabilite-performance-globale-rse.jpg'),
('SAGE Course', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 16, 'Paris', '2024-8-01', '5 mois', 'Bac', 100, 3, 'https://www.fctraining.org/img/sage-training.webp'),
('Marketing Course', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 12, 'Paris', '2024-10-01', '12 mois', 'Bac +2', 100, 4, 'https://jupitervidya.com/wp-content/uploads/2015/05/Digital-Marketing-course-in-Whitefield.jpg'),
('Webmarketing', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 15, 'Paris', '2024-6-01', '3 mois', 'Bac +5', 100, 4, 'https://www.ntc.edu/sites/default/files/styles/full_width_16_9/public/2021-06/marketing-social-media-header.jpg?itok=psCycQlf'),
('SEO and SEA Course', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 17, 'Paris', '2024-5-01', '6 mois', 'Bac +2', 100, 4, 'https://cdnwp.mobidea.com/academy/wp-content/uploads/2018/04/best-seo-training-courses-760x428-1.png'),
('Nurse Course', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 10, 'Paris', '2024-6-01', '5 mois', 'Bac', 100, 5, 'https://media.nurse.org/cache/a7/bd/a7bd613aae0566d01bdc76b9839cf82f.png'),
('Formation Secourisme', 'Le métier de développeur d application Python est au cœur de la transformation numérique. Cette formation va vous permettre de réaliser de la création, du développement et de l optimisation d applications en utilisant le langage Python.Un developpeur Python s occupe généralement du back-end des applications, c est a dire l architecture, contrairement aux développeurs front-end, qui gèrent l aspect visuel', 12, 'Paris', '2024-3-01', '1 mois', 'Bac +2', 100, 5, 'https://media.licdn.com/dms/image/C4E12AQGmh3NQBzyEoA/article-cover_image-shrink_600_2000/0/1529953165957?e=2147483647&v=beta&t=egaIOhGNN9jt7AhMOTJqUuPFdVQb0aQNDJImsHDvq9I');

--
-- Insert some new students
--

INSERT INTO `Student` (`firstName`, `lastName`, `email`, `tel`, `degree`, `birthday`, `address`, `avatar_image`) VALUES
('Julia', 'Pellegrini', 'Pellegrini@gmail.com', 1234567890, 'PO Manager', '1995-01-01', 'Amsterdam', 'https://images.unsplash.com/photo-1551292831-023188e78222?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTE0fHxwb3J0cmFpdHxlbnwwfDB8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60'),
('Eric', 'Clampton', 'Eric@gmail.com', 1234567890, 'Junior Desinger', '1997-01-01', 'Mandrid', 'https://images.unsplash.com/photo-1562159278-1253a58da141?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzB8fHBvcnRyYWl0JTIwbWFufGVufDB8MHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60'),
('Jess', 'Flax', 'Flax@gmail.com', 1234567890, 'Bac+3 Nursering', '1999-01-01', 'Liverpool', 'https://images.unsplash.com/photo-1604004555489-723a93d6ce74?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=934&q=80'),
('Julia', 'Wilson', 'Julia@gmail.com', 1234567890, 'Dev Web', '1996-01-01', 'Lyon', 'https://images.unsplash.com/photo-1450297350677-623de575f31c?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MzV8fHdvbWFufGVufDB8fDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=900&q=60'),
('Jess', 'Watson', 'Jess@gmail.com', 1234567890, 'Data Scientist', '1989-01-01', 'Kiev', 'https://images.unsplash.com/photo-1596815064285-45ed8a9c0463?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1215&q=80'),
('Hazard', 'Eden', 'eden@gmail.com', 1234567890, 'Social Marketing', '1997-01-01', 'Lille', 'https://cdn.discordapp.com/attachments/1186683768640122982/1187035817877708841/371521463_2619947881488781_2593667617711553075_n.jpg?ex=65cccb41&is=65ba5641&hm=56ba502d8bfbbd399fdba3d0851f8e4872c486b5637f5167343c3ca879eba5f5&'),
('Ricky', 'James', 'James@gmail.com', 1234567890, 'Web Dev', '1998-01-01', 'Paris', 'https://images.unsplash.com/photo-1583195764036-6dc248ac07d9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2555&q=80');

--
-- Structure table Applications
--

CREATE TABLE `Applications` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `student_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  `status` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`student_id`) REFERENCES `Student`(`id`),
  FOREIGN KEY (`course_id`) REFERENCES `Course`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Insert data to Applications
--

INSERT INTO `Applications` (`student_id`, `course_id`, `status`) VALUES
(7, 2, 'pending'),
(8, 7, 'pending'),
(9, 13, 'pending'),
(10, 7, 'pending'),
(11, 10, 'pending'),
(13, 4, 'pending');


--
-- Structure table New Messages
--

CREATE TABLE `New_Messages` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `student_id` INT NOT NULL,
  `message` TEXT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`student_id`) REFERENCES `Student`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Insert data to table Messages
--

INSERT INTO `New_Messages` (`student_id`, `message`) VALUES
(3, 'Bonjour, je suis intéressé par la formation Python Developer'),
(5, 'Bonjour, je suis intéressé par la formation Designer'),
(12, 'Bonjour, je suis intéressé par la formation Marketing Course'),
(13, 'Bonjour, je suis intéressé par la formation Designer'),
(10, 'Bonjour, je suis intéressé par la formation Data Scientist'),
(7, 'Bonjour, je suis intéressé par la formation PHP Developer');