<?php

function getConection()
{
    $dbhost = "localhost";
    $dbname = "coton";
    $dataBase_username = 'root';
    $dataBase_password = 'root';
    $pdo_conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dataBase_username, $dataBase_password);

    return $pdo_conn;
}

/**
 * @param $name
 * @param $description
 * @param $created_at
 *
 * @return bool
 */
function create($name, $description, $created_at)
{
    $pdo_conn = getConection();
    $sql = "INSERT INTO article (name, description, created_at) VALUES ( :name, :description, :created_at)";

    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":name", $name);
    $pdo_statement->bindValue(":description", $description);
    $pdo_statement->bindValue(":created_at", $created_at);
    $result = $pdo_statement->execute();

    return $result;
}