



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Base de données : seshop160379

-------------
-- Structure de la table user
--

CREATE TABLE 'seshop160379_user' (
    'id' INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    'email' VARCHAR(100) NOT NULL UNIQUE,
    'password' VARCHAR(80) NOT NULL,
    'idRole' INT NOT NULL DEFAULT '' FOREIGN KEY (idRole) REFERENCES seshop160379_role(id),
    'creationDate' DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    'token' VARCHAR (255) DEFAULT NULL
)

CREATE TABLE 'seshop160379_role' (
    'id' INT PRIMARY KEY AUTO_INCREMENT,
    'role' VARCHAR(25) NOT NULL
)