<?php
foreach($sel as $row) {
    echo  $row['name']. ' - '. $row['description']. ' - '. $row['created_at'].'<br />';?>
    <a href="../controller/edit.php?id=<?php echo $row['id'] ?>" >EDIT</a>
    <a href="../controller/delete.php?id=<?php echo $row['id'] ?>" >DELETE</a>
<?php }?>