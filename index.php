<?php
const ROOT = __DIR__;

require_once 'vendor/autoload.php';

use Vendor\database\Database;

$database = new Database();

var_dump($database);