SET CHARACTER SET utf8mb4;
CREATE DATABASE lab5;

USE lab5;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
INSERT INTO images (username, password) VALUES ("user", "password");


CREATE TABLE images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);
INSERT INTO images (name) VALUES ("cat1");
INSERT INTO images (name) VALUES ("cat2");
CREATE TABLE terms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_image INT,
    termin VARCHAR(100) NOT NULL,
    FOREIGN KEY (id_image) REFERENCES images(id)
);
INSERT INTO terms (id_images, id_termin) VALUES (1, 1); 
INSERT INTO terms (id_images, id_termin) VALUES (2, 2);