<?php

namespace Vendor\database;

/**
 * Class Statements
 * @package Vendor\database
 */
class Statements
{
    /**
     * Créer les tables user et contact
     * @return string[]
     */
    public function getUserStatements(): array
    {
        return [
            'CREATE TABLE user(
            id   INT AUTO_INCREMENT,
            last_name   VARCHAR(100) NOT NULL,
            first_name  VARCHAR(100) NOT NULL,
            email   VARCHAR(100) NOT NULL UNIQUE,
            password   VARCHAR(16) NOT NULL,
            address   VARCHAR(255) NOT NULL,
            zip_code   VARCHAR(10) NOT NULL,
            tel   VARCHAR(25) NOT NULL,
            roles INT NOT NULL,
            PRIMARY KEY(id)
        );',
            'CREATE TABLE contact (
            id   INT AUTO_INCREMENT,
            message TEXT NOT NULL,
            user_id INT NOT NULL,
            animal_id INT NOT NULL,
            createdAt DATETIME DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(id),
            CONSTRAINT fk_contact_user
                FOREIGN KEY(user_id)
                REFERENCES user(id)
                ON DELETE CASCADE,
            CONSTRAINT fk_contact_animal 
                FOREIGN KEY(animal_id) 
                REFERENCES animal(id) 
                ON DELETE CASCADE,
            );'
        ];
    }

    /**
     * Création de la table animal
     * @return string[]
     */
    public function getPetsStatements(): array
    {
        return [
            'CREATE TABLE animal(
            id   INT AUTO_INCREMENT,
            name   VARCHAR(100) NOT NULL,
            nameSlug  VARCHAR(100) NOT NULL UNIQUE,
            type  VARCHAR(100) NOT NULL,
            race  VARCHAR(100) NOT NULL,
            weight   FLOAT NOT NULL,
            size   FLOAT NOT NULL,
            image   VARCHAR(255) NOT NULL,
            available BOOL NOT NULL DEFAULT TRUE,
            PRIMARY KEY(id),
            )'];
    }

}