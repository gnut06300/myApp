-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 08 sep. 2021 à 15:07
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Mon premier article !', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', '2021-09-02 15:29:06'),
(2, 'Mon deuxième article ! edited 4', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. \r\nThe generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n', '2021-09-02 15:32:26'),
(3, 'Mon troisième article ! (edited 4)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit sed felis at ultrices. Nulla maximus sapien quis quam ornare, quis suscipit tellus congue. Maecenas in nulla eu orci consectetur sagittis id eu nibh. Aliquam sagittis rutrum magna sed egestas. Maecenas sed nisi pellentesque, mattis nibh finibus, molestie nunc. Aliquam erat volutpat. Vivamus mollis ac risus pulvinar efficitur. Integer lacinia quam dignissim convallis convallis. Morbi gravida rutrum mauris, vel ultricies magna dignissim nec. Duis quis ligula id tortor mattis accumsan. Nulla urna lectus, ullamcorper in mauris sed, tempus accumsan ex. Nam sit amet elit magna. Donec id eros quis nisl lobortis scelerisque. Suspendisse sem tortor, malesuada a condimentum non, ornare et diam. Maecenas sollicitudin a odio in pharetra. Vestibulum tincidunt enim eget sollicitudin dapibus.\r\n\r\nMorbi finibus sollicitudin porttitor. Proin quis ipsum dictum, mollis ipsum et, condimentum odio. Proin at tortor pulvinar libero sodales volutpat ut nec nisl. Suspendisse ac nulla ultrices, pretium neque at, finibus risus. Morbi non felis bibendum, suscipit nulla id, fermentum risus. Sed sit amet quam sodales libero viverra porttitor sed quis arcu. Aliquam erat volutpat.\r\n\r\nEdité avec mon Framework PHP', '2021-09-06 11:12:52'),
(7, 'Mon super nouvel article (edited 2)', 'blabla edited', '2021-09-07 18:32:28'),
(8, 'Mon nouvel article depuis mon blog', 'Si la variable $a est égale à true, on assigne sa valeur à $b. Le cas échéant, on assigne une valeur par défaut.', '2021-09-08 17:00:43');

-- --------------------------------------------------------

--
-- Structure de la table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(1, 1, 1),
(33, 2, 3),
(34, 2, 1),
(35, 3, 4),
(36, 3, 1),
(42, 7, 2),
(43, 7, 1),
(44, 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(1, 'PHP', '2021-09-06 11:36:46'),
(2, 'JS', '2021-09-06 11:37:26'),
(3, 'HTML/CSS', '2021-09-06 11:37:48'),
(4, 'PYTHON', '2021-09-06 11:38:33');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `admin`) VALUES
(1, 'admin', '$2y$10$66v0EzdKyLIMRI6K2XQyLuzljZ2w71sqhN8o0Qe2hC72sSX.wl9mu', 1),
(2, 'gnut', '$2y$10$66v0EzdKyLIMRI6K2XQyLuzljZ2w71sqhN8o0Qe2hC72sSX.wl9mu', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK2` (`tag_id`),
  ADD KEY `FK1` (`post_id`) USING BTREE;

--
-- Index pour la table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
