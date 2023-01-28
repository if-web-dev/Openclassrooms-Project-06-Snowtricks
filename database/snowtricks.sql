-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20220709.47e7cfe761
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 28 jan. 2023 à 16:41
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'slide'),
(2, 'grab'),
(3, 'old school'),
(4, 'rotation'),
(5, 'flip');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `trick_id` int(11) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `author_id`, `trick_id`, `content`, `created_at`) VALUES
(1, 1, 1, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(2, 1, 1, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(3, 1, 1, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(4, 1, 1, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(5, 1, 1, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(6, 1, 1, 'Too risky', '2023-01-28 16:41:22'),
(7, 1, 2, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(8, 1, 2, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(9, 1, 2, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(10, 1, 2, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(11, 1, 2, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(12, 1, 2, 'Too risky', '2023-01-28 16:41:22'),
(13, 1, 3, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(14, 1, 3, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(15, 1, 3, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(16, 1, 3, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(17, 1, 3, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(18, 1, 3, 'Too risky', '2023-01-28 16:41:22'),
(19, 1, 4, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(20, 1, 4, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(21, 1, 4, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(22, 1, 4, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(23, 1, 4, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(24, 1, 4, 'Too risky', '2023-01-28 16:41:22'),
(25, 1, 5, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(26, 1, 5, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(27, 1, 5, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(28, 1, 5, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(29, 1, 5, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(30, 1, 5, 'Too risky', '2023-01-28 16:41:22'),
(31, 1, 6, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(32, 1, 6, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(33, 1, 6, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(34, 1, 6, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(35, 1, 6, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(36, 1, 6, 'Too risky', '2023-01-28 16:41:22'),
(37, 1, 7, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(38, 1, 7, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(39, 1, 7, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(40, 1, 7, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(41, 1, 7, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(42, 1, 7, 'Too risky', '2023-01-28 16:41:22'),
(43, 1, 8, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(44, 1, 8, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(45, 1, 8, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(46, 1, 8, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(47, 1, 8, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(48, 1, 8, 'Too risky', '2023-01-28 16:41:22'),
(49, 1, 9, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(50, 1, 9, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(51, 1, 9, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(52, 1, 9, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(53, 1, 9, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(54, 1, 9, 'Too risky', '2023-01-28 16:41:22'),
(55, 1, 10, 'It\'s a very nice trick', '2023-01-28 16:41:22'),
(56, 1, 10, 'Waaaa what the... awesome trick', '2023-01-28 16:41:22'),
(57, 1, 10, 'Someone can explain better how can we do that?', '2023-01-28 16:41:22'),
(58, 1, 10, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(59, 1, 10, 'How long trainning to do this?', '2023-01-28 16:41:22'),
(60, 1, 10, 'Too risky', '2023-01-28 16:41:22');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230127172614', '2023-01-28 16:41:16', 223);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `trick_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `trick_id`, `path`) VALUES
(1, 1, 'jump1.jpg'),
(2, 1, 'jump1.jpg'),
(3, 2, 'jump1.jpg'),
(4, 2, 'jump3.jpg'),
(5, 3, 'jump1.jpg'),
(6, 3, 'jump3.jpg'),
(7, 4, 'jump1.jpg'),
(8, 4, 'jump1.jpg'),
(9, 5, 'jump2.jpg'),
(10, 5, 'jump2.jpg'),
(11, 6, 'jump1.jpg'),
(12, 6, 'jump1.jpg'),
(13, 7, 'jump1.jpg'),
(14, 7, 'jump3.jpg'),
(15, 8, 'jump2.jpg'),
(16, 8, 'jump2.jpg'),
(17, 9, 'jump2.jpg'),
(18, 9, 'jump2.jpg'),
(19, 10, 'jump3.jpg'),
(20, 10, 'jump1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `trick`
--

CREATE TABLE `trick` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trick`
--

INSERT INTO `trick` (`id`, `author_id`, `category_id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '360', '360', 'The 3.6 front or frontside 3 is an interesting trick because you can easily put a lot of style on it. It\'s a 360 degree rotation on the frontside (left for regulars and right for goofys). Like the 3.6 back, the speed of rotation is quite easy to manage, but if the impulse seems more obvious when throwing the shoulders in front, the landing is much less so because you are from behind the last quarter of the jump. This is called blind side reception…', '2023-01-28 16:41:22', NULL),
(2, 1, 2, '720', '720', 'There’s a trick to doing the 720 and gaining full control of your movement in the air. What you need to do is divide the rotation into several spins and perform them on 2 jumps, one after the other. Imagine yourself performing the rotation. Divide it into two 360s. At the end of the kicker, begin executing the movement, moving your hands simultaneously and turning your head. Spin the first 270 straight, then draw up your legs and turn your shoulders in the direction of rotation, spinning the second 360. Land the trick, cushioning your impact onto the front edge.', '2023-01-28 16:41:22', NULL),
(3, 1, 4, 'Front Flip', 'front-flip', 'The frontflip is one of the easiest flips on the snowboard. Before trying it out on the snow, practice the flip on a trampoline. Accelerate on a flat board. To get into a good spin, push onto the tail before the jump, and then quickly shift forward and push off with your front leg. Make sure your shoulders are parallel to the board. Once in the air, draw up your knees and find your landing spot. Land your board flat.', '2023-01-28 16:41:22', NULL),
(4, 1, 4, 'Back Flip', 'back-flip', 'A noseslide is a skateboarding trick in which you slide on a rail (or curb) on the nose edge (the front end) of your skateboard. You\'ll need to know a few other fundamental tricks before you\'re able to master a noseslide, including an ollie, kickturn, and frontside 180s.', '2023-01-28 16:41:22', NULL),
(5, 1, 5, 'Nose Slide', 'nose-slide', 'The rear hand reaches between the legs and grabs the heel edge between the bindings while the front leg is boned. The wrist is rotated inward to complete the grab.', '2023-01-28 16:41:22', NULL),
(6, 1, 1, 'Tail Slide', 'tail-slide', 'Pressing your snowboard (sometimes called \"buttering\") is the act of leaning your weight over either the nose (nosepress) or tail (tailpress) of the board in such a way that the opposite end of the board is off the snow (or feature).', '2023-01-28 16:41:22', NULL),
(7, 1, 2, 'Mute', 'mute', 'A Mute grab is where the front hand grabs the toe edge between the feet. The board is kept flat. The Mute grab can initially feel awkward, but persevere. Grab the toe edge between the bindings with your front hand.', '2023-01-28 16:41:22', NULL),
(8, 1, 4, 'Stalefish', 'stalefish', 'stalefish (plural stalefishes) (skateboarding) A grab in which the rear hand holds the heelside edge of the snowboard.', '2023-01-28 16:41:22', NULL),
(9, 1, 5, 'Backside Air', 'backside-air', 'Like frontside\'s, the backside air is a move you learn from day one, and spend the rest of your life refining and pushing. The Method air is basically a backside air with extra tweak – old school, but a timeless expression of style. Christian Hosoi perfected them in the eighties on a skateboard, Jamie Lynn did the same on snow in the nineties...and as soon as you\'re getting some', '2023-01-28 16:41:22', NULL),
(10, 1, 4, 'Method Air', 'method-air', 'method air (plural method airs) (snowboarding, skateboarding) A trick where the boarder grabs the heel edge of the board with their front hand, between their feet, and then pulls the board towards their back, while arching their back and bending knees.', '2023-01-28 16:41:22', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `token`, `is_verified`, `email`, `avatar`) VALUES
(1, 'User', '[\"ROLE_USER\"]', '$2y$13$51n2Z1Skd94qU3ttprUVk.3FEgtZ.23HXPtP2ISDKn87Tu5qn8xjW', 'U02aubG7MKog9cBK6fN-5SRPte-4AC6RBvReh9Vg_UE', 1, 'User@user.gmail', 'jump1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `trick_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `trick_id`, `url`, `thumbnail`) VALUES
(1, 1, 'https://www.youtube.com/watch?v=4vGEOYNGi_c', 'https://img.youtube.com/vi/4vGEOYNGi_c/sddefault.jpg'),
(2, 1, 'https://www.youtube.com/watch?v=4vGEOYNGi_c', 'https://img.youtube.com/vi/4vGEOYNGi_c/sddefault.jpg'),
(3, 2, 'https://www.youtube.com/watch?v=5ylWnm4rF1o', 'https://img.youtube.com/vi/5ylWnm4rF1o/sddefault.jpg'),
(4, 2, 'https://www.youtube.com/watch?v=4vGEOYNGi_c', 'https://img.youtube.com/vi/4vGEOYNGi_c/sddefault.jpg'),
(5, 3, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg'),
(6, 3, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg'),
(7, 4, 'https://www.youtube.com/watch?v=4vGEOYNGi_c', 'https://img.youtube.com/vi/4vGEOYNGi_c/sddefault.jpg'),
(8, 4, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg'),
(9, 5, 'https://www.youtube.com/watch?v=4vGEOYNGi_c', 'https://img.youtube.com/vi/4vGEOYNGi_c/sddefault.jpg'),
(10, 5, 'https://www.youtube.com/watch?v=5ylWnm4rF1o', 'https://img.youtube.com/vi/5ylWnm4rF1o/sddefault.jpg'),
(11, 6, 'https://www.youtube.com/watch?v=5ylWnm4rF1o', 'https://img.youtube.com/vi/5ylWnm4rF1o/sddefault.jpg'),
(12, 6, 'https://www.youtube.com/watch?v=4vGEOYNGi_c', 'https://img.youtube.com/vi/4vGEOYNGi_c/sddefault.jpg'),
(13, 7, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg'),
(14, 7, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg'),
(15, 8, 'https://www.youtube.com/watch?v=4vGEOYNGi_c', 'https://img.youtube.com/vi/4vGEOYNGi_c/sddefault.jpg'),
(16, 8, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg'),
(17, 9, 'https://www.youtube.com/watch?v=5ylWnm4rF1o', 'https://img.youtube.com/vi/5ylWnm4rF1o/sddefault.jpg'),
(18, 9, 'https://www.youtube.com/watch?v=5ylWnm4rF1o', 'https://img.youtube.com/vi/5ylWnm4rF1o/sddefault.jpg'),
(19, 10, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg'),
(20, 10, 'https://www.youtube.com/watch?v=TTgeY_XCvkQ', 'https://img.youtube.com/vi/TTgeY_XCvkQ/sddefault.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CF675F31B` (`author_id`),
  ADD KEY `IDX_9474526CB281BE2E` (`trick_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045FB281BE2E` (`trick_id`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `trick`
--
ALTER TABLE `trick`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D8F0A91EF675F31B` (`author_id`),
  ADD KEY `IDX_D8F0A91E12469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CC7DA2CB281BE2E` (`trick_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `trick`
--
ALTER TABLE `trick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`),
  ADD CONSTRAINT `FK_9474526CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045FB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);

--
-- Contraintes pour la table `trick`
--
ALTER TABLE `trick`
  ADD CONSTRAINT `FK_D8F0A91E12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_D8F0A91EF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `trick` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
