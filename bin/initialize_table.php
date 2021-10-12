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
    $animalStatements = $statementsManager->getPetsStatements();
    $statements = [$userStatements, $animalStatements];
    foreach ($statements as $statementPerType) {
        // Ajout des tables
        foreach ($statementPerType as $statement) {
            $prepare = $db->prepare($statement);
            $prepare->execute();
        }
    }

} catch (\Throwable $e) {
    die($e->getMessage());
}

