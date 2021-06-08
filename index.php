<?php
require_once 'vendor/autoload.php';

use Vendor\database\Database;

$database = new Database('localhost', 3306, 'root', '');

var_dump($database);