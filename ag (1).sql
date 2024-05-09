-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 10 mai 2024 à 00:10
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ag`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(2, 'chaouki', 'chaoukibeddiar@gmail.com', 'Remeciment', 'Votre site est tres beau', '2024-01-21 15:30:08'),
(3, 'chaouki', '', '', '', '2024-01-22 08:51:04'),
(4, '', '', '', 'ggg', '2024-01-22 08:52:15');

-- --------------------------------------------------------

--
-- Structure de la table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `destinations`
--

INSERT INTO `destinations` (`id`, `nom`, `description`, `prix`, `image`) VALUES
(3, 'Paris', 'EXPLOREZ LE MONDE VOYAGEZ AU-DELÀ DES FRONTIÈRES  DÉCOUVREZ L INEXPLORÉ.', 80000.00, 'paris.png'),
(4, 'Bali', 'EXPLOREZ LE MONDE VOYAGEZ AU-DELÀ DES FRONTIÈRES DÉCOUVREZ L INEXPLORÉ.', 105000.00, 'bali.png'),
(8, 'ouled fayet', 'EXPLOREZ LE MONDE VOYAGEZ AU-DELÀ DES FRONTIÈRES DÉCOUVREZ L INEXPLORÉ.', 80000.00, 'backround.png');

-- --------------------------------------------------------

--
-- Structure de la table `hotels`
--

CREATE TABLE `hotels` (
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `etoiles` int(11) DEFAULT NULL,
  `prix_adulte` decimal(10,2) DEFAULT NULL,
  `prix_enfants` decimal(10,2) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotels`
--

INSERT INTO `hotels` (`nom`, `description`, `image`, `etoiles`, `prix_adulte`, `prix_enfants`, `id`) VALUES
('hotel wald', 'hotel', 'walid-hotel.png', 5, 1000.00, 1888.00, 7),
('hotel atana', 'hotel', 'Atana Hotel.png', 5, 1000.00, 1888.00, 8),
('hotel marina', 'hotel', 'marina.png', 5, 1000.00, 1888.00, 9);

-- --------------------------------------------------------

--
-- Structure de la table `hotel_reservations`
--

CREATE TABLE `hotel_reservations` (
  `id` int(11) NOT NULL,
  `visitor_first_name` varchar(20) NOT NULL,
  `visitor_last_name` varchar(20) NOT NULL,
  `visitor_email` varchar(255) NOT NULL,
  `visitor_phone` varchar(15) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `total_adults` int(11) NOT NULL,
  `total_children` int(11) NOT NULL,
  `Categorie_de_chambre` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `Nombre_de_nuits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotel_reservations`
--

INSERT INTO `hotel_reservations` (`id`, `visitor_first_name`, `visitor_last_name`, `visitor_email`, `visitor_phone`, `checkin`, `checkout`, `total_adults`, `total_children`, `Categorie_de_chambre`, `date_of_birth`, `Nombre_de_nuits`) VALUES
(1, '', '', '', '', '2024-01-18', '2024-01-27', 4, 1, 'adjoining', NULL, 6),
(2, '', '', '', '', '2024-01-02', '2024-01-11', 5, 4, 'connecting', NULL, 3),
(3, '', '', '', '', '2024-01-12', '2024-01-15', 3, 3, 'adjacent', NULL, 2),
(4, '', '', '', '', '2024-01-20', '2024-01-22', 3, 3, 'adjacent', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `reservation_vol`
--

CREATE TABLE `reservation_vol` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `ville_depart` varchar(255) NOT NULL,
  `date_depart` date NOT NULL,
  `date_retour` date NOT NULL,
  `heure_depart` time NOT NULL,
  `classe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation_vol`
--

INSERT INTO `reservation_vol` (`id`, `nom`, `prenom`, `date_naissance`, `email`, `telephone`, `ville_depart`, `date_depart`, `date_retour`, `heure_depart`, `classe`) VALUES
(1, 'kheloufi', 'walid', '2024-01-26', 'walidkheloufi@gmail.com', '0540363847', 'cheraga', '2024-01-01', '2024-01-28', '16:39:00', 'premiere'),
(2, 'kheloufi', 'walid', '2024-01-26', 'walidkheloufi@gmail.com', '0540363847', 'cheraga', '2024-01-01', '2024-01-28', '16:39:00', 'premiere'),
(3, 'ahmed', 'kheloufi', '2024-01-09', 'ahmed@gmail.com', '0540363847', 'cheraga', '2024-01-02', '2024-01-28', '17:31:00', 'premiere'),
(4, 'kheloufi', 'walid', '2024-01-04', 'chaoukibeddiar@gmail.com', '0540363847', 'cheraga', '2024-01-11', '2024-01-02', '09:00:00', 'economique'),
(5, 'beddiar', 'chaouki', '2009-02-22', 'chaoukibeddiar@gmail.com', '0540363847', 'cheraga', '2024-01-10', '2024-01-20', '12:06:00', 'affaires'),
(6, 'beddiar', 'chaouki', '2009-02-22', 'chaoukibeddiar@gmail.com', '0540363847', 'cheraga', '2024-01-10', '2024-01-20', '12:06:00', 'affaires');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` bigint(20) NOT NULL,
  `first-name` varchar(255) NOT NULL,
  `last-name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rank` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `first-name`, `last-name`, `email`, `password`, `rank`) VALUES
(1, 'walid', 'kheloufi', 'walidkheloufi@gmail.com', 'walid123', 'admin'),
(5, 'chaouki', 'beddiar', 'chaoukibeddiar@gmail.com', 'chaouki', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `hotel_reservations`
--
ALTER TABLE `hotel_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `hotel_reservations`
--
ALTER TABLE `hotel_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservation_vol`
--
ALTER TABLE `reservation_vol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
