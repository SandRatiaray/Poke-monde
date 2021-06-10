<?php
namespace Vendor\database;

/**
 * Class Statements
 * @package Vendor\database
 */
class Statements
{
    /**
     * Créer les tables user, don et contact
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
            PRIMARY KEY(id)
        );',
            'CREATE TABLE don(
            id   INT AUTO_INCREMENT,
            amount   FLOAT NOT NULL,
            user_id INT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_don_user
                FOREIGN KEY(user_id)
                REFERENCES user(id)
                ON DELETE CASCADE
            );',
            'CREATE TABLE contact (
            id   INT AUTO_INCREMENT,
            message TEXT NOT NULL,
            user_id INT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_contact_user
                FOREIGN KEY(user_id)
                REFERENCES user(id)
                ON DELETE CASCADE
            );'];
    }

    /**
     * Créer les tables pokemon, pokemonType ,pokemonRace et pokemonRarity
     * @return string[]
     */
    public function getPokemonStatements(): array
    {
        return [
            'CREATE TABLE pokemonType(
            id   INT AUTO_INCREMENT,
            name   VARCHAR(100) NOT NULL,
            nameSlug  VARCHAR(100) NOT NULL UNIQUE,
            PRIMARY KEY(id)
            );',
            'CREATE TABLE pokemonRace(
            id   INT AUTO_INCREMENT,
            name   VARCHAR(100) NOT NULL,
            nameSlug  VARCHAR(100) NOT NULL UNIQUE,
            PRIMARY KEY(id)
            );',
            'CREATE TABLE pokemonRarity(
            id   INT AUTO_INCREMENT,
            name   VARCHAR(100) NOT NULL,
            nameSlug  VARCHAR(100) NOT NULL UNIQUE,
            PRIMARY KEY(id)
            );',
            'CREATE TABLE pokemon(
            id   INT AUTO_INCREMENT,
            name   VARCHAR(100) NOT NULL,
            nameSlug  VARCHAR(100) NOT NULL UNIQUE,
            type_id INT NOT NULL,
            race_id INT NOT NULL,
            rarity_id INT NOT NULL,
            weight   FLOAT NOT NULL,
            size   FLOAT NOT NULL,
            image   VARCHAR(255) NOT NULL,
            available BOOL NOT NULL DEFAULT TRUE,
            PRIMARY KEY(id),
            CONSTRAINT fk_pokemon_type
                FOREIGN KEY(type_id)
                REFERENCES pokemonType(id)
                ON DELETE CASCADE,
            CONSTRAINT fk_pokemon_race 
                FOREIGN KEY(race_id) 
                REFERENCES pokemonRace(id) 
                ON DELETE CASCADE,
            CONSTRAINT fk_pokemon_rarity 
                FOREIGN KEY(rarity_id) 
                REFERENCES pokemonRarity(id) 
                ON DELETE CASCADE
            )'];
    }

    /**
     * Créer les tables product et productCategory
     * @return string[]
     */
    public function getProductStatements(): array
    {
        return [
            'CREATE TABLE productCategory(
            id   INT AUTO_INCREMENT,
            name   VARCHAR(100) NOT NULL,
            nameSlug  VARCHAR(100) NOT NULL UNIQUE,
            PRIMARY KEY(id)
            );',
            'CREATE TABLE product(
            id   INT AUTO_INCREMENT,
            name   VARCHAR(100) NOT NULL,
            nameSlug  VARCHAR(100) NOT NULL UNIQUE,
            stock INT NOT NULL,
            category_id INT NOT NULL,
            price   FLOAT NOT NULL,
            description TEXT NOT NULL,
            PRIMARY KEY(id),
            CONSTRAINT fk_product_category
                FOREIGN KEY(category_id)
                REFERENCES productCategory(id)
                ON DELETE CASCADE
            )'];
    }

    /**
     * Créer la table article
     * @return string[]
     */
    public function getArticleStatements(): array
    {
        return [
            'CREATE TABLE article(
            id   INT AUTO_INCREMENT,
            title   VARCHAR(100) NOT NULL,
            content  TEXT NOT NULL,
            createdAt DATETIME NOT NULL,
            PRIMARY KEY(id)
            )'];
    }
}