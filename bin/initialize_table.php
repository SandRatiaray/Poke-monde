<?php
const ROOT = __DIR__;

require_once ROOT.'/../vendor/autoload.php';

use Vendor\database\Database;
use Vendor\database\Statements;

// Connexion à la base de donnée
$db = (new Database())->getDb();

// Exécuter SQL statements
try {
    // Récupérer les statements
    $statementsManager = new Statements();
    $userStatements = $statementsManager->getUserStatements();
    $pokemonStatements = $statementsManager->getPokemonStatements();
    $productStatements = $statementsManager->getProductStatements();
    $articleStatements = $statementsManager->getArticleStatements();
    $statements = [$userStatements, $pokemonStatements, $productStatements, $articleStatements];
    foreach ($statements as $statementPerType) {
        // Ajouter les tables
        foreach ($statementPerType as $statement) {
            $prepare = $db->prepare($statement);
            $prepare->execute();
        }
    }

} catch (\Throwable $e) {
    die($e->getMessage());
}

