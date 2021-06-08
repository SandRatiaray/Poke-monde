<?php
require_once 'vendor/autoload.php';

use Vendor\database\Database;

$database = new Database('127.0.0.1', 3306, 'userdev', 'userdev1990');

var_dump($database);