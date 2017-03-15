<?php

class Article
{

    private $dbhost = "localhost";
    private $dbname = "coton";
    private $dataBase_username = 'root';
    private $dataBase_password = 'root';
    public $pdo_conn;

    public function getConnection()
    {
        $this->pdo_conn = null;
        $this->pdo_conn = new PDO("mysql:host=$this->dbhost;dbname=$this->dbname", $this->dataBase_username, $this->dataBase_password);

        return $this->pdo_conn;
    }



    function create($name, $description, $creadet_at)
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



    function posts()
    {
        $sql = "SELECT * FROM article";
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();

        return $result;
    }



    function update($name, $description, $created_at, $id)
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


    function post_id($id)
    {
        $sql = ('SELECT * FROM article WHERE id = :id');
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->execute(array(':id' => $this->id));
        $result = $pdo_statement->fetch();

        return $result;
    }




    function update_id($name, $description, $creadet_at)
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


    function delete_id($id)
    {
        $sql = "DELETE FROM article WHERE id=:id";
        $pdo_statement = $this->pdo_conn->prepare($sql);
        $pdo_statement->bindValue(":id", $this->id);
        $result = $pdo_statement->execute();

        return $result;
    }

}