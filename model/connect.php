<?php

require_once 'model.php';

$database = new Database();
$db = $database->getConnection();

$category = new Category($db);