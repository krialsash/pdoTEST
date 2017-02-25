<?php
require_once 'conn.php';


$sql = "SELECT * FROM article";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();


foreach($result as $row) {
    echo  $row['name']. ' - '. $row['description']. ' - '. $row['created_at'].'<br />';?>
    <a href="edit.php?id=<?php echo $row['id'] ?>" >EDIT</a>
<?php }?>



