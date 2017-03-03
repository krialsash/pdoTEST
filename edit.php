<?php
require_once 'conn.php';

// select * from article Where id
// -> form
if (!empty($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $created_at = $_POST['created_at'];
    $pdo_statement = $pdo_conn->prepare("UPDATE article SET name = :name, description = :description, 
              created_at = :created_at  WHERE id= :id" );
    $pdo_statement->bindValue(":name", $_POST['name']);
    $pdo_statement->bindValue(":description", $_POST['description']);
    $pdo_statement->bindValue(":created_at", $_POST['created_at']);
    $pdo_statement->bindValue(":id", $_POST['id']);
    $result = $pdo_statement->execute();
    if($result) {
        header('location:index.php');
    }
}
$sql = 'SELECT * FROM article WHERE id =' ;
$id = $_GET['id'];
//$name = $_POST['name'];
//$description = $_POST['description'];
//$created_at = $_POST['created_at'];
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();

?>

<form method="post" action="edit.php">
    <input type="text" name="name" placeholder="name" id="name" value="<?php echo $name;?>">
    <input type="text" name="description" placeholder="description" id="description" value="<?php echo $description;?>" >
    <input type="text" name="created_at" placeholder="created_at" id="created_at" value="<?php echo $created_at;?>">
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <input type="submit" id="update"  >
</form>

<?php
if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {
    $sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $created_at = $_POST['created_at'];
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":name", $_POST['name']);
    $pdo_statement->bindValue(":description", $_POST['description']);
    $pdo_statement->bindValue(":created_at", $_POST['created_at']);
    $pdo_statement->bindValue(":id", $_POST['id']);
    $pdo_statement->execute();

    header("location:index.php");
}


?>