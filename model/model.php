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

function posts()
{
    $pdo_conn = getConection();
    $sql = "SELECT * FROM article";
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();

    return $result;
}

function update($name, $description, $created_at, $id)
{
    $pdo_conn = getConection();
    $sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":name", $name);
    $pdo_statement->bindValue(":description", $description);
    $pdo_statement->bindValue(":created_at", $created_at);
    $pdo_statement->bindValue(":id", $id);
    $result = $pdo_statement->execute();

    return $result;
}

function post_id($id)
{
    $pdo_conn = getConection();
    $sql = ('SELECT * FROM article WHERE id = :id');
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->execute(array(':id' => $id));
    $result = $pdo_statement->fetch();

    return $result;
}

function update_id($name, $description, $created_at, $id)
{
    $pdo_conn = getConection();
    $sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";

    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":name", $name);
    $pdo_statement->bindValue(":description", $description);
    $pdo_statement->bindValue(":created_at", $created_at);
    $pdo_statement->bindValue(":id", $id);
    $result = $pdo_statement->execute();

    return $result;
}

function delete_id($id)
{
    $pdo_conn = getConection();
    $sql = "DELETE FROM article WHERE id=:id";
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":id", $id);
    $result = $pdo_statement->execute();

    return $result;
}