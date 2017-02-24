
<?php
session_start();
include_once('conn.php'); 

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$description  = $_POST['description'];
  $created_at = $_POST["created_at"];

	 $sql = "INSERT INTO article (name, description, created_at) VALUES ( :name, :description, :created_at)";
   $pdo_statement = $pdo_conn->prepare($sql);
          $pdo_statement->blindValue(":name", $_POST['name']);
          $pdo_statement->blindValue(":description", $_POST['description']);
          $pdo_statement->blindValue(":created_at", $_POST['created_at']);
          $result = $pdo_statement->execute();
	if($result){
		$_SESSION['msg'] = "ITS OK BRO! CRUD WELL";
		header("location:index.php");
	}
}

?>
