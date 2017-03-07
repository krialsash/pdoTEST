<?php
require_once 'model.php';

// select * from article Where id
// -> form
if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['created_at']) && !empty($_POST['id'])){
    $sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":name", $_POST['name']);
    $pdo_statement->bindValue(":description", $_POST['description']);
    $pdo_statement->bindValue(":created_at", $_POST['created_at']);
    $pdo_statement->bindValue(":id", $_POST['id']);
    $pdo_statement->execute();
}

$sql = ('SELECT * FROM article WHERE id = :id');
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute(array(':id' => $_GET['id']));
$result = $pdo_statement->fetch();
?>
    <form method="post" action="edit.php">
        <input type="text" name="name" placeholder="name" value="<?php echo $result['name']; ?>" required/>

        <input type="text" name="description" placeholder="description" value="<?php echo $result['description']?>" required/>
        <input type="text" name="created_at" placeholder="created_at"  value="<?php echo $result['created_at']?>" required/>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" >
        <input type="submit">
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




