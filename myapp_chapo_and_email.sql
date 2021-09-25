-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 23 sep. 2021 à 16:36
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
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`, `updated_at`, `checked`) VALUES
(1, 2, 2, 'Je peux maintenant faire un commentaire sur un article', '2021-09-15 15:42:47', '2021-09-15 15:42:47', 1),
(3, 2, 1, 'mon troisièmes commentaires non validé', '2021-09-15 15:59:42', '2021-09-16 17:37:53', 0),
(5, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur venenatis dolor velit, eget tempor orci dictum eget. Aliquam consectetur bibendum arcu quis malesuada. Suspendisse tortor enim, aliquam ac dictum in, rutrum non orci. Proin porta vulputate libero, quis maximus eros porta cursus. Donec tincidunt nibh mi, in mollis orci faucibus vitae. Morbi eu ultricies est. Aenean non ultricies turpis. Pellentesque maximus pulvinar turpis id aliquet. Pellentesque convallis urna odio, blandit venenatis eros aliquam nec. Proin a turpis justo.\r\n\r\nVestibulum euismod felis a molestie ullamcorper. Pellentesque efficitur facilisis turpis vitae feugiat. Nam id purus quis enim rhoncus fringilla. Pellentesque ac erat enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum congue ultricies ligula quis egestas. Nam iaculis, nisi vel aliquam consectetur, sapien augue volutpat mi, a mollis tellus est nec lectus. Integer tellus dui, consequat vitae sapien ut, porttitor convallis sapien. Proin rutrum ultricies convallis. Integer vel lectus feugiat, iaculis mauris at, suscipit nisl. Aliquam feugiat sem eu ullamcorper eleifend. Aliquam in turpis pretium, laoreet quam pretium, tincidunt felis. Aenean nec viverra libero, commodo sagittis justo. Praesent lacinia enim et enim egestas consequat.', '2021-09-15 17:28:44', '2021-09-16 16:40:09', 1),
(8, 17, 1, 'mon commentaire directement du site', '2021-09-16 17:48:57', '2021-09-16 17:48:57', 0),
(9, 17, 1, 'tous semble correct', '2021-09-16 17:51:47', '2021-09-16 17:52:04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` text NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `chapo`, `content`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Mon premier article !', 'It is a long established fact that a reader will be distracted by the ...', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', '2021-09-02 15:29:06', '2021-09-15 11:41:07', 2),
(2, 'Mon deuxième article ! edited 4', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. \r\nThe generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.\r\n\r\n', '2021-09-02 15:32:26', '2021-09-15 11:41:07', 1),
(3, 'Mon troisième article ! édité', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit sed felis at ultrices. Nulla maximus sapien quis quam ornare, quis suscipit tellus congue. Maecenas in nulla eu orci consectetur sagittis id eu nibh. Aliquam sagittis rutrum magna sed egestas. Maecenas sed nisi pellentesque, mattis nibh finibus, molestie nunc. Aliquam erat volutpat. Vivamus mollis ac risus pulvinar efficitur. Integer lacinia quam dignissim convallis convallis. Morbi gravida rutrum mauris, vel ultricies magna dignissim nec. Duis quis ligula id tortor mattis accumsan. Nulla urna lectus, ullamcorper in mauris sed, tempus accumsan ex. Nam sit amet elit magna. Donec id eros quis nisl lobortis scelerisque. Suspendisse sem tortor, malesuada a condimentum non, ornare et diam. Maecenas sollicitudin a odio in pharetra. Vestibulum tincidunt enim eget sollicitudin dapibus.\r\n\r\nMorbi finibus sollicitudin porttitor. Proin quis ipsum dictum, mollis ipsum et, condimentum odio. Proin at tortor pulvinar libero sodales volutpat ut nec nisl. Suspendisse ac nulla ultrices, pretium neque at, finibus risus. Morbi non felis bibendum, suscipit nulla id, fermentum risus. Sed sit amet quam sodales libero viverra porttitor sed quis arcu. Aliquam erat volutpat.\r\n\r\nEdité avec mon Framework PHP', '2021-09-06 11:12:52', '2021-09-15 11:41:07', 2),
(7, 'Mon super nouvel article (edited 2)', '', 'blabla edited', '2021-09-07 18:32:28', '2021-09-15 11:41:07', 3),
(8, 'Mon nouvel article depuis mon blog edited 2', '', 'Si la variable $a est égale à true, on assigne sa valeur à $b. \r\nLe cas échéant, on assigne une valeur par défaut.', '2021-09-08 17:00:43', '2021-09-15 11:41:07', 3),
(9, 'test nouvel article avec son auteur', 'C\'est le chapô de l\'article', 'gjkjlglkgk\r\nnlknkm\r\nnklkli', '2021-09-11 16:48:50', '2021-09-23 16:14:55', 2),
(16, 'Problème avec la création d\'un article modifié a 11h48', 'J\'ai passé deux heure à chercher pourquoi j\'avais une page blanche...', 'J\'ai passé deux heure à chercher pourquoi j\'avais une page blanche lors de la création d\'un article :\r\n. Je ne sais pas comment             return $stmt->fetch(); c\'est ajouté à la fin de ma fonction create de ma class Post', '2021-09-11 18:20:00', '2021-09-23 16:00:04', 2),
(17, 'test modifié ', 'Création du chapô', 'Je vérifie que modifié ne s\'affiche pas.', '2021-09-15 12:43:13', '2021-09-23 15:52:17', 1);

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
(42, 7, 2),
(43, 7, 1),
(45, 3, 3),
(46, 3, 2),
(47, 3, 1),
(52, 8, 4),
(70, 17, 4),
(71, 16, 3),
(72, 9, 1);

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
(4, 'SYMFONY', '2021-09-06 11:38:33');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `admin`, `created_at`, `updated_at`, `checked`) VALUES
(1, 'admin', 'iwebprod@gmail.com', '$2y$10$66v0EzdKyLIMRI6K2XQyLuzljZ2w71sqhN8o0Qe2hC72sSX.wl9mu', 1, '2021-09-11 16:20:01', '2021-09-23 17:24:32', 1),
(2, 'gnut', 'gnut@gnut.eu', '$2y$10$66v0EzdKyLIMRI6K2XQyLuzljZ2w71sqhN8o0Qe2hC72sSX.wl9mu', 1, '2021-09-11 16:20:01', '2021-09-23 17:24:32', 1),
(3, 'charles', 'morpheus2022@gmail.com', '$2y$10$bp6kY2TzL5ToGzmdf8mTw.Du0Zljvfi1tbkuiMJTQEutZU6waMHLG', 1, '2021-09-11 16:20:01', '2021-09-23 17:24:32', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`);

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
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
