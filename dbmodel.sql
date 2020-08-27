



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Base de données : seshop160379

-- Structure de la table role

CREATE TABLE seshop160379_role(
    id INT PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(25) NOT NULL
);
-- Structure de la table user

CREATE TABLE seshop160379_user (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(80) NOT NULL,
    idRole INT NOT NULL,
    creationDate DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    token VARCHAR (255) DEFAULT NULL,
    FOREIGN KEY (idRole) REFERENCES seshop160379_role(id)
);

-- Structure de la table category

CREATE TABLE seshop160379_category(
    id INT PRIMARY KEY AUTO_INCREMENT,
    category VARCHAR(30) NOT NULL
);

-- Structure de la table product

CREATE TABLE seshop160379_product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    productImage VARCHAR(250) NOT NULL UNIQUE,
    formerPrice INT NOT NULL,
    price INT NOT NULL,
    resume VARCHAR(250) NOT NULL,
    description TEXT NOT NULL,
    idCategory INT NOT NULL,
    FOREIGN KEY (idCategory) REFERENCES seshop160379_category(id)

);

INSERT INTO seshop160379_role (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'inactive');