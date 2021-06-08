<?php
require_once 'vendor/autoload.php';

use vendor\database\Database;

$database = new Database('localhost', 3306, 'userdev', 'userdev1990');

var_dump($database);