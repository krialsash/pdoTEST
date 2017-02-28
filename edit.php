<?php
require_once 'conn.php';

// select * from article Where id
// -> form
if (!isset($_POST['name']) && !isset($_POST['description']) && !isset($_POST['created_at'])){


    $sql = "UPDATE article SET name = :name, 
description = :description,
 created_at = :created_at 
 WHERE id = :id";
    $pdo_statement = $pdo_conn->prepare($sql);
    $pdo_statement->bindValue(":name", $_POST['name']);
    $pdo_statement->bindValue(":description", $_POST['description']);
    $pdo_statement->bindValue(":created_at", $_POST['created_at']);
    $pdo_statement->bindValue(":id", $_GET['id']);
    $pdo_statement->execute();
}

$ID = $_GET['id'];
$sql = ('SELECT * FROM article WHERE id = :id');
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute(array(':id' => $ID));
$result = $pdo_statement->fetch();

foreach($result as $row){
    $row['name'];
    $row['description'];
    $row['created_at'];
}
?>
<form method="post" action="edit.php">
    <input type="text" name="name" placeholder="name"  value="<?php echo $row['name'];?>">
    <input type="text" name="description" placeholder="description"  value="<?php echo  $row['description'];?>">
    <input type="text" name="created_at" placeholder="created_at"  value="<?php echo $row['created_at'];?>">
    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
    <input type="submit" name="update" value="Update">
</form>
