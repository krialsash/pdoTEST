<?php
require_once 'conn.php';


$sql = "SELECT * FROM article";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();


foreach($result as $row) {
    echo  $row['name']. ' - '. $row['description']. ' - '. $row['created_at'].'<br />';
}

?>

<?php
$sql = "UPDATE article SET name = :getName(), 
description = :getDescription(),
 created_at = :getCreatedAt()  
 WHERE id= :getId()";
$pdo_statement = $pdo_conn->prepare($sql);
$pdo_statement->execute();