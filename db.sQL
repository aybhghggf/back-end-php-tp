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
