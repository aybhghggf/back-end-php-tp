-- Create the database
CREATE DATABASE objet_db;
USE objet_db;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Categories table
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Objects table
CREATE TABLE objects (
    lot INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    categorie_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    price_min DECIMAL(10,2),
    price_max DECIMAL(10,2),
    closing_date DATETIME NOT NULL,
    city VARCHAR(100),
    validated BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (categorie_id) REFERENCES categories(id)
);

-- Photos table
CREATE TABLE photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    url_photo TEXT NOT NULL,
    object_lot INT NOT NULL,
    FOREIGN KEY (object_lot) REFERENCES objects(lot)
);

-- Ratings table
CREATE TABLE ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    object_lot INT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (object_lot) REFERENCES objects(lot)
);

-- Bids table
CREATE TABLE bids (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    object_lot INT NOT NULL,
    date_bid DATETIME DEFAULT CURRENT_TIMESTAMP,
    amount DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (object_lot) REFERENCES objects(lot)
);
-- Insertion dans users
INSERT INTO users (name, email, password) VALUES
('Ahmed El Amrani', 'ahmed@example.com', 'hashed_password_1'),
('Salma Bouzid', 'salma@example.com', 'hashed_password_2'),
('Youssef Karim', 'youssef@example.com', 'hashed_password_3');

-- Insertion dans categories
INSERT INTO categories (name) VALUES
('Électronique'),
('Meubles'),
('Vêtements'),
('Livres');

-- Insertion dans objects
INSERT INTO objects (user_id, categorie_id, title, description, price, price_min, price_max, closing_date, city, validated) VALUES
(1, 1, 'iPhone 13 Pro', 'Téléphone en excellent état, peu utilisé.', 800.00, 750.00, 900.00, '2025-06-01 20:00:00', 'Casablanca', TRUE),
(2, 2, 'Canapé en cuir', 'Canapé 3 places, très confortable.', 350.00, 300.00, 400.00, '2025-06-02 18:00:00', 'Rabat', TRUE),
(3, 3, 'Veste en cuir', 'Veste neuve taille M.', 120.00, 100.00, 150.00, '2025-06-03 17:00:00', 'Fès', FALSE);

-- Insertion dans photos
INSERT INTO photos (url_photo, object_lot) VALUES
('uploads/iphone.jpg', 1),
('uploads/canape.jpg', 2),
('uploads/veste.jpg', 3);

-- Insertion dans ratings
INSERT INTO ratings (user_id, object_lot, rating, comment) VALUES
(2, 1, 5, 'Produit excellent, vendeur sérieux.'),
(3, 1, 4, 'Bon produit, mais livraison lente.'),
(1, 2, 3, 'Produit correct, un peu usé.');

-- Insertion dans bids
INSERT INTO bids (user_id, object_lot, amount) VALUES
(3, 1, 810.00),
(2, 1, 820.00),
(1, 2, 360.00),
(3, 3, 130.00);


SELECT * from objects INNER JOIN photos ON objects.lot = photos.object_lot;

INSERT INTO users (name, email, password) VALUES
('Nadia Hariri', 'nadia@example.com', 'hashed_password4'),
('Mohamed Lahcen', 'mohamed@example.com', 'hashed_password5'),
('Karima Bouzid', 'karima@example.com', 'hashed_password6');


-- Tapis berbère
INSERT INTO objects (user_id, categorie_id, title, description, price, price_min, price_max, closing_date, city, validated)
VALUES (
    4, 3, 'Tapis berbère fait main',
    'Tapis traditionnel marocain tissé à la main, 2m x 3m.',
    1800.00, 1600.00, 2200.00,
    '2025-06-11 19:00:00', 'Meknès', TRUE
);

-- Service à thé marocain
INSERT INTO objects (user_id, categorie_id, title, description, price, price_min, price_max, closing_date, city, validated)
VALUES (
    5, 3, 'Service à thé traditionnel',
    'Complet avec plateau, théière et verres décorés. Neuf.',
    600.00, 500.00, 700.00,
    '2025-06-09 17:30:00', 'Tétouan', TRUE
);

-- Tableau d’art local
INSERT INTO objects (user_id, categorie_id, title, description, price, price_min, price_max, closing_date, city, validated)
VALUES (
    6, 3, 'Peinture artistique sur toile',
    'Œuvre originale d’un artiste local marocain.',
    2500.00, 2300.00, 3000.00,
    '2025-06-14 21:00:00', 'Essaouira', TRUE
);

-- Coffre ancien en bois
INSERT INTO objects (user_id, categorie_id, title, description, price, price_min, price_max, closing_date, city, validated)
VALUES (
    4, 3, 'Coffre en bois sculpté',
    'Coffre ancien pour décoration ou rangement, très bonne qualité.',
    1500.00, 1300.00, 1800.00,
    '2025-06-13 20:00:00', 'Ouarzazate', TRUE
);


INSERT INTO photos (url_photo, object_lot) VALUES
('uploads/tapis_berbere.jpg', 4),
('uploads/service_the.jpg', 5),
('uploads/peinture_toile.jpg', 6),
('uploads/coffre_bois.jpg', 7);
