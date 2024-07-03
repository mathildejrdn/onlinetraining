-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mar. 02 juil. 2024 à 13:52
-- Version du serveur : 8.0.37
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `online`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id`, `first_name`, `last_name`, `password`, `birth_date`, `adress`, `phone_number`, `email`, `genre`, `role`) VALUES
(1, 'gui', 'admin', '$argon2id$v=19$m=65536,t=4,p=1$aElabkFiOUdRc2FkRTJuZA$WL0dAj/9AgVr5/RgrcHtUkJQqLB0RKlincp/f06i7mY', '2024-07-17', '12 rue de la rrep', 966666666, 'zizou@zizou.fr', 'homme', 'superAdmin'),
(13, 'tulipe', 'fleur', '$argon2id$v=19$m=65536,t=4,p=1$NEJFQ1kwYzBYZFl6dEVocw$zBnRM+NnA3iBzJ7PXNn+JVbro/I549Uhhj68UXsh3Sw', '2024-07-11', '14 rue des tulipes', 966666666, 'tulipe@fleur.com', 'femme', ''),
(14, 'fab', 'ghy', '$argon2id$v=19$m=65536,t=4,p=1$R0szUjZkeTNNSUt3RHJ0Uw$MPz4lRwZcL1z878EkkvwgC29PccxLLMZIz6ldsUR/3E', '2024-07-18', 'zebre adresse', 966666666, 'fab@gmail.com', 'homme', 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`) VALUES
(1, 'robe'),
(2, 'tee-shirt'),
(3, 'pantalon'),
(4, 'veste'),
(5, 'chemise'),
(7, 'polo'),
(8, 'chaussures');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `id_from` int NOT NULL,
  `id_to` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_message` datetime NOT NULL,
  `read` tinyint(1) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `id_from`, `id_to`, `message`, `date_message`, `read`, `file`) VALUES
(1, 2, 1, 'err', '2024-06-28 12:44:57', 0, ''),
(2, 2, 11, 'rr&#039;r&#039;r', '2024-06-28 12:45:13', 0, ''),
(3, 2, 1, 'err', '2024-06-28 12:47:16', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `user_id` int NOT NULL,
  `user_name` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `reference_produit` int NOT NULL,
  `marque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `categorie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `matiere` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `motif` varchar(255) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `stock` int NOT NULL,
  `prix` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `reference_produit`, `marque`, `categorie`, `nom`, `couleur`, `matiere`, `motif`, `taille`, `genre`, `description`, `stock`, `prix`, `image`) VALUES
(26, 163228, 'Payper', 'Polo manches longues', '', 'Rouge', 'Coton', 'Aucun', 'S', 'homme', '', 1, 30, 'uploads/924c74c0e73b9aceaa54013218117bea.jpg'),
(27, 20548379, 'ARDENE', 'CROP TOP Manche courte', 'ARDENE CROP TOP Manche courte', 'Multicouleur', 'coton', 'Rayures', 'XL', 'Femme', 'à rajouter', 1, 20, 'uploads/123c71d938a1cfb587d2b13f2002ef2f.jpg'),
(28, 163334, 'Payper', '7', 'Payper Polo manches longues Gris', 'Gris', 'Coton', 'Aucun', 'M', 'homme', 'à rajouter', 1, 30, 'uploads/03795f7eaf7f7f11ebdf3991740be5ac.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `adress` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
