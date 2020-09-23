



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
    password TEXT NOT NULL,
    prenom VARCHAR (30) NOT NULL,
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
    slug VARCHAR(100) NOT NULL UNIQUE,
    formerPrice INT NOT NULL,
    price INT NOT NULL,
    resume VARCHAR(250) NOT NULL,
    description TEXT NOT NULL,
    idCategory INT NOT NULL,
    productImage VARCHAR(250) NOT NULL UNIQUE,
    FOREIGN KEY (idCategory) REFERENCES seshop160379_category(id)

);

-- Structure de la table cart

CREATE TABLE seshop160379_cart (
    id INT PRIMARY KEY AUTO_INCREMENT,
    idClient INT NOT NULL,
    FOREIGN KEY (idClient) REFERENCES seshop160379_user(id)
)

-- Structure de la table cart_product

CREATE TABLE seshop160379_cart_product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    idProduct INT NOT NULL,
    
)

-- Structure de la table mail

CREATE TABLE seshop160379_mail (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL
)

INSERT INTO seshop160379_role (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'inactive');

INSERT INTO seshop160379_category (`id`, `category`) VALUES
(1, 'Chaussures Homme'),
(2, 'Mode Homme'),
(3, 'Chaussures Femme'),
(4, 'Mode Femme');

INSERT INTO seshop160379_user (`id`, `email`, `password`, `prenom`, `idRole`) VALUES
(1, 'admin@admin.fr', '5bf1cfa0b08af3919a06124aa18060ce279db496','admin', 1), -- Admin1!
(2, 'client@client.fr', 'ce7b935f58a671ba31760a0ba573f9d3c914344e','client', 2); -- Client1!