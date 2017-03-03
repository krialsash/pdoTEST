<?php

require_once 'conn.php';

$sql = "DELETE FROM article WHERE id=:id" . $_GET['id'];
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();

header('location:index.php');