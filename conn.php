<?php
$dbhost = "localhost";
$dbname = "coton";
$dataBase_username = 'root';
$dataBase_password = 'root';
$pdo_conn = new PDO( "mysql:host=$dbhost;dbname=$dbname",$dataBase_username, $dataBase_password );

?>
