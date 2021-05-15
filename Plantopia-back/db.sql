-- Adminer 4.7.6 MySQL dump
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
SET NAMES utf8mb4;
DROP TABLE IF EXISTS `calendar_schedule`;
CREATE TABLE `calendar_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5F5A3193A76ED395` (`user_id`),
  CONSTRAINT `FK_5F5A3193A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `calendar_schedule` (`id`, `user_id`) VALUES
(1,	1),
(2,	3),
(3,	1),
(4,	4),
(5,	1),
(6,	4),
(7, 4),
(8, 3),
(9, 3);
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210210100541',	'2021-02-10 11:06:09',	321),
('DoctrineMigrations\\Version20210210144825',	'2021-02-10 15:48:39',	88),
('DoctrineMigrations\\Version20210210152224',	'2021-02-10 16:22:39',	91),
('DoctrineMigrations\\Version20210210153227',	'2021-02-10 16:32:34',	83),
('DoctrineMigrations\\Version20210210155759',	'2021-02-10 16:58:06',	75),
('DoctrineMigrations\\Version20210212130520',	'2021-02-12 14:05:32',	249),
('DoctrineMigrations\\Version20210212130741',	'2021-02-12 14:07:51',	176),
('DoctrineMigrations\\Version20210212145906',	'2021-02-12 15:59:18',	85),
('DoctrineMigrations\\Version20210217082724',	'2021-02-17 09:27:35',	174);
DROP TABLE IF EXISTS `plant`;
CREATE TABLE `plant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendar_schedule_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specification` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` date DEFAULT NULL,
  `initialization_date` date DEFAULT NULL,
  `watering` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:object)',
  `light` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cut` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `fertilization` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `repotting` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:array)',
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AB030D72D4F77C9E` (`calendar_schedule_id`),
  KEY `IDX_AB030D72C54C8C93` (`type_id`),
  KEY `IDX_AB030D725585C142` (`skill_id`),
  CONSTRAINT `FK_AB030D725585C142` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`),
  CONSTRAINT `FK_AB030D72C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  CONSTRAINT `FK_AB030D72D4F77C9E` FOREIGN KEY (`calendar_schedule_id`) REFERENCES `calendar_schedule` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `plant` (`id`, `calendar_schedule_id`, `name`, `specification`, `age`, `initialization_date`, `watering`, `light`, `cut`, `fertilization`, `repotting`, `picture`, `created_at`, `updated_at`, `type_id`, `skill_id`, `slug`) VALUES
(1,	1,	'Piranha',	'Se développe en général dans la tuyauterie, mais apprécie également d\'être en pot. Très épanouie en extérieur, on peut aussi en trouver en souterrain. Adore les promenades en kart. Peut mordre. Aliment favori : le plombier.',	'1985-09-13',	'2020-06-27',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:7;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Facultatif',	'a:1:{i:0;s:7:\"Octobre\";}',	'a:1:{i:0;s:7:\"Octobre\";}',	'a:1:{i:0;s:4:\"Mars\";}',	'plant-piranha.jpg',	'2021-02-12 14:55:30',	'2021-02-15 09:55:11',	2,	3,		'piranha-1'),
(2,	2,	'Laurier',	'La plantation du laurier rose a lieu de préférence à l\'automne ou au printemps. C\'est une étape importante pour sa croissance. Il aime le plein soleil et être abrité du vent. A l\'extérieur : plantez les lauriers-roses en plein soleil dans un lieu aéré en sol bien drainé. A l\'intérieur. Placez votre plante près d\'une fenêtre orientée au sud.',	'2017-11-18',	'2021-01-17',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:15;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Plein soleil',	'a:1:{i:0;s:7:\"Octobre\";}',	'a:1:{i:0;s:4:\"Mars\";}',	'a:1:{i:0;s:4:\"Mars\";}',	'plant-laurier.jpeg',	'2021-02-12 15:22:02',	NULL,	2,	1,		'laurier-2'),
(3,	3,	'Groot',	'Extraterrestre végétal qui participe occasionnellement à des aventures spatiales. Pas d\'entretien, cette plante est autonome.',	'2020-11-12',	'1960-02-17',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:60;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Stellaire',	'a:1:{i:0;s:5:\"Août\";}',	'a:1:{i:0;s:5:\"Août\";}',	'a:1:{i:0;s:5:\"Août\";}',	'plant-groot.jpg',	'2021-02-12 15:59:37',	NULL,	1,	3,		'groot-3'),
(4,	4,	'Yucca',	'La période de croissance du Yucca a lieu au printemps. C\'est donc à ce moment-là qu\'il faut redoubler d\'attention envers votre ami à feuilles verticales. Soignez-le, humidifiez-le régulièrement, ajoutez un peu d\'engrais et placez-le en extérieur au soleil. La température idéale se situe entre 18° et 22°C. Attention, il ne supporte pas l\'absence de lumière.',	'2012-05-02',	'2021-02-13',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:15;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Emplacement bien lumineux',	'a:1:{i:0;s:5:\"Avril\";}',	'a:1:{i:0;s:5:\"Avril\";}',	'a:1:{i:0;s:5:\"Avril\";}',	'plant-yucca.jpeg',	'2021-02-12 16:00:43',	NULL,	2,	1,		'yucca-4'),
(5,	5,	'Platane',	'En paire dans votre jardin, idéal pour accrocher un hamac. Évitez de planter votre platane trop près d\'un mur ou d\'une maison car ses racines de surface puissantes pourraient les endommager. Pour faire pousser un platane, l\'arbre doit être exposé en plein soleil. Ceci nécessite que le sol soit bien drainé et irrigué afin d\'assurer sa bonne croissance.',	'1989-04-07',	'2021-01-17',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:45;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Plein soleil',	'a:1:{i:0;s:8:\"Novembre\";}',	'a:1:{i:0;s:5:\"Avril\";}',	'a:1:{i:0;s:8:\"Novembre\";}',	'plant-platane.jpg',	'2021-02-15 11:00:55',	NULL,	2,	1,		'platane-5'),
(6,	6,	'Citronnier',	'En pleine terre ou en pot. Pour récolter de beaux citrons, apportez à votre citronnier, régulièrement et tout au long de l\'année, de l\'engrais spécial agrumes. Arrosez-le en été, et rentrez le citronnier en bac en hiver.',	'1992-04-24',	'2020-04-17',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:1;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Ombragé',	'a:1:{i:0;s:7:\"Octobre\";}',	'a:1:{i:0;s:4:\"Mars\";}',	'a:1:{i:0;s:4:\"Mars\";}',	'plant-citronnier.jpeg',	'2021-02-15 11:04:20',	NULL,	2,	2,		'citronnier-6'),
(7,	7,	'Succulente',	'Elles n\'ont besoin ni d\'engrais ni de taille ni de rempotage et leur arrosage est minime, une fois par mois. Il est alors conseillé de les bassiner, en plongeant quelques heures leur pot troué dans un contenant rempli d\'eau, puis de le laisser égoutter. Seule condition à leur réussite : la lumière.',	'2005-03-03',	'2020-04-17',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:30;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Plein soleil',	'a:1:{i:0;s:8:\"Février\";}',	'a:1:{i:0;s:3:\"Mai\";}',	'a:1:{i:0;s:3:\"Mai\";}',	'plant-succulentes.jpg',	'2021-02-15 11:08:19',	NULL,	2,	1,		'succulente-7'),
(8,	8,	'Cactus',	'Pour un entretien optimal, rempotez votre cactus de préférence au printemps, en garnissant le fond du pot de terreau spécial cactées et en arrosant uniquement si ce dernier est sec. Vous pouvez aussi ajouter un peu d\'engrais spécial cactées lors du rempotage, cela ne pourra pas faire de mal à votre plante.',	'2011-06-07',	'2021-03-09',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:30;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'Plein soleil',	'a:1:{i:0;s:7:\"Juillet\";}',	'a:1:{i:0;s:7:\"Juillet\";}',	'a:1:{i:0;s:5:\"Août\";}',	'plant-602b7dbdb1fa3.jpg',	'2021-02-16 09:09:32',	NULL,	1,	1,		'cactus-8'),
(9,	9,	'Kentia',	'Comportant un tronc ou stipe unique, ce palmier se développe lentement, déployant ses longues palmes arquées et vert foncé. Pennées et souples, elles sont pourvues de très longs pétioles lisses.',	'2014-06-12',	'2021-03-08',	'O:12:\"DateInterval\":16:{s:1:\"y\";i:0;s:1:\"m\";i:0;s:1:\"d\";i:3;s:1:\"h\";i:0;s:1:\"i\";i:0;s:1:\"s\";i:0;s:1:\"f\";d:0;s:7:\"weekday\";i:0;s:16:\"weekday_behavior\";i:0;s:17:\"first_last_day_of\";i:0;s:6:\"invert\";i:0;s:4:\"days\";b:0;s:12:\"special_type\";i:0;s:14:\"special_amount\";i:0;s:21:\"have_weekday_relative\";i:0;s:21:\"have_special_relative\";i:0;}',	'8h par jour',	'a:1:{i:0;s:7:\"Janvier\";}',	'a:4:{i:0;s:3:\"Mai\";i:1;s:4:\"Juin\";i:2;s:7:\"Juillet\";i:3;s:5:\"Août\";}',	'a:2:{i:0;s:4:\"Mars\";i:1;s:5:\"Avril\";}',	'plant-602cd5f5c4e92.jpg',	'2021-02-17 09:38:12',	NULL,	1,	2,	'kentia-9');
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_string` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
DROP TABLE IF EXISTS `skill`;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `skill` (`id`, `name`) VALUES
(1,	'Débutant'),
(2,	'Intermédiaire'),
(3,	'Expert');
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `type` (`id`, `name`) VALUES
(1,	'Intérieur'),
(2,	'Extérieur');
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  PRIMARY KEY (`id`),
  KEY `IDX_8D93D649D60322AC` (`role_id`),
  CONSTRAINT `FK_8D93D649D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
INSERT INTO `user` (`id`, `role_id`, `pseudo`, `password`, `email`, `avatar`, `created_at`, `updated_at`, `roles`) VALUES
(1,	NULL,	'Steve',	'$argon2id$v=19$m=65536,t=4,p=1$fi/1RZMYzUW9R70TNA3LLw$R/39u7jEs6v2qOmlnf2kYbpUKVp1yqvZkhYbR+QqN8Y',	'steve@plant.io',	'user-oclock.jpeg',	'2016-01-01 00:00:00',	'2021-02-11 13:54:43',	'[\"ROLE_USER\"]'),
(4,	NULL,	'Christophe',	'$argon2id$v=19$m=65536,t=4,p=1$fi/1RZMYzUW9R70TNA3LLw$R/39u7jEs6v2qOmlnf2kYbpUKVp1yqvZkhYbR+QqN8Y',	'christophe@plant.io',	'user-green.jpg',	'2021-02-11 14:04:18',	NULL,	'[\"ROLE_USER\",\"ROLE_ADMIN\"]'),
(3,	NULL,	'Guillaume',	'$argon2id$v=19$m=65536,t=4,p=1$fi/1RZMYzUW9R70TNA3LLw$R/39u7jEs6v2qOmlnf2kYbpUKVp1yqvZkhYbR+QqN8Y',	'guillaume@plant.io',	'user-guillaume.jpeg',	'2021-02-16 15:21:26',	NULL,	'[\"ROLE_USER\",\"ROLE_ADMIN\"]');
-- 2021-02-19 08:19:24