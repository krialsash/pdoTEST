<?php
class Article{

  private $dbhost = "localhost";
  private $dbname = "coton";
  private $dataBase_username = 'root';
  private $dataBase_password = 'root';
  public $pdo_conn;

function getConection()
{
//    $this->pdo_conn = null;
    $this->pdo_conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dataBase_username, $this->dataBase_password);

    return $this->pdo_conn;
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
    $this->getConection();
    $sql = "INSERT INTO article (name, description, created_at) VALUES ( :name, :description, :created_at)";

    $pdo_statement = $this->pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":name", $name);
    $pdo_statement->bindValue(":description", $description);
    $pdo_statement->bindValue(":created_at", $created_at);
    $pdo_statement->execute();

    return $this->lastInsertId();
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

}