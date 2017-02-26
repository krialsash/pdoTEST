<?php

require_once 'conn.php';

$ID = $_GET['id'];
$sql = "DELETE FROM article WHERE id=:id";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute(array(':id' => $id));

header('location:index.php');