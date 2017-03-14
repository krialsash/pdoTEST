<?php


class Datebase
{

    private $dbhost = "localhost";
    private $dbname = "coton";
    private $dataBase_username = 'root';
    private $dataBase_password = 'root';
    public $pdo_conn;

    function getConnection()
    {

        $this->pdo_conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dataBase_username, $this->dataBase_password);

        return $this->pdo_conn;
    }

}



class Product
{
    private $pdo_conn;

    public $name;
    public $description;
    public $created_at;

    public function __construct($db){
        $this->pdo_conn = $db;
    }

    function create()
    {
        $sql = "INSERT INTO article (name, description, created_at) VALUES ( :name, :description, :created_at)";

        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(":name", $this->name);
        $pdo_statement->bindValue(":description", $this->description);
        $pdo_statement->bindValue(":created_at", $this->created_at);
        $pdo_statement->execute();

        return $this->pdo_conn->lastInsertId();
    }
}

class Posts
{
    public function __construct($db){
        $this->pdo_conn = $db;
    }

    function posts()
    {
        $sql = "SELECT * FROM article";
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();

        return $result;
    }
}

class Updt
{
    public $name;
    public $description;
    public $created_at;
    public $id;

    public function __construct($db){
        $this->pdo_conn = $db;
    }
    function update()
    {
        $sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(":name", $this->name);
        $pdo_statement->bindValue(":description", $this->description);
        $pdo_statement->bindValue(":created_at", $this->created_at);
        $pdo_statement->bindValue(":id", $this->id);
        $result = $pdo_statement->execute();

        return $result;
    }
}
class Category
{
    public $id;

    public function __construct($db){
        $this->pdo_conn = $db;
    }

    function post_id()
    {
        $sql = ('SELECT * FROM article WHERE id = :id');
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->execute(array(':id' => $this->id));
        $result = $pdo_statement->fetch();

        return $result;
    }
}

class Edit
{
    public $name;
    public $description;
    public $created_at;
    public $id;

    public function __construct($db){
        $this->pdo_conn = $db;
    }
    function update_id()
    {
        $sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";

        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(":name", $this->name);
        $pdo_statement->bindValue(":description", $this->description);
        $pdo_statement->bindValue(":created_at", $this->created_at);
        $pdo_statement->bindValue(":id", $this->id);
        $result = $pdo_statement->execute();

        return $result;
    }
}
class Delete
{
    public $id;

    public function __construct($db){
        $this->pdo_conn = $db;
    }
    function delete_id()
    {
        $sql = "DELETE FROM article WHERE id=:id";
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(":id", $this->id);
        $result = $pdo_statement->execute();

        return $result;
    }
}
