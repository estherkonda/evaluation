<?php

// Informations de connexion à la base de données
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'garage';

// Créez une connexion à la base de données
$connexion = new mysqli($hostname, $username, $password, $database);

// Vérifiez la connexion
if ($connexion->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connexion->connect_error);
}

// Requête SQL pour créer les tables
$sql = <<<SQL
-- Structure de la table `contact`
DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- Structure de la table `galerie_image_voiture`
DROP TABLE IF EXISTS `galerie_image_voiture`;
CREATE TABLE IF NOT EXISTS `galerie_image_voiture` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `id_voiture` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galerie_image_voiture_id_voiture_foreign` (`id_voiture`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- Structure de la table `horaires`
DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `jour` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `am` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `pm` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- Structure de la table `services`
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `contenu` text COLLATE utf8_swedish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `date_creation` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- Structure de la table `temoignage`
DROP TABLE IF EXISTS `temoignage`;
CREATE TABLE IF NOT EXISTS `temoignage` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `type_commentaire` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `date_creation` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- Structure de la table `voiture`
DROP TABLE IF EXISTS `voitures`;
CREATE TABLE IF NOT EXISTS `voitures`(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL,
    `caracteristiques` TEXT NOT NULL,
    `annee_circulation` int NOT NULL,
    `kilometrage` int NOT NULL,
    `prix` int NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- Structure de la table `users`
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `type_compte` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_swedish_ci;

-- Insertion dans la table `users`
INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `type_compte`) VALUES
(1, 'Pierot', 'De la Porte', 'admin@login.com', 'MTIzNA==', 'admin');

SQL;

// Exécutez les requêtes SQL
if ($connexion->multi_query($sql) === TRUE) {
    echo "Les tables ont été créées avec succès.";
} else {
    echo "Erreur lors de la création des tables : " . $connexion->error;
}

// Fermez la connexion
$connexion->close();

?>
