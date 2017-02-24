
<?php

include_once('conn.php');


if (!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["created_at"])) {

	 $sql = "INSERT INTO article (name, description, created_at) VALUES ( :name, :description, :created_at)";
   $pdo_statement = $pdo_conn->prepare($sql);
          $pdo_statement->bindValue(":name", $_POST['name']);
          $pdo_statement->bindValue(":description", $_POST['description']);
          $pdo_statement->bindValue(":created_at", $_POST['created_at']);
          $result = $pdo_statement->execute();
	var_dump($pdo_statement->errorInfo());

//		header("location:index.php");

}

?>
