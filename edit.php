<?php
require_once 'conn.php';

// select * from article Where id
// -> form

$sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->bindValue(":name", $_POST['name']);
$pdo_statement->bindValue(":description", $_POST['description']);
$pdo_statement->bindValue(":created_at", $_POST['created_at']);
$pdo_statement->bindValue(":id", $_GET['id']);
$pdo_statement->execute();

