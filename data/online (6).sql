-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 08 juil. 2024 à 07:40
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
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_adress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int NOT NULL,
  `date_order` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `product_price` int NOT NULL,
  `quantity` int NOT NULL,
  `total_price` int NOT NULL,
  `livraison` varchar(255) NOT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'en attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `user_firstname`, `user_name`, `user_adress`, `email`, `phone_number`, `date_order`, `product_name`, `product_id`, `product_price`, `quantity`, `total_price`, `livraison`, `statut`) VALUES
(19, 3, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-05 14:23:38', '', 26, 30, 1, 30, 'livraison standard', 'en attente'),
(20, 4, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-05 14:46:38', '', 26, 30, 1, 50, 'livraison standard', 'en attente'),
(21, 4, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-05 14:46:38', 'ARDENE CROP TOP Manche courte', 27, 20, 1, 50, 'livraison standard', 'en attente'),
(22, 5, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-05 14:53:57', '', 26, 30, 2, 80, 'livraison standard', 'en attente'),
(23, 5, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-05 14:53:57', 'ARDENE CROP TOP Manche courte', 27, 20, 1, 80, 'livraison standard', 'en attente'),
(24, 6, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-08 06:51:26', '', 26, 30, 2, 80, 'livraison standard', 'en attente'),
(25, 6, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-08 06:51:26', 'ARDENE CROP TOP Manche courte', 27, 20, 1, 80, 'livraison standard', 'en attente'),
(26, 7, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-08 06:53:27', 'ARDENE CROP TOP Manche courte', 27, 20, 1, 50, 'livraison standard', 'en attente'),
(27, 7, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-08 06:53:27', 'Payper Polo manches longues Gris', 28, 30, 1, 50, 'livraison standard', 'en attente'),
(28, 8, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-08 07:25:55', 'test', 29, 20, 1, 20, 'livraison chrono', 'en attente');

-- --------------------------------------------------------

--
-- Structure de la table `order_ids`
--

CREATE TABLE `order_ids` (
  `order_id` int NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `date_order` datetime DEFAULT NULL,
  `livraison` varchar(255) DEFAULT NULL,
  `user_adress` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `order_ids`
--

INSERT INTO `order_ids` (`order_id`, `user_name`, `user_firstname`, `user_id`, `email`, `total_price`, `date_order`, `livraison`, `user_adress`, `phone_number`) VALUES
(1, 'machin', 'truc', 3, 'machin@email.com', 80, '2024-07-05 13:52:03', 'livraison standard', 'truc adresse', '966666666'),
(2, 'machin', 'truc', 3, 'machin@email.com', 270, '2024-07-05 14:18:50', 'livraison standard', 'truc adresse', '966666666'),
(3, 'machin', 'truc', 3, 'machin@email.com', 30, '2024-07-05 14:23:38', 'livraison standard', 'truc adresse', '966666666'),
(4, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-05 14:46:38', 'livraison standard', 'truc adresse', '966666666'),
(5, 'machin', 'truc', 3, 'machin@email.com', 80, '2024-07-05 14:53:57', 'livraison standard', 'truc adresse', '966666666'),
(6, 'machin', 'truc', 3, 'machin@email.com', 80, '2024-07-08 06:51:26', 'livraison standard', 'truc adresse', '966666666'),
(7, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-08 06:53:27', 'livraison standard', 'truc adresse', '966666666'),
(8, 'machin', 'truc', 3, 'machin@email.com', 20, '2024-07-08 07:25:55', 'livraison chrono', 'truc adresse', '966666666');

-- --------------------------------------------------------

--
-- Structure de la table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `product_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `user_id`, `user_name`, `product_id`, `product_name`, `product_img`, `quantity`) VALUES
(35, 3, 'truc', 29, 'test', 'uploads/5bf4ec53d814cb2b5a85c618a72eb66c.jpg', 1);

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
(28, 163334, 'Payper', '7', 'Payper Polo manches longues Gris', 'Gris', 'Coton', 'Aucun', 'M', 'homme', 'à rajouter', 1, 30, 'uploads/03795f7eaf7f7f11ebdf3991740be5ac.jpg'),
(29, 0, 'test', '7', 'test', 'test', 'test', 'test', 'test', 'homme', 'test', 9, 20, 'uploads/5bf4ec53d814cb2b5a85c618a72eb66c.jpg');

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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `birth_date`, `adress`, `phone_number`, `email`, `genre`, `role`) VALUES
(3, 'truc', 'machin', '$argon2id$v=19$m=65536,t=4,p=1$aHpFRTdSTnpPY1pqclhFcA$p5vR2ySb1XiTNX5C6o0hLNiYiAvsPleQdtiInbOCnWE', '2024-07-18', 'truc adresse', 966666666, 'machin@email.com', 'homme', 'utilisateur');

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
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order_ids`
--
ALTER TABLE `order_ids`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
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
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `order_ids`
--
ALTER TABLE `order_ids`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
