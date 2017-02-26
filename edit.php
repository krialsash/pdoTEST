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


$ID = $_GET['id'];
$sql = ('SELECT * FROM article WHERE id = :id');
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute(array(':id' => $ID));
$result = $pdo_statement->fetch();
?>
<form method="post" action="index.php">
    <input type="text" name="name" placeholder="name">
    <input type="text" name="description" placeholder="description">
    <input type="text" name="created_at" placeholder="created_at">
    <input type="submit">
</form>
