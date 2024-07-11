-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 11 juil. 2024 à 11:50
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
(14, 'fab', 'ghy', '$argon2id$v=19$m=65536,t=4,p=1$R0szUjZkeTNNSUt3RHJ0Uw$MPz4lRwZcL1z878EkkvwgC29PccxLLMZIz6ldsUR/3E', '2024-07-18', 'zebre adresse', 966666666, 'fab@gmail.com', 'homme', 'superAdmin');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `nom_categorie` varchar(255) NOT NULL,
  `categorie_genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom_categorie`, `categorie_genre`) VALUES
(1, 'robe', 'femme'),
(2, 'tee-shirt', 'femme'),
(3, 'pantalon', 'homme'),
(4, 'veste', 'homme'),
(5, 'chemise', 'femme'),
(7, 'polo', 'homme'),
(8, 'chaussures', 'homme'),
(9, 'veste', 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `completed_orders`
--

CREATE TABLE `completed_orders` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_price` int NOT NULL,
  `date_order` datetime NOT NULL,
  `livraison` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `user_adress` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `phone_number` int NOT NULL,
  `product_price` int NOT NULL,
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `completed_orders`
--

INSERT INTO `completed_orders` (`id`, `order_id`, `user_name`, `user_firstname`, `user_id`, `email`, `total_price`, `date_order`, `livraison`, `product_id`, `product_name`, `user_adress`, `quantity`, `phone_number`, `product_price`, `statut`, `nom_admin`) VALUES
(1, 4, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-05 14:46:38', 'livraison standard', 26, '', 'truc adresse', 1, 966666666, 30, '0', ''),
(2, 4, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-05 14:46:38', 'livraison standard', 26, '', 'truc adresse', 1, 966666666, 30, '0', ''),
(3, 5, 'machin', 'truc', 3, 'machin@email.com', 80, '2024-07-05 14:53:57', 'livraison standard', 26, '', 'truc adresse', 2, 966666666, 30, '0', ''),
(4, 6, 'machin', 'truc', 3, 'machin@email.com', 80, '2024-07-08 06:51:26', 'livraison standard', 26, '', 'truc adresse', 2, 966666666, 30, '0', ''),
(5, 7, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-08 06:53:27', 'livraison standard', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, '0', ''),
(6, 8, 'machin', 'truc', 3, 'machin@email.com', 20, '2024-07-08 07:25:55', 'livraison chrono', 29, 'test', 'truc adresse', 1, 966666666, 20, '0', ''),
(7, 10, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 06:46:11', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', ''),
(8, 10, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 06:46:11', 'livraison chrono', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', ''),
(9, 10, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 06:46:11', 'livraison chrono', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', ''),
(10, 9, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 06:45:59', 'livraison standard', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(11, 9, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 06:45:59', 'livraison standard', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(12, 9, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 06:45:59', 'livraison standard', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(13, 9, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 06:45:59', 'livraison standard', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(14, 12, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:48:19', 'livraison chrono', 26, '', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(15, 12, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:48:19', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(16, 12, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:48:19', 'livraison chrono', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(17, 12, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:48:19', 'livraison chrono', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(18, 13, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:53:48', 'livraison chrono', 26, '', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(19, 13, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:53:48', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(20, 13, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:53:48', 'livraison chrono', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(21, 13, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:53:48', 'livraison chrono', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(22, 3, 'machin', 'truc', 3, 'machin@email.com', 30, '2024-07-05 14:23:38', 'livraison standard', 26, '', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(23, 16, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 10:16:13', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(24, 16, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 10:16:13', 'livraison chrono', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(25, 15, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 10:16:01', 'livraison standard', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(26, 15, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 10:16:01', 'livraison standard', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(27, 15, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 10:16:01', 'livraison standard', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(28, 15, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 26, '', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(29, 15, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(30, 15, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(31, 15, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(32, 17, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 10:58:48', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(33, 17, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 10:58:48', 'livraison chrono', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(34, 14, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 26, '', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(35, 14, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(36, 14, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(37, 14, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 29, 'test', 'truc adresse', 5, 966666666, 20, 'terminée', 'gui admin'),
(38, 18, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-10 10:59:05', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 1, 966666666, 20, 'terminée', 'gui admin'),
(39, 18, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-10 10:59:05', 'livraison chrono', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(40, 20, 'machin', 'truc', 3, 'machin@email.com', 60, '2024-07-10 16:29:02', 'livraison chrono', 26, '', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(41, 20, 'machin', 'truc', 3, 'machin@email.com', 60, '2024-07-10 16:29:02', 'livraison chrono', 28, 'Payper Polo manches longues Gris', 'truc adresse', 1, 966666666, 30, 'terminée', 'gui admin'),
(42, 19, 'machin', 'truc', 3, 'machin@email.com', 20, '2024-07-10 16:02:48', 'livraison chrono', 27, 'ARDENE CROP TOP Manche courte', 'truc adresse', 2, 966666666, 20, 'terminée', 'gui admin');

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
  `statut` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'en attente',
  `nom_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `user_firstname`, `user_name`, `user_adress`, `email`, `phone_number`, `date_order`, `product_name`, `product_id`, `product_price`, `quantity`, `total_price`, `livraison`, `statut`, `nom_admin`) VALUES
(64, 21, 3, 'truc', 'machin', 'truc adresse', 'machin@email.com', 966666666, '2024-07-11 13:33:17', 'Payper Polo manches longues Gris', 28, 30, 1, 30, 'livraison standard', 'en attente', NULL);

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
(8, 'machin', 'truc', 3, 'machin@email.com', 20, '2024-07-08 07:25:55', 'livraison chrono', 'truc adresse', '966666666'),
(9, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 06:45:59', 'livraison standard', 'truc adresse', '966666666'),
(10, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 06:46:11', 'livraison chrono', 'truc adresse', '966666666'),
(11, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:48:19', 'livraison chrono', 'truc adresse', '966666666'),
(12, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:48:19', 'livraison chrono', 'truc adresse', '966666666'),
(13, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 09:53:48', 'livraison chrono', 'truc adresse', '966666666'),
(14, 'machin', 'truc', 3, 'machin@email.com', 180, '2024-07-09 10:15:51', 'livraison chrono', 'truc adresse', '966666666'),
(15, 'machin', 'truc', 3, 'machin@email.com', 150, '2024-07-09 10:16:01', 'livraison standard', 'truc adresse', '966666666'),
(16, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 10:16:13', 'livraison chrono', 'truc adresse', '966666666'),
(17, 'machin', 'truc', 3, 'machin@email.com', 120, '2024-07-09 10:58:48', 'livraison chrono', 'truc adresse', '966666666'),
(18, 'machin', 'truc', 3, 'machin@email.com', 50, '2024-07-10 10:59:05', 'livraison chrono', 'truc adresse', '966666666'),
(19, 'machin', 'truc', 3, 'machin@email.com', 20, '2024-07-10 16:02:48', 'livraison chrono', 'truc adresse', '966666666'),
(20, 'machin', 'truc', 3, 'machin@email.com', 60, '2024-07-10 16:29:02', 'livraison chrono', 'truc adresse', '966666666'),
(21, 'machin', 'truc', 3, 'machin@email.com', 30, '2024-07-11 13:33:17', 'livraison standard', 'truc adresse', '966666666');

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
(26, 163228, 'Payper', 'tee-shirt', '', 'Rouge', 'Coton', 'Aucun', 'S', 'homme', '', 1, 30, 'uploads/924c74c0e73b9aceaa54013218117bea.jpg'),
(27, 20548379, 'ARDENE', 'robe', 'ARDENE CROP TOP Manche courte', 'Multicouleur', 'coton', 'Rayures', 'XL', 'Femme', 'à rajouter', 1, 20, 'uploads/123c71d938a1cfb587d2b13f2002ef2f.jpg'),
(28, 163334, 'Payper', 'veste', 'Payper Polo manches longues Gris', 'Gris', 'Coton', 'Aucun', 'M', 'femme', 'à rajouter', 1, 30, 'uploads/03795f7eaf7f7f11ebdf3991740be5ac.jpg'),
(29, 0, 'test', 'pantalon', 'test', 'test', 'test', 'test', 'test', 'homme', 'test', 9, 20, 'uploads/5bf4ec53d814cb2b5a85c618a72eb66c.jpg'),
(30, 0, 'test', 'tee-shirt', 'test', 'test', 'test', 'tets', 'test', 'femme', 'test', 1, 40, 'uploads/9d6a3faae31d9644cb0d2fdb46e5f3b7.jpg'),
(31, 0, 'test', 'polo', 'test', 'test', 'test', 'test', 'test', 'homme', 'test', 5, 4, 'uploads/bca011b2284841fa47f97971dc306e00.jpg'),
(32, 0, 'test', '1', 'test', 'test', 'test', 'test', 'test', 'homme', 'test', 1, 1, 'uploads/d04e725443600bba3ccce9a567eb68e5.jpg');

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
-- Index pour la table `completed_orders`
--
ALTER TABLE `completed_orders`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `completed_orders`
--
ALTER TABLE `completed_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `order_ids`
--
ALTER TABLE `order_ids`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
