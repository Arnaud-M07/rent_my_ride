CREATE DATABASE `rent_my_ride` CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_general_ci';

CREATE TABLE clients(
   `id_client` INT AUTO_INCREMENT,
   `lastname` VARCHAR(50)  NOT NULL,
   `firstname` VARCHAR(50)  NOT NULL,
   `email` VARCHAR(120)  NOT NULL,
   `birthday` DATE NOT NULL,
   `phone` VARCHAR(12)  NOT NULL,
   `city` VARCHAR(50)  NOT NULL,
   `zipcode` VARCHAR(5)  NOT NULL,
   `created_at` DATETIME NOT NULL,
   `updated_at` DATETIME NOT NULL,
   PRIMARY KEY(id_client),
   UNIQUE(email)
);

CREATE TABLE categories(
   `id_category` INT AUTO_INCREMENT,
   `name` VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_category)
);

CREATE TABLE vehicles(
   `id_vehicle` INT AUTO_INCREMENT,
   `brand` VARCHAR(50)  NOT NULL,
   `model` VARCHAR(50)  NOT NULL,
   `registration` VARCHAR(10)  NOT NULL,
   `mileage` INT NOT NULL,
   `picture` VARCHAR(50) ,
   `created_at` DATETIME NOT NULL,
   `updated_at` DATETIME NOT NULL,
   `deleted_at` DATETIME,
   `id_category` INT NOT NULL,
   PRIMARY KEY(id_vehicle),
   FOREIGN KEY(id_category) REFERENCES categories(id_category)
);

CREATE TABLE rents(
   `id_rent` INT AUTO_INCREMENT,
   `startdate` DATETIME NOT NULL,
   `enddate` DATETIME NOT NULL,
   `created_at` DATETIME NOT NULL,
   `confirmed_at` DATETIME,
   `id_vehicle` INT NOT NULL,
   `id_client` INT NOT NULL,
   PRIMARY KEY(id_rent),
   FOREIGN KEY(id_vehicle) REFERENCES vehicles(id_vehicle),
   FOREIGN KEY(id_client) REFERENCES clients(id_client)
);