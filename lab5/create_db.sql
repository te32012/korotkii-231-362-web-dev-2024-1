SET CHARACTER SET utf8mb4;
create database lab5;
USE lab5;
create table terms (
    name TEXT,
    characteristics TEXT
);


INSERT INTO terms (name , characteristics) VALUES ('cat1', 'mary'); 

INSERT INTO terms (name , characteristics) VALUES ('cat2', 'luca'); 

INSERT INTO terms (name , characteristics)
VALUES ('cat3', 'hong'); 

INSERT INTO terms (name , characteristics)
VALUES ('cat4', 'rusl'); 


create table images (
    image TEXT,
    name TEXT
);


INSERT INTO images (image,  name)
VALUES ('cat1', 'cat1'); 

INSERT INTO images (image,  name)
VALUES ('cat2', 'cat2'); 

